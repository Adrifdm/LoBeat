<?php
require_once '../../controllers/usuarioController.php';
require_once '../../controllers/spotifyController.php';

session_start();

$usuarioController = new UsuarioController();

$rolAdmin = false;

//$spotifyController = new SpotifyController();
if (($_SESSION["is_logged"] == true)) {

    $usuarioExistente = $usuarioController->obtenerUsuarioPorId($_SESSION["logged_user_id"]);

    if ($usuarioExistente->getRole() == 'Admin') {

        $rolAdmin = true;
    } else {

        $rolAdmin = false;
    }
}

if (($_SESSION["is_logged"] != true) || ($rolAdmin == false)) {

    header('Location: ../perfil/logout.php');

    exit;
}

/*
else if($_SESSION["logged_user_role"] != 'Admin'){

    $error_msg = "No tienes permisos para acceder a esta página.";

    if(isset($error_msg)){ ?>
        
        <div class="error"><?php echo $error_msg; ?></div>

    <?php } 

}*/ else {

    //logica si conseguiste entrar en la pagina



}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <title> Gestión de usuarios </title>

    <link rel="stylesheet" href="../../../public/assets/css/adminActions.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="../../../public/assets/css/cabecera.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--<link rel="stylesheet" href="../../../public/assets/css/notifications.css">-->

    <script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>


</head>

<body>
    
    <?php
      require("../comun/cabecera.php");
    ?> 
    
    <!--
        <div class="side-menu">
            <div class="brand-name">
                <h1> Brand </h1>
            </div>
            <ul>
                <li>Crear Usuario</li>
                <li>Students</li>
                <li>Settings</li>
                <li>Help</li>

            </ul>
        </div>
        -->
    <div class="containerAdmin">

        <!--
        <div class="headerAdmin">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Buscar..">
                    <button type="submit" class="fa fa-search">

                    </button>
                </div>

                <div class="usuInfo">
                    <a href="#" class="btnn"> Crear Usuario </a>
                </div>
            </div>
        </div>
        -->

        <div class="contenidoPag">
            <div class="cardss">

                <div class="cardD">
                    <div class="boxx">
                        <h1>21234</h1>
                        <h3>Usuarios</h3>
                    </div>

                    <div class="iconCas">
                        <img src="../../../public/assets/img/rating.png" alt="">
                    </div>
                </div>

                <div class="cardD">
                    <div class="boxx">
                        <h1>21234</h1>
                        <h3>Administradores</h3>
                    </div>

                    <div class="iconCas">
                        <img src="../../../public/assets/img/rating.png" alt="">
                    </div>
                </div>

                <div class="cardD">
                    <div class="boxx">
                        <h1>21234</h1>
                        <h3> Playlists</h3>
                    </div>

                    <div class="iconCas">
                        <img src="../../../public/assets/img/rating.png" alt="">
                    </div>
                </div>

                <div class="cardD">
                    <div class="boxx">
                        <h1>21234</h1>
                        <h3>Students</h3>
                    </div>

                    <div class="iconCas">
                        <img src="../../../public/assets/img/rating.png" alt="">
                    </div>
                </div>


            </div>
            <div class="content-2">
                <div class="usersp">
                    <div class="titulodiv">
                        <h2>Usuarios</h2>
                        <a href="#" class="btnn"> View all</a>
                    </div>
                    <table>
                        <tr>
                            <th>
                                Foto
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Correo
                            </th>
                            <th>
                                Rol
                            </th>
                            <th>
                                Género
                            </th>
                            <th>
                                Opción
                            </th>

                        </tr>

                        <tr>
                            <td>
                                <img src="../../../public/assets/img/rating.png" alt="">
                            </td>
                            <td>
                                john dei
                            </td>
                            <td>
                                johndei@mail.com
                            </td>
                            <td>
                                Admin
                            </td>
                            <td>
                                Hombre
                            </td>
                            <td>
                                <a href="#" class="btnn"> View </a>
                            </td>

                        </tr>
                    </table>
                </div>

                <div class="new-users">
                    <div class="titulodiv">
                        <h2>Crear usuario</h2>
                        <a href="#" class="btnn"> Crear</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>