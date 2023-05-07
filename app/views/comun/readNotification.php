<?php
session_start();

if($_SESSION["is_logged"] !== true){

    header('Location: logout.php'); 

    exit;
} 

require_once '../../controllers/usuarioController.php';
require_once '../../controllers/notificationController.php';

// Crear una instancia de UsuarioController
$usuarioController = new UsuarioController();

// Comprobamos si existe algún usuario con ese correo
//mas adelante se cambiara por el id
$usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
$notificationController = new NotificationController();

$id = $_POST['id'];

if (is_array($id)){
    foreach($id as $notification){
        $notificationController->leerNotificacion($notification);
    }
}
else{
    $notificationController->leerNotificacion($id);
}

?>