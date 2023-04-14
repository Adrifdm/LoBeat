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
?>

<!DOCTYPE html>
<html lang="en" >
  
    <head>

        <meta charset="UTF-8">
        <title> Display playlists </title>

        <link rel="stylesheet" href="../../../public/assets/css/displayPlaylists.css">

    </head>

    <body>

        <?php
            require("../comun/cabecera.php");
        ?>

        <div class="main-container">

            <!-- Sección izquierda de la página -->
            <div class="left-section">

                <br>
                <p> Mis playlists <p>
                <br><hr><br>
                <div class="lista-playlists">
                    <ul>
                        <li>
                            <a href="#">
                                <span> PLAYLIST 1 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span> PLAYLIST 2222222222222222222222222222222222222 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span> PLAYLIST 3 34534 thrt fhrth rthrth rthrt rhr rhrh </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Sección derecha de la página -->
            <div class="right-section">
                <br>
                <div class="playlist-info">

                    <div class="playlist-info-left">
                        <img src="../../../public/assets/img/img.jpg" alt="Título de la Playlist">
                    </div>
                    <div class="playlist-info-right">
                        <div class="titulo">
                            <h1>Título de la Playlist overflow: hidden;overflow: hidden;overflow: hidden;overflow: hidden;overflow: hidden;overflow: hidden;overflow: hidden;overflow: hidden;overflow: hidden; overflow: hidden;overflow: hidden;overflow: hidden;</h1>
                        </div>
                        <div class="descripcion">
                            <p> Descripción de la : esto es una dexripcion fwe ewf eg erergerg errge gergerg egrge egrg egrgregeg ert45t egr 45y45yy4dhre erherht erhhe 45y45yy4dhre erherht erhh45y45yy4dhre erherht erhh45y45yy4dhre erherht erhh SE ACABA LA LINEA LINEA LINEA LINEA LINEA AAAA SIGUEE 45y45yy4dhre erherht erhh45y45yy4dhre erherht erhh45y45yy4dhre erherht erhh45y45yy4dhre erherht erhh 4dhre erherht er 4dhre erherht er 4dhre erherht er 4dhre erherht er</p>
                        </div>
                        <div class="info-adicional">
                            <p> Usuario - 32 canciones, 10 min 2 s  4dhre erherht er4dhre erherht er4dhre erherht er 4dhre erherht er4dhre erherht er4dhre erherht er4dhre erherht er4dhre erherht er4dhre erherht erv</p>
                        </div>
                        

                        
                    </div>
                </div>
                <br>
                <div class="boton-play">
                    <img src="../../../public/assets/img/img.jpg" alt="PLAY">
                    <p>Reproducir</p>
                </div>
                <div class="boton-matchlist">
                    <img src="../../../public/assets/img/img.jpg" alt="MARCAR MATCHLIST">
                    <p>MARCAR COMO MATCHLIST</p>
                </div>
                <br>
                <div class="playlist-contenido">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Portada</th>
                                <th>Título</th>
                                <th>Artista</th>
                                <th>Álbum</th>
                                <th>Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="Portada de la Canción 1"></td>
                                <td>Título de la Canción 1</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><img src="ruta_de_la_imagen_de_la_cancion_1.jpg" alt="ULTIMAAA CANCION"></td>
                                <td>ULTIMAAA CANCION</td>
                                <td>Artista de la Canción 1</td>
                                <td>Álbum de la Canción 1</td>
                                <td>3:45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br><br><br><br><br><br><br>

            </div>
        </div>

    </body>

</html>