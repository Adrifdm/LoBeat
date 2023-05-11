<?php
require_once PATH3 . '/LoBeat/app/controllers/usuarioController.php';

class SpotifyService {
    // Atributos ---------------------------------------
    private $usuarioController;

    // Constructor -------------------------------------
    public function __construct() {
        $this->usuarioController = new UsuarioController();
    }

    // Funciones Core ----------------------------------
    public function autenticarUsuario() {

        $session = new SpotifyWebAPI\Session(
            '8d2d98d239094241afabe8ead302c625',
            '0b8c3b77a6b448158ecdf7e3b045cbda',
            'http://localhost:80/LoBeat/app/spotifyAPI/autenticacion/callback.php'
        );
        
        /*
        Definimos un array options con las scopes (permisos definidos dentro de la biblioteca
        SpotifyWebAPI y que dependiendo de cual sea nos permitiran llamar a una función u otra
        de del catálogo de endpoints de Spotify)
        */
        $options = [
            'scope' => [
                'user-read-private',
                'user-read-recently-played',
                'playlist-read-collaborative',
                'playlist-modify-public',
                'playlist-modify-private',
                'playlist-read-private',
                'user-library-read',
                'user-library-modify',
                'user-top-read',
                'user-follow-read',
                'user-follow-modify',
                'user-read-currently-playing',
                'user-modify-playback-state',
                'user-read-email',
            ],
        ];
        
        header('Location: ' . $session->getAuthorizeUrl($options));
        die();
    }

    public function obtenerTokensUsuario($id) {
        // Obtener el usuario por su ID
        $usuario = $this->usuarioController->obtenerUsuarioPorId($id);
        // Devolver el accessToken y refreshToken del usuario en un arreglo
        return [
            'accessToken' => $usuario->getSpotify_access_token(),
            'refreshToken' => $usuario->getSpotify_refresh_token()
        ];
    }
    
    public function refrescarTokens($id) {
        
        // Crea una instancia de la clase Session con los datos del cliente
        $session = new SpotifyWebAPI\Session(
            '8d2d98d239094241afabe8ead302c625',
            '0b8c3b77a6b448158ecdf7e3b045cbda'
        );

        // Obtenemos el accessToken y refreshToken actuales de un determinado usuario (utilizando spotifyController)
        // Esta función debe devolver un array asociativo con las claves 'accessToken' y 'refreshToken'
        $userTokens = $this->obtenerTokensUsuario($id);
        //$accessTokenActual = $userTokens['accessToken'];
        $refreshTokenActual = $userTokens['refreshToken'];
        // Si el accessToken sigue siendo válido, seteamos tanto ese accessToken como el refreshToken a la session directamente
       /*
        if ($accessTokenActual) {
            $session->setAccessToken($accessTokenActual);
            $session->setRefreshToken($refreshTokenActual);
        }
        */
        // En caso contrario, tenemos que generar un nuevo accessToken válido. Lo hacemos con la función refreshAccessToken, que necesita el refreshToken como entrada
      
        $session->refreshAccessToken($refreshTokenActual);

        // Crea una instancia de la clase SpotifyWebAPI ($api) con la opción auto_refresh activada.
        //$api estará lista para ser usada por otros ficheros y realizar peticiones
        $options = [
            'auto_refresh' => true,
        ];
        $api = new SpotifyWebAPI\SpotifyWebAPI($options, $session);

        // Establece la sesión en la instancia de la clase SpotifyWebAPI
        $api->setSession($session);

        // Obtenemos los nuevos tokens que pueden haber sido actualizados por la opción auto_refresh
        $accessTokenNuevo = $session->getAccessToken();
        $refreshTokenNuevo = $session->getRefreshToken();

        // Guardamos los nuevos tokens en la base de datos, en el usuario correspondiente (mediante una llamada a una función externa)
        $datos = array(
            'spotify_access_token' => $accessTokenNuevo,
            'spotify_refresh_token' => $refreshTokenNuevo
        );

        $this->usuarioController->actualizarUsuario($id, $datos);

    }

    // Llamadas -----------------------------------------

    // Funciones que realizan llamadas a la API para obtener información sobre USUARIOS

