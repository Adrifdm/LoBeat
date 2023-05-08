<?php
require_once '../../controllers/usuarioController.php';
require_once '../../controllers/spotifyController.php';

session_start();

$usuarioController = new UsuarioController();

if ($_SESSION["is_logged"] != true) {

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

    $users = $usuarioController->listarUsuarios();

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

            <!-- el popup -->
            <div class="modalcont" id="modalContainer">
                
                <div class="modal">

                    <a href="#" class="equis">
                        X
                    </a>

                    <form class="formm">

                        <h1 class="ttt">
                            Editar Ususario
                        </h1>

                        <div class="form_cont">

                            <div class="form__g">

                                <label for="email" class="form__lab">Email:</label>
                                <input type="text" id="email" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="nombre" class="form__lab">Nombre:</label>
                                <input type="text" id="nombre" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="passw" class="form__lab">Contraseña:</label>
                                <input type="text" id="passw" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="rol" class="form__lab">Rol:</label>

                                <select  class="form__inp" name="role" id="rol" required="">
                                    <option value="Admin" <?php /*if ($usuarioEdit->getRole() == "Admin")*/ echo " selected"; ?>>Administrador</option>
                                    <option value="User" <?php //if ($usuarioEdit->getRole() == "User") echo " selected"; ?>>Usuario</option>
                                    <option value="Empresa" <?php //if ($usuarioEdit->getRole() == "Empresa") echo " selected"; ?>>Empresa</option>
                                </select>

                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="genero" class="form__lab">Género:</label>

                                <select  class="form__inp" name="genero" id="genero" required="">
                                    <option value="Hombre" <?php /*if ($usuarioEdit->getGenero() == "Admin")*/ echo " selected"; ?>>Hombre</option>
                                    <option value="Mujer" <?php //if ($usuarioEdit->getGenero() == "User") echo " selected"; ?>>Mujer</option>
                                    <option value="Otro" <?php //if ($usuarioEdit->getGenero() == "Empresa") echo " selected"; ?>>Otros</option>
                                </select>

                                <span class="form__line"></span>

                            </div>

                            <input type="submit" class="closeBt" value="Guardar">

                        </div>

                    </form>
                    <!--
                    <h1>
                        Editar Ususario
                    </h1>

                    <form>
                        <label for="nombre">Nombre:</label>

                        <input type="text" id="nombre" name="nombre" value="Nombre del usuario">

                        <label for="email">Email:</label>

                        <input type="email" id="email" name="email" value="email@del.usuario">

                        <button type="button" class="closeBt" id="guardar">Guardar</button>
                    </form>
                    -->
                    <!--
                    <button id="closeBt"> Guardar </button>
                    -->
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
                                Acción
                            </th>

                        </tr>

                        <?php
                            
                            $users = $usuarioController->listarUsuarios();
                            foreach ($users as $user) {
                                $foto = false;

                                if($user->getFotoPerfil() != null){
                                    $foto = true;
                                    //echo "../../../public/assets/img/profilePhotos/".$usuarioExistente->getFotoPerfil();
                                    }
                                else{
                                    $foto = false;
                                    //echo "../../../public/assets/img/profilePhotos/profileAvatar.png";
                                }
                                    
                               
                                // imagen 
                                if($foto){
                                    
                                    echo "<td>" ;
                                    echo "<img src="; 
                                    echo "../../../public/assets/img/profilePhotos/". $usuarioExistente->getFotoPerfil();
                                    echo "alt=''>";
                                    echo "</td>";
                                    
                                }
                                else{
                                    echo "<td>" ;
                                    echo "<img src="; 
                                    echo "../../../public/assets/img/profilePhotos/profileAvatar.png";
                                    echo "alt=''>";

                                    echo "</td>";
                                }
                                
                                //Resto de info
                                echo "<td>" . $user->getNombre() . "</td>";
                                echo "<td>" . $user->getCorreo() . "</td>";
                                echo "<td>" . $user->getRole() . "</td>";
                                echo "<td>" . $user->getGenero() . "</td>";
                                
                                //boton editar

                                echo "<td><a class='btnn' onclick=\"mostrarPopup('" . $user->getId() . "')\">Editar</a></td>";
                                /*
                                echo "<td><a class='btnn' id='open'>Editar</a></td>";
                                */
                                echo "</tr>";
                            }
                            
                        ?>

                        <!-- 
                        <div id="popup" class="popupvis">

                            <form>
                                <label>Nombre:</label>
                                <input type="text" name="nombre" value="">
                                <br>

                                <label>Apellido:</label>
                                <input type="text" name="apellido" value="">
                                <br>

                                <label>Edad:</label>
                                <input type="number" name="edad" value="">
                                <br>

                                <label>Rol:</label>
                                <input type="number" name="rol" value="">
                                <br>

                                <label>Genero:</label>
                                <input type="number" name="genero" value="">
                                <br>

                                <input type="submit" value="Guardar cambios">
                            </form>

                        </div>-->

                        <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $id = $_POST['id'];
                                $nombre = $_POST['nombre'];
                                $apellido = $_POST['apellido'];
                                $edad = $_POST['edad'];

                                //actulizar usuario

                                
                            }
                        ?>

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
    <script src="../../../public/assets/js/mapa.js">
        const open = document.getElementById("open");
        const close = document.getElementById("closeBt");
        const popup = document.getElementById("modalContainer");
        
        function mostrarPopup(id) {
            var popup = document.getElementById("modalContainer");
            popup.style.display = none;
            popup.style.opacity = 1;
            //popup.style.pointerEvents = none;
            
            // Aquí puedes utilizar AJAX para obtener la información del usuario utilizando el id
        }
    </script>
</body>

</html>