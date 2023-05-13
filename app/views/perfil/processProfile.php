<?php
require_once '../../controllers/usuarioController.php';
require_once '../../controllers/notificationController.php';

session_start();

$usuarioController = new UsuarioController();
$notificationController = new NotificationController();

// Comprobamos si el formulario ha sido enviado 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtenemos la informacion introducida
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $genero = $_POST['genero'];
    $descripcion = $_POST['descripcion'];

    //Comprobamos que se ha cogido bien la foto
    if (isset($_FILES['foto'])){
        // Cogemos la información de la imagen (si no se ha seleccionado imagen se deja la que estaba antes)
        if ($_FILES['foto']['name'] != "") {
            // Obtener el nombre original de la imagen y eliminar caracteres no permitidos
            $nombreFoto = $_FILES['foto']['name'];
            $nombreFoto = preg_replace("/[^a-zA-Z0-9._-]/", "", $nombreFoto);
            // Reemplazar los espacios en blanco del nombre de la imagen por guiones bajos
             $nombreFoto = str_replace(" ", "_", $nombreFoto);
        } else {
            $nombreFoto = $usuarioExistente->getFotoPerfil();
        }

        $tipoFoto = $_FILES['foto']['type'];
        $tamanoFoto = $_FILES['foto']['size'];
        $tempFoto = $_FILES['foto']['tmp_name'];

        //Comprobamos que la imagen es válida
        if (($tipoFoto == 'image/jpeg' || $tipoFoto == 'image/png' || $tipoFoto == 'image/gif') && $tamanoFoto <= 5000000) {
            // Movemos la foto a la carpeta con todas las fotos de perfiles
            $ruta = $_SERVER['DOCUMENT_ROOT'].'/LoBeat/public/assets/img/profilePhotos/'.$nombreFoto;
            copy($tempFoto, $ruta);
        }

    } else {
        ?>
        <div class = "error">
            <p> La foto no se ha guardado bien  </p> 
        </div>
        <?php
        exit;
    }


    $usuarioExistente = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);

    if ($usuarioExistente !== null) {

        // Creamos los datos para la notificación de modificación de perfil
        $datosNotificacion = array(
            'userId' => $usuarioExistente->getId(),
            'name' => 'Tú',
            'description' => 'Has modificado el perfil',
            'icon' => 'correct_operation.png',
            'read' => false
        );

        $resultado2 = $notificationController->crearNotificacion($datosNotificacion);

        // Actualizamos el usuario con los nuevos datos
        $datos = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'genero' => $genero,
            'descripcion' => $descripcion,
            'fotoPerfil' => $nombreFoto
        );

        $resultado = $usuarioController->actualizarUsuario($_SESSION["logged_user_id"], $datos);

        // Si se ha insertado correctamente, redirigir a la página de login
        if ($resultado !== null) {
            echo "<script>window.location='profile.php';</script>";
            exit;
        }
    }

}
?>