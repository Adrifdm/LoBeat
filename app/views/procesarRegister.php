<?php
require_once('usuarioController.php');

// Crear una instancia de UsuarioController
$usuarioController = new UsuarioController();

// Obtenemos la informacion introducida
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Comprobamos si el correo ya existe
$usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $email);
if ($usuarioExistente !== null) {
  echo "El email introducido ya existe";
  exit;
}

// Comprobamos si la contraseña coincide con la del campo "Repetir contraseña"
if ($password == $repassword){
  //$hash = password_hash($password, PASSWORD_DEFAULT);  esto esta bien pensado pero lo dejamos comentado de momento
}
else{
  echo "Las contraseñas introducidas no son iguales";
  exit;
}

// Insertamos la información del nuevo usuario
$datos = array(
  'nombre' => $name,
  'correo' => $email,
  'password' => $password, // mas alante tendremos que almacenar aqui el hash de la contraseña y no la propia contraseña
  'spotify_access_token' => '',
  'spotify_refresh_token' => '',
  'fecha_creacion' => date('Y-m-d H:i:s'),
  'fecha_actualizacion' => date('Y-m-d H:i:s')
);
$resultado = $usuarioController->crearUsuario($datos);

if ($resultado['error'] == true) {
  echo "Hubo un error al crear el usuario";
  exit;
}

// Si se ha insertado correctamente, redirigir a la página de login
if ($resultado['resultado']) {
  header('Location: login.php');
  exit;
} else {
  echo "Ha ocurrido un error al registrar el usuario";
  exit;
}
?>