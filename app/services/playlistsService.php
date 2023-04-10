<?php
require_once '../../../vendor/autoload.php';
require_once '../../../app/models/playlist.php';

class PlaylistService {

  private $collection;

  public function __construct() {
    $this->collection = (new MongoDB\Client)->LoBeat->playlists;
  }

  public function crearPlaylist($datos) {
    $playlist = new Playlist(
      $datos['playlist_spotifyId'],
      $datos['playlist_name'],
      $datos['playlist_description'],
      $datos['playlist_url'],
      $datos['playlist_images'],
      $datos['playlist_duration'],
      $datos['playlist_owner_name'],
      $datos['playlist_owner_id'],
      $datos['playlist_tracks'],
      $datos['playlist_tracks']
    );

    $result = $this->collection->insertOne([
      'spotifyId' =>  $playlist->getId(),
      'nombre' => $playlist->getNombre(),
      'descripcion' => $playlist->getDescripcion(),
      'url' => $playlist->getPlaylistUrl(),
      'images' => $playlist->getPlaylistImages(),
      'duration' => $playlist->getPlaylistDuration(),
      'ownner_name' => $playlist->getPlaylistOwnerName(),
      'usuarioId' => $playlist->getUsuarioId(),
      'canciones' => $playlist->getCanciones()
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
        $doc['owner_name'],
        $doc['usuarioId'],
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
        $result['spotifyId'],
        $result['nombre'],
        $result['descripcion'],
        $result['url'],
        $result['images'],
        $result['duration'],
        $result['owner_name'],
        $result['usuarioId'],
        $result['canciones']
      );
      return $playlist;
    } else {
      return null;
    }
  }

  public function buscarPlaylistsPorCampo($campo, $valor) {
    $result = $this->collection->find([$campo => $valor]);
    $playlists = [];
    if ($result) {
      foreach ($result as $doc) {
        $playlist = new Playlist(
          $doc['spotifyId'],
          $doc['nombre'],
          $doc['descripcion'],
          $doc['url'],
          $doc['images'],
          $doc['duration'],
          $doc['owner_name'],
          $doc['usuarioId'],
          $doc['canciones']
        );
        $playlists[] = $playlist;
      } 
      return $playlists;
    } else {
      return null;
    }
  }

  public function refrescarPlaylists() {
    try {
        // llamar al método de buscar usuario por campo del servicio
        $datosUsuarioPlaylists = require('../../../app/spotifyAPI/llamadas/datosUsuario.php');
        // devolver la respuesta en formato JSON
        //echo json_encode($usuarioEncontrado);
        return $datosUsuarioPlaylists;
    } catch (Exception $e) {
        // capturar cualquier excepción y devolver un mensaje de error al cliente
        echo json_encode(['error' => $e->getMessage()]);
    }
  }  
}

?>
