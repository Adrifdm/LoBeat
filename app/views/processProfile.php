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
    $correo = $_SESSION["SesionEmail"];

    if (isset($nombre) && isset($correo)){
        // Comprobamos si existe algún usuario con ese correo
        $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["SesionEmail"]);

        if ($usuarioExistente !== null){
            $datos = array(
                'nombre' => $nombre,
                'correo' => $correo,
                'fecha_actualizacion' => date('Y-m-d H:i:s')
                );
            
            $resultado = $usuarioController->actualizarUsuarioPorCorreo($correo, $datos);

            //header('Location: profile.php');
            exit;
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