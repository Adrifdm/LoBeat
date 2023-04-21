<?php
require_once '../../../vendor/autoload.php';
require_once '../../../app/models/playlists.php';

class PlaylistService {

  private $collection;
  private $spotifyController;

  public function __construct() {
    $this->collection = (new MongoDB\Client)->LoBeat->playlists;
    $this->spotifyController = new SpotifyController();
  }

  public function crearPlaylist($datos) {

    $playlist = new Playlist(
      $datos['playlist_id'],
      $datos['playlist_name'],
      $datos['playlist_description'],
      $datos['playlist_url'],
      $datos['playlist_images'],
      $datos['playlist_duration'],
      $datos['playlist_owner'],
      $datos['playlist_tracks']
  );

    $result = $this->collection->insertOne([
      'spotifyId' =>  $playlist->getId(),
      'nombre' => $playlist->getPlaylistName(),
      'descripcion' => $playlist->getPlaylistDescription(),
      'url' => $playlist->getPlaylistUrl(),
      'images' => $playlist->getPlaylistImages(),
      'duration' => $playlist->getPlaylistDuration(),
      'owner' => $playlist->getPlaylistOwner(),
      'canciones' => $playlist->getPlaylistTracks()
    ]);

    return $result->getInsertedId();
  }

  public function listarPlaylists() {
    $result = $this->collection->find();
    $playlists = [];
    foreach ($result as $doc) {
      $playlist = new Playlist(
        $doc['spotifyId'],
        $doc['nombre'],
        $doc['descripcion'],
        $doc['url'],
        $doc['images'],
        $doc['duration'],
        $doc['owner'],
        $doc['canciones']
      );
      $playlists[] = $playlist;
    }
    return $playlists;
  }

  public function obtenerPlaylist($id) {
    $result = $this->collection->findOne(['spotifyId' => new MongoDB\BSON\ObjectID($id)]);
    if ($result) {
      $playlist = new Playlist(
        $result['playlist_id'],
        $result['playlist_name'],
        $result['playlist_description'],
        $result['playlist_url'],
        $result['playlist_images'],
        $result['playlist_duration'],
        $result['playlist_owner'],
        $result['playlist_tracks']
      );
      return $playlist;
    } else {
      return null;
    }
  }

  public function buscarPlaylistsPorCampo($campo, $valor) {
    $result = $this->collection->find([$campo => $valor])->toArray();
    $playlists = [];
    if (!empty($result)) {
      foreach ($result as $doc) {
        $docArray = $doc->getArrayCopy();
        $playlist = new Playlist(
          $docArray['spotifyId'],
          $docArray['nombre'],
          $docArray['descripcion'],
          $docArray['url'],
          $docArray['images'],
          $docArray['duration'],
          $docArray['owner'],
          $docArray['canciones']
        );
        $playlists[] = $playlist;
      } 
      return $playlists;
    } else {
      return null;
    }
  }

  public function refrescarPlaylists($idUsuario) {
    try {
        // llamar al método de buscar usuario por campo del servicio
        $datosPlaylistsRefrescadas = $this->spotifyController->obtenerPlaylistsUsuarioActual();
        // devolver la respuesta en formato JSON
        //echo json_encode($usuarioEncontrado);
        return $datosPlaylistsRefrescadas;
    } catch (Exception $e) {
        // capturar cualquier excepción y devolver un mensaje de error al cliente
        echo json_encode(['error' => $e->getMessage()]);
    }
  }  

  public function eliminarPlaylist($id) {
    $result = $this->collection->deleteMany(['spotifyId' => $id]);

    return $result->getDeletedCount() > 0;
  }
}

?>
