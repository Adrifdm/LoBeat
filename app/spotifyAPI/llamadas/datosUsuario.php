<?php
require '../../../vendor/autoload.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}  
$api = new SpotifyWebAPI\SpotifyWebAPI();
$collection = (new MongoDB\Client)->LoBeat->usuarios;
$result = $collection->findOne([
    '_id' => new MongoDB\BSON\ObjectID($_SESSION['logged_user_id'])
]);
// Fetch the saved access token from somewhere. A session for example.
$api->setAccessToken($result['spotify_access_token']);

// Utilizamos el endpoint "Get Current User's Profile" o "me()" para solicitar información sobre el usuario actual
$user_data = $api->me();

// Array en el que almacenamos todos los datos
$user_data_array = array();

//--------------------------------------------- FORMATEO DE DATOS ----------------------------------------------------

/*  country : string
    The country of the user, as set in the user's account profile. An ISO 3166-1 alpha-2 country code.
    This field is only available when the current user has granted access to the user-read-private scope.
*/
$user_data_array['country'] = $user_data->country;

/*  display_name : string
    The name displayed on the user's profile. null if not available.
*/
$user_data_array['display_name'] = $user_data->display_name;

/*  email : string
    The user's email address, as entered by the user when creating their account. Important! This email
    address is unverified; there is no proof that it actually belongs to the user. This field is only
    available when the current user has granted access to the user-read-email scope.
*/
$user_data_array['email'] = $user_data->email;

/*  explicit_content : object   
    The user's explicit content settings. This field is only available when the current user has granted
    access to the user-read-private scope.
    --> filter_enabled : boolean
        When true, indicates that explicit content should not be played.
    --> filter_locked : boolean
        When true, indicates that the explicit content setting is locked and can't be changed by the user.
*/
$user_data_array['explicit_content'] = array(
    'filter_enabled' => $user_data->explicit_content->filter_enabled,
    'filter_locked' => $user_data->explicit_content->filter_locked
);

/*  external_urls : object
    Known external URLs for this user.
    --> spotify : string
        The Spotify URL for the object.
*/
$user_data_array['external_urls'] = array(
    'spotify' => $user_data->external_urls->spotify
);

/*  followers : object
    Information about the followers of the user.
    --> href : string (Nullable)
        This will always be set to null, as the Web API does not support it at the moment.
    --> total : integer
        The total number of followers.
*/
$user_data_array['followers'] = array(
    'href' => $user_data->followers->href,
    'total' => $user_data->followers->total
);

/*  href : string
    A link to the Web API endpoint for this user.
*/
$user_data_array['href'] = $user_data->href;

/*  id : string
    The Spotify user ID for the user.
*/
$user_data_array['id'] = $user_data->id;

/*  images : array of ImageObject
    The user's profile image.
    --> url : string (Required)
        The source URL of the image.
        Example value: "https://i.scdn.co/image/ab67616d00001e02ff9ca10b55ce82ae553c8228"
    --> height : integer (Required) (Nullable)
        The image height in pixels.
        Example value: 300
    --> width : integer (Required) (Nullable)
        The image width in pixels.
        Example value: 300
*/
if (!empty($user_data->images)) {
    foreach ($user_data->images as $image) {
        $images_array[] = array(
            'url' => $image->url,
            'height' => $image->height,
            'width' => $image->width
        );
    }
}
else {
    $images_array[] = array();
}

$user_data_array['images'] = $images_array;

/*  product : string
    The user's Spotify subscription level: "premium", "free", etc. (The subscription level "open" can be
    considered the same as "free".) This field is only available when the current user has granted access
    to the user-read-private scope.
*/
$user_data_array['product'] = $user_data->product;

/*  type : string
    The object type: "user"
*/
$user_data_array['type'] = $user_data->type;

/*  uri : string
   The Spotify URI for the user.
*/
$user_data_array['uri'] = $user_data->uri;

//--------------------------------------------------------------------------------------------------------------------

// Devolvemos el array con toda la información
return $user_data_array;

?>