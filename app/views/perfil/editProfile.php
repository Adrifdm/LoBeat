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
    <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  </head>

  <body>

    <?php
      require("../comun/cabecera.php");
    ?> 

    <div class="main-container">

      <a href="profile.php">
        <button class="cancelar">
          <i class="bi bi-arrow-left"></i> Cancelar
        </button>
      </a>

      <form action="processProfile.php" method="POST" enctype="multipart/form-data">
        <div class="section1">

          <h1>Perfil</h1>
          <a>
            <button type="submit">
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
                <input type="text" id="input-username" name="name" required="" maxlength="25" placeholder="Introduce un nombre de usuario" value="<?php echo $nombre;?>"><span id="iconoUsername"></span>
                
                <h3>Dirección de correo</h3>
                <input type="text" id="input-email" name="email" required="" maxlength="25" placeholder="Introduce un correo válido" value="<?php echo $correo;?>"><span id="emailIcon"></span>
                
                <h3>Género</h3>
                <select name="genero" required="">
                  <option value="Hombre">Hombre</option>
                  <option value="Mujer">Mujer</option>
                  <option value="Otro">Otro</option>
                </select>
                
                <h3>Sobre mí</h3>
                <textarea name="descripcion" required="" rows="5" cols="97" maxlength="495" placeholder="Introduce una descripción"><?php echo $descripcion;?></textarea>
              </div>
            
            </div>
          </div>

          <div class="der">
            <div class="window">
              <div class="contenedor-editar-imagen">
                <img src="../../../public/assets/img/profilePhotos/<?php echo $imagen ?>" id="photo" alt="Imagen usuario">
                <input type="file" id="file" name="foto">
                <label for="file" id="uploadBtn"><i class="bi bi-pencil"></i></label>              
              </div>

              <div class="info">

                <h3>Mis redes:</h3>
                <i class="bi bi-instagram"></i>
                <input type="text" name="instagram" maxlength="25" placeholder="Introduce tu cuenta de Instagram" value="<?php echo $instagram;?>">
                <br>
                <i class="bi bi-twitter"></i></i>
                <input type="text" name="twitter" maxlength="25" placeholder="Introduce tu cuenta de Twitter" value="<?php echo $twitter;?>">
                <br>
                <i class="bi bi-tiktok"></i>
                <input type="text" name="tiktok" maxlength="25" placeholder="Introduce tu cuenta de Tiktok" value="<?php echo $tiktok;?>">

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
      </form>
    </div>

    <?php
      include("processProfile.php")
    ?>

  </body>

  <script src="../../../public/assets/js/changeProfileImage.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  $("#input-username").change(function(){
      const campo = $("#input-username"); // referencia jquery al campo
      campo[0].setCustomValidity(""); // limpia validaciones previas 

      // validación html5, porque el campo es <input type="email" ...>
      const usernameValido = campo[0].checkValidity();
      if (usernameValido && usernameValidation(campo.val())) {
          // el correo es válido y acaba por @ucm.es
          //Añanimos el html del icono y lo ponemos en color verde
          $("#iconoUsername").html("&#x2714;");
          $("#iconoUsername").css("color", "green");

          campo[0].setCustomValidity("");
      } else { 
          // correo invalido: ponemos una marca y nos quejamos
          // Añadimos el html del icono y lo ponemos en color rojo
          $("#iconoUsername").html("&#x26a0;");
          $("#iconoUsername").css("color", "red");

          // <-- aquí pongo la marca apropiada, y quito (si la hay) la otra
          // y pongo un mensaje como no-válido
          campo[0].setCustomValidity("El nombre de usuario debe tener mínimo 4 letras");
      }
  });

  function usernameValidation(username) {
    return (username.length >= 4);
  }

  $("#input-email").change(function(){
    const campo = $("#input-email"); // referencia jquery al campo
    campo[0].setCustomValidity(""); // limpia validaciones previas 

    const emailValido = campo[0].checkValidity();
    if (emailValido && emaileValidation(campo.val())) {
        //El correo es válido
        //Añanimos el html del icono y lo ponemos en color verde
        $("#emailIcon").html("&#x2714;");
        $("#emailIcon").css("color", "green");

        campo[0].setCustomValidity("");
    } else if (!emailValido){ 
        // correo invalido: ponemos una marca y nos quejamos
        // Añadimos el html del icono y lo ponemos en color rojo
        $("#emailIcon").html("&#x26a0; El correo es inválido");
        $("#emailIcon").css("color", "red");

        // <-- aquí pongo la marca apropiada, y quito (si la hay) la otra
        // y pongo un mensaje como no-válido
        campo[0].setCustomValidity("El correo debe incluir el carácter @");
        campo.val("");
    }
    else if (!emaileValidation(campo.val())){ 
        // correo invalido: ponemos una marca y nos quejamos
        // Añadimos el html del icono y lo ponemos en color rojo
        $("#emailIcon").html("&#x26a0; Formato del correo inválido");
        $("#emailIcon").css("color", "red");

        // <-- aquí pongo la marca apropiada, y quito (si la hay) la otra
        // y pongo un mensaje como no-válido
        campo[0].setCustomValidity("El correo debe acabar en .es o .com");
        campo.val("");
    }
  });

  function emaileValidation(email) {
    const regex = /^[^\s@]+@[^\s@]+\.(com|es)$/;
    return regex.test(email);
  }
  </script>

</html>