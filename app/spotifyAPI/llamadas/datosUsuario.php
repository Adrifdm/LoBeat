<?php
// Incluye el fichero refresh.php que crea la variable $api
require_once '../refresh.php';

// Usa la variable $api para acceder a la API web de Spotify
$me = $api->me();

// Haz lo que quieras con los datos del usuario
echo 'Hola ' . $me->display_name;
?>