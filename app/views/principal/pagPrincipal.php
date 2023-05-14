<?php
	session_start();

    require_once '../../controllers/usuarioController.php';

    if($_SESSION["is_logged"] != true){
        header('Location: ../perfil/logout.php'); 
        exit;
    }

    // Obtención información usuario seleccionado
    if (isset($_GET['id'])) {
        $_SESSION["id"] = $_GET['id'];
        $_SESSION["vista"] = 'usuario';
    }


    $usuarioController = new UsuarioController();

    // Comrpobamos si el usuario tiene alguna matchlist para permitirle o no pulsar el botoón Connect
    $usuarioActual = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);
    $matchlist = $usuarioActual->getMatchlist();

    if ($matchlist == null) {
        $pointer_events = "none";
    } else {
        $pointer_events = "all";
    }

    if ($_SESSION['vista'] == 'usuario') {

        $usuarioEncontrado = $usuarioController->obtenerUsuarioPorId($_SESSION["id"]);
        $foto = $usuarioEncontrado->getFotoPerfil();
        $nombre = $usuarioEncontrado->getNombre();
        $genero = $usuarioEncontrado->getGenero();
        $descripcion = $usuarioEncontrado->getDescripcion();
        $matchlist = $usuarioEncontrado->getMatchlist();

        // Lógica del botón de la visualización de un usuario
        if (isset($_POST['cerrarUsuario'])) {
            $_SESSION['vista'] = 'lista';
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
?>

<!doctype html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>LoBeat - Página principal</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
        <link rel="stylesheet" href=" https://unpkg.com/openlayers@4.6.5/dist/ol.css">
        <link rel="stylesheet" href="../../../public/assets/css/pagPrincipal.css">
        
        <!-- Scripts mapa -->
        <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    </head>

    <body>
        <?php
            require("../comun/cabecera.php");
            require("../comun/mapa.php");
        ?>

        <div class="matching">
            <a href="../../../app/matching/matchAlgorithm.php" style="pointer-events: <?php echo $pointer_events?>">
                <button type="button" class="<?php echo $pointer_events ?>">
                    <i class="bi bi-music-note"></i>
                    CONNECT
                </button>
            </a>
        </div>

        <div class="seccionDer">
            
            <?php if ($_SESSION["vista"] == 'usuario') { ?>

            <div class="visualizacionUsuario">

                <div class="botonUsuario">
                    <form method="POST">
                        <button class="cerrarUsuario" name="cerrarUsuario"><i class="bi bi-arrow-left"></i></i></button>
                    </form>
                </div>

                <div class="infoUsuario">
                    <div class="contenedor-imagen-usuario">
                        <img src=
                        <?php echo "../../../public/assets/img/profilePhotos/".$foto; ?>
                        alt="Imagen usuario">
                    </div>
                    <h1>
                        <?php echo $nombre ?>
                    </h1>
                    <h2>
                        <?php echo $genero ?>
                    </h2>
                    <p>
                        <?php echo $descripcion ?>
                    </p>

                    <h3>Matchlist<hr></h3>

                    <?php if ($matchlist == null) { ?>

                        <p>Este usuario no tiene actualmente ninguna Matchlist</p>

                    <?php } else { $matchlistArray = $matchlist->bsonSerialize();?>
                        <p>
                            <?php echo $matchlistArray->nombreMatchlist; ?>
                        </p>

                        <div class="tabla-filas">
                            <?php foreach ($matchlist->tracks as $track) { $track->bsonSerialize(); ?>
                                <div class="fila">

                                    <div class="imagen-fila">
                                        <img src="<?php echo $track->image; ?>" alt="Imagen track">
                                    </div>

                                    <div class="titulo-fila">
                                        <h5>
                                            <?php echo $track->title; ?>
                                            <div class="subtitulo">
                                                <?php echo $track->artists; ?>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            
            </div>
            
            <?php } elseif ($_SESSION["vista"] == 'lista') { ?>

            <div class="listaMatchs">

                <?php
                $usuarioActual = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);
                $listaMatchs = $usuarioActual->getListaMatchs();
                ?>

                <?php if ($listaMatchs == null) { ?>
                    <?php if ($matchlist == null) { ?>
                        <div class="mensaje">
                            <span>Bienvenido a LoBeat. Para poder conectar con otras personas primero debes establecer una Matchlist desde la opción Playlists </span>
                        </div>
                    <?php } else { ?>
                        <div class="mensaje">
                            <span>Pulsa el botón Connect sobre el mapa y encuentra gente con tus mismos gustos </span>
                        </div>
                    <?php } ?>

                <?php } elseif (count($listaMatchs) == 0) { ?>
                    <div class="mensaje">
                        <span>Vaya, parece que aún no has hecho match con nadie. Vuelve a pruebar suerte con el botón Connect sobre el mapa y encuentra gente con tus mismos gustos </span>
                    </div>
                <?php } else { ?>       
                    <ul>
                        <?php foreach ($listaMatchs as $matchId): ?>
                            <?php $match = $usuarioController->obtenerUsuarioPorId($matchId); ?>
                            <div class = "chat-element">
                                <a class="enlace" onclick="mostrarContenido(event)">
                                    <li class="list-item">
                                        <div class="contenedor-imagen">
                                            <img src=
                                            <?php echo "../../../public/assets/img/profilePhotos/".$match->getFotoPerfil(); ?>
                                            alt="chat">
                                        </div>
                                        <span class="list-item-name"><?php echo $match->getNombre(); ?>
                                            <p class = "subtitulo"><?php echo $match->getDescripcion(); ?></p>
                                        </span>
                                        <?php if($match->getStatus()) {?>
                                            <div class="estado-on"><i class="bi bi-circle-fill"></i></div>
                                        <?php } else {?>
                                            <div class="estado-off"><i class="bi bi-circle-fill"></i></div>
                                        <?php } ?>
                                
                                    </li>
                                </a>
                                    <li class="redes" > 
                                        <div class= "r-d">     
                                            <a class="redes-sociales" href="<?php echo ($match->getInstagram() != null && $match->getInstagram() != "") ? 'https://instagram.com/'.urlencode($match->getInstagram()) : '#'; ?>"> <i class="bi bi-instagram"></i>     <?php
                                                if ($match->getInstagram() == null || $match->getInstagram() == "") {
                                                    echo "Sin asignar";
                                                } else {
                                                    echo $match->getInstagram();
                                                }
                                            ?></a>
                                        </div>
                                        <div class= "r-d">
                                        <a class="redes-sociales" href="<?php echo ($match->getTwitter() != null && $match->getTwitter() != "") ? 'https://twitter.com/'.urlencode($match->getTwitter()) : '#'; ?>">
                                        <i class="bi bi-twitter"></i>    <?php
                                                if ($match->getTwitter() == null || $match->getTwitter() == "") {
                                                    echo "Sin asignar";
                                                } else {
                                                    echo $match->getTwitter();
                                                }
                                            ?></a>
                                        </div>
                                        <div class= "r-d">
                                        <a class="redes-sociales" href="<?php echo ($match->getTiktok() != null && $match->getTiktok() != "") ? 'https://tiktok.com/@'.urlencode($match->getTiktok()) : '#'; ?>">  
                                            <i class="bi bi-tiktok"> </i>  <?php
                                                if ($match->getTiktok() == null || $match->getTiktok() == "") {
                                                    echo "Sin asignar";
                                                } else {
                                                    echo $match->getTiktok();
                                                }
                                            ?></a>
                                        </div>
                                    </li> 
                            </div>
                        <?php endforeach; ?>
                        
                    </ul>
                <?php } ?>

            </div>
            
            <?php } ?>

        </div>

    </body>

</html>
<script>
function mostrarContenido(event) {
  // Obtener el elemento padre más cercano del enlace que se hizo clic
  var elementoPadre = event.target.closest('.chat-element');
  
  // Obtener el elemento hijo con la clase "redes" dentro del elemento padre
  var contenido = elementoPadre.querySelector('.redes');

  // Obtener la altura del elemento hijo
  var alturaContenido = contenido.scrollHeight;

  // Establecer la altura máxima del elemento hijo para que se muestre con una animación
  if (contenido.style.maxHeight) {
    contenido.style.maxHeight = null;
    contenido.style.padding = "0px";
    elementoPadre.querySelector('.list-item').style.borderBottomRightRadius = "6px";
  } else {
    contenido.style.padding = "10px";
    contenido.style.maxHeight = alturaContenido + 20 + "px";
    elementoPadre.querySelector('.list-item').style.borderBottomRightRadius = "0px";
  }
}
</script>