<?php
define("PATH4", $_SERVER['DOCUMENT_ROOT']);
require_once PATH4 . '/LoBeat/app/services/playlistsService.php';
require_once PATH4 . '/LoBeat/app/controllers/spotifyController.php';

class PlaylistsController {
    private $playlistService;
    private $spotifyController;
    private $usuarioController;

    public function __construct() {
        $this->playlistService = new PlaylistService();
        $this->spotifyController = new SpotifyController();
        $this->usuarioController = new UsuarioController();
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
                
                // TAGS AUTOMATICOS
                $tagsAutomaticos = $this->playlistService->generarTagsAutomaticos($datosTracks);
                
                // Construimos la playlist a insertar en nuestra base de datos
                $playlistBaseDeDatos = array(
                    'playlist_id' => $playlistID,
                    'playlist_name' => $playlist->name,
                    'playlist_description' => $playlist->description,
                    'playlist_url' => $playlist->external_urls,
                    'playlist_images' => $playlist->images,
                    'playlist_duration' => $duracionTotal_ms,
                    'playlist_owner' => $playlist->owner,
                    'playlist_tracks' => $tracksArray,
                    'playlist_tags' => $tagsAutomaticos
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

    public function actualizarPlaylist($id, $datos) {
        try {
            // llamar al método de actualizar playlist del servicio
            $resultado = $this->playlistService->actualizarPlaylist($id, $datos);
            // devolver la respuesta en formato JSON
            //echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function returnGenreTags() {
        try {
            // llamar al método de listar playlists del servicio
            $playlists = $this->playlistService->returnGenreTags();
            // devolver la lista de playlists en formato JSON
            //echo json_encode($playlists);
            return $playlists;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    public function generarGeneros($playlist) {
        try {
            // llamar al método de listar playlists del servicio
            $generos = $this->playlistService->generarGeneros($playlist);
            // devolver la lista de playlists en formato JSON
            //echo json_encode($playlists);
            return $generos;
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
            if ($playlists != null) {
                foreach($playlists as $doc){
                    $this->eliminarPlaylist($doc->getId());
                }                
            }

            $datosPlaylistsRefrescadas = $this->playlistService->refrescarPlaylists($idUsuario);
            $datos = array(
                'nPlaylists' => $datosPlaylistsRefrescadas->total
            );
            $this->usuarioController->actualizarUsuario($_SESSION["logged_user_id"], $datos);

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