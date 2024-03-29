
<?php
	session_start();

    //limpiamos variables de sesion
    //tambien hay que hacelo aunque sea la pagina de login

    $_SESSION["is_logged"] = false;

    $_SESSION["logged_user_email"] = null;

    $_SESSION["logged_user_id"] = null;
    $_SESSION["logged_user_role"] = null;

  //antes de empezar una nueva sesion destruimos por si acaso
  session_destroy();      
    
?>

<html lang="en" >

  <head>
    <title>LoBeat - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../public/assets/css/login.css" rel="stylesheet">
  </head>

  <body>
    <div class="LoBeat">
      <a href="../../../public/index.html">
        LoBeat
      </a>
    </div>

    <div class="login-box">
      <h2>Login</h2>
      <form method="post">
        <div class="user-box">
          <input type="email" name="email" required="">
          <label>Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="">
          <label>Contraseña</label>
        </div>
        <p> Si no tienes una cuenta &nbsp;<a class = "noreg" href = "register.php">Registrate </a></p>
        <a class = "sig">
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
      include("procesarLogin.php")
    ?>
  </body>

</html>