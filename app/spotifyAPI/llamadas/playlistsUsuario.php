<?php
require '../../../vendor/autoload.php';
session_start();
$api = new SpotifyWebAPI\SpotifyWebAPI();
$collection = (new MongoDB\Client)->LoBeat->usuarios;
$result = $collection->findOne([
    '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
]);
// Fetch the saved access token from somewhere. A session for example.
$api->setAccessToken($result['spotify_access_token']);

$usuario = $api->me();
$playlists = $api->getUserPlaylists($usuario->id);
// It's now possible to request data about the currently authenticated user
$playlists_data_array = array();

foreach ($playlists->items as $playlist) {

    $playlist_data_array = array();

    // Obtener la playlist mediante la API de Spotify
    $playlist = $api->getPlaylist($playlist->id);

    // id de la playlist
    $playlist_data_array['playlist_spotifyId'] = $playlist->id;
    
    // Nombre de la playlist
    $playlist_data_array['playlist_name'] = $playlist->name;
    
    // Descripción de la playlist
    $playlist_data_array['playlist_description'] = $playlist->description;
    
    // URL externa de la playlist
    $playlist_data_array['playlist_url'] = $playlist->external_urls->spotify;
    
    // Imágenes de la playlist
    $playlist_images = array();
    foreach ($playlist->images as $image) {
        $playlist_images[] = $image->url;
    }
    $playlist_data_array['playlist_images'] = $playlist_images;
    
    // Duración total de la playlist
    $playlist_duration = 0;
    foreach ($playlist->tracks->items as $track) {
        $playlist_duration += $track->track->duration_ms;
    }
    $playlist_data_array['playlist_duration'] = $playlist_duration;
    
    // Propietario de la playlist
    $playlist_data_array['playlist_owner_name'] = $playlist->owner->display_name;
    $playlist_data_array['playlist_owner_id'] = $playlist->owner->id;
    
    // Listado de canciones de la playlist
    $playlist_tracks = array();
    foreach ($playlist->tracks->items as $track) {
        $playlist_tracks[] = array(
            'name' => $track->track->name,
            'artists' => $track->track->artists,
            'album' => $track->track->album,
            'duration_ms' => $track->track->duration_ms,
            'popularity' => $track->track->popularity,
            'external_urls' => $track->track->external_urls->spotify
        );
    }

    $playlist_data_array['playlist_tracks'] =  $playlist_tracks;

    $playlists_data_array[] = $playlist_data_array;
}

return $playlists_data_array;

/* Otra opcion usando la clase playlist
    // Crear un objeto Playlist y agregarlo al array $playlists_data_array
    $playlist_data = new Playlist(
        $playlist->name,
        $playlist->description,
        $playlist->external_urls->spotify,
        array_map(function($image) { return $image->url; }, $playlist->images),
        array_reduce($playlist->tracks->items, function($acc, $track) { return $acc + $track->track->duration_ms; }),
        $playlist->owner->display_name,
        $playlist->owner->id,
        array_map(function($track) {
            return array(
                'name' => $track->track->name,
                'artists' => $track->track->artists,
                'album' => $track->track->album,
                'duration_ms' => $track->track->duration_ms,
                'popularity' => $track->track->popularity,
                'external_urls' => $track->track->external_urls->spotify
            );
        }, $playlist->tracks->items)
    );

    $playlists_data_array[] = $playlist_data;
*/

?>