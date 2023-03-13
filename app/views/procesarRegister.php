<?php
require_once('usuarioController.php');

// Connect to MongoDB
//$mongo = new MongoDB\Client("mongodb://localhost:27017");

// Select database and collection
//$collection = $mongo->mydb->users;

// Obtenemos la informacion introducida
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Comprobamos si el correo ya existe
//$user = $collection->findOne(['email' => $email]);

if ($user) {
  echo "El email introducido ya existe";
  exit;
}

// Hash password
if($password == $repassword){

    $hash = password_hash($password, PASSWORD_DEFAULT);
}
else{
    echo "Passwords are not equal";
  exit;
}


// Insert user data
$result = $collection->insertOne([
  'name' => $name,
  'email' => $email,
  'password' => $hash,
]);

if ($result->getInsertedCount() > 0) {
  echo "User registered successfully";
} else {
  echo "Error occurred while registering user";
}
?>
