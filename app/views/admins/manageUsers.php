<?php
require_once '../../controllers/usuarioController.php';
require_once '../../controllers/spotifyController.php';

session_start();

$usuarioController = new UsuarioController();

$rolAdmin = false;

//$spotifyController = new SpotifyController();
if(($_SESSION["is_logged"] == true)){
    
    $usuarioExistente = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);
    
    if($usuarioExistente->getRole() == 'Admin'){
        
        $rolAdmin = true;
    }
    else{

        $rolAdmin = false;
    }

}

if(($_SESSION["is_logged"] != true) || ($rolAdmin == false)){
    
    header('Location: ../perfil/logout.php'); 

    exit;
}

/*
else if($_SESSION["logged_user_role"] != 'Admin'){

    $error_msg = "No tienes permisos para acceder a esta página.";

    if(isset($error_msg)){ ?>
        
        <div class="error"><?php echo $error_msg; ?></div>

    <?php } 

}*/

else{

    //logica si conseguiste entrar en la pagina



}

?>

<!DOCTYPE html>

<html lang="en" >
  
    <head>

        <meta charset="UTF-8">
        <title> Gestión de usuarios </title>

        <link rel="stylesheet" href="../../../public/assets/css/adminActions.css">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../public/assets/css/notifications.css">

        <script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>

        
    </head>

  
</html>