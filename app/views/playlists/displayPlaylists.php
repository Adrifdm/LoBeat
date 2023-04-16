<?php
require_once '../../controllers/playlistsController.php';
require_once '../../controllers/spotifyController.php';

session_start();

$playlistsController = new PlaylistsController();
$spotifyController = new SpotifyController();

if($_SESSION["is_logged"] != true){
    header('Location: ../perfil/logout.php'); 
    exit;
}
else {
    $spotifyController->refrescarTokens($_SESSION['logged_user_id']);
    $playlistsController->refrescarPlaylists($_SESSION["logged_user_spotifyID"]);

    $playlists = $playlistsController->buscarPlaylistsPorCampo('owner.id', $_SESSION["logged_user_spotifyID"]);

    if ($playlists == null) {
        $sinPlaylists = true;
    }
    else {
        $sinPlaylists = false;

        // Comprobar si el parámetro "playlist" está presente en la URL
        if (isset($_GET['playlist'])) {
            $indicePlaylistSeleccionada = $_GET['playlist'];
            $algunaSeleccionada = true;
        }
        else {
            $algunaSeleccionada = false;
        }
    }

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
                        <?php foreach ($playlists as $index => $playlist): ?>
                        <li>
                            <a class = "playlist_enlaces" href="displayPlaylists.php?playlist=<?php echo $index ?>">
                                <h4> <span> </span> <i class="bi bi-music-note-beamed"></i>
                                    <?php
                                    $titulo = $playlist->getPlaylistName();
                                    if ($titulo != null) {
                                        echo $titulo;
                                    }
                                    else {
                                        echo "SIN TITULO";
                                    }
                                    ?>
                                </h4>
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
                <?php if ($sinPlaylists == true): ?>
                    <div class="mensaje-inicial">
                            <h1>
                                No tienes playlists
                            </h1>
                        </div>
                <?php else: ?>
                    <?php if ($algunaSeleccionada == false): ?>
                        <div class="mensaje-inicial">
                            <h1>
                                Selecciona una playlist para verla
                            </h1>
                        </div>
                    <?php else: ?>

                        <div class="playlist-info">

                            <div class="playlist-info-left">
                            <?php
                                $playlist = $playlists[$indicePlaylistSeleccionada];
                                if (!empty($playlist->getPlaylistImages()) && isset($playlist->getPlaylistImages()[0])) {
                                    $imagen = $playlist->getPlaylistImages()[0]->url;
                                } else {
                                    $imagen = "../../../public/assets/img/portadaPlaylistPorDefecto.jpg";
                                }
                            ?>

                                <img src="<?php echo $imagen; ?>" alt="<?php echo $playlists[$indicePlaylistSeleccionada]->getPlaylistName();?>">
                            </div>

                            <div class="playlist-info-right">
                                <div class="titulo">
                                    <h1>
                                        <?php
                                        $titulo = $playlists[$indicePlaylistSeleccionada]->getPlaylistName();
                                        if ($titulo != null) {
                                            echo $titulo;
                                        }
                                        else {
                                            echo "Esta playlist no tiene titulo";
                                        }
                                        ?>
                                    </h1>
                                </div>
                                <div class="descripcion">
                                    <p>
                                        <?php
                                        $descripcion = $playlists[$indicePlaylistSeleccionada]->getPlaylistDescription();
                                        if ($descripcion != null) {
                                            echo $descripcion;
                                        }
                                        else {
                                            echo "No se ha proporcionado ninguna descripción para esta playlist";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="info-adicional">
                                    <p> <?php echo $playlists[$indicePlaylistSeleccionada]->getPlaylistOwner()->display_name ?>
                                        <i class="bi bi-heart-fill"></i> 1234 
                                        <i class="bi bi-clock"></i>
                                        <?php
                                        $duration_ms = $playlists[$indicePlaylistSeleccionada]->getPlaylistDuration();
                                        $duration_seconds = $duration_ms / 1000;
                                        $mins = floor($duration_seconds / 60);
                                        $secs = $duration_seconds % 60;
                                        $time_formatted = gmdate('i:s', $duration_seconds);
                                        echo "$mins minutos y $secs segundos ($time_formatted)";
                                        ?>

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
                                <?php
                                $num_fila = 1;
                                foreach ($playlists[$indicePlaylistSeleccionada]->getPlaylistTracks() as $track):
                                ?>
                                <div class="fila">
                                    <div class="num-fila">
                                        <h5><h5><?php echo $num_fila++; ?></h5></h5>
                                    </div>

                                    <div class="imagen-fila">
                                        <img src="<?php echo $track->track->album->images[0]->url; ?>" alt="Imagen track">
                                    </div>

                                    <div class="titulo-fila">
                                        <h5>
                                            <?php
                                            $nombre = $track->track->name;
                                            echo $nombre;
                                            ?>
                                            <div class="subtitulo">
                                                <?php
                                                $total_artists = count($track->track->artists);
                                                $index = 0;
                                                foreach($track->track->artists as $artist) {
                                                    echo "$artist->name";
                                                    if ($index < $total_artists - 1) {
                                                        echo ", ";
                                                    }
                                                    $index++;
                                                }
                                                ?>
                                            </div>
                                        </h5>
                                    </div>

                                    <div class="album-fila">
                                        <h5 class= "album_duracion">
                                            <?php
                                            $album = $track->track->album->name;
                                            echo $album;
                                            ?>
                                        </h5>
                                    </div>

                                    <div class="duracion-fila">
                                        <h5 class= "album_duracion">
                                            <?php
                                            $duracion_ms = $track->track->duration_ms;
                                            $duration_seconds = $duracion_ms / 1000;
                                            $mins = floor($duration_seconds / 60);
                                            $secs = $duration_seconds % 60;
                                            $time_formatted = gmdate('i:s', $duration_seconds);
                                            echo "$time_formatted";
                                            ?>
                                        </h5>
                                        
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <br><br>

                            </div>
                            
                        </div>
                        <br><br><br><br><br><br><br>
                    <?php endif; ?>
                <?php endif; ?>
                
            </div>
        </div>

    </body>

    <script>
        const links = document.querySelectorAll('.playlist_enlaces');

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // para prevenir el comportamiento por defecto del enlace
                
                /* ESTO ES LO DEL ICONO EN LA PLAYLIST SELECCIONADA (NO FUNCIONA DE MOMENTO)
                // eliminar la clase "active" de todos los enlaces
                links.forEach(link => {
                    link.querySelector('h4').classList.remove('active');
                });
                // agregar la clase "active" al enlace que se ha hecho clic
                this.querySelector('h4').classList.add('active');
                */

                // obtener el índice de la playlist seleccionada
                const index = Array.from(links).indexOf(this);
                
                // redirigir a la página con el índice de la playlist seleccionada como parámetro en la URL
                window.location.href = `displayPlaylists.php?playlist=${index}`;
            });
        });
    </script>


</html>