<?php
// Requiere el archivo autoload.php que carga las clases necesarias para usar la API web de Spotify
require '../../vendor/autoload.php';

// Crea una instancia de la clase Session con los datos del cliente
$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET'
);

// Obtiene el accessToken y refreshToken actuales de un determinado usuario (mediante una llamada a una función externa)
// Esta función debe devolver un array asociativo con las claves 'accessToken' y 'refreshToken'
$userTokens = getUserTokens($userId);
$accessTokenActual = $userTokens['accessToken'];
$refreshTokenActual = $userTokens['refreshToken'];

// Si el accessToken sigue siendo válido, seteamos tanto ese accessToken como el refreshToken a la session directamente
if ($accessTokenActual) {
    $session->setAccessToken($accessTokenActual);
    $session->setRefreshToken($refreshTokenActual);
}
// En caso contrario, tenemos que generar un nuevo accessToken válido. Lo hacemos con la función refreshAccessToken, que necesita el refreshToken como entrada
else {
    $session->refreshAccessToken($refreshTokenActual);
}

// Crea una instancia de la clase SpotifyWebAPI ($api) con la opción auto_refresh activada.
//$api estará lista para ser usada por otros ficheros y realizar peticiones
$options = [
    'auto_refresh' => true,
];
$api = new SpotifyWebAPI\SpotifyWebAPI($options, $session);

// Establece la sesión en la instancia de la clase SpotifyWebAPI
$api->setSession($session);

// Obtenemos los nuevos tokens que pueden haber sido actualizados por la opción auto_refresh
$accessTokenNuevo = $session->getAccessToken();
$refreshTokenNuevo = $session->getRefreshToken();

// Guardamos los nuevos tokens en la base de datos, en el usuario correspondiente (mediante una llamada a una función externa)
actulizar($userId, $accessTokenNuevo, $refreshTokenNuevo);
?>