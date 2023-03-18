<?php
//require_once '../SpotifyAPI/autenticacion/auth.php';
require_once '../controllers/usuarioController.php';

class SpotifyService {
    private $client_id;
    private $client_secret;
    private $redirect_uri;
    private $usuarioController;

    public function __construct() {
        session_start();
        $this->client_id = "TU_CLIENT_ID";
        $this->client_secret = "TU_CLIENT_SECRET";
        $this->redirect_uri = "TU_REDIRECT_URI";
        $this->usuarioController = new UsuarioController();
    }

    public function autentificarUsuario() {

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

        //-------------------------------------------------
        //header('Location: ../spotifyAPI/autenticacion/auth.php');
        //exit;
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
        // Almacenamos en una sesión el $id del usuario a refrescar, y en refresh.php lo recuperamos
        session_start();
        $_SESSION['user_id'] = $id;
        header("Location: refresh.php");
        exit;
    }
}