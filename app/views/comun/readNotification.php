<?php
session_start();

if($_SESSION["is_logged"] !== true){

    header('Location: logout.php'); 

    exit;
} 

require_once '../../controllers/usuarioController.php';

// Crear una instancia de UsuarioController
$usuarioController = new UsuarioController();

// Comprobamos si existe algún usuario con ese correo
//mas adelante se cambiara por el id
$usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);

$id = $_POST['id'];

$datos = [];
foreach($usuarioExistente->getNotifications() as $not){
    if ($not["id"] == $id){
    $not["leido"] = true;
    }
    array_push($datos, $not);
}

$datosFinales = array(
    'nombre' => $usuarioExistente->getNombre(),
    'correo' => $usuarioExistente->getCorreo(),
    'contrasenya' => $usuarioExistente->getContrasenya(), // mas alante tendremos que almacenar aqui el hash de la contraseña y no la propia contraseña
    'spotify_access_token' => $usuarioExistente->getSpotify_access_token(),
    'spotify_refresh_token' => $usuarioExistente->getSpotify_refresh_token(),
    'fsa_creacion' => $usuarioExistente->getFecha_creacion(),
    'fecha_actualizacion' => $usuarioExistente->getFecha_actualizacion(),
    'role' => $usuarioExistente->getRole(),
    'genero' => $usuarioExistente->getGenero(),
    'descripcion' => $usuarioExistente->getDescripcion(),
    'fotoPerfil' => $usuarioExistente->getFotoPerfil(),
    'notifications' => $datos
);

$resultado = $usuarioController->actualizarUsuario($_SESSION["logged_user_id"], $datosFinales);

?>