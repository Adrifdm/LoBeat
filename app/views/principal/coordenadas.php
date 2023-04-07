<?php

session_start();

if (empty($_GET["categoria"])) {
    exit("No hay categoría");
}

//generamos dos numeros aleatorios entre 0 y 0.01 para generar coordenadas aleatorias dentro de un rango de maximo 1,11km de 
//distancia de la ubicacion real de los usuarios, tanto en el eje x como en el y
mt_srand (time());
$randomX = mt_rand(0,10) / 1000;
$randomY = mt_rand(0,10) / 1000;

$categoria = $_GET["categoria"];


if ($categoria === "current_user") {
    $current_user = [
        [
            "latitud" => $_SESSION["logged_latitud"],
            "longitud" => $_SESSION["logged_longitud"],
        ],
    ];

    echo json_encode([
        "icono" => "../../../public/assets/img/current_user.png",
        "coordenadas" => $current_user,
    ]);
} else if($categoria === "hombre"){
    $hombre = [
        [
            "latitud" => 40.424312,
            "longitud" => -3.712700,
        ],
        
    ];
    echo json_encode([
        "icono" => "../../../public/assets/img/hombre.png",
        "coordenadas" => $hombre,
    ]);
} else if($categoria === "mujer"){
    $mujer = [
        [
            "latitud" => 40.46861111,
            "longitud" => -3.70555556,
        ],
        
    ];
    
    echo json_encode([
        "icono" => "../../../public/assets/img/mujer.png",
        "coordenadas" => $mujer,
    ]);
}