<?php
	session_start();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    } 
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mis playlists</title>

    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">-->
    <!--<link rel="stylesheet" href=" https://unpkg.com/openlayers@4.6.5/dist/ol.css">-->
    
    <link rel="stylesheet" href="../../../public/assets/css/matchlistsView.css">

    <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>
<body>

    <?php
        require_once '../../controllers/usuarioController.php';

        // Crear una instancia de UsuarioController
        $usuarioController = new UsuarioController();

        // Comprobamos si existe algún usuario con ese correo
        //mas adelante se cambiara por el id
        $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
        
    ?>

    <?php
		require("../comun/cabecera.php");
	?>
    <div class="container-fluid">

        <!--Este codigo deberia ir dentro de un for para que se haga por cada playlist-->
        <div class="containerML">
            <div class="cardML">
                <img src=<?php 
                    if($usuarioExistente->getFotoPerfil() != null){
                        
                        echo "../../../public/assets/img/profilePhotos/".$usuarioExistente->getFotoPerfil();
                    }
                    else{
                        
                        echo "../../../public/assets/img/profilePhotos/profileAvatar.png";
                    }

                ?> class="imgML">

                <div class="introML">
                    <h1> Titulo playlist </h1>
                    <p> Descripcion de la playlist </p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>