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
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->

    <link rel="stylesheet" href="../../../public/assets/css/playlistMenu.css">
    <!-- <link rel="stylesheet" href="../../../public/assets/css/bootstrap-argon.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->

    <script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>

  </head>

  <body>

    <?php
      require("../comun/cabecera.php");
    ?>

    <!-- Panel izquierdo de la página -->
    <div class="container-menu">
      <div class="cont-menu">
        <div class="tit">Mis playlists</div>
          <nav>    
            <a href="#"> playlist2 </a>
            <a href="#"> playlist2 </a>
            <a href="#"> playlist3 </a>
            <a href="#"> playlist4 </a>
            <a href="#"> playlist5 </a>
            <a href="#"> playlist6 </a>
            <a href="#"> playlist7 </a>
            <a href="#"> playlist8 </a>
            <a href="#"> playlist9 </a>
            <a href="#"> playlist10 </a>
          </nav>
        </div>
      </div>

      <!-- Panel derecho de la página -->
      <div class="infoPlaylist">

        <div class="row">

          <div class="col">
            <img src=<?php  
              //Imagen playlist
              echo "../../../public/assets/img/profilePhotos/profileAvatar.png";
            ?> class="imgPLL">
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

            <!-- Cada tr es un a fila de la tabla -->
            <!-- La iteracion por cada cancion va antes de aqui y tiene que crear un tr -->

            <tr>
              <!-- Los td son los campos de la fila (uno por cada titutlo del header de la tabla) -->
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