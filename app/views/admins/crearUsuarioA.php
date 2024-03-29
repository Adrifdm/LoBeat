<link rel="stylesheet" href="../../../public/assets/css/adminActions.css">

<?php
        session_start();
        require_once '../../controllers/usuarioController.php';
        
        
        require_once '../../controllers/spotifyController.php';

        // Crear una instancia de UsuarioController

        
        $usuC = new UsuarioController();
        $spotifyController = new SpotifyController();

        // Comprobamos si el formulario ha sido enviado 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            //var_dump($_POST);
            
            $nombre = $_POST['nombre2'];
            $email = $_POST['email2'];
            $rol = $_POST['role2'];
            $genero = $_POST['genero2'];
            $pass = $_POST['pass2'];
            
            //var_dump($_POST);
            
            //actulizar usuario
            
            if($email != ""){
                $usuE = $usuC->buscarUsuarioPorCampo('correo', $email);
                if($usuE != null){
                    $_SESSION['error_message'] = 'El usuario ya existe';
                    
                    header('Location: manageUsers.php');
                    exit;
                }
            }

            if($nombre!='' && $email!='' && $pass!=''){
                //$accessToken = $_SESSION['spotify_access_token'];
                //$refreshToken = $_SESSION['spotify_refresh_token'];

                // Insertamos la información del nuevo usuario
                
                $datos = array(
                    'nombre' => $nombre,
                    'correo' => $email ,
                    'contrasenya' => password_hash($pass, PASSWORD_DEFAULT), 
                    'spotify_access_token' => $_SESSION['spotify_access_token'],
                    'spotify_refresh_token' => $_SESSION['spotify_refresh_token'],
                    'fecha_creacion' => date('Y-m-d H:i:s'),
                    'fecha_actualizacion' => date('Y-m-d H:i:s'),
                    'role' =>  $rol,
                    'genero' => $genero,
                    'descripcion' => 'Unas palabras sobre tí',
                    'fotoPerfil' => 'profileAvatar.png',
                    'latitud' => 2234234,
                    'longitud' => 22344,
                    'spotify_ID' => $spotifyController->obtenerSpotifyIDUsuarioActual(),    // Inicialmente el spotifyID de la base de datos se inicializa vacío (al llamar a obtenerSpotifyID necesitamos $_SESSION["logged_user_id"], y no podemos inicializarlo hasta crear el usuario en la bd)
                    'nMatches' => 0,
                    'nChats' => 0,
                    'nPlaylists' => 0,
                    'matchlist'=> null,
                    'status' => false,
                    'listaMatchs' => null,
                    'instagram' => null,
                    'twitter' => null,
                    'tiktok' => null
                );                       

                // Creamos el usuario con la información anterior
                $resultado = $usuC->crearUsuario($datos);
                
                if ($resultado !== null) {

                    $_SESSION['error_message'] = 'El nuevo usuario ha sido completado con exito';

                    $usuarioExistente = $usuC->buscarUsuarioPorCampo('correo', $email);
                    $idww = $usuarioExistente->getId();
                    
                    
                    $datoss = array(
                        'latitud' => 0,
                        'longitud' => 0 
                    );
                
                    $usuC->actualizarUsuario($idww, $datoss);

                } else {

                    $_SESSION['error_message'] = 'Ha ocurrido un error al crear el usuario';

                    
                } 

                header('Location: manageUsers.php');
                exit;
            }
            else{
                
                $_SESSION['error_message'] = 'Los campos no están completos';
                
                header('Location: manageUsers.php');
                exit;
            }
        }
?>
