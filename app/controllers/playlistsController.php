<?php
require_once '../../../app/services/playlistsService.php';
require_once '../../../app/controllers/spotifyController.php';

class PlaylistsController {
    private $playlistService;
    private $spotifyController;

    public function __construct() {
        $this->playlistService = new PlaylistService();
        $this->spotifyController = new SpotifyController();
    }

    public function crearPlaylist($datosPlaylists) {
        try {
            $resultado = 0;
            foreach($datosPlaylists->items as $playlist){
                
                // Obtenemos el id de la playlist y con él obtenemos todos sus tracks
                $playlistID = $playlist->id;
                $datosTracks = $this->spotifyController->obtenerPlaylist($playlistID);

                // Recorremos todos los tracks para ir almacenandolos en un array. También vamos sumando sus duraciones para saber la duración de la playlist
                $tracksArray = array();
                $duracionTotal_ms = 0;
                foreach($datosTracks->tracks->items as $infoTrack) {
                    $duracionTotal_ms = $duracionTotal_ms + $infoTrack->track->duration_ms;
                    array_push($tracksArray, $infoTrack);
                }

                // Construimos la playlist a insertar en nuestra base de datos
                $playlistBaseDeDatos = array(
                    'playlist_id' => $playlistID,
                    'playlist_name' => $playlist->name,
                    'playlist_description' => $playlist->description,
                    'playlist_url' => $playlist->external_urls,
                    'playlist_images' => $playlist->images,
                    'playlist_duration' => $duracionTotal_ms,
                    'playlist_owner' => $playlist->owner,
                    'playlist_tracks' => $tracksArray
                );

                // La insertamos
                $this->playlistService->crearPlaylist($playlistBaseDeDatos);
                $resultado++;            
            }

            //echo json_encode($resultado);
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
            $playlists = $this->buscarPlaylistsPorCampo('owner.id', $idUsuario);
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