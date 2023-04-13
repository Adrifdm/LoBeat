<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Mega Menu - Navigation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="../../../public/assets/css/notifications.css">

<script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>


</head>
<body>
  <?php
    require_once '../../controllers/usuarioController.php';

    // Crear una instancia de UsuarioController
    $usuarioController = new UsuarioController();

    // Comprobamos si existe algún usuario con ese correo
    //mas adelante se cambiara por el id
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
    
  ?>

<!-- partial:index.partial.html -->
<div id="header">
  <div class="logo">
    <img class ="logo"src= "../../../public/assets/img/logo.png">
  </div>  
  <nav>
    
    <ul>
    <li>
        <a class="tooltip" href="../principal/pagPrincipal.php">
          
          <i class="fa fa-home"></i>
          <span class= "tooltip-box">Inicio</span>
      
        </a>

    </li>

    <li class="dropdown">
        <a href=""><i class="bi bi-list"></i></a>
          <ul>
            <li><a href="../../spotifyAPI/llamadas/datosUsuario.php">Canciones</a></li>
            <li><a href="../../spotifyAPI/llamadas/playlistsUsuario.php">MatchList</a></li>
            <li><a href="../../views/playlists/playlistMenu.php">Playlists</a></li>
          </ul>        
      </li>
      <li class="dropdown">
        <a href=""><i class="bi bi-bell-fill"></i></a>
          <ul>
            <?php

            foreach($usuarioExistente->getNotifications() as $notification){
              echo "<li>
                <div>
                  <div class='notification'>
                    <div class='icon-container'>
                        <img src= '../../../public/assets/img/".$notification["icono"]."' alt='Icono de notificación'>
                    </div>
                    <div class='info-container'>
                        <p class='sender'>".$notification['nombre']."</p>
                        <p class='type'>".$notification["descripcion"]."</p>
                    </div>
                    <div class='button-container'>
                        <button onclick='deleteNotification()' class='view-button'>Marcar como vista</button>
                    </div>
                  </div>
                </div>
              </li>";
            }
            ?>
          </ul>        
      </li>
          
      <li>
      
        <a class="tooltip" href="../perfil/profile.php"> 

          <i class="bi botperfil bi-person-fill"> </i>
          <span class= "tooltip-box">Perfil</span>

        </a>
    

        <a class="tooltip" href="../perfil/logout.php">
          
          <i class="fa botlogout fa-power-off"></i>
          <span class= "tooltip-box">Cerrar sesión</span>

        </a>

      </li>
   
    </ul>
    
  </nav>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
$('#header').prepend('<div id="menu-icon"><span class="first"></span><span class="second"></span><span class="third"></span></div>');
	
	$("#menu-icon").on("click", function(){
    $("nav").slideToggle();
    $(this).toggleClass("active");
});

  function deleteNotification(){

  }

  </script>
   
</body>
</html>