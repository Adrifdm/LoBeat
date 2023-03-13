<?php

require_once '../../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select the database and collection
$collection = $mongoClient->mydb->users;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $user = $collection->findOne(['username' => $username, 'password' => $password]);

    if ($user) {
        
        // The user exists, redirect to the homepage
        header('Location: pagPrincipal.php');
       
        exit;
        
    } else {
        
        // The user doesn't exist, display an error message
        echo "Invalid username or password";
    }
}
?>
