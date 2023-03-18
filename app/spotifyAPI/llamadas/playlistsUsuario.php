<?php
session_start();

$playlists = $_SESSION['spotifyAPI']->getUserPlaylists('f2ez3m3sl2mlqxsmxvyshgmh8');

foreach ($playlists->items as $playlist) {
     echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
}
?>