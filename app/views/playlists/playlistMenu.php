<?php

    require_once '../../controllers/spotifyController.php';
    require_once '../../controllers/usuarioController.php';
    require_once '../../controllers/playlistsController.php';

    $playlistController = new PlaylistsController();
    $usuarioController = new UsuarioController();
    $spotifyController = new SpotifyController();

	session_start();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    } 

    if(isset($_GET["idPlaylist"])){
        $nombre = $_GET["idPlaylist"];
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
            
            <?php
            
                $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
                $id = $usuarioExistente->getSpotifyID();
                $listas = $playlistController->listarPlaylists();

                foreach($listas as $x){
                    if($id == $x->getPlaylistOwnerId()){
                      ?>

                      <a href="playlistMenu.php?idPlaylist=<?php echo$x->getId()?>">
                        <?php
                           echo $x->getPlaylistName();
                        ?>
                      </a>

                      <?php
                    }
                  }

            ?>

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
                <p class="nameP">
                    <?php
                        $lista = $playlistController->buscarPlaylistsPorCampo('spotifyId', $nombre);
                        echo $lista[0]->getPlaylistName();
                    ?>
                </p>
                <p class="p12">
                    <?php
                        $lista = $playlistController->buscarPlaylistsPorCampo('spotifyId', $nombre);
                        echo $lista[0]->getPlaylistDescription();
                    ?>
                </p>

           </div>

           <div class="col butP">
                <a href="marcarMatchlist.php" class="btn btn-info fuente normaltxt2 bt">Marcar como matchlist</a>
           </div>

        </div>

        <table class="tablaCanciones">
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
            
            <tbody class="infoscroll">

                <!--cada tr es un a fila de la tabla------->
                <!--la iteracion por cada cancion va antes de aqui y tiene que crear un tr-->
                
                    <!--los td son los campos de la fila (uno por cada titutlo del header de la tabla)---->
                    
                    <?php
                        $canciones = $spotifyController->obtenerCancionesPlaylist($nombre, $usuarioExistente->getId());

                        $i = 0;

                        while( !empty($canciones[$i]) ){

                            $cancion = $canciones[$i];

                            $nombre = $cancion['titulo'];
                            $artista = $cancion['artista'];
                            $album = $cancion['album'];
                            $duracion = $cancion['duracion'];

                            ?>
                            <tr>
                            <td>
                                <?php echo $nombre?> 
                            </td>
    
                            <td>
                                <?php echo $artista?> 
                            </td>
    
                            <td>
                                <?php echo $album?> 
                            </td>
                            
                            <td>
                                <?php echo $duracion?>
                            </td> 

                            </tr>
                            <?php

                            $i++;
                               
                        }


                    ?>
                         
                    

            </tbody>

        </table>
   </div>
</body>
</html>