<?php
    require_once '../../controllers/playlistsController.php';

    session_start();

    if($_SESSION["is_logged"] != true){
        header('Location: ../perfil/logout.php'); 
        exit;
    }
    else {
        $playlists = $_SESSION['playlistsUsuarioActual'];
    }
?>

<!DOCTYPE html>
<html lang="en" >
  
    <head>

        <meta charset="UTF-8">
        <title> Display playlists </title>

        <link rel="stylesheet" href="../../../public/assets/css/displayPlaylists.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../public/assets/css/notifications.css">

        <script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>

        
    </head>

    <body>

        <?php
            require("../comun/cabecera.php");
        ?>

        <div class="main-container">

            <!-- Sección izquierda de la página -->
            <div class="left-section">

                <br>
                <h1>Mis playlists</h1>
                <hr>
                
                <div class="lista-playlists">
                    <ul>
                        <?php foreach ($playlists as $playlist): ?>
                        <li>
                            <a class = "playlist_enlaces" href="#">
                                <h4> <span> </span> <i class="bi bi-music-note-beamed"></i><?php echo $playlist->getPlaylistName() ?></h4>
                            </a>
                        </li>
                        <br>
                        <?php endforeach; ?>
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
                            <p> Usuario propietario
                                <i class="bi bi-heart-fill"></i> 1234 
                                <i class="bi bi-clock"></i> 1:36
                            </p>
                        </div>
                    </div>

                </div>
                <br>

                <div class="boton-play">
                    <i class="bi bi-play-circle-fill"></i>
                </div>

                <div class="boton-matchlist">
                    <h5>
                        Marcar como Matchlist
                    </h5>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <br>
                <div class="playlist-contenido">

                    <!-- Tabla encabezado -->
                    <div class="tabla-encabezado">
                        <div class="tabla-num">
                            <h5>#</h5>
                        </div>
                        
                        <div class="tabla-titulo">
                            <h5>Título</h5>
                        </div>

                        <div class="tabla-album">
                            <h5>Álbum</h5>
                        </div>

                        <div class="tabla-duracion">
                            &nbsp;&nbsp;&nbsp;<i class="bi bi-clock"></i>
                        </div>
                    </div>
                    <hr>

                    <!-- Tabla filas -->
                    <div class="tabla-filas">
                        <div class="fila">
                            <div class="num-fila">
                                <h5>01</h5>
                            </div>

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/img.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Callaita
                                    <div class="subtitulo">Bad Bunny, Anuel AA</div>
                                </h5>
                            </div>

                            <div class="album-fila">
                                <h5 class= "album_duracion">
                                    Cositas
                                </h5>
                            </div>

                            <div class="duracion-fila">
                                <h5 class= "album_duracion">
                                    3:45
                                </h5>
                                
                            </div>
                        </div>

                        <div class="fila">
                            <div class="num-fila">
                                <h5>01</h5>
                            </div>

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/img.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Callaita
                                    <div class="subtitulo">Bad Bunny, Anuel AA</div>
                                </h5>
                            </div>

                            <div class="album-fila">
                                <h5 class= "album_duracion">
                                    Cositas
                                </h5>
                            </div>

                            <div class="duracion-fila">
                                <h5 class= "album_duracion">
                                    3:45
                                </h5>
                                
                            </div>
                        </div>

                        <div class="fila">
                            <div class="num-fila">
                                <h5>01</h5>
                            </div>

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/img.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Callaita
                                    <div class="subtitulo">Bad Bunny, Anuel AA</div>
                                </h5>
                            </div>

                            <div class="album-fila">
                                <h5 class= "album_duracion">
                                    Cositas
                                </h5>
                            </div>

                            <div class="duracion-fila">
                                <h5 class= "album_duracion">
                                    3:45
                                </h5>
                                
                            </div>
                        </div>

                        <div class="fila">
                            <div class="num-fila">
                                <h5>01</h5>
                            </div>

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/img.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Callaita
                                    <div class="subtitulo">Bad Bunny, Anuel AA</div>
                                </h5>
                            </div>

                            <div class="album-fila">
                                <h5 class= "album_duracion">
                                    Cositas
                                </h5>
                            </div>

                            <div class="duracion-fila">
                                <h5 class= "album_duracion">
                                    3:45
                                </h5>
                                
                            </div>
                        </div>

                        <div class="fila">
                            <div class="num-fila">
                                <h5>01</h5>
                            </div>

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/img.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    ULTIMAAAAAA
                                    <div class="subtitulo">Bad Bunny, Anuel AA</div>
                                </h5>
                            </div>

                            <div class="album-fila">
                                <h5 class= "album_duracion">
                                    Cositas
                                </h5>
                            </div>

                            <div class="duracion-fila">
                                <h5 class= "album_duracion">
                                    3:45
                                </h5>
                                
                            </div>
                        </div>
                    
                    <br><br>

                    </div>
                    
                </div>
                <br><br><br><br><br><br><br>

            </div>
        </div>

    </body>
    <script>
        const links = document.querySelectorAll('.playlist_enlaces');
        
        links.forEach(link => {
            link.addEventListener('click', function(event) {
            event.preventDefault(); // para prevenir el comportamiento por defecto del enlace
            
            // eliminar la clase "active" de todos los enlaces
            links.forEach(link => {
                link.querySelector('h4').classList.remove('active');
            });
            
            // agregar la clase "active" al enlace que se ha hecho clic
            this.querySelector('h4').classList.add('active');
            });
        });
    </script>

</html>