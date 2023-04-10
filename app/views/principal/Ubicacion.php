<script type="text/javascript" src="../../../public/assets/js/coordenadas.js"></script>

<?php
require_once '../../../app/controllers/usuarioController.php';

session_start();


$usuarioController = new UsuarioController();


if (isset($_GET["latitud"]) && isset($_GET["longitud"])) {

    mt_srand (time());
    $randomX = mt_rand(0,10) / 1000;
    $randomY = mt_rand(0,10) / 1000;

    $latitud = $_GET['latitud'] + $randomX;
    $longitud = $_GET['longitud'] + $randomY;
    $correo = $_SESSION['logged_user_email'];
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);
    $id = $usuarioExistente->getId();

    
    $datos = array(
        'latitud' => $latitud,
        'longitud' => $longitud 
    );

    $usuarioController->actualizarUsuario($id, $datos);
    
    $_SESSION["logged_latitud"] = $latitud;
    $_SESSION["logged_longitud"] = $longitud;

    header('Location: pagPrincipal.php');
    exit;
}



