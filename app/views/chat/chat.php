<?php
	session_start();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    } 
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mapa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link rel="stylesheet" href=" https://unpkg.com/openlayers@4.6.5/dist/ol.css">
    <link rel="stylesheet" href="../../../public/assets/css/mapa.css">
    <link rel="stylesheet" href="../../../public/assets/css/chat.css">
    
    <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


</head>
<body>
    <?php
		require("../comun/cabecera.php");
	?>
<div class="app-container">
<?php
require("../comun/mapa.php")
?>
  <div class="app-main">
    <div class="chat-wrapper">
      <div class="message-wrapper reverse">
        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
           Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur
          </div>
        </div>
      </div>
      <div class="message-wrapper reverse">
        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
      </div>
      <div class="message-wrapper">
        <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur
          </div>
        </div>
      </div>
      <div class="message-wrapper">
        <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit 
          </div>
        </div>
      </div>
      <div class="message-wrapper reverse">
        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Lorem ipsum dolor sit amet
          </div>
        </div>
      </div>
      <div class="message-wrapper reverse">
        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Lorem ipsum dolor
          </div>
        </div>
      </div>
      <div class="message-wrapper">
        <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit
          </div>
        </div>
      </div>
      <div class="message-wrapper">
        <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit
          </div>
        </div>
      </div>
      <div class="message-wrapper">
        <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Lorem ipsum dolor sit amet
          </div>
        </div>
      </div>
    <div class="message-wrapper reverse">
        <img class="message-pp" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile-pic">
        <div class="message-box-wrapper">
          <div class="message-box">
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
      </div>
    </div>
    <div class="chat-input-wrapper">
      <button class="chat-attachment-btn">
      </button>
      <div class="input-wrapper">
        <input type="text" class="chat-input" placeholder="Introduzca su mensaje aqui">
      </div>
      <button class="chat-send-btn">Send</button>
    </div>
  </div>
<!-- partial -->
  <script  src="./script.js"></script>



    
    <?php
		//require("../comun/rep.php");
	?>
</body>

</html>
