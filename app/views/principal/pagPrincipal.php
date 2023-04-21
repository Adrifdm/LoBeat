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
    
    <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>
<body>
    <?php
		require("../comun/cabecera.php");
        require("../comun/mapa.php")
	?>
    
    <?php
		//require("../comun/rep.php");

        if (isset($_POST['crearChat'])) {
            require_once '../../../app/services/chatService.php';
            $chatService = new ChatService();
            $datos = array(
                'chat_participante1' => 'juanito',
                'chat_participante2' => 'pepito'
            );
            $chatID = $chatService->crearChat($datos);
            $chatDATOS1 = array(
                'content' => 'hola guapa',
                'remitente' => 'aaaa',
                'destinatario' => 'bbbb'
            );
            $chatDATOS2 = array(
                'content' => 'eeeyyy',
                'remitente' => 'aaaaAA',
                'destinatario' => 'bbbbBB'
            );
            $chatService->crearMensaje($chatID, $chatDATOS1);
            $chatService->crearMensaje($chatID, $chatDATOS2);
            //
            $chatID = $chatService->crearChat($datos);

            $chatService->crearMensaje($chatID, $chatDATOS1);
            $hhh = $chatService->crearMensaje($chatID, $chatDATOS2);

            $chatService->eliminarMensaje($chatID, $hhh['id']);
        }
	?>

    <form action="" method="post">
        <button type="submit" name="crearChat">Crear Chat</button>
    </form>

</body>

</html>