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
          <a href ="chat.php">
          <li class="chat-list-item" href ="chat.php">
            <img src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
          </li>
          </a>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1562788869-4ed32648eb72?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2552&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1583864697784-a0efc8379f70?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE1fHx8ZW58MHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
             <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1566465559199-50c6d9c81631?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="chat">
       
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1562788869-4ed32648eb72?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2552&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          <li class="chat-list-item">
            <img src="https://images.unsplash.com/photo-1583864697784-a0efc8379f70?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE1fHx8ZW58MHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60" alt="chat">
            <span class="chat-list-name">Roberto
            <p class = "subtitulo">  quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que
              pues el otro dia no se quepues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que pues el otro dia no se que  </p>
            </span>
            
          </li>
          </li>
        </ul>
      </div>
    </div>
    
    <?php
		//require("../comun/rep.php");
	?>
</body>

</html>