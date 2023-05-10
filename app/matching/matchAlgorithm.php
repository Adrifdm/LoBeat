<?php
require_once '../../../app/controllers/spotifyController.php';
require_once '../../../app/controllers/playlistController.php';
require_once '../../../app/controllers/usuarioController.php';

session_start();

$usuarioController = new UsuarioController();
$spotifyController = new SpotifyController(); 
$playlistsController = new PlaylistsController();

//Obtenemos la lista de usuarios sobre la que aplicaremos el algoritmo
$user = $usuarioController->obtenerUsuarioPorId($_SESSION['logged_user_id']);
$listaUsuarios = $usuarioController->getUsuariosCercanos($user->getLatitud(),$user->getLongitud());

//Funcion para recopilar los datos que utilizaremos para realizar el algoritmo, se aplicara para recopilar la info de los diferentes usuarios
function matchData($userId) {
   
    //Obtenemos el usuario
    $user = $usuarioController->obtenerUsuarioPorId($userId);
    
    //Obtenemos la info de las 5 canciones recientemente escuchadas
    $recently_played_info = $spotifyController->obtenerRecentlyPlayed($userId);
    
    //Obtenemos los datos de los tags
    $matchlistUserData = $user->getMatchlist();
    $matchlist = $playlistsController->obtenerPlaylist($matchlistUserData['spotifyId']);
    $tagInfo = $matchlist->getPlaylistTags();

    //Creamos un array con los datos
    $matchlistData = array(
        'generoMasEscuchado' => $recently_played_info['generoMasEscuchado'],
        'ult5tracks' => $recently_played_info['artistas'],
        'popularidadMedia' => $tagInfo['popularidadMedia'],
        'artistaMasEscuchado' => $tagInfo['artistaMasEscuchado'],
        'generoSeleccionado' => $tagInfo['generoSeleccionado']
    );

    return $matchlistData;
}

//Lista con los matches
$matches = [];
//Datos para el matching del usuario logeado
$datosMatchLoggedUser = matchData($_SESSION['logged_user_id']);

//Peso para cada tag
$popularidadWeight = 0.6;
$artistaWeight = 0.2;
$generoWeight = 0.2;

foreach ($listaUsuarios as $usuario){

    $datosUsuario = matchData($usuario['_id']);

    // Calcular la compatibilidad basada en los tags y el género predominante de las últimas 5 canciones escuchadas
    $popularidadDiff += abs($datosMatchLoggedUser['popularidadMedia'] - $datosUsuario['popularidadMedia']);
    $artistaDiff += ($datosMatchLoggedUser['artistaMasEscuchado'] == $datosUsuario['artistaMasEscuchado']) ? 0 : 1;
    $generoDiff += ($datosMatchLoggedUser['generoMasEscuchados'] == $datosUsuario['generoMasEscuchados']) ? 0 : 1;
    $generoSeleccionadoDiff += ($datosMatchLoggedUser['generoSeleccionado'] == $datosUsuario['generoSeleccionado']) ? 0 : 1;

    $compatibility = 1 - (
        ($popularidadWeight * $popularidadDiff) +
        ($artistaWeight * $artistaDiff) +
        ($generoWeight * $generoDiff) +
        ($generoWeight * $generoSeleccionadoDiff)
    );

    // Si es igual a 1 incluimos al usuario en la lista de matches
    if($compatibility >= 0.7){
        $matches[] = $usuario;
    }
}


?>