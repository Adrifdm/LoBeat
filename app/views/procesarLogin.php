<html lang="en" >

  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../public/assets/css/reg_log.css" rel="stylesheet">
  </head>

  <body>
<?php

session_start();

require_once '../controllers/usuarioController.php';

// Crear una instancia de UsuarioController

$usuarioController = new UsuarioController();

// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtenemos la informacion introducida
    $correo = $_POST['email'];
    $contrasenya = $_POST['password'];

    // Comprobamos si existe algún usuario con ese correo
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);
    
    if ($usuarioExistente !== null) {

        // Comprobamos si se ha introducido la contraseña correcta
        $contrasenyaCorrecta = $usuarioExistente->getContrasenya();

        if ($contrasenya != $contrasenyaCorrecta) {
            ?>
            <div class = "error">
                <p>La contraseña introducida no es correcta </p>
            </div>
            <?php
            exit;
        }

        //para ver si el usuario esta logeado durante el resto de la aplicacion
        $_SESSION["login"] = true;
    
        //lo que vamos a usar durante el resto de la aplicacion para buscar info del usuario loggeado
        $_SESSION["SesionEmail"] = $correo;

        //falta por ver cmo hacemos para que una persona se logee como administrador
        //$_SESSION["isAdmin"] 

        header('Location: pagPrincipal.php');       
        exit;

    } else {
        ?>
        <div class = "error">
            <p> El correo es inválido</p>
        </div>
            <?php
        exit;        
    }

}
?>
</body>
</html>