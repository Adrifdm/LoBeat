<?php
session_start();
$dir_base = dirname(dirname(__DIR__));

include $dir_base. '\controllers\usuarioController.php';
include $dir_base. '\controllers\spotifyController.php';
//require_once __DIR__.'C:\Apache24\htdocs\LoBeat\app\controllers\usuarioController.php';
//require_once $dir_base . '\controllers\spotifyController.php';
//require_once 'C:\Apache24\htdocs\LoBeat\app\controllers\spotifyController.php';

// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Creamos instancias de los controladores que vamos a usar
    $usuarioController = new UsuarioController();
    $spotifyController = new SpotifyController();

    // Obtenemos la informacion introducida
    $correo = $_POST['email'];
    $contrasenya = $_POST['password'];

    // Comprobamos si existe algún usuario con ese correo
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);       //TODO: usuarioExistente y en general las funciones de usuarioService.php devuelven null como id, hay que arreglar eso
    
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

        //CONFIGURACION DE VARIABLES DE SESION  

        //para ver si el usuario esta logeado durante el resto de la aplicacion
        $_SESSION["is_logged"] = true;
    
        //lo que vamos a usar durante el resto de la aplicacion para buscar info del usuario loggeado
        $_SESSION["logged_user_id"] = $usuarioExistente->getId();       // hasta que no arreglemos el TODO de arriba, esto será null

        //esta variable la vamos a usar mientras el id de null, luego lo cambiaremos y solo quedara la variable del id y esta se eliminará

        $_SESSION["logged_user_email"] = $correo;

        //para ver si el usuario puede acceder a pestañas dedicadas de roles especiales
        $_SESSION["logged_user_role"] = $usuarioExistente->getRole();

        // Refrescamos tokens
        $spotifyController->refrescarTokens($usuarioExistente->getId());

        header('Location: principal/pagPrincipal.php');
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