<?php
	session_start();

    //limpiamos variables de sesion

    $_SESSION["login"] = false;
    $_SESSION["SesionEmail"] = null;
    $_SESSION["role"] = null;

    session_destroy();

    header('Location: ../registro/login.php');       
    
?>