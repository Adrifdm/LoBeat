<!DOCTYPE html>
<html lang="en" >

  <head>
    <meta charset="UTF-8">
    <title>CodePen - Responsive Mega Menu - Navigation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
    <!--<link rel="stylesheet" href="../../../public/assets/css/adminActions.css">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--<link rel="stylesheet" href="../../../public/assets/css/notifications.css">-->

    <script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>
  </head>

  <body>

    <?php
      require_once '../../controllers/usuarioController.php';
      require_once '../../controllers/notificationController.php';

      // Crear una instancia de UsuarioController
      $usuarioController = new UsuarioController();

      $usuarioExistente = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);

      if ($usuarioExistente->getRole() == 'Admin') {
        $rolAdmin = true;
      } else {
        $rolAdmin = false;
      }

      // // Comprobamos si existe algún usuario con ese correo
      // // mas adelante se cambiara por el id
      // $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
      // $notificationController = new NotificationController();
      
      // $rolUsuario = $usuarioExistente->getRole();

      // $notisPendientes = false;

      // foreach($notificationController->listarNotificacionesPorUserId($usuarioExistente->getId()) as $notification){

      //   //pongo el booleano a true para llevarmelo al icono de notificaciones y mostrar un * si hay notif pendientes

      //   if (!$notification->getRead()){
        
      //     $notisPendientes = true;
        
      //   }
      // }
    ?>

    <!-- partial:index.partial.html -->
    <div id="cabecera-header">

      <div class="LoBeat">
        <a href="../principal/pagPrincipal.php">
          LoBeat
        </a>
      </div>

      <nav class="cabeceraDerecha">

        <ul>
          <?php if ($rolAdmin == true): ?>
          <li>
            <a class="opcionAdmins" href="../admins/manageUsers.php">
              
              <i class="bi bi-gear-wide"></i>

              <span class= "tooltip-box">Administrador</span>

              <script>

                // Obtener el botón de administrador
                var adminButton = document.getElementById('admin-button');

                //obtener la variable del rol del php de arriba donde se coge el usuario por correo
                var miVariable = "<?= $rolUsuario ?>";

                // Verificar si el usuario es administrador
                if (miVariable == "Admin") {

                  // Si el usuario es administrador, mostrar el botón
                  adminButton.style.display = 'block';
                } else {
                  // Si el usuario no es administrador, ocultar el botón
                  adminButton.style.display = 'none';
                }

              </script>

            </a>
          </li>
          <?php endif; ?>

          <li>
            <a class="opcionMenu"> 
              <i class="bi bi-list"></i>
              <span class= "tooltip-box">Menu</span>
            </a>

            <ul class="dropdown">

              <li>

                <a href="../../views/playlists/displayPlaylists.php">
                  <i class="bi bi-music-note-list"></i>
                  <span class= "tooltip-box">Playlists</span>
                </a>
                
              </li>

              <li>
                <a href="../../views/chat/chatlist.php">
                  <i class="bi bi-chat-dots"></i>
                  <br>
                  <span class= "tooltip-box">Chat</span>
                </a>
              </li>

            </ul>

          </li>

          <!-- <li>

            <a href=""><i class="bi bi-bell-fill notiButt"></i>
            
              <span id = "hayNotis" class="badge">*</span>

              <script>
                  
                //cojo elemento del boton
                var notiButton = document.getElementById('hayNotis');

                //var php booleana
                var hay = "<//?=$notisPendientes ?>";

                // Ver si el usuario tiene alguna notificacion  sin leer
                
                if (hay) {
                  notiButton.style.display = 'block';

                } else {
                  
                  notiButton.style.display = 'none';
                }
                
              </script>
            
            </a>

            <ul>
              <li><a href="../../views/notificaciones/displayNotifications.php">Notificaciones</a></li>
            </ul>

          </li> -->

          <li>
          
            <a class="opcionPerfil" href="../perfil/profile.php"> 

              <i class="bi botperfil bi-person-fill"> </i>
              <span class= "tooltip-box">Perfil</span>

            </a>

          </li>

          <li>
            <a class="tooltip" href="../perfil/logout.php">
              
              <i class="bi bi-box-arrow-left"></i>
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

      //La función pasa el id con ajax para que desde readNotification.php se modifique el campo "leido" y se deje de ver la notificación
      function deleteNotification(id){
        $.ajax({
          url: '../comun/readNotification.php',
          type: 'POST',
          data: {id: id},
          success: function(response) {
            location.reload();
          }
        });
      }

    </script>
    
  </body>

</html>