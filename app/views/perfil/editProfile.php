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

?> 

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoBeat - Perfil</title>

    <link rel="stylesheet" href="../../../public/assets/css/profile.css">
    <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  </head>

  <body>

    <?php
      require("../comun/cabecera.php");
    ?> 

    <div class="main-container">

      <div class="section1">

        <h1>Perfil</h1>

        <a href="profile.php">
          <button>
            <i class="bi bi-arrow-left"></i> Cancelar
          </button>
          <button>
            <i class="bi bi-check-circle"></i> Guardar
          </button>
        </a>

        </div>

      <div class="section2">

        <div class="izq">
          <div class="window">

            <h3>Mi cuenta</h3>
            <div class="sub-box">
              <h3>Nombre de Usuario</h3>
              <input type="text" placeholder="Introduce un de usuario" value="<?php echo $nombre;?>">
              
              <h3>Dirección de correo</h3>
              <input type="text" placeholder="Introduce un correo válido" value="<?php echo $correo;?>">
              
              <h3>Género</h3>
              <select>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
              </select>
              
              <h3>Sobre mí</h3>
              <textarea rows="5" cols="97" maxlength="478" placeholder="Introduce una descripción"><?php echo $descripcion;?></textarea>
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
              <i class="bi bi-instagram"></i><span> Sin asignar</span><br>
              <i class="bi bi-twitter"></i></i><span> Sin asignar</span><br>
              <i class="bi bi-facebook"></i><span> Sin asignar</span>

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