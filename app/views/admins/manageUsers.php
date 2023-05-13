<?php
require_once '../../controllers/usuarioController.php';
require_once '../../controllers/spotifyController.php';

session_start();

$usuarioController = new UsuarioController();
$usuarioEdit = new UsuarioController();

if ($_SESSION["is_logged"] != true && $_SESSION['role'] == 'Admin') {

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
    <title>LoBeat - Gestión de usuarios</title>

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


        $_SESSION['NNplaylists']= 0;
        $_SESSION['NNusers']= 0;
        $_SESSION['NNadmins']= 0;
        $_SESSION['NNmatches']= 0;

        $NNplaylists = 0;
        $NNusers = 0;
        $NNadmins = 0;
        $NNmatches = 0;

        $users = $usuarioController->listarUsuarios();
    
        foreach ($users as $user) {
        
            $NNusers++;
            $NNplaylists = $NNplaylists + strval($user->getnPlaylists());

            if ($user->getRole() == "Admin") {
                $NNadmins++;
            }

            $NNmatches = $NNmatches +  strval($user->getnMatches());

            $_SESSION['NNplaylists']= $NNplaylists;
            $_SESSION['NNusers']= $NNusers;
            $_SESSION['NNadmins']= $NNadmins;
            $_SESSION['NNmatches']= $NNmatches;

            $datos = array(
                'matchlist'=> null,
                'status' => false,
                'listaMatchs' => null
            );   

            $okkk = $usuarioController->actualizarUsuario($user->getId(), $datos);
        }
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
            

            <!-- el popup -->
            <div class="modalcont" id="modalContainer">
                
                <div class="modal">

                    <a href="#" class="equis" onclick="quitarPopup()">
                        X
                    </a>

                    <form class="formm" name="formulario2" action="actualizaUsuario.php" method="POST">

                        <h1 class="ttt">
                            Editar Ususario
                        </h1>

                        <div class="form_cont">

                            <div class="form__g">

                                <input type="text" id="idd" name="id" class="form__inp" placeholder="" readonly>

                            </div>

                            <div class="form__g">

                                <label for="email" class="form__lab">Email:</label>
                                <input type="text" id="email" name="email" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="nombre" class="form__lab">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="passw" class="form__lab">Contraseña:</label>
                                <input type="text" id="passw" name="pass" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="rol" class="form__lab">Rol:</label>

                                <select  class="form__inp" name="role" id="rol" required="">
                                    <option value="Admin" <?php /*if ($usuarioEdit->getRole() == "Admin")*/ echo " selected"; ?>>Administrador</option>
                                    <option value="User" <?php //if ($usuarioEdit->getRole() == "User") echo " selected"; ?>>Usuario</option>
                                </select>

                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="genero" class="form__lab">Género:</label>

                                <select  class="form__inp" name="genero" id="genero" required="">
                                    <option value="Hombre" <?php /*if ($usuarioEdit->getGenero() == "Hombre")*/ echo " selected"; ?>>Hombre</option>
                                    <option value="Mujer" <?php //if ($usuarioEdit->getGenero() == "Mujer") echo " selected"; ?>>Mujer</option>
                                    <option value="Otro" <?php //if ($usuarioEdit->getGenero() == "Otro") echo " selected"; ?>>Otros</option>
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
            
                <div class="seccionIzq">
                    <div class="cardss">

                        <div class="cardD">
                            <div class="boxx">     
                                        
                                <h1 class="blancor"><?php echo $_SESSION['NNusers']; ?></h1>
                                <h3 class="blancor">Usuarios</h3>
                            </div>

                            <div class="iconCas">
                                <img src="../../../public/assets/img/icons8-user-64.png" alt="">
                            </div>
                        </div>

                        <div class="cardD">
                            <div class="boxx">
                                <h1 class="blancor"><?php echo $_SESSION['NNadmins']; ?></h1>
                                <h3 class="blancor">Admins</h3>
                            </div>

                            <div class="iconCas">
                                <img src="../../../public/assets/img/icons8-admin-48.png" alt="">
                            </div>
                        </div>

                        <div class="cardD">
                            <div class="boxx">
                                <h1 class="blancor"><?php echo $_SESSION['NNmatches']; ?></h1>
                                <h3 class="blancor"> Matches</h3>
                            </div>

                            <div class="iconCas">
                                <img src="../../../public/assets/img/icons8-heart-64.png" alt="">
                            </div>
                        </div>

                        <div class="cardD">
                            <div class="boxx">
                                <h1 class="blancor"><?php echo $_SESSION['NNplaylists']; ?></h1>
                                <h3 class="blancor">Playlists</h3>
                            </div>

                            <div class="iconCas">
                                <img src="../../../public/assets/img/icons8-playlist-64.png" alt="">
                            </div>
                        </div>

                    </div>
                    <div class = "usersp">
                        <div class="titulodiv">
                            <h2>Usuarios</h2>
                            <!--<a href="#" class="btnn"> View all</a>-->
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
                                

                                $NNplaylists = 0;
                                $NNusers = 0;
                                $NNadmins = 0;
                                $NNmatches = 0;

                                $users = $usuarioController->listarUsuarios();
                                foreach ($users as $user) {

                                    $NNusers++;
                                    $NNplaylists = $NNplaylists + strval($user->getnPlaylists());
                                    
                                    if($user->getRole() == "Admin"){
                                        $NNadmins++;
                                    }
                                    
                                    $NNmatches = $NNmatches +  strval($user->getnMatches());

                                    $_SESSION['NNplaylists']= $NNplaylists;
                                    $_SESSION['NNusers']= $NNusers;
                                    $_SESSION['NNadmins']= $NNadmins;
                                    $_SESSION['NNmatches']= $NNmatches;

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
                                        echo "<td><img src='../../../public/assets/img/profilePhotos/".$user->getFotoPerfil()."' alt=''></td>";
                                    } else{
                                        echo "<td><img src='../../../public/assets/img/profilePhotos/profileAvatar.png' alt=''></td>";
                                    }
                                    /*
                                    if($foto){
                                        
                                        echo "<td>" ;
                                        echo "<img src="; 
                                        echo "../../../public/assets/img/profilePhotos/".$user->getFotoPerfil();
                                        echo "alt=''>";
                                        echo "</td>";
                                        
                                    }
                                    else{
                                        echo "<td>" ;
                                        echo "<img src="; 
                                        echo "../../../public/assets/img/profilePhotos/profileAvatar.png";
                                        echo "alt=''>";

                                        echo "</td>";
                                    }*/
                                    
                                    //Resto de info
                                    echo "<td>" . $user->getNombre() . "</td>";
                                    echo "<td>" . $user->getCorreo() . "</td>";
                                    echo "<td>" . $user->getRole() . "</td>";
                                    echo "<td>" . $user->getGenero() . "</td>";
                                    
                                    //boton editar
                                
                                    //echo "<td><a class='btnn' onclick='mostrarPopup(\"" . $user->getId(), $user->nombre(), $user->getCorreo(), $user->getRole(), $user->getGenero(), $user->getContrasenya() . "\")'>Editar</a></td>";
                                    echo sprintf("<td><a class='btnn' onclick='mostrarPopup(\"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\")'>Editar</a></td>", $user->getId(), $user->getNombre(), $user->getCorreo(), $user->getRole(), $user->getGenero(), $user->getContrasenya());
                                
                                    /*echo sprintf(
                                        "<td><a class='btnn' onclick='mostrarPopup(\"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\")'>Editar</a></td>",
                                        $user->getId(),
                                        $user->nombre(),
                                        $user->getCorreo(),
                                        $user->getRole(),
                                        $user->getGenero(),
                                        $user->getContrasenya()
                                    );*/
                                    
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

                        

                            <!-- 
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
                            -->
                        </table>
                    </div>
                </div>
                <div class="new-users">
                    <div class="titulodiv">
                        <h2>Crear usuario</h2>

                        <!--<a href="#" class="btnn"> Crear</a>-->

                    </div>

                    <form class="formm" name="formulario1" action="crearUsuarioA.php" method="POST">

                        <div class="form_cont">

                            <!--
                            <div class="form__g">

                            <input type="text" id="idd2" name="id2" class="form__inp" placeholder="" readonly>

                            </div> -->

                            <div class="form__g">

                                <label for="email2" class="form__lab">Email:</label>
                                <input type="text" id="email2" name="email2" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="nombre2" class="form__lab">Nombre:</label>
                                <input type="text" id="nombre2" name="nombre2" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="passw2" class="form__lab">Contraseña:</label>
                                <input type="text" id="passw2" name="pass2" class="form__inp" placeholder="">
                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="rol2" class="form__lab">Rol:</label>

                                <select  class="form__inp" name="role2" id="rol2" required="">
                                    <option value="Admin" <?php /*if ($usuarioEdit->getRole() == "Admin")*/ echo " selected"; ?>>Administrador</option>
                                    <option value="User" <?php //if ($usuarioEdit->getRole() == "User") echo " selected"; ?>>Usuario</option>
                                </select>

                                <span class="form__line"></span>

                            </div>

                            <div class="form__g">

                                <label for="genero2" class="form__lab">Género:</label>

                                <select  class="form__inp" name="genero2" id="genero2" required="">
                                    <option value="Hombre" <?php /*if ($usuarioEdit->getGenero() == "Hombre")*/ echo " selected"; ?>>Hombre</option>
                                    <option value="Mujer" <?php //if ($usuarioEdit->getGenero() == "Mujer") echo " selected"; ?>>Mujer</option>
                                    <option value="Otro" <?php //if ($usuarioEdit->getGenero() == "Otro") echo " selected"; ?>>Otros</option>
                                </select>

                                <span class="form__line"></span>

                            </div>

                            <input type="submit" class="closeBt" value="Crear">

                        </div>

                    </form>

                </div>
            </div>
                
        </div>
            
           
           
    </div>
    <script>

        var idUsuario;

        
        function mostrarPopup(id, nombre, correo, rol, genero, pw) {
            idUsuario = id;
            
            var popup = document.getElementById("modalContainer");
            popup.style.display = 'block';
            popup.style.opacity = 1;
            
            //popup.style.pointerEvents = none;
            var inputEmail = document.getElementById("email");
            var inputNo = document.getElementById("nombre");
            var inputGe = document.getElementById("genero");
            var inputRo = document.getElementById("rol");
            var inputPs = document.getElementById("passw");
            var idd = document.getElementById("idd");

            idd.value = id;

            inputEmail.value = correo;
            inputNo.value = nombre;
            inputGe.value = genero;
            inputRo.value = rol;
            inputPs.value = pw;

        }

        function quitarPopup() {
            var popup2 = document.getElementById("modalContainer");
            popup2.style.display = 'none';
            popup2.style.opacity = 0;
            
            //popup.style.pointerEvents = none;
            
        
        }

        function quitarPopup2() {
            var popup3 = document.getElementById("modalCrear");
            popup3.style.display = 'none';
            popup3.style.opacity = 0;
            
            //popup.style.pointerEvents = none;
            
        
        }


    </script>

    <?php          

        if (isset($_SESSION['error_message'])) {
            
            echo '<div class="modalconterrorMSG" id="modalCrear"> 
                <div class="modal12">

                    <a href="#" class="equis2" onclick="quitarPopup2()">
                        X
                    </a>
                    ' . $_SESSION['error_message']. '
                </div>
            </div>';
            // Eliminar el mensaje de error de la variable de sesión
            unset($_SESSION['error_message']);
        }
        
    ?>
    
    <?php
        include("actualizaUsuario.php");
        include("crearUsuarioA.php");
    ?>
</body>

</html>