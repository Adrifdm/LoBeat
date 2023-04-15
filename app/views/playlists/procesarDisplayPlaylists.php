<?php

session_start();
$titulosPlaylists = array();
$titulosPlaylists[0] = "PLAYLIS1111";
$titulosPlaylists[1] = "DOOOOOOOOOOOUSS1";
$titulosPlaylists[2] = "TREEEIIIIS";
$titulosPlaylists[3] = "PLAYLIWFWEF1";
$titulosPlaylists[4] = "13333331";
$titulosPlaylists[5] = "PLAYLIS111F3F3F1";
$titulosPlaylists[6] = "PENULTIMAA";
$titulosPlaylists[7] = "ULTIMAAA";

$_SESSION['listadoPlaylists'] = $playlists;


header('Location: displayPlaylists.php');
exit();

?>