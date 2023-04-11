<?php
	session_start();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    } 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>playlistMenu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../../../public/assets/css/playlistMenu.css">
<link rel="stylesheet" href="../../../public/assets/css/bootstrap-argon.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="../../../public/assets/css/notifications.css">

<script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>


</head>
<body>
    <!--
  <?php

    /*
    require_once '../../controllers/usuarioController.php';
    require_once '../../controllers/playlistsController.php';

    // Crear una instancia de UsuarioController
    $usuarioController = new UsuarioController();
    $playlistController = new PlaylistsController();
    
    $playlists = $playlistController->listarPlaylists();

    // Comprobamos si existe algún usuario con ese correo
    //mas adelante se cambiara por el id
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
    
    $playlistController = $playlistController->listarPlaylists();
    */
    
  ?>

    <header class="headerPM">

        <div class="containerPM">
            <nav class="menuPM">
                
                <a href="#"> playlist1 </a>
                <a href="#"> playlist2 </a>
                <a href="#"> playlist3 </a>
                    
            </nav>
        </div>
    </header>
-->
    <body>

    <?php
		require("../comun/cabecera.php");
	?>

	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<!--<label for="btn-menu">☰</label>-->
        </div>
	</header>
	
<!--<input type="checkbox" id="btn-menu">	--------------->

<div class="container-menu">
	<div class="cont-menu">
        <div class="tit">Mis playlists</div>
		<nav>    
			<a href="#">playlist1</a>
			<a href="#">playlist2</a>
			<a href="#">playlist3</a>
			<a href="#">playlist4</a>
			<a href="#">playlist5</a>
			<a href="#">playlist6</a>
		</nav>
	</div>
</div>

<!--contenido--------------->
   <div class="infoPlaylist">

        <div class="row">
            <div class="col">
                <img src=<?php 
                    //foto de la playlist
                    echo "../../../public/assets/img/profilePhotos/profileAvatar.png";
                ?> class="imgPLL">
            </div>

           <div class="col-lg-7 col-md-10">
                <p class="nameP">Nombre Playlist</p>
                <p class="p12">Descripcion de la playlist</p>

           </div>

           <div class="col butP">
                <a href="marcarMatchlist.php" class="btn btn-info fuente normaltxt2 bt">Marcar como matchlist</a>
           </div>

        </div>

        <table class="tablaCanciones">
            <!--header de la tabla (no son datos dinamicos)--------------->
            <thead>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Artista
                    </th>
                    <th>
                        Album
                    </th>
                    <th>
                        Duracion
                    </th>
                </tr>
            </thead>
            
            <!--contenido de la tabla (hay que modificarlos para meter la info de cada cancion)--------------->
            <tbody class="infoscroll">

                <!--cada tr es un a fila de la tabla------->
                <!--la iteracion por cada cancion va antes de aqui y tiene que crear un tr-->
                <tr>
                    <!--los td son los campos de la fila (uno por cada titutlo del header de la tabla)---->
                    <td>
                        nombre1
                    </td>
                    <td>
                        artista1
                    </td>
                    <td>
                        album1
                    </td>
                    <td>
                        3 mins 10segs
                    </td>
                </tr>
                <tr>
                    <td>
                        nombre2
                    </td>
                    <td>
                        artista2
                    </td>
                    <td>
                        album2
                    </td>
                    <td>
                        3 mins 10segs
                    </td>

                </tr>
                
                <tr>

                <td>
                        nombr3
                    </td>
                    <td>
                        artista3
                    </td>
                    <td>
                        album3
                    </td>
                    <td>
                        3 mins 10segs
                    </td>
                </tr>

                

            </tbody>

        </table>
   </div>
</body>
</html>
