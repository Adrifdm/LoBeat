<?php
require_once '../../../app/services/spotifyService.php';

class SpotifyController {
    private $spotifyService;

    public function __construct() {
        $this->spotifyService = new SpotifyService();
    }

    public function autenticarUsuario() {
        try {
            // llamar al método de autenticación de usuario
            $this->spotifyService->autenticarUsuario();
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
            //echo json_encode($resultado);
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

    public function obtenerSpotifyIDUsuarioActual() {
        try {
            // llamar al método de obtención del Spotify ID
            $usuario = $this->spotifyService->obtenerUsuarioActual();
            return $usuario->id; 
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerPlaylistsUsuarioActual() {
        try {
            // llamar al método de obtención de playlists
            return $this->spotifyService->obtenerPlaylistsUsuarioActual();
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerPlaylistsPorUsuario($userSpotifyID) {
        try {
            // llamar al método de obtención de playlists
            return $this->spotifyService->obtenerPlaylistsPorUsuario($userSpotifyID);
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerPlaylist($playlistSpotifyID) {
        try {
            // llamar al método de obtención de playlist
            return $this->spotifyService->obtenerPlaylist($playlistSpotifyID);
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerArtista($artistSpotifyID) {
        try {
            // llamar al método de obtención de playlist
            return $this->spotifyService->obtenerArtista($artistSpotifyID);
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerRecentlyPlayed($userId) {
        try {
            // llamar al método de obtención de playlist
            return $this->spotifyService->obtenerRecentlyPlayed($userId);
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    /*
    public function obtenerCancionesPlaylist($idPlayList, $idUsuario) {
        try {
            // llamar al método de buscar playlist por campo del servicio
            $canciones = $this->spotifyService->obtenerCancionesPlaylist($idPlayList, $idUsuario);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $canciones;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    */

}