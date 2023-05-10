<?php
        
        require_once '../../controllers/usuarioController.php';
        // Crear una instancia de UsuarioController

        $usuC = new UsuarioController();

        // Comprobamos si el formulario ha sido enviado 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $rol = $_POST['role'];
            $genero = $_POST['genero'];
            $pass = $_POST['pass'];
            
            
            //actulizar usuario
            
            $usuE = $usuC->buscarUsuarioPorCampo('id', $id);

            $datos = array(
                'nombre' => $nombre,
                'correo' => $email,
                'contrasenya' => $pass,
                //'spotify_access_token' => $usuarioExistente->getSpotify_access_token(),
                //'spotify_refresh_token' => $usuarioExistente->getSpotify_refresh_token(),
                //'fecha_creacion' => $usuarioExistente->getFecha_creacion(),
                //'fecha_actualizacion' => date('Y-m-d H:i:s'),
                'role' => $rol, 
                'genero' => $genero,
                //'descripcion' => $sobreMi,
                //'fotoPerfil' => $nombreFoto
            );

            $res = $usuC->actualizarUsuario($id, $datos);
            
            header('Location: manageUsers.php');
        
            exit;
        }
?>
