<?php
if (empty($_GET["categoria"])) {
    exit("No hay categoría");
}

//generamos dos numeros aleatorios entre 0 y 0.01 para generar coordenadas aleatorias dentro de un rango de maximo 1,11km de 
//distancia de la ubicacion real de los usuarios, tanto en el eje x como en el y
mt_srand (time());
$randomX = mt_rand(0,10) / 1000;
$randomY = mt_rand(0,10) / 1000;

$categoria = $_GET["categoria"];
#TODO: hacerlo en una BD
#estas no se muestran, pero esta por si se quieren poner categorias en algun momento 
#se podrían usar para diferenciar entre todos los usuarios (pizzerias en este ejemplo) del usuario que accede a la app (veterinarias, que ahora mismo no se muestra)
$current_user = [
    [
        "latitud" => 40.451722 + $randomX,
        "longitud" => -3.738389 + $randomY,
    ],
];
#estas son las posiciones que se muestran
$users = [
    [
        "latitud" => 40.424312 + $randomX,
        "longitud" => -3.712700 + $randomY,
    ],
    [
        "latitud" => 40.449351 + $randomX,
        "longitud" => -3.7217124725984663 + $randomY,
    ],
    [
        "latitud" => 40.459735 + $randomX, 
        "longitud" =>  -3.689687 + $randomY,
    ],
    [
        "latitud" => 21.323818 + $randomX, 
        "longitud" =>  -157.837536 + $randomY,
    ],
];

if ($categoria === "current_user") {
    echo json_encode([
        "icono" => "img/current_user.png",
        "coordenadas" => $current_user,
    ]);
} else {
    echo json_encode([
        "icono" => "img/persona.png",
        "coordenadas" => $users,
    ]);
}