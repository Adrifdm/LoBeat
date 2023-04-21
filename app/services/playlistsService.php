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
      $datos['playlist_tracks'],
      $datos['playlist_tags']
  );

    $result = $this->collection->insertOne([
      'spotifyId' =>  $playlist->getId(),
      'nombre' => $playlist->getPlaylistName(),
      'descripcion' => $playlist->getPlaylistDescription(),
      'url' => $playlist->getPlaylistUrl(),
      'images' => $playlist->getPlaylistImages(),
      'duration' => $playlist->getPlaylistDuration(),
      'owner' => $playlist->getPlaylistOwner(),
      'canciones' => $playlist->getPlaylistTracks(),
      'tags' =>  $playlist->getPlaylistTags()
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
        $result['playlist_tracks'],
        $result['playlist_tags']
      );
      return $playlist;
    } else {
      return null;
    }
  }

  public function generarTagsAutomaticos($datos){
    // Inicializamos los arrays que vamos a utilizar
    $popularidades = [];
    $artistas = [];

    // Iteramos sobre los tracks
    foreach ($datos->tracks->items as $item) {

      // Obtenemos la popularidad del track y la agregamos al array
      $popularidades[] = $item->track->popularity;

      foreach ($item->track->artists as $dataArtist) {
        // Obtenemos el artista del track y lo agregamos al array
        $artista = $dataArtist->name;
        if (array_key_exists($artista, $artistas)) {
            $artistas[$artista]++;
        } else {
            $artistas[$artista] = 1;
        } 
      } 
    }

    // Calculamos la popularidad media de la playlist
    if(count($popularidades) > 0){
      $popularidad_media = array_sum($popularidades) / count($popularidades);
    } else {
      $popularidad_media = 0;
    }

    // Obtenemos el artista más frecuente en la playlist
    arsort($artistas);
    $artista_mas_frecuente = key($artistas);

    $generos_mas_presentes = "Escribe el género que mejor describa tu matchlist o si lo prefieres deja que se generen por defecto";

    $playlist_tags = array(
      'popularidadMedia' => $popularidad_media,
      'artistaMasEscuchado' => $artista_mas_frecuente,
      'generosMasEscuchados' => $generos_mas_presentes,
    );

    return $playlist_tags;

  }

  public function generarGeneros($playlist) {
    $tracks = $playlist->getPlaylistTracks();
    $generos = [];

    foreach ($tracks->track->artist as $trackArtist) {

      //Lo necesitamos para obtener el género

      $fullArtistData = $this->spotifyController->obtenerArtista($trackArtist->id);


      if ($fullArtistData !== null && property_exists($fullArtistData, 'genres')){
        foreach ($fullArtistData->genres as $genero) {
            if (array_key_exists($genero, $generos)) {
                $generos[$genero]++;
            } else {
                $generos[$genero] = 1;
            }
        } 
      }
      // Obtenemos los géneros del album del track y los agregamos al array
   } 

    // Obtenemos los géneros más presentes en la playlist
    arsort($generos);
    $generos_mas_presentes = array_slice(array_keys($generos), 0, 3);

    return $generos_mas_presentes;

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
          $docArray['canciones'],
          $docArray['tags']
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
