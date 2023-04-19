<?php
	session_start();

    //limpiamos variables de sesion

    $_SESSION["is_logged"] = false;
    $_SESSION["logged_user_email"] = null;
    $_SESSION["logged_user_id"] = null;
    $_SESSION["logged_user_role"] = null;

    session_destroy();

    header('Location: ../../../public/index.html');       
    
?>