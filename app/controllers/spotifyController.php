<?php
require_once 'services/spotifyService.php';

class SpotifyController {
    private $spotifyService;

    public function __construct() {
        $this->spotifyService = new SpotifyService();
    }

    public function autentificarUsuario() {
        try {
            // llamar al método de obtener los tokens de usuario por id del servicio
            $this->spotifyService->autentificarUsuario();
            // Obtenemos el accessToken y refreshToken asignados al usuario (en callback.php)
            session_start();
            $accessToken = $_SESSION['spotify_access_token'];
            $refreshToken = $_SESSION['spotify_refresh_token'];
            $resultado = [$accessToken, $refreshToken];
            session_destroy();

            // devolver la respuesta en formato JSON
            echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerTokensUsuario($id) {
        try {
            // llamar al método de obtener los tokens de usuario por id del servicio
            $resultado = $this->spotifyService->obtenerTokensUsuario($id);
            // devolver la respuesta en formato JSON
            echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function refrescarTokens($id) {
        try {
            // llamamos al método refrescarTokens del servicio
            $this->spotifyService->refrescarTokens($id);
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}