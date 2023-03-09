<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer

$cliente = new MongoDB\Client("mongodb://localhost:27017");
$colección = $cliente->pruebas->ejemplo;

$resultado = $colección->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

echo "Inserted with Object ID '{$resultado->getInsertedId()}'";
?>