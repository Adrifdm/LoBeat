<?php
//require_once '../SpotifyAPI/autenticacion/auth.php';
require_once '../controllers/usuarioController.php';

class SpotifyService {
    private $usuarioController;

    public function __construct() {
        $this->usuarioController = new UsuarioController();
    }

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
        $accessTokenActual = $userTokens['accessToken'];
        $refreshTokenActual = $userTokens['refreshToken'];

        // Si el accessToken sigue siendo válido, seteamos tanto ese accessToken como el refreshToken a la session directamente
        if ($accessTokenActual) {
            $session->setAccessToken($accessTokenActual);
            $session->setRefreshToken($refreshTokenActual);
        }
        // En caso contrario, tenemos que generar un nuevo accessToken válido. Lo hacemos con la función refreshAccessToken, que necesita el refreshToken como entrada
        else {
            $session->refreshAccessToken($refreshTokenActual);
        }

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
}