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
        <title> Display playlists </title>

        <link rel="stylesheet" href="../../../public/assets/css/displayPlaylists.css">

    </head>

    <body>

        <?php
            //require("../comun/cabecera.php");
        ?>

        <div class="main-container">

            <!-- Sección izquierda de la página -->
            <div class="left-section">

                <p> Mis playlists <p>
                <br><hr><br>
                <div class="lista-playlists">
                    <ul>
                        <li>
                            <a href="#">
                                <span class=""></span>
                                <span> PLAYLIST 1 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 2222222222222222222222222222222222222 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 3 </span>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="#">
                            <span class=""></span>
                            <span> PLAYLIST 4 </span>
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>

            <!-- Sección derecha de la página -->
            <div class="right-section">
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <p>Contenido de la sección izquierda</p>
                <!--
                <div class="row">
                    
                    <div class="col">
                    </div>

                    <div class="col-lg-7 col-md-10">
                        <p class="nameP"> Nombre Playlist </p>
                        <p class="p12"> Descripcion de la playlist </p>
                    </div>

                    <div class="col butP">
                        <a href="marcarMatchlist.php" class="btn btn-info fuente normaltxt2 bt">Marcar como matchlist</a>
                    </div>

                </div>

                <table class="tablaCanciones">
                    <thead>
                        <tr>
                            <th> Nombre </th>
                            <th> Artista </th>
                            <th> Album </th>
                            <th> Duracion </th>
                        </tr>
                    </thead>
                        
                    <tbody class="infoscroll">

                    <tr>
                        <td> holaaaaaaaa </td>
                        <td> artista1 </td>
                        <td> album1 </td>
                        <td> 3 mins 10segs </td>
                    </tr>

                    <tr>
                        <td> nombre2 </td>
                        <td> artista2 </td>
                        <td> album2 </td>
                        <td> 3 mins 10segs </td>
                    </tr>

                    <tr>
                        <td> nombre2 </td>
                        <td> artista2 </td>
                        <td> album2 </td>
                        <td> 3 mins 10segs </td>
                    </tr>

                    <tr>
                        <td> nombre2 </td>
                        <td> artista2 </td>
                        <td> album2 </td>
                        <td> 3 mins 10segs </td>
                    </tr>

                    <tr>
                        <td> nombre2 </td>
                        <td> artista2 </td>
                        <td> album2 </td>
                        <td> 3 mins 10segs </td>
                    </tr>

                    </tbody>
                </table>
                -->
            </div>
        </div>

    </body>

</html>