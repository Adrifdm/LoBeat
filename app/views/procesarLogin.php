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
            echo "La contraseña introducida no es correcta";
            exit;
        }

        header('Location: pagPrincipal.php');       
        exit;

    } else {
        echo "El correo es inválido";
        exit;        
    }

}
?>
