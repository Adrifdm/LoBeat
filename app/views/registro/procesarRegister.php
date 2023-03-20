<?php
require_once __DIR__.'../../../controllers/usuarioController.php';
require_once __DIR__.'../../../controllers/spotifyController.php';

session_start();
if (isset($_GET['registered'])){
    if($_GET['registered'] === "1"){
        $registered = true;
    } else{
        $registered = false;
    }
} else {
    $registered = false;
}

// Creamos instancias de los controladores que vamos a usar
$usuarioController = new UsuarioController();
$spotifyController = new SpotifyController(); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos la informacion introducida
    $_SESSION['nombre'] = $_POST['name'];
    $_SESSION['correo'] = $_POST['email'];
    $_SESSION['constrasenya'] = $_POST['password'];
    $_SESSION['reconstrasenya'] = $_POST['repassword'];
    $_SESSION['role'] = $_POST['role'];
    $_SESSION['genero'] = $_POST['genero'];
    // Comprobamos si existe algún usuario con ese correo
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION['correo']);
    
    if ($usuarioExistente !== null) {
        ?>
        <div class = "error">
            <p> El email introducido ya existe </p>
        </div>
        <?php
        exit;
    }

    // Comprobamos si la contraseña coincide con la del campo "Repetir contraseña"
    if ($_SESSION['constrasenya'] == $_SESSION['reconstrasenya']){
        //$hash = password_hash($password, PASSWORD_DEFAULT);  esto esta bien pensado pero lo dejamos comentado de momento
    } else {
        ?>
        <div class = "error">
            <p> Las contraseñas introducidas no son iguales</p>
        </div>
        <?php
        exit;

    }

    // Antes de añadir la cuenta a la bd hay que hacer que primero el usuario se autentifique también en spotify
    $spotifyController->autenticarUsuario();
}
else if ($registered === true){

    $accessToken = $_SESSION['spotify_access_token'];
    $refreshToken = $_SESSION['spotify_refresh_token'];

    // Insertamos la información del nuevo usuario
    $datos = array(
        'nombre' => $_SESSION['nombre'],
        'correo' => $_SESSION['correo'] ,
        'contrasenya' => $_SESSION['constrasenya'], 
        'spotify_access_token' => $accessToken,
        'spotify_refresh_token' => $refreshToken,
        'fsa_creacion' => date('Y-m-d H:i:s'),
        'fecha_actualizacion' => date('Y-m-d H:i:s'),
        'role' => $_SESSION['role'],
        'genero' => $_SESSION['genero']
    );
    $resultado = $usuarioController->crearUsuario($datos);

    session_destroy();

    // Si se ha insertado correctamente, redirigir a la página de login
    if ($resultado !== null) {
        ?>
        <div class = "success">
            <p> El registro ha sido completado con exito</p>
        </div>
        <?php

        header('Location: login.php');
        exit;

    } else {
        ?>
        <div class = "error">
            <p> Ha ocurrido un error al registrar el usuario </p> 
        </div>       
    <?php
        exit;

    }
}

?>
