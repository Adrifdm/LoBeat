<html lang="en" >

  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../public/assets/css/reg_log.css" rel="stylesheet">
  </head>

  <body>
<?php
require_once '../controllers/usuarioController.php';

// Crear una instancia de UsuarioController

$usuarioController = new UsuarioController();

// Comprobamos si el formulario ha sido enviado 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtenemos la informacion introducida
    $nombre = $_POST['username'];

    //El correo lo cojo de la sesión para que no me deje cambiarlo porque no he puesto control para ver si el correo ya existe
    $correo = $_SESSION["logged_user_email"];

    if (isset($nombre) && isset($correo)){
        // Comprobamos si existe algún usuario con ese correo
        //TODO cambiar la busqueda por id cuando funcione
        $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);

        if ($usuarioExistente !== null){
            $datos = array(
                'nombre' => $nombre,
                'correo' => $correo,
                'contrasenya' => $usuarioExistente->getContrasenya(), // mas alante tendremos que almacenar aqui el hash de la contraseña y no la propia contraseña
                'spotify_access_token' => $usuarioExistente->getSpotify_access_token(),
                'spotify_refresh_token' => $usuarioExistente->getSpotify_refresh_token(),
                'fsa_creacion' => $usuarioExistente->getFecha_creacion(),
                'fecha_actualizacion' => date('Y-m-d H:i:s'),
                'role' => $usuarioExistente->getRole(),
                'genero' => $usuarioExistente->getGenero()
            );
            
            //TODO actualizar por id, comentado para que no pete
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