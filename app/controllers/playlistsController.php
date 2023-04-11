<?php
// incluir el archivo playlistService.php
require_once '../../../app/services/playlistsService.php';

class PlaylistsController {
    private $playlistService;

    public function __construct() {
        $this->playlistService = new PlaylistService();
    }

    public function crearPlaylist($datos) {
        try {
            // llamar al método de crear playlist del servicio
            $resultado = 0;
            foreach($datos as $playlist){
                $this->playlistService->crearPlaylist($playlist);
                $resultado++;
                //echo json_encode($resultado);            
            }
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function listarPlaylists() {
        try {
            // llamar al método de listar playlists del servicio
            $playlists = $this->playlistService->listarPlaylists();
            // devolver la lista de playlists en formato JSON
            //echo json_encode($playlists);
            return $playlists;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerPlaylistPorId($id) {
        try {
            // llamar al método de obtener playlist por id del servicio
            $playlistEncontrada = $this->playlistService->obtenerPlaylist($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $playlistEncontrada;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function buscarPlaylistsPorCampo($campo, $valor) {
        try {
            // llamar al método de buscar playlist por campo del servicio
            $playlistEncontrada = $this->playlistService->buscarPlaylistsPorCampo($campo, $valor);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $playlistEncontrada;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }   

    public function refrescarPlaylists($idUsuario) {
        try {
            // llamar al método de buscar playlist por campo del servicio
            $playlists = $this->buscarPlaylistsPorCampo('usuarioId', $idUsuario);
            foreach($playlists as $doc){
                $this->eliminarPlaylist($doc->getId());
            }
            $datosPlaylistsRefrescadas = $this->playlistService->refrescarPlaylists($idUsuario);
            $this->crearPlaylist($datosPlaylistsRefrescadas);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $datosPlaylistsRefrescadas;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }  

    public function eliminarPlaylist($id) {
        try {
            // llamar al método de eliminar playlist del servicio
            $resultado = $this->playlistService->eliminarPlaylist($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>