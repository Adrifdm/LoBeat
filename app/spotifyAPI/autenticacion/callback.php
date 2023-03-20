<?php
require '../../../vendor/autoload.php';
//require_once 'auth.php';
echo "1";
// Como hemos hecho un require_once de auth.php, en principio podemos utilizar la $session de auth.php
$session = new SpotifyWebAPI\Session(
    '8d2d98d239094241afabe8ead302c625',
    '0b8c3b77a6b448158ecdf7e3b045cbda',
    'http://localhost:80/LoBeat/app/spotifyAPI/autenticacion/callback.php'
);

// Usando el código que no devuelve Spotify, solicitamos un accessToken y refreshToken
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();    

// Los almacenamos en una sesión
session_start();
$_SESSION['spotify_access_token'] = $accessToken;
$_SESSION['spotify_refresh_token'] = $refreshToken;
$registered = true;
// Send the user along and fetch some data!
header('Location: ../../views/registro/procesarRegister.php?registered=' . $registered);
die();
?>