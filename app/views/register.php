<html lang="en">

  <head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../public/assets/css/reg_log.css" rel="stylesheet">
  </head>

  <body>
      <div class="login-box">
        <img class ="logo" src= "../../public/assets/img/LogoLB.png"></img>
        <h2>Regístrate</h2>
        <form  method="post">

          <div class="user-box">
            <input type="text" id="name" name="name" required="">
            <label>Nombre</label>
          </div>

          <div class="user-box">
            <input type="email" id="email" name="email" required="">
            <label>Email</label>
          </div>
          
          <div class="user-box">

            <label for="role">Selecciona un rol de usuario:</label>

            <br><br>

            <select name="role" id="role" required="">
              <option value="Admin">Administrador</option>
              <option value="User">Usuario</option>
              <option value="Empresa">Empresa</option>
            </select>

            <!-- <input type="role" id="role" name="role" required=""> 

            <label>Rol</label>-->

          </div>
          
          <div class="user-box">

            <label for="genero">Selecciona un sexo:</label>

            <br><br>

            <select name="genero" id="genero" required="">
                <option value="Mujer">Mujer</option>
                <option value="Hombre">Hombre</option>
                <option value="Otro">Otro</option>
            </select>

          </div>

          <!--<div class="user-box">
            <input type="genero" id="genero" name="genero" required="">
            <label>Género</label>
          </div>
          -->

          <div class="user-box">
            <input type="password" id="password" name="password" required="">
            <label>Contraseña</label>
          </div>

          <div class="user-box">
            <input type="password" id="repassword" name="repassword" required="">
            <label>Repetir Contraseña</label>
          </div>
          
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
