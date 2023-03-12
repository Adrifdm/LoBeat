<?php
require 'vendor/autoload.php'; // incluir lo bueno de Composer

//Conexión a Mongo
$cliente = new MongoDB\Client("mongodb://localhost:27017");
echo "Conexión a MongoDB realizada con exito.\n";
//Seleccionamos la base de datos
$db = $cliente->LoBeat;
echo "La base de datos seleccionada es: ".$db."."."\n";

/* --- COLECCIONES --- */

//Crear colecciones
$collection = $db->createCollection("colecc_PRUEBA");
echo "Se ha creado con exito la coleccion.";

/* --- DOCUMENTOS --- */ 

//definimos el target, o coleccion sobre la que vamos a hacer cosas
$target = $db->colecc_PRUEBA;

//INSERTAR DOCUMENTOS
$resultado = $target->insertOne( [ 'nombre' => 'Eustaquio', 'apellido' => 'Abichuela' ] );
echo "Se ha insertado con éxito el documento con ID: '{$resultado->getInsertedId()}'";


//ELIMINAR DOCUMENTOS
$resultado = $target->deleteMany( [ 'nombre' => 'nadie' ] );
echo "Se han eliminado con éxito {$resultado->getDeletedCount()} documentos";


//ACTUALIZAR DOCUMENTOS
$resultado = $target->updateMany( [ 'nombre' => 'Eustaquio' ], [ '$set' => [ 'nombre' => 'Pepe' ] ] );
echo "Se han actualizado con éxito {$resultado->getModifiedCount()} documentos";


//CONSULTAR DOCUMENTOS
$resultado = $target->find( [ 'nombre' => 'Pepe' ] );
echo "Los documentos consultados son: ";
foreach ($resultado as $documento) {
    echo $documento['_id'], ': ', $documento['nombre'], ' - ', $documento['apellido'], "\n";
}

/*
//AGREGACIONES
$resultado = $target->aggregate( [ [ '$group' => [ '_id' => null, 'promedio_edad' => [ '$avg' => '$edad' ] ] ] ] );
foreach ($resultado as $documento) {
    echo 'Promedio de edad: ', $documento['promedio_edad'], "\n";
}
*/




/*
//IMPORTANTE!!! A LA HORA DE REALIZAR OPERACIONES QUE MODIFIQUEN LA BASE DE DATOS, ADICIONALMENTE HAY QUE RELLENER TODOS LOS CAMPOS QUE HAYAN QUEDADO VACÍOS A NULL PARA
//QUE LUEGO NO DEN ERRORES LAS OPERACIONES QUE CONSULTAN ESOS CAMPOS. PARA ELLO UTILIZAR:
$coleccion->updateMany(
    [ 'name' => '' ],
    [ '$set' => [ 'name' => null ] ]
);
//EN ESTE EJ SE BUSCAN TODOS AQUELLOS DOCUMENTOS CON EL CAMPO name VACÍO, Y SE ACTUALIZA SU CAMPO name A NULL
*/
?>