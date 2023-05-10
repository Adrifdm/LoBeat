<?php

require_once '../../../app/controllers/usuarioController.php';

session_start();

$usuarioController = new UsuarioController();

if (empty($_GET["categoria"])) {
    exit("No hay categoría");
}


$categoria = $_GET["categoria"];

if ($categoria === "current_user") {
    $usuario = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);
    $current_user = [
        [
            "latitud" => $_SESSION["logged_latitud"],
            "longitud" => $_SESSION["logged_longitud"],
        ],
    ];
    $nombre = $usuario->getNombre();
    $genero = $usuario->getGenero();
    $descripcion = $usuario->getDescripcion();
    $foto = $usuario->getFotoPerfil();
    $id = $usuario->getId();
    echo json_encode([
        "icono" => "../../../public/assets/img/yo.png",
        "coordenadas" => $current_user,
        "nombre" => $nombre,
        "genero" => $genero,
        "descripcion" => $descripcion,
        "foto" => $foto,
        "id" => $id,
    ]);
} 

if($categoria === "resto"){
    $resultado = $usuarioController->listarUsuarios();
    $usuarios = [];

    foreach ($resultado as $usuario) {
        if ($usuario->getId() != $_SESSION["logged_user_id"]) {
            if($usuario->getGenero() === "Mujer"){
                $icono = "mujer.png";
            }
            else if($usuario->getGenero() === "Hombre"){
                $icono = "hombre.png";
            }
            else{
                $icono = "neutral.png";
            }
            $nombre = $usuario->getNombre();
            $genero = $usuario->getGenero();
            $descripcion = $usuario->getDescripcion();
            $foto = $usuario->getFotoPerfil();
            $id = $usuario->getId();
            $coordenadas = [
                [
                    "latitud" => $usuario->getLatitud(),
                    "longitud" => $usuario->getLongitud(),
                ],
            ];
            $usuarios[] = [
                "icono" => "../../../public/assets/img/" . $icono,
                "coordenadas" => $coordenadas,
                "nombre" => $nombre,
                "genero" => $genero,
                "descripcion" => $descripcion,
                "foto" => $foto,
                "id" => $id,
            ];
        }
    }
    echo json_encode($usuarios);
} 
        
