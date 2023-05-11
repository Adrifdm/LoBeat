<?php
define("PATH", $_SERVER['DOCUMENT_ROOT']);
session_start();
require_once PATH . '/LoBeat/app/controllers/usuarioController.php';
require_once PATH . '/LoBeat/app/controllers/spotifyController.php';
require_once PATH . '/LoBeat/app/controllers/playlistsController.php';

// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Creamos instancias de los controladores que vamos a usar
    $usuarioController = new UsuarioController();
    $spotifyController = new SpotifyController();
    $playlistsController = new PlaylistsController();

    // Obtenemos la informacion introducida
    $correo = $_POST['email'];
    $contrasenya = $_POST['password'];

    // Comprobamos si existe algún usuario con ese correo

    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);       //usuarioExistente y en general las funciones de usuarioService.php devuelven null como id, hay que arreglar eso
    
    if ($usuarioExistente !== null) {

        // Comprobamos si se ha introducido la contraseña correcta
        $contrasenyaCorrecta = $usuarioExistente->getContrasenya();

        //Comprobamos que el hash de la contraseña introducida es igual que el de la contraseña para ese usuario
        if (!password_verify($contrasenya, $contrasenyaCorrecta)) {
            ?>
            <div class = "error">
                <p>La contraseña introducida no es correcta </p>
            </div>
            <?php
            exit;
        }

        //CONFIGURACION DE VARIABLES DE SESION  

        //para ver si el usuario esta logeado durante el resto de la aplicacion
        $_SESSION["is_logged"] = true;
    
        //lo que vamos a usar durante el resto de la aplicacion para buscar info del usuario loggeado
        $_SESSION["logged_user_id"] = $usuarioExistente->getId();       // hasta que no arreglemos el TODO de arriba, esto será null

        $_SESSION["logged_user_spotifyID"] = $spotifyController->obtenerSpotifyIDUsuarioActual();

        //esta variable la vamos a usar mientras el id de null, luego lo cambiaremos y solo quedara la variable del id y esta se eliminará
        
        $_SESSION["logged_user_email"] = $correo;

        //para ver si el usuario puede acceder a pestañas dedicadas de roles especiales
        $_SESSION["logged_user_role"] = $usuarioExistente->getRole();

        //para que la vista por defecto de la sección derecha en la pag principal sea 'lista' 
        $_SESSION["vista"] = 'lista';

        // Refrescamos tokens
        $spotifyController->refrescarTokens($usuarioExistente->getId());
        $playlistsController->refrescarPlaylists($usuarioExistente->getSpotifyID());

        // Ponemos el status de la bd del usuario en activo 
        $datos = array(
            'status' => true
        );
        $usuarioController->actualizarUsuario($_SESSION["logged_user_id"] ,$datos);

        header('Location: ../principal/Ubicacion.php');
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