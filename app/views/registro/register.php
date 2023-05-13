<html lang="en">

  <head>
    <title>LoBeat - Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../public/assets/css/register.css" rel="stylesheet">
  </head>

  <body>
    <div class="LoBeat">
      <a href="../../../public/index.html">
        LoBeat
      </a>
    </div>


    <div class="login-box">
      <h2>Regístrate</h2>
      <form  method="post">

        <div class="user-box">
          <input type="text" id="name" name="name" required=""><span id="iconoNombre" class="restrictionIcon"></span>
          <label>Nombre</label>
        </div>

        <div class="user-box">
          <input type="email" id="email" name="email" required=""><span id="emailIcon" class="restrictionIcon"></span>
          <label>Email</label>
        </div>
        
        <!-- Seleccion que permite elegir el rol (deshabilitada para la versión final) -->
        <!-- <div class="user-box">
          <label for="role">Selecciona un rol de usuario:</label>
          <br><br>

          <select name="role" id="role" required="">
            <option value="Admin">Administrador</option>
            <option value="User">Usuario</option>
          </select>
        </div> -->
        
        <div class="user-box">

          <label for="genero">Selecciona un sexo:</label>

          <br><br>

          <select name="genero" id="genero" required="">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Otro">Otro</option>
          </select>

        </div>

        <div class="user-box">
          <input type="password" id="password" name="password" required=""><span id="passwordIcon" class="restrictionIcon"></span>
          <label>Contraseña</label>
        </div>

        <div class="user-box">
          <input type="password" id="repassword" name="repassword" required=""><span id="repasswordIcon" class="restrictionIcon"></span>
          <label>Repetir Contraseña</label>
        </div>

        <p> ¿Ya tienes una cuenta? &nbsp;<a class = "noreg" href = "login.php">Inicia sesión</a></p>
        
        <a class="sig" type= "submit">
          <input type="submit" class = "next">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Siguiente
        </a>
      </form>
    </div>
    <?php
      include("procesarRegister.php")
    ?>
  </body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$("#name").change(function(){
    const campo = $("#name"); // referencia jquery al campo
    campo[0].setCustomValidity(""); // limpia validaciones previas 

    // validación html5, porque el campo es <input type="email" ...>
    const usernameValido = campo[0].checkValidity();
    if (usernameValido && usernameValidation(campo.val())) {
        // el correo es válido y acaba por @ucm.es
        //Añanimos el html del icono y lo ponemos en color verde
        $("#iconoNombre").html("&#x2714;");
        $("#iconoNombre").css("color", "green");

        campo[0].setCustomValidity("");
    } else { 
        // correo invalido: ponemos una marca y nos quejamos
        // Añadimos el html del icono y lo ponemos en color rojo
        $("#iconoNombre").html("&#x26a0; Mínimo 4 caracteres");
        $("#iconoNombre").css("color", "red");

        // <-- aquí pongo la marca apropiada, y quito (si la hay) la otra
        // y pongo un mensaje como no-válido
        campo[0].setCustomValidity("El nombre de usuario debe tener mínimo 4 caracteres");
        campo.val("");
    }
});

function usernameValidation(username) {
  return (username.length >= 4);
}

$("#email").change(function(){
    const campo = $("#email"); // referencia jquery al campo
    campo[0].setCustomValidity(""); // limpia validaciones previas 

    const emailValido = campo[0].checkValidity();
    if (emailValido && emaileValidation(campo.val())) {
        // el correo es válido y acaba por @ucm.es
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
  valid = true;
  if (!email.endsWith(".es") && !email.endsWith(".com"))
    valid = false;
  return valid;
}

$("#password").change(function(){
    const campo = $("#password"); // referencia jquery al campo
    campo[0].setCustomValidity(""); // limpia validaciones previas 

    // validación html5, porque el campo es <input type="email" ...>
    validPassword = campo[0].checkValidity();
    if (validPassword && passwordValidation(campo.val())) {
        // el correo es válido y acaba por @ucm.es
        //Añanimos el html del icono y lo ponemos en color verde
        $("#passwordIcon").html("&#x2714;");
        $("#passwordIcon").css("color", "green");

        campo[0].setCustomValidity("");
    } else { 
        // correo invalido: ponemos una marca y nos quejamos
        // Añadimos el html del icono y lo ponemos en color rojo
        $("#passwordIcon").html("&#x26a0; Mínimo 8 caracteres");
        $("#passwordIcon").css("color", "red");

        // <-- aquí pongo la marca apropiada, y quito (si la hay) la otra
        // y pongo un mensaje como no-válido
        campo[0].setCustomValidity("La contraseña debe tener mínimo 8 caracteres");
        campo.val("");
    }
});

function passwordValidation(password) {
  return (password.length >= 8);
}

$("#repassword").change(function(){
    const campo = $("#repassword"); // referencia jquery al campo
    const campo2 = $("#password");
    campo[0].setCustomValidity(""); // limpia validaciones previas 

    // validación html5, porque el campo es <input type="email" ...>
    validRepassword = campo[0].checkValidity();
    if (validRepassword && repasswordValidation(campo.val(), campo2.val())) {
        // el correo es válido y acaba por @ucm.es
        //Añanimos el html del icono y lo ponemos en color verde
        $("#repasswordIcon").html("&#x2714;");
        $("#repasswordIcon").css("color", "green");

        campo[0].setCustomValidity("");
    } else { 
        // correo invalido: ponemos una marca y nos quejamos
        // Añadimos el html del icono y lo ponemos en color rojo
        $("#repasswordIcon").html("&#x26a0; Las contraseñas no coinciden");
        $("#repasswordIcon").css("color", "red");

        // <-- aquí pongo la marca apropiada, y quito (si la hay) la otra
        // y pongo un mensaje como no-válido
        campo[0].setCustomValidity("Las contraseñas debe coincidir");
        campo2.val("");
        campo.val("");
    }
});

function repasswordValidation(repassword, password) {
  return (repassword == password);
}
</script>