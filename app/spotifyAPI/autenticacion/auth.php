<?php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'REDIRECT_URI'
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