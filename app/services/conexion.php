<?php

//cualquiera de estas 2 lineas vale
//require_once __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';

//definimos la uri y el nombre de la base de datos
$uri = "mongodb://localhost:27017";
$database = "LoBeat";

//nos conectamos a mongo con esa uri
$client = new MongoDB\Client($uri);

//definimos DB como una variable global que hará referencia a la base de datos LoBeat
define('DB', $client->$database);

// Opcional: configura opciones para la conexión, como la autenticación
// $options = [
//     'username' => 'myuser',
//     'password' => 'mypassword',
//     'authSource' => 'admin',
// ];
// $client = new MongoDB\Client($uri, $options);

?>
