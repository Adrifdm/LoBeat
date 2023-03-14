<html lang="en">

  <head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../public/assets/css/reg_log.css" rel="stylesheet">
  </head>

  <body>
    <div class= fondo>
      <div class="login-box">
        <img class ="logo" src= "../../public/assets/img/LogoLB.png"></img>
        <h2>Sing up</h2>
        <form action="procesarRegister.php" method="post">
          <div class="user-box">
            <input type="text" id="name" name="name" required="">
            <label>Nombre</label>
          </div>
          <div class="user-box">
            <input type="email" id="email" name="email" required="">
            <label>Email</label>
          </div>
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
    </div>
  </body>

</html>
