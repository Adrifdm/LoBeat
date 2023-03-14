<?php
require_once '../controllers/usuarioController.php';

// Crear una instancia de UsuarioController
$usuarioController = new UsuarioController();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtenemos la informacion introducida
    $correo = $_POST['email'];
    $contrasenya = $_POST['password'];

    // Comprobamos si existe algún usuario con ese correo
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);
    
    if ($usuarioExistente !== null) {

        // Comprobamos si se ha introducido la contraseña correcta
        $contrasenyaCorrecta = $usuarioController->obtenerUsuarioPorId($usuarioExistente->getId());

        if ($contrasenya != $contrasenyaCorrecta) {
            echo "La contraseña introducida no es correcta";
        }

        header('Location: pagPrincipal.php');       
        exit;

    } else {
        echo "El correo es inválido";
        exit;        
    }

}
?>
