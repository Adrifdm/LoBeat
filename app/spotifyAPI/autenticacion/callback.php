<?php
require '../../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'REDIRECT_URI'
);

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens in session
session_start();
$_SESSION['spotify_access_token'] = $accessToken;
$_SESSION['spotify_refresh_token'] = $refreshToken;

// Send the user along and fetch some data!
//header('Location: ejemplo_de_uso.php');

die();
?>