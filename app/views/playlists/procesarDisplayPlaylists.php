<?php
require_once '../../controllers/playlistsController.php';

session_start();

$playlistsController = new PlaylistsController();

$playlists = $playlistsController->buscarPlaylistsPorCampo('owner.id', $_SESSION["logged_user_spotifyID"]);

$_SESSION['playlistsUsuarioActual'] = $playlists;

header('Location: displayPlaylists.php');
exit();

?>