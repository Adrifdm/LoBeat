
<html lang="en" >
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/reg_log.css" rel="stylesheet">
</head>
<body>
<div class= "fondo">
  <div class="login-box">
   <img class ="logo"src= "img/LogoLB.png">
    <h2>Login</h2>
    <form method="post" action="procesarLogin.php">

      <div class="user-box">
        <label>Usuario/email</label>
        <input type="text" name="username" required="">
      </div>
      <div class="user-box">
        <label>Contraseña</label>
        <input type="password" name="password" required="">
        
      </div>
      <p> Si no tienes una cuenta &nbsp;<a class = "noreg" href = "register.php">Registrate </a></p>
        <br>
        
      

      <a class = "sig" href="index.php">
      <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Login">
         
      </a>

    </form>
  </div>
</div>
</body>

</html>
