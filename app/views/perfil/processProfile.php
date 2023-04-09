<html lang="en" >

  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../public/assets/css/reg_log.css" rel="stylesheet">
  </head>

  <body>
<?php
require_once '../../controllers/usuarioController.php';

// Crear una instancia de UsuarioController

$usuarioController = new UsuarioController();

// Comprobamos si el formulario ha sido enviado 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtenemos la informacion introducida
    $nombre = $_POST['username'];

    //El correo lo cojo de la sesión para que no me deje cambiarlo porque no he puesto control para ver si el correo ya existe
    $correo = $_SESSION["logged_user_email"];
    $genero = $_POST['genero'];
    
    $sobreMi = $_POST['descripcion'];

    //Comprobamos que se ha cogido bien la foto
    if (isset($_FILES['foto'])){
        // Cogemos la información de la imagen
        $nombreFoto = $_FILES['foto']['name'];
        $tipoFoto = $_FILES['foto']['type'];
        $tamanoFoto = $_FILES['foto']['size'];
        $tempFoto = $_FILES['foto']['tmp_name'];

        //Comprobamos que la imagen es válida
        if (($tipoFoto == 'image/jpeg' || $tipoFoto == 'image/png' || $tipoFoto == 'image/gif') && $tamanoFoto <= 5000000) {
            // Movemos la foto a la carpeta con todas las fotos de perfiles
            $ruta = $_SERVER['DOCUMENT_ROOT'].'/LoBeat/public/assets/img/profilePhotos/'.$nombreFoto;
            move_uploaded_file($tempFoto, $ruta);
        }

    }else{
        ?>
            <div class = "error">
                <p> La foto no se ha guardado bien  </p> 
            </div>       
        <?php
        exit;
    }

    if (isset($nombre) && isset($correo)){

        // Comprobamos si existe algún usuario con ese correo
        //cambiar la busqueda por id cuando funcione

        $usuarioExistente = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);
        //$usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
        
        if($usuarioExistente->getRole() == 'admin'){
            $role = $_POST['role'];
        }
        else{
            $role = $usuarioExistente->getRole();
            ?>
                    <div class = "error"> 
                        <p> No puedes cambiar el rol si no eres Administrador </p> 
                    </div>       
            <?php

        }

        if ($usuarioExistente !== null){
            $datos = array(
                'nombre' => $nombre,
                'correo' => $correo,
                'contrasenya' => $usuarioExistente->getContrasenya(), // mas alante tendremos que almacenar aqui el hash de la contraseña y no la propia contraseña
                'spotify_access_token' => $usuarioExistente->getSpotify_access_token(),
                'spotify_refresh_token' => $usuarioExistente->getSpotify_refresh_token(),
                'fsa_creacion' => $usuarioExistente->getFecha_creacion(),
                'fecha_actualizacion' => date('Y-m-d H:i:s'),
                'role' => $role,
                'genero' => $genero,
                'descripcion' => $sobreMi,
                'fotoPerfil' => $nombreFoto
            );
            
            //actualizar por id

            $resultado = $usuarioController->actualizarUsuario($_SESSION["logged_user_id"], $datos);
            //$resultado = $usuarioController->actualizarUsuarioPorCorreo($correo, $datos);

            // Si se ha insertado correctamente, redirigir a la página de login
            if ($resultado !== null) {
                ?>
                    <div class = "success">
                        <p> El registro ha sido completado con exito</p>
                    </div>
                <?php

                //header('Location: login.php');
                echo "<script>window.location='profile.php';</script>";
                exit;

            } else {
                ?>
                    <div class = "error"> 
                        <p> Ha ocurrido un error al registrar el usuario </p> 
                    </div>       
                <?php
                exit;
            }

            //header('Location: profile.php');
            //exit;
        }
        else{
            ?>
                <div class = "error">
                    <p> El usuario no se ha detectado bien</p> 
                </div>       
            <?php
            exit;    
        }
    }
    else{
        ?>
            <div class = "error">
                <p> El nombre no se ha cogido bien   </p> 
            </div>       
        <?php
        exit;
    }

}
?>
</body>
</html>