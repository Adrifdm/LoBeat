<?php
        //session_start();
        require_once '../../controllers/usuarioController.php';
        // Crear una instancia de UsuarioController

        $usuC = new UsuarioController();

        // Comprobamos si el formulario ha sido enviado 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            
            $id = $_POST['id2'];
            $nombre = $_POST['nombre2'];
            $email = $_POST['email2'];
            $rol = $_POST['role2'];
            $genero = $_POST['genero2'];
            $pass = $_POST['pass2'];
            
            var_dump($_POST);
            
            //actulizar usuario
            
            if($email != ""){
                $usuE = $usuC->buscarUsuarioPorCampo('correo', $email);
                if($usuE != null){
                    ?>
                    <div class = "error">
                        <p> Ha ocurrido un error al crear el usuario </p> 
                    </div>       
                    <?php
                    header('Location: manageUsers.php');
                    exit;
                }
            }

            if($id!='' && $nombre!='' && $email!='' && $pass!=''){
                $accessToken = $_SESSION['spotify_access_token'];
                $refreshToken = $_SESSION['spotify_refresh_token'];

                // Insertamos la información del nuevo usuario
                $datos = array(
                    'nombre' => $nombre,
                    'correo' => $email ,
                    'contrasenya' => $pass, 
                    'spotify_access_token' => $accessToken,
                    'spotify_refresh_token' => $refreshToken,
                    'fsa_creacion' => date('Y-m-d H:i:s'),
                    'fecha_actualizacion' => date('Y-m-d H:i:s'),
                    'role' =>  $rol,
                    'genero' => $genero,
                    'descripcion' => 'Unas palabras sobre tí',
                    'fotoPerfil' => 'profileAvatar.png',
                    'spotify_ID' => '',     // Inicialmente el spotifyID de la base de datos se inicializa vacío (al llamar a obtenerSpotifyID necesitamos $_SESSION["logged_user_id"], y no podemos inicializarlo hasta crear el usuario en la bd)
                    'nChats' => 0,
                    'nMatches' => 0,
                    'nPlaylists' => 0,
                    'matchlist'=> null,
                    'status' => false,
                    'latitud' => 2234234,
                    'longitud' => 22344  
                );                       

                // Creamos el usuario con la información anterior
                $resultado = $usuC->crearUsuario($datos);
                
                if ($resultado !== null) {
                    ?>
                    <div class = "success">
                        <p> El nuevo usuario ha sido completado con exito</p>
                    </div>
                    <?php
            
                    header('Location: manageUsers.php');
                    exit;
            
                } else {
                    ?>
                    <div class = "error">
                        <p> Ha ocurrido un error al crear el usuario </p> 
                    </div>       
                    <?php
                    
                    header('Location: manageUsers.php');
                    exit;
            
                }
            }
            else{
                
                ?>
                <div class = "error">
                    <p> Ha ocurrido un error al crear el usuario </p> 
                </div>       
                <?php
                
                header('Location: manageUsers.php');
                exit;
            }
        }
?>
