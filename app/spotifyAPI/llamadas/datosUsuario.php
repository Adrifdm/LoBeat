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

// It's now possible to request data about the currently authenticated user
$me = $api->me();

// Format the data and store it in an array
$user_data = array(
    'id' => $me->id,
    'display_name' => $me->display_name,
    'email' => $me->email,
    'uri' => $me->uri,
    'images' => $me->images,
    'country' => $me->country,
    'product' => $me->product
);

// Return the array
return $user_data;

?>