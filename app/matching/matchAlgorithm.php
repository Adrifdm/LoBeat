<?php
define("PATH2", $_SERVER['DOCUMENT_ROOT']);
require_once PATH2 . '/LoBeat/app/controllers/spotifyController.php';
require_once PATH2 . '/LoBeat/app/controllers/usuarioController.php';

session_start();

$usuarioController = new UsuarioController();
$spotifyController = new SpotifyController();

//Obtenemos la lista de usuarios sobre la que aplicaremos el algoritmo
$user = $usuarioController->obtenerUsuarioPorId($_SESSION['logged_user_id']);
$listaUsuarios = $usuarioController->getUsuariosCercanos($user->getLatitud(),$user->getLongitud());

//Funcion para recopilar los datos que utilizaremos para realizar el algoritmo, se aplicara para recopilar la info de los diferentes usuarios
function matchData($userId) {

    $usuarioController = new UsuarioController();
    $spotifyController = new SpotifyController();   

    $spotifyController->refrescarTokens($userId);
   
    //Obtenemos el usuario
    $user = $usuarioController->obtenerUsuarioPorId($userId);
    
    //Obtenemos la info de las 5 canciones recientemente escuchadas
    $recently_played_info = $spotifyController->obtenerRecentlyPlayed($userId);
    
    //Obtenemos los datos de los tags
    $matchlistUserData = $user->getMatchlist();
    $tagInfo = $matchlistUserData['tags'];

    //Creamos un array con los datos
    $matchlistData = array(
        'ultArtistaMasEscuchado' => $recently_played_info,
        'popularidadMedia' => $tagInfo['popularidadMedia'],
        'artistaMasEscuchado' => $tagInfo['artistaMasEscuchado'],
        'generoSeleccionado' => $tagInfo['generosMasEscuchados']
    );

    return $matchlistData;
}

//Lista con los matches
$matches = [];
//Datos para el matching del usuario logeado
$datosMatchLoggedUser = matchData($_SESSION['logged_user_id']);

//Peso para cada tag
$popularidadWeight = 0.3;
$artistaWeight = 0.6;
$ultArtistaWeight = 0.3;
$generoWeight = 0.6;

foreach ($listaUsuarios as $usuario){

    $popularidadDiff = 0;
    $artistaDiff = 0;
    $ultArtistaMasEscuchadoDiff = 0;
    $generoSeleccionadoDiff = 0;

    $datosUsuario = matchData($usuario['_id']);

    // Calcular la compatibilidad basada en los tags y el género predominante de las últimas 5 canciones escuchadas
    $popularidadDiff += (abs($datosMatchLoggedUser['popularidadMedia'] - $datosUsuario['popularidadMedia']) < 5) ? 0 : 1;
    $artistaDiff += ($datosMatchLoggedUser['artistaMasEscuchado'] == $datosUsuario['artistaMasEscuchado']) ? 0 : 1;
    $ultArtistaMasEscuchadoDiff += ($datosMatchLoggedUser['ultArtistaMasEscuchado'] == $datosUsuario['ultArtistaMasEscuchado']) ? 0 : 1;
    $generoSeleccionadoDiff += ($datosMatchLoggedUser['generoSeleccionado'] == $datosUsuario['generoSeleccionado']) ? 0 : 1;

    $a = $popularidadWeight * $popularidadDiff;
    $b = $artistaWeight * $artistaDiff;
    $c = $ultArtistaWeight * $ultArtistaMasEscuchadoDiff;
    $d = $generoWeight * $generoSeleccionadoDiff;

    $compatibility = 1 - (($a + $b + $c + $d)/4);

    // Si es igual a 1 incluimos al usuario en la lista de matches
    if($compatibility >= 0.7){
        $usuarioArray = $usuario->bsonSerialize();
        $matches[] = ($usuarioArray->_id)->__toString();
    }
}

$datos = array(
    'listaMatchs' => $matches
);

$usuarioController->actualizarUsuario($_SESSION['logged_user_id'], $datos);
$_SESSION['vista'] = "lista";
$_SESSION['connect'] = true;
header('Location: ../views/principal/pagPrincipal.php');
?>