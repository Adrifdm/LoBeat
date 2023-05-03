<?php
	session_start();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    }

    // Lógica de los botones de la visualización de un usuario
    if (isset($_POST['cerrarUsuario'])) {
        $_SESSION['vista'] = 'lista';
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['abrirChat'])) {
        $_SESSION['vista'] = 'chat';
    }

    $nombre = null;
    $genero = null;
    $descripcion = null;
    if (isset($_GET['nombre']) && isset($_GET['nombre']) && isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        $genero = $_GET['genero'];
        $descripcion = $_GET['descripcion'];
        

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
        <link rel="stylesheet" href="../../../public/assets/css/chat.css">
        <!-- <link rel="stylesheet" href="../../../public/assets/css/chatlist.css"> -->
        
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
            
            <?php if ($_SESSION["vista"] == 'usuario'): ?>

            <div class="visualizacionUsuario">

                <div class="infoUsuario">
                    <img src="../../../public/assets/img/profilePhotos/profileAvatar.png" alt="Imagen usuario">
                    <h1>
                        <?php            
                            if ($nombre != null) {
                                
                                echo $nombre;

                            }          
                         ?>
                    </h1>
                    <h2>
                        <?php                
                            if ($genero != null) {
                                echo $genero;
                            }                         
                        ?>
                    </h2>
                    <p>
                        <?php
                                        
                            if ($descripcion != null) {
                                echo $descripcion;
                            }          
                        ?>
                    </p>
                    <h3>Matchlist<hr></h3>
                    <div class="tabla-filas">
                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                        <div class="fila">

                            <div class="imagen-fila">
                                <img src="../../../public/assets/img/portadaPlaylistPorDefecto.jpg" alt="Imagen track">
                            </div>

                            <div class="titulo-fila">
                                <h5>
                                    Titulo1
                                    <div class="subtitulo">
                                        hhguyuygug, uyfuugg
                                    </div>
                                </h5>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="botonesUsuario">
                    <form method="POST">
                        <button class="cerrarUsuario" name="cerrarUsuario"><i class="bi bi-x"></i></button>
                        <button class="abrirChat" name="abrirChat"><i class="bi bi-chat-dots"></i></button>
                    </form>
                </div>
            </div>
            
            <?php elseif ($_SESSION["vista"] == 'lista'): ?>

            <div class="listaChats">

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
            
            <?php elseif ($_SESSION["vista"] == 'chat'): ?>
            <div class = "chatConcreto">
            <div class="app-main">
                <div class="chat-wrapper">
                    <div class="message-wrapper reverse">
                        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
                        <div class="message-box-wrapper">
                        <div class="message-box">
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur
                        </div>
                        </div>
                    </div>
                    <div class="message-wrapper reverse">
                        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
                        <div class="message-box-wrapper">
                        <div class="message-box">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
                        <div class="message-box-wrapper">
                        <div class="message-box">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur
                        </div>
                        </div>
                    </div>
                <div class="message-wrapper">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit 
                    </div>
                    </div>
                </div>
                <div class="message-wrapper reverse">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Lorem ipsum dolor sit amet
                    </div>
                    </div>
                </div>
                <div class="message-wrapper reverse">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Lorem ipsum dolor
                    </div>
                    </div>
                </div>
                <div class="message-wrapper">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                    </div>
                </div>
                <div class="message-wrapper">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                    </div>
                </div>
                <div class="message-wrapper">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Lorem ipsum dolor sit amet
                    </div>
                    </div>
                </div>
                <div class="message-wrapper reverse">
                    <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
                    <div class="message-box-wrapper">
                    <div class="message-box">
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    </div>
                </div>
                </div>
                <div class="chat-input-wrapper">
                <button class="chat-attachment-btn">
                </button>
                <div class="input-wrapper">
                    <input type="text" class="chat-input" placeholder="Introduzca su mensaje aqui">
                </div>
                <button class="chat-send-btn">Send</button>
                </div>
            </div>
            </div>

            <?php endif; ?>

        </div>

    </body>

</html>