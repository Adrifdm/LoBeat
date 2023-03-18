<?php
require_once 'SpotifyAPI/autenticacion/auth.php';
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
        header('Location: ../spotifyAPI/autenticacion/auth.php');
        exit;
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