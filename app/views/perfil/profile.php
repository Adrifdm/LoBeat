<?php
	session_start();

  if($_SESSION["is_logged"] !== true){
    
    header('Location: logout.php'); 
    
    exit;
  } 
?> 

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
    <script src="https://kit.fontawesome.com/dee2748eb0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/vendor/select2/dist/css/select2.min.css">
    <script src="assets/vendor/select2/dist/js/select2.min.js"></script>
</head>
<body>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
   
    <?php
    require_once '../../controllers/usuarioController.php';

    // Crear una instancia de UsuarioController
    $usuarioController = new UsuarioController();

    // Comprobamos si existe algún usuario con ese correo
    //mas adelante se cambiara por el id
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $_SESSION["logged_user_email"]);
    ?>

    <?php
      require("../comun/cabecera.php");
    ?> 

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
              <a href="editProfile.php" class="btn btn-info fuente">Editar perfil</a>
              <a href="../registro/login.php" class="btn btn-info fuente"> <i class="bi bi-box-arrow-left"></i>  Cerrar sesion</a>
            </div>
          </div>  
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--7">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0"> 
            <div class="card tarjeta card-profile shadow">
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
                  <h3 class="fuente"> 
                    <?php
                    echo $usuarioExistente->getNombre(); 
                    ?>

                  <!--<span class="font-weight-light fuente">, 27</span>-->
                  </h3>
                  <div class="h5 font-weight-300 fuente">
                  <?php
                    echo $usuarioExistente->getCorreo(); 
                    ?>
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
            <div class="card sombra bg-secondary shadow">
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
                <form>
                  <h6 class="heading-small text-muted mb-4 fuente">Información usuario</h6> 
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-username">Nombre de usuario</label>
                          <label id="input-username" class="form-control form-control-alternative fuente" placeholder="Nombre de usuario">
                            <?php
                            echo $usuarioExistente->getNombre(); 
                            ?> 
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label fuente" for="input-email">Dirección de correo</label>
                          <label id="input-email" class="form-control form-control-alternative fuente" placeholder="@example.com">
                            <?php
                            echo $usuarioExistente->getCorreo();
                            ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-first-name">Rol</label>
                          <label id="input-first-name" class="form-control form-control-alternative fuente" placeholder="">
                            <?php
                            echo $usuarioExistente->getRole(); 
                            ?>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label fuente" for="input-last-name">Género</label>
                          <label id="input-last-name" class="form-control form-control-alternative fuente" placeholder="">
                            <?php
                            echo $usuarioExistente->getGenero();
                            ?>
                          </label>
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
                      <textarea rows="4" id="descriptionLabel" class="form-control form-control-alternative fuente" disabled><?php
                          echo $usuarioExistente->getDescripcion();
                        ?>
                      </textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>