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
           
            var_dump($_POST);
            
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
                    ?>
                    <div class = "error">
                        <p> Ha ocurrido un error al crear el usuario </p> 
                    </div>       
                    <?php
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
                    'contrasenya' => $pass, 
                    'spotify_access_token' => 'BQBa2RNAwrKg',
                    'spotify_refresh_token' => 'AQBWKtdAt9S1Hs',
                    'fsa_creacion' => date('Y-m-d H:i:s'),
                    'fecha_actualizacion' => date('Y-m-d H:i:s'),
                    'role' =>  $rol,
                    'genero' => $genero,
                    'descripcion' => 'Unas palabras sobre tí',
                    'fotoPerfil' => 'profileAvatar.png',
                    'spotify_ID' => '31yh7daz4uvqrliwyrgm',    // Inicialmente el spotifyID de la base de datos se inicializa vacío (al llamar a obtenerSpotifyID necesitamos $_SESSION["logged_user_id"], y no podemos inicializarlo hasta crear el usuario en la bd)
                    'nChats' => 0,
                    'nMatches' => 0,
                    'nPlaylists' => 0,
                    'matchlist'=> null,
                    'status' => false
                );            
                
                // Creamos el usuario con la información anterior
                $resultado = $usuC->crearUsuario($datos);
                
                if ($resultado !== null) {
                    ?>
                    <div class = "success">
                        <p> El nuevo usuario ha sido completado con exito</p>
                    </div>
                    <?php
            
            
                } else {
                    ?>
                    <div class = "error">
                        <p> Ha ocurrido un error al crear el usuario </p> 
                    </div>       
                    <?php
                    
                }

                    $usuarioExistente = $usuC->buscarUsuarioPorCampo('correo', $email);
                    $idww = $usuarioExistente->getId();
                    
                    
                    $datoss = array(
                        'latitud' => 37.2038,
                        'longitud' => 3.6662 
                    );
                
                    $usuC->actualizarUsuario($idww, $datoss);

                header('Location: manageUsers.php');
                exit;
            }
            else{
                
                ?>
                <div class = "error">
                    <p> Los campos no estan completos </p> 
                </div>       
                <?php
                
                header('Location: manageUsers.php');
                exit;
            }
        }
?>
