<?php

require_once '../../../app/controllers/usuarioController.php';
require_once '../../../app/controllers/spotifyController.php';
require_once '../../../app/controllers/playlistController.php';

session_start();

$usuarioController = new UsuarioController();
$spotifyController = new SpotifyController(); 
$playlistsController = new PlaylistsController();

$user = $usuarioController->obtenerUsuarioPorId($_SESSION['logged_user_id']);
$recently_played_info = $spotifyController->obtenerRecentlyPlayed();

phpinfo();


?>