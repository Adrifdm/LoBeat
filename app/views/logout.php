<?php
	session_start();

    $_SESSION["login"] = false;
    $_SESSION["SesionEmail"] = null;

    session_destroy();
    header('Location: login.php');       
    
?>