    public function obtenerUsuarioActual() {
        require PATH3 . '/LoBeat/vendor/autoload.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $collection = (new MongoDB\Client)->LoBeat->usuarios;
        $result = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
        ]);
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($result['spotify_access_token']);

        // Utilizamos el endpoint "Get Current User's Profile" o "me()" para solicitar información sobre el usuario actual
        $user_data = $api->me();

        return $user_data;
    }

    public function obtenerUsuarioPorID($userSpotifyID) {
        //TODO: igual que la de arriba pero la llamada a la api no es sobre el current user sino sobre uno cualquiera (según si spotifyID)
    }

    // Funciones que realizan llamadas a la API para obtener información sobre PLAYLISTS

    public function obtenerPlaylistsUsuarioActual() {
        require PATH3 . '/LoBeat/vendor/autoload.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $collection = (new MongoDB\Client)->LoBeat->usuarios;
        $result = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
        ]);
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($result['spotify_access_token']);

        // Utilizamos el endpoint "Get Current User's Playlists" para solicitar información sobre las playlists del usuario actual
        $playlists_data = $api->getMyPlaylists();

        return $playlists_data;
    }

    

    public function obtenerPlaylistsPorUsuario($userSpotifyID) {
        require PATH3 . '/LoBeat/vendor/autoload.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $collection = (new MongoDB\Client)->LoBeat->usuarios;
        $result = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
        ]);
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($result['spotify_access_token']);

        // Utilizamos el endpoint "Get Current User's Playlists" para solicitar información sobre las playlists de un determinado usuario
        $playlists_data = $api->getUserPlaylists($userSpotifyID);

        return $playlists_data;
    }

    public function obtenerArtista($artistSpotifyID) {
        require PATH3 . '/LoBeat/vendor/autoload.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $collection = (new MongoDB\Client)->LoBeat->usuarios;
        $result = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
        ]);
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($result['spotify_access_token']);

        $artist_data = $api->getArtist($artistSpotifyID);

        return $artist_data;
    }

    public function obtenerRecentlyPlayed($userId) {
        require PATH3 . '/LoBeat/vendor/autoload.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $collection = (new MongoDB\Client)->LoBeat->usuarios;
        $result = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectID($userId)
        ]);
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($result['spotify_access_token']);

        $recentlyPlayedRaw = $api->getMyRecentTracks([5]);
        $names = [];

        foreach ($recentlyPlayedRaw->items as $num) {

            foreach($num->track->artists as $artist){
                if (array_key_exists($artist->name, $names)) {
                    $names[$artist->name]++;
                } else {
                    $names[$artist->name] = 1;
                } 
            } 
        }
    
        arsort($names);
        $artista_mas_frecuente = key($names);

        return  $artista_mas_frecuente;
    }

    public function obtenerPlaylist($playlistSpotifyID) {
        require PATH3 . '/LoBeat/vendor/autoload.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $collection = (new MongoDB\Client)->LoBeat->usuarios;
        $result = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
        ]);
        // Fetch the saved access token from somewhere. A session for example.
        $api->setAccessToken($result['spotify_access_token']);

        // Utilizamos el endpoint "Get Playlist" para solicitar información sobre una determinada playlist
        $playlist_data = $api->getPlaylist($playlistSpotifyID);

        return $playlist_data;
    }

    // Funciones que realizan llamadas a la API para obtener información sobre TRACKS

    /*
    public function obtenerCancionesPlaylist($idPlayList, $idUsuario) {

        $usuario = $this->usuarioController->obtenerUsuarioPorId($idUsuario);

        // Obtener un token de acceso a la API de Spotify
        $access_token = $usuario->getSpotify_access_token();

        // ID de la playlist de la que quieres obtener las canciones
        $playlist_id = $idPlayList;

        // Hacer una solicitud GET a la API de Spotify para obtener la información de la playlist
        $url = "https://api.spotify.com/v1/playlists/$playlist_id/tracks";
        $options = array(
        'http' => array(
            'header'  => "Authorization: Bearer $access_token",
            'method'  => 'GET',
        ),
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        // Decodificar la respuesta de la API y extraer las canciones
        $data = json_decode($response, true);
        $canciones = array();
        foreach ($data['items'] as $item) {
            $duracion_seg = $item['track']['duration_ms'];
            $minutos = floor($duracion_seg / 60000);
            $segundos = floor(($duracion_seg % 60000) / 1000);

            $cancion = array(
                'titulo' => $item['track']['name'],
                'artista' => $item['track']['artists'][0]['name'],
                'album' => $item['track']['album']['name'],
                'duracion' => sprintf('%02d:%02d', $minutos, $segundos),
            );
            $canciones[] = $cancion;
        }

        // Imprimir las canciones almacenadas en el array
        return $canciones;

    }
    */

}