<style>
.error{
  display:flex;
  position:absolute;
  min-width: 300px;
  min-height: 30px;
  border-radius: 10px;
  padding: 10px 15px;
  bottom: 70px;
  right: 30px;
  background: #ff6860;
  border: 2px solid #dc1818;
  color: #3d0818;
}

</style>
<?php
require_once '../controllers/usuarioController.php';

// Crear una instancia de UsuarioController
$usuarioController = new UsuarioController();

// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtenemos la informacion introducida
    $correo = $_POST['email'];
    $contrasenya = $_POST['password'];

    // Comprobamos si existe algún usuario con ese correo
    $usuarioExistente = $usuarioController->buscarUsuarioPorCampo('correo', $correo);
    
    if ($usuarioExistente !== null) {

        // Comprobamos si se ha introducido la contraseña correcta
        $contrasenyaCorrecta = $usuarioExistente->getContrasenya();

        if ($contrasenya != $contrasenyaCorrecta) {
            ?>
            <div class = "error">
                <p>La contraseña introducida no es correcta </p>
            </div>
            <?php
            exit;
        }

        header('Location: pagPrincipal.php');       
        exit;

    } else {
        ?>
        <div class = "error">
            <p> El correo es inválido</p>
        </div>
            <?php
        exit;        
    }

}
?>
