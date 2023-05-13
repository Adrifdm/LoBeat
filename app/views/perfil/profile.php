<?php
  require_once '../../controllers/usuarioController.php';

	session_start();

  if($_SESSION["is_logged"] !== true){
    header('Location: logout.php'); 
    exit;
  }

  $usuarioController = new UsuarioController();

  // Obtenemos el usuario actual
  $usuarioExistente = $usuarioController->obtenerUsuarioPorId($_SESSION['logged_user_id']);
  $nombre = $usuarioExistente->getNombre();
  $correo = $usuarioExistente->getCorreo();
  $genero = $usuarioExistente->getGenero();
  $descripcion = $usuarioExistente->getDescripcion();
  $imagen = $usuarioExistente->getFotoPerfil();
  $matchlist = $usuarioExistente->getMatchlist();
  $instagram = $usuarioExistente->getInstagram();
  $twitter = $usuarioExistente->getTwitter();
  $tiktok = $usuarioExistente->getTiktok();

?> 

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoBeat - Perfil</title>

    <link rel="stylesheet" href="../../../public/assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <script src="https://kit.fontawesome.com/dee2748eb0.js" crossorigin="anonymous"></script>
    <script src="assets/vendor/select2/dist/js/select2.min.js"></script>
  
  </head>

  <body>

    <?php
      require("../comun/cabecera.php");
    ?> 

    <div class="main-container">

      <div class="section1">

        <h1>Perfil</h1>

        <a href="editProfile.php">
          <button>
            <i class="bi bi-pencil-square"></i> Editar perfil
          </button>
        </a>

        <a href="../perfil/logout.php">
          <button>
            <i class="bi bi-box-arrow-left"></i> Cerrar sesion
          </button>
        </a>

        </div>

      <div class="section2">

        <div class="izq">
          <div class="window">

            <h3>Mi cuenta</h3>
            <div class="sub-box">
              <h3>Nombre de Usuario</h3>
              <p><?php echo $nombre ?></p>
              <h3>Dirección de correo</h3>
              <p><?php echo $correo ?></p>
              <h3>Género</h3>
              <p><?php echo $genero ?></p>
              <h3>Sobre mí</h3>
              <p><?php echo $descripcion ?></p>
            </div>
          
          </div>
        </div>

        <div class="der">
          <div class="window">
            <div class="contenedor-imagen">
            <img src="../../../public/assets/img/profilePhotos/<?php echo $imagen ?>" alt="Imagen usuario">
            </div>

            <div class="info">
              <h3>Mis redes:</h3>
              <i class="bi bi-instagram"></i><span> <?php 
              if ($instagram == null) {
                echo "Sin asignar";
              } else {
                echo $instagram;
              }
              ?></span><br>
              <i class="bi bi-twitter"></i></i><span> <?php
              if ($twitter == null) {
                echo "Sin asignar";
              } else {
                echo $twitter;
              }
              ?></span><br>
              <i class="bi bi-tiktok"></i><span> <?php
              if ($tiktok == null) {
                echo "Sin asignar";
              } else {
                echo $tiktok;
              }
              ?></span>

              <h3>Matchlist:</h3>
              <?php if($matchlist == null) { ?>
              <p>Sin asignar</p>
              <?php } else { ?>
              <p><?php echo $matchlist->nombreMatchlist ?></p>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>

    </div>
    

  </body>
</html>