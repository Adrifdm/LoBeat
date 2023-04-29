<?php
require_once '../../controllers/chatController.php';
require_once '../../controllers/usuarioController.php';
	session_start();
  $chatController = new ChatController();
  $userController = new UsuarioController();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    }else{
      $chats = $chatController->buscarChatPorCampo('owner.id', $_SESSION['logged_user_id']);
      //$chats = $chatController->listarChats();
    }
    
?>
<?php
if (isset($_POST['crearChat'])) {
  $p1 = '643bda7e621ceff0d9064c54';
  $p2 = '64441f6001e06de257011ebe';
  $datosChat = array('chat_participante1' => $p1, 'chat_participante2' => $p2);
  $chatController->crearChat($datosChat);
}
if (isset($_POST['crearChat2'])) {
  $p1 = '643bda7e621ceff0d9064c54';
  $p2 = '644cefbca2c5f2acb3008854';
  $datosChat = array('chat_participante1' => $p1, 'chat_participante2' => $p2);
  $chatController->crearChat($datosChat);
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ChatList</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link rel="stylesheet" href=" https://unpkg.com/openlayers@4.6.5/dist/ol.css">
    <link rel="stylesheet" href="../../../public/assets/css/mapa.css">
    <link rel="stylesheet" href="../../../public/assets/css/chatlist.css">
    
    <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


</head>
<body>
    <?php
		require("../comun/cabecera.php");
    ?>
    
    
    <div class="app-container">
    <?php
        require("../comun/mapa.php");
	?>
    <div class="app-right">
      <div class="chat-list-wrapper">
        <ul class="chat-list active">
        <?php foreach ($chats as $index => $chat): ?>
          <a class = "chat_index" href="chat.php?chat=<?php echo $index ?>">
          <li class="chat-list-item" >
            <img src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
            <span class="chat-list-name"> 
              <?php
                 $participante2 = $chat->getParticipants()[1];
                 $usuario = $usuarioController->obtenerUsuarioPorId($participante2);
                 echo $usuario.getNombre();
              ?>
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
          </li>
          </a>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <form action="chatlist.php" method="POST">
        <button type="submit" name="crearChat">Crear chat</button>
    </form>
    <form action="chatlist.php" method="POST">
        <button type="submit" name="crearChat2">Crear chat 2</button>
    </form>
    <?php
		//require("../comun/rep.php");
	?>
</body>
<script>
        const links = document.querySelectorAll('.chat_index');

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // para prevenir el comportamiento por defecto del enlace
                
                /* ESTO ES LO DEL ICONO EN LA PLAYLIST SELECCIONADA (NO FUNCIONA DE MOMENTO)
                // eliminar la clase "active" de todos los enlaces
                links.forEach(link => {
                    link.querySelector('h4').classList.remove('active');
                });
                // agregar la clase "active" al enlace que se ha hecho clic
                this.querySelector('h4').classList.add('active');
                */

                // obtener el índice de la playlist seleccionada
                const index = Array.from(links).indexOf(this);
                
                // redirigir a la página con el índice de la playlist seleccionada como parámetro en la URL
                window.location.href = `chat.php?chat=${index}`;
            });
        });
    </script>

</html>