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