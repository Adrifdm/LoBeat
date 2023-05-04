<?php
	session_start();
    require_once '../../../app/controllers/usuarioController.php';
    $usuarioController = new UsuarioController();

    // Ponemos el status de la bd del usuario en desconectado 
    $datos = array(
        'status' => false
    );
    $usuarioController->actualizarUsuario($_SESSION["logged_user_id"] ,$datos);

    //limpiamos variables de sesion

    $_SESSION["is_logged"] = false;
    $_SESSION["logged_user_email"] = null;
    $_SESSION["logged_user_id"] = null;
    $_SESSION["logged_user_role"] = null;

    session_destroy();

    header('Location: ../../../public/index.html');       
    
?>