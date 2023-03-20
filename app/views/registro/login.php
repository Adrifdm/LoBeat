
<html lang="en" >

  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../public/assets/css/reg_log.css" rel="stylesheet">
  </head>

  <body>
      <div class="login-box">
        <img class ="logo"src= "../../../public/assets/img/LogoLB.png">
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
            <input type="submit"class = "next">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
          </a>
        </form>
      </div>
      <?php
          include("procesarLogin.php")
        ?>
  </body>

</html>