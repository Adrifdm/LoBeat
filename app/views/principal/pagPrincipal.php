<?php
	session_start();

    if($_SESSION["is_logged"] != true){
        header('Location: ../perfil/logout.php'); 
        exit;
    }

    // Obtención información usuario seleccionado
    if (isset($_GET['id'])) {
        $_SESSION["id"] = $_GET['id'];
        $_SESSION["refrescar"] = true;
    }

    // Comprobamos si se ha hecho click en algún usuario del mapa
    if (isset($_SESSION["refrescar"]) && $_SESSION["refrescar"] == true) {
        $_SESSION["refrescar"] = false;
        ?>
        <script>
            setTimeout(function() {
                location.reload(true);
            }, 100);
        </script>
        <?php
        $_SESSION["vista"] = 'usuario';
        exit;
    }

    if ($_SESSION['vista'] == 'usuario') {

        // Lógica de los botones de la visualización de un usuario
        if (isset($_POST['cerrarUsuario'])) {
            $_SESSION['vista'] = 'lista';
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
        if (isset($_POST['abrirChat'])) {
            $_SESSION['vista'] = 'chat';
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
    if ($_SESSION['vista'] == 'lista') {
        //TODO
    }
    else if($_SESSION['vista'] == 'chat') {
        //TODO
    }
?>

<!doctype html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Mapa</title>

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
            <a href="../../../app/matching/matchAlgorithm.php">
                <button>
                    <i class="bi bi-music-note"></i>
                    CONNECT
                </button>
            </a>
        </div>

        <div class="seccionDer">
            
            <?php if ($_SESSION["vista"] == 'usuario') { ?>

            <div class="visualizacionUsuario">

                <?php
                $usuarioEncontrado = $usuarioController->obtenerUsuarioPorId($_SESSION["id"]);
                $foto = $usuarioEncontrado->getFotoPerfil();
                $nombre = $usuarioEncontrado->getNombre();
                $genero = $usuarioEncontrado->getGenero();
                $descripcion = $usuarioEncontrado->getDescripcion();
                $matchlist = $usuarioEncontrado->getMatchlist();
                ?>

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

                <div class="botonesUsuario">
                    <form method="POST">
                        <button class="cerrarUsuario" name="cerrarUsuario"><i class="bi bi-x"></i></button>
                        <button class="abrirChat" name="abrirChat"><i class="bi bi-chat-dots"></i></button>
                    </form>
                </div>
            </div>
            
            <?php } elseif ($_SESSION["vista"] == 'lista') { ?>

            <div class="listaChats">

                <!-- Información del propio usuario -->
                <!-- <div class="content">
                    <img src=""<?php// echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span><?php// echo $row['fname']. " " . $row['lname'] ?></span>
                        <p><?php// echo $row['status']; ?></p>
                    </div>
                </div> -->

                <!-- Input para buscar un chat de la lista -->
                <!-- <div class="search">
                    <span class="text">Selecciona un usuario para hablar</span>
                    <input type="text" placeholder="Introduce un nombre...">
                    <button><i class="fas fa-search"></i></button>
                </div> -->

                <!-- Lista de chats disponibles -->
                <ul>
                    
                    <a class="enlace" href ="chat.php">
                        <li class="chat-list-item">
                            <div class="contenedor-imagen">
                                <img src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">            
                            </div>
                            <span class="chat-list-name">Roberto
                                <p class = "subtitulo">quepues el e que pues el otro dia no se que es el e que pues el otro dia no sees el e que pues el otro dia no sees el e que pues el otro dia no se </p>
                            </span>
                        </li>
                    </a>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>

                    <li class="chat-list-item">
                        <div class="contenedor-imagen">
                            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
                        </div>
                        <span class="chat-list-name">Roberto
                            <p class = "subtitulo">  quepues el otro dia no se quno se que  </p>
                        </span>
                        
                    </li>
                    
                </ul>

            </div>
            
            <?php } elseif ($_SESSION["vista"] == 'chat') { ?>

            <div class = "chatConcreto">

                <div class="seccionSuperior">
                    SECCION SUPERIOR
                </div>

                <div class="chat-wrapper">

                    <div class="message-wrapper reverse">
                        <!-- <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic"> -->
                        <div class="message-box-wrapper">
                            <div class="message-box">
                                MENSAJE 2
                            </div>
                        </div>
                    </div>

                    <div class="message-wrapper reverse">
                        <!-- <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic"> -->
                        <div class="message-box-wrapper">
                            <div class="message-box">
                                MENSAJE 2
                            </div>
                        </div>
                    </div>

                    <div class="message-wrapper">
                        <!-- <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic"> -->
                        <div class="message-box-wrapper">
                            <div class="message-box">
                                MENSAJE 1
                            </div>
                        </div>
                    </div>

                </div>

                <div class="chat-input-wrapper">
                    
                    <button class="chat-attachment-btn"></button>
                    <div class="input-wrapper">
                        <input type="text" class="chat-input" placeholder="Introduzca su mensaje aqui">
                    </div>
                    <button class="chat-send-btn">Send</button>

                </div>
            </div>

            <?php } ?>

        </div>

    </body>

</html>