<script type="text/javascript" src="../../../public/assets/js/coordenadas.js"></script>

<?php
require_once '../../../app/controllers/usuarioController.php';

session_start();


$usuarioController = new UsuarioController();


if (isset($_GET["latitud"]) && isset($_GET["longitud"])) {
    $latitud = $_GET['latitud'];
    $longitud = $_GET['longitud'];
    $correo = $_SESSION['logged_user_email'];
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);
    $id = $usuarioExistente->getId();

    $long = floatval($longitud);
    $lat = floatval($latitud);
    
    $datos = array(
        'latitud' => $latitud,
        'longitud' => $longitud
    );

    $usuarioController->actualizarUsuario($id, $datos);
    
    $_SESSION["logged_latitud"] = $lat;
    $_SESSION["logged_longitud"] = $long;

    header('Location: pagPrincipal.php');
    exit;
}



