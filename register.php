<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/reg_log.css" rel="stylesheet">
</head>
<body>
<div class= fondo>
  <div class="login-box">
   <img class ="logo"src= "img/LogoLB.png">
    <h2>Sing up</h2>
    <form action="registerproc.php" method="post">
      <div class="user-box">
        <!-- <input type="text" name="" required=""> -->
        <input type="text" id="name" name="name"><br><br>
        <label>Usuario</label>
      </div>
      <div class="user-box">
        <!-- <input type="text" name="" required="">-->
        <input type="email" id="email" name="email">
        <label>Email</label>
      </div>
      <div class="user-box">
        <!-- <input type="password" name="" required="">-->
        <input type="password" id="password" name="password">
        <label>Contraseña</label>
      </div>
      <div class="user-box">
        <input type="password" id="repassword" name="repassword">
        <label>Repetir Contraseña</label>
      </div>
      
      <a class="sig"><!-- href="login.php" -->
          
        <input type="submit" value="Siguiente">
        
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </a>
    </form>
  </div>
</div>
</body>
</html>
