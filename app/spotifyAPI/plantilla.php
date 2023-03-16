<?php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '8d2d98d239094241afabe8ead302c625',
    '0b8c3b77a6b448158ecdf7e3b045cbda',
    'http://localhost:80/SpotifyTest/spotify.php'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    print_r($api->me());
    $playlists = $api->getUserPlaylists('f2ez3m3sl2mlqxsmxvyshgmh8');
    
    foreach ($playlists->items as $playlist) {
        echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
    }

} else {
    
    $options = [
        'scope' => [
            'user-read-email',
            'user-read-private',
            'playlist-read-private'
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}
?>