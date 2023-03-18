<?php
require '../../vendor/autoload.php';
require_once 'auth.php';

/* Como hemos hecho un require_once de auth.php, en principio podemos utilizar la $session de auth.php
$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'REDIRECT_URI'
);
*/


// Usando el código que no devuelve Spotify, solicitamos un accessToken y refreshToken
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Los almacenamos en una sesión
session_start();
$_SESSION['spotify_access_token'] = $accessToken;
$_SESSION['spotify_refresh_token'] = $refreshToken;

// Send the user along and fetch some data!
//header('Location: ejemplo_de_uso.php');

die();
?>