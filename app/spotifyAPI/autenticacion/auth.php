<?php
require '../../../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '8d2d98d239094241afabe8ead302c625',
    '0b8c3b77a6b448158ecdf7e3b045cbda',
    'http://localhost:80/LoBeat/app/spotifyAPI/autenticacion/callback.php'
);

/*
Definimos un array options con las scopes (permisos definidos dentro de la biblioteca
SpotifyWebAPI y que dependiendo de cual sea nos permitiran llamar a una función u otra
de del catálogo de endpoints de Spotify)
*/
$options = [
    'scope' => [
        'user-read-private',
        'playlist-read-collaborative',
        'playlist-modify-public',
        'playlist-modify-private',
        'playlist-read-private',
        'user-library-read',
        'user-library-modify',
        'user-top-read',
        'user-follow-read',
        'user-follow-modify',
        'user-read-currently-playing',
        'user-modify-playback-state',
        'user-read-email',
    ],
];

header('Location: ' . $session->getAuthorizeUrl($options));
die();
?>