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
        require_once '../controllers/spotifyController.php';

        // Comprobamos si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Creamos instancias de los controladores que vamos a usar
            $usuarioController = new UsuarioController();
            $spotifyController = new SpotifyController();

            // Obtenemos la informacion introducida
            $nombre = $_POST['name'];
            $correo = $_POST['email'];
            $constrasenya = $_POST['password'];
            $reconstrasenya = $_POST['repassword'];
            $role = $_POST['role'];
            $genero = $_POST['genero'];

            // Comprobamos si existe algún usuario con ese correo
            $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);
            
            if ($usuarioExistente !== null) {
                ?>
                <div class = "error">
                    <p> El email introducido ya existe </p>
                </div>
                <?php
                exit;
            }

            // Comprobamos si la contraseña coincide con la del campo "Repetir contraseña"
            if ($constrasenya == $reconstrasenya){

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
            $tokensUsuario = $spotifyController->autentificarUsuario();
            $accessToken = $tokensUsuario[0];
            $refreshToken = $tokensUsuario[1];

            //----------------------------------------------------------------------------
            // Insertamos la información del nuevo usuario
            $datos = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'contrasenya' => $constrasenya,         // mas alante tendremos que almacenar aqui el hash de la contraseña y no la propia contraseña
            'spotify_access_token' => $accessToken,
            'spotify_refresh_token' => $refreshToken,
            'fsa_creacion' => date('Y-m-d H:i:s'),
            'fecha_actualizacion' => date('Y-m-d H:i:s'),
            'role' => $role,
            'genero' => $genero
            );
            $resultado = $usuarioController->crearUsuario($datos);

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
    </body>
</html>