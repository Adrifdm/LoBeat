<?php
require_once '../../../app/controllers/usuarioController.php';
require_once '../../../app/controllers/spotifyController.php';
require_once '../../../app/controllers/playlistsController.php';

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
$playlistsController = new PlaylistsController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos la informacion introducida
    $_SESSION['nombre'] = $_POST['name'];
    $_SESSION['correo'] = $_POST['email'];
    $_SESSION['constrasenya'] = $_POST['password'];
    $_SESSION['reconstrasenya'] = $_POST['repassword'];
    // $_SESSION['role'] = $_POST['role'];
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

    // Determinamos el rol del usuario en base a la información introducida
    if ($_SESSION['correo'] == 'LoBeat@admin.com' && $_SESSION['constrasenya'] == 'AplicacionesWeb') {
        $_SESSION['role'] = 'Admin';
    }
    else {
        $_SESSION['role'] = 'User';
    }

    // Comprobamos si la contraseña coincide con la del campo "Repetir contraseña" y si coincide encriptamos la contraseña antes de meterla a la bd
    if ($_SESSION['constrasenya'] == $_SESSION['reconstrasenya']){
        $_SESSION['constrasenya'] = password_hash($_SESSION['constrasenya'], PASSWORD_DEFAULT);
        $_SESSION['reconstrasenya'] = $_SESSION['constrasenya'];
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
        'fecha_creacion' => date('Y-m-d H:i:s'),
        'fecha_actualizacion' => date('Y-m-d H:i:s'),
        'role' => $_SESSION['role'],
        'genero' => $_SESSION['genero'],
        'descripcion' => 'Unas palabras sobre tí',
        'fotoPerfil' => 'profileAvatar.png',
        'latitud' => 0,
        'longitud' => 0,
        'spotify_ID' => '',     // Inicialmente el spotifyID de la base de datos se inicializa vacío (al llamar a obtenerSpotifyID necesitamos $_SESSION["logged_user_id"], y no podemos inicializarlo hasta crear el usuario en la bd)
        'nMatches' => 0,
        'nChats' => 0,
        'nPlaylists' => 0,
        'matchlist'=> null,
        'status' => false
    );                                                                                                          

    // Creamos el usuario con la información anterior
    $resultado = $usuarioController->crearUsuario($datos);

    // Ahora que el usuario ha sido creado, ya podemos guardar su id, que utilizaremos para obtener el spotifyID del usuario. Lo actualizamos en la base de datos
    $_SESSION["logged_user_id"] = $resultado;
    $datos = array(
        'spotify_ID' => $spotifyController->obtenerSpotifyIDUsuarioActual()
    );
    $usuarioController->actualizarUsuario($resultado, $datos);

    // A continuación vamos a obtener las playlists del usuario actual y las guardaremos en la base de datos
    $datosPlaylists = $spotifyController->obtenerPlaylistsUsuarioActual();
    $datos = array(
        'nPlaylists' => $datosPlaylists->total
    );
    $usuarioController->actualizarUsuario($resultado, $datos);
    $playlistsController->crearPlaylist($datosPlaylists);

    
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