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
foreach ($playlists->items as $playlist) {
     echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
}
?>