<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../../public/assets/css/bootstrap-argon.css">
    <link rel="stylesheet" href="../../../public/assets/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

    <?php
        require_once '../../controllers/usuarioController.php';

        session_start();

        if($_SESSION["is_logged"] !== true){
    
          header('Location: logout.php'); 
          
          exit;
        } 

        // Crear una instancia de UsuarioController
        $usuarioController = new UsuarioController();

        // Comprobamos si existe algún usuario con ese correo
        //TODO cuando funciona el id en login cambiar esto a buscar por id con la variable de sesion logged_user_id

        $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
    ?>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 

    <div class="main-content">
    
      <!-- Introducción -->
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../../../public/assets/img/fondoLogin.png); background-size: cover; background-position: center top;">
        <!-- Máscara -->
       
        <span class="mask bg-gradient-default opacity-8"></span> 
        <!-- Contenido introducción -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 profile-text fuente">Perfil</h1>
              <p class="profile-text mt-0 mb-5 fuente">Esta es tu página de perfil, desde la que podrás revisar toda la información que has introducido hasta ahora y modificarla en caso de haber algún error.</p>
              <a href="#!" class="btn btn-info fuente">Editar perfil</a>
              <a href="../registro/login.php" class="btn btn-info fuente"> <i class="bi bi-box-arrow-left"></i>  Log Out</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Page content --> 
      <div class="container-fluid mt--7">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src=<?php echo "../../../public/assets/img/profilePhotos/".$usuarioExistente->getFotoPerfil(); ?> class="rounded-circle">
                    </a>
                  </div> 
                </div>
                
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                  <!--<a href="#" class="btn btn-sm btn-info mr-4">Connect</a>-->
                  <!--<a href="#" class="btn btn-sm btn-default float-right">Message</a>-->
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                        <span class="heading fuente">10</span>
                        <span class="description fuente">Matches</span>
                      </div>
                      <div>
                        <span class="heading fuente">6</span>
                        <span class="description fuente">Playlists</span>
                      </div>
                      <div>
                        <span class="heading fuente">7</span>
                        <span class="description fuente">Chats</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3 class="fuente"> </h3>
                  <div class="h5 font-weight-300 fuente">
                    <!--<i class="ni location_pin mr-2"></i>Asturias, España-->
                  </div>
                  <div class="h5 mt-4 fuente">
                    <!--<i class="ni business_briefcase-24 mr-2"></i>Estudiante de derecho-->
                  </div>
                  <div class="fuente">
                    <!--<i class="ni education_hat mr-2"></i>Universidad autónoma de Barcelona-->
                  </div>
                  <hr class="my-4">
                  <!--<p class="fuente">No soy solo una cara bonita; también tengo un cerebro. Soy el tipo bueno de chico malo. Busco a alguien que haga que mi fin de semana sea increíble. ¿Buscas un tipo que literalmente pueda borrar Tinder después de nuestra primera cita?</p>-->
                  <!--<a href="#">Mostrar más</a>-->
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0 fuente">Mi cuenta</h3>
                  </div>
                  <div class="col-4 text-right">
                    <!--<a href="#!" class="btn btn-sm btn-primary">Settings</a>-->
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <h6 class="heading-small text-muted mb-4 fuente">Información usuario</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-username">Nombre de usuario</label>
                          <input type="text" id="input-username" name="username" class="form-control form-control-alternative fuente" placeholder="Nombre de usuario" value="<?php
                            
                            echo $usuarioExistente->getNombre();
                            ?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label fuente" for="input-email">Dirección de correo</label>
                          <input type="text" id="input-email" name="email" class="form-control form-control-alternative fuente" placeholder="@example.com" value="<?php
                            echo $usuarioExistente->getCorreo();
                            ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6"> 
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-first-name">Rol</label>
                          <br> 
                          <select  class="form-control" name="role" id="role" required="">
                            <option value="Admin">Administrador</option>
                            <option value="User">Usuario</option>
                            <option value="Empresa">Empresa</option>
                          </select>
                        </div>
                      </div> 
                      <div class="col-lg-6">
                        <div class="form-group focused"> 
                          <label class="form-control-label fuente" for="input-last-name">Género</label> 
                          <br>
                            <select  class="form-control" name="genero" id="genero" required="">
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                           <option value="Otro">Otro</option>
                          </select>

                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <!-- Address
                  <h6 class="heading-small text-muted mb-4 fuente">Información de contacto</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-address">Dirección</label>
                          <input id="input-address" class="form-control form-control-alternative fuente" placeholder="Dirección" value="Calle, nº, piso, puerta" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-city">Ciudad</label>
                          <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-country">País</label>
                          <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label fuente" for="input-country">Código Postal</label>
                          <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                   -->
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4 fuente">Sobre mí</h6>
                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label class="fuente">Sobre mí</label>
                      <textarea rows="4" class="form-control form-control-alternative fuente" name="descripcion" placeholder="Unas palabras sobre tí"><?php
                      echo $usuarioExistente->getDescripcion();
                      ?></textarea>
                    </div>
                  </div>

                  <input type="file" name="foto">

                  <div class="d-flex justify-content-between">
                    <a type="submit">
                        <input type="submit" class="btn btn-sm btn-info mr-4" value="Guardar">
                    </a>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        include("processProfile.php")
    ?>
</body>
</html>