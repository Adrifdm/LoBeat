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

        // Comprobamos si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Crear una instancia de UsuarioController
            $usuarioController = new UsuarioController();

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

                //CONFIGURACION DE VARIABLES DE SESION  

                //para ver si el usuario esta logeado durante el resto de la aplicacion
                $_SESSION["login"] = true;
            
                //lo que vamos a usar durante el resto de la aplicacion para buscar info del usuario loggeado
                $_SESSION["SesionEmail"] = $correo;

                //para ver si el usuario puede acceder a pestañas dedicadas de roles especiales
                $_SESSION["role"] = $usuarioExistente->getRole();

                //header('Location: pagPrincipal.php');       
                echo "<script>window.location='pagPrincipal.php';</script>";
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