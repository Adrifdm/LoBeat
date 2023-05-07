<?php
use MongoDB\Tests\GridFS\BucketFunctionalTest;
session_start();

if($_SESSION["is_logged"] != true){
    header('Location: ../perfil/logout.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" >
  
    <head>

        <meta charset="UTF-8">
        <title> Display playlists </title>

        <link rel="stylesheet" href="../../../public/assets/css/displayPlaylists.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../public/assets/css/notifications.css">

        <script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>

        
    </head>

    <body>

        <?php
            require("../comun/cabecera.php");
            require_once '../../controllers/usuarioController.php';
            require_once '../../controllers/notificationController.php';

            $usuarioController = new UsuarioController();
            $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
            $notificationController = new NotificationController();
        ?>

        <div class="main-container">

            <!-- Sección izquierda de la página -->
            <div class="left-section">

                <br>
                <h1>Notificaciones</h1>
                <hr>

            </div>

            <!-- Sección derecha de la página -->
            <div class="right-section">

                <?php

                    $notifications = $notificationController->listarNotificacionesPorUserId($usuarioExistente->getId());

                    //Para revisar si hay notificaciones y si no hay mostrar mensaje
                    $hayNotificaciones = false;

                    $notificationIds = [];

                    foreach($notifications as $notification){
                        array_push($notificationIds, $notification->getId());
                        if (!$notification->getRead()){
                            $hayNotificaciones = true;
                            ?>
                                
                                <div>
                                    <div class="notification">
                                    <div class="icon-container">
                                        <img src= "../../../public/assets/img/<?php echo $notification->getIcon(); ?>" alt="Icono de notificación">
                                    </div>
                                    <div class="info-container">
                                        <p class="sender"> <?php echo $notification->getName(); ?></p>
                                        <p class="type"> <?php echo $notification->getDescription(); ?></p>
                                    </div>
                                    <div class="button-container">
                                        <button onclick="deleteNotification('<?php echo $notification->getId(); ?>')" class="view-button">Marcar como vista</button>
                                    </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                    if (!$hayNotificaciones): ?>
                        <div class="mensaje-inicial">
                            <h1>
                                Vaya! Parece que no tienes ninguna notificación
                            </h1>
                        </div>
                    <?php else: 
                    ?>

                        <div id="deleteAll" class="button-container">
                            <button onclick="deleteNotifications('<?php echo htmlspecialchars(json_encode($notificationIds)); ?>')" class="view-button">Marcar todas como vistas</button>
                        </div>

                    <?php endif;
                ?>

            </div>
        </div>

        <script>

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

            function deleteNotifications(idList){
                var notificationsArray = JSON.parse(idList);
                $.ajax({
                url: '../comun/readNotification.php',
                type: 'POST',
                data: {id: notificationsArray},
                success: function(response) {
                    location.reload();
                }
                });
            }

        </script>

    </body>


</html>