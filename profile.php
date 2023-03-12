<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap-argon.css">
    <link rel="stylesheet" href="css/profile.css">

    <script src="https://kit.fontawesome.com/dee2748eb0.js" crossorigin="anonymous"></script>
</head>
<body>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <?php
      require("cabecera.php");
    ?>

    <div class="main-content">
      <!-- Introducción -->
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(img/fondoLogin.png); background-size: cover; background-position: center top;">
        <!-- Máscara -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Contenido introducción -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-black">Perfil</h1>
              <p class="text-black mt-0 mb-5">Esta es tu página de perfil, desde la que podrás revisar toda la información que has introducido hasta ahora y modificarla en caso de haber algún error.</p>
              <a href="#!" class="btn btn-info">Editar perfil</a>
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
                      <img src="img/profileAvatar.png" class="rounded-circle">
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
                        <span class="heading">10</span>
                        <span class="description">Matches</span>
                      </div>
                      <div>
                        <span class="heading">6</span>
                        <span class="description">Playlists</span>
                      </div>
                      <div>
                        <span class="heading">7</span>
                        <span class="description">Chats</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                    Alejandro González<span class="font-weight-light">, 27</span>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>Asturias, España
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Estudiante de derecho
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>Universidad autónoma de Barcelona
                  </div>
                  <hr class="my-4">
                  <p>No soy solo una cara bonita; también tengo un cerebro. Soy el tipo bueno de chico malo. Busco a alguien que haga que mi fin de semana sea increíble. ¿Buscas un tipo que literalmente pueda borrar Tinder después de nuestra primera cita?</p>
                  <a href="#">Show more</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Mi cuenta</h3>
                  </div>
                  <div class="col-4 text-right">
                    <!--<a href="#!" class="btn btn-sm btn-primary">Settings</a>-->
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form>
                  <h6 class="heading-small text-muted mb-4">Información usuario</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-username">Nombre de usuario</label>
                          <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Nombre de usuario" value="">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Dirección de correo</label>
                          <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="@example.com">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-first-name">Nombre</label>
                          <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Apellidos</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Información de contacto</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-address">Dirección</label>
                          <input id="input-address" class="form-control form-control-alternative" placeholder="Dirección" value="Calle, nº, piso, puerta" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-city">Ciudad</label>
                          <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-country">País</label>
                          <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Código Postal</label>
                          <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">Sobre mí</h6>
                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label>Sobre mí</label>
                      <textarea rows="4" class="form-control form-control-alternative" placeholder="Unas palabras sobre tí"></textarea>
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