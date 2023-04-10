<?php
require_once '../../../vendor/autoload.php';
require_once '../../../app/models/usuario.php';

class UsuarioService {

  private $collection;

  public function __construct() {
    $this->collection = (new MongoDB\Client)->LoBeat->usuarios;
  }

  public function crearUsuario($datos) {
    $fecha_creacion = new DateTime();
    $fecha_actualizacion = new DateTime();
    $usuario = new Usuario(
      "",
      $datos['nombre'],
      $datos['correo'],
      $datos['contrasenya'],
      $datos['spotify_access_token'],
      $datos['spotify_refresh_token'],
      $fecha_creacion,
      $fecha_actualizacion,
      $datos['role'],
      $datos['genero'],
      $datos['descripcion'],
      $datos['fotoPerfil'],
      $datos['latitud'] ?? null,
      $datos['longitud'] ?? null,
      $datos['spotify_ID'],

      $datos['nMatches'],
      $datos['nPlaylists'],
      $datos['nChats']
    );

    $result = $this->collection->insertOne([
      'nombre' => $usuario->getNombre(),
      'correo' => $usuario->getCorreo(),
      'contrasenya' => $usuario->getContrasenya(),
      'spotify_access_token' => $usuario->getSpotify_access_token(),
      'spotify_refresh_token' => $usuario->getSpotify_refresh_token(),
      'fecha_creacion' => $usuario->getFecha_creacion()->format('Y-m-d H:i:s'),
      'fecha_actualizacion' => $usuario->getFecha_actualizacion()->format('Y-m-d H:i:s'),
      'role' => $usuario->getRole(),
      'genero' => $usuario->getGenero(),
      'descripcion' => $usuario->getDescripcion(),
      'fotoPerfil' => $usuario->getFotoPerfil(),
      'spotify_ID' => $usuario->getSpotifyID(),

      'nMatches' => $usuario->getnMatches(),
      'nPlaylists' => $usuario->getnPlaylists(),
      'nChats' => $usuario->getnChats(),

    ]);

    return $result->getInsertedId();
  }

  public function actualizarUsuario($id, $datos) {
    
    // Comprobamos campo a campo si $datos lo tiene
    // Aunque no tenga mucho sentido, en $datos podemos definir una fecha_creacion y fecha_actualizacion concretas (para forzar unas fechas concretas podrías ser útil)
    // Por eso sigue estando el if. Sin embargo, en fecha_actualizacion existe un else que en caso de no haber nada en datos, siempre añadirá una nueva fecha
    if (isset($datos['nombre'])) {
      $set['nombre'] = $datos['nombre'];
    }

    if (isset($datos['correo'])) {
      $set['correo'] = $datos['correo'];
    }

    if (isset($datos['contrasenya'])) {
      $set['contrasenya'] = $datos['contrasenya'];
    }

    if (isset($datos['spotify_access_token'])) {
      $set['spotify_access_token'] = $datos['spotify_access_token'];
    }

    if (isset($datos['spotify_refresh_token'])) {
      $set['spotify_refresh_token'] = $datos['spotify_refresh_token'];
    }

    if (isset($datos['fecha_creacion'])) {
      $set['fecha_creacion'] = $datos['fecha_creacion'];
    }

    if (isset($datos['fecha_actualizacion'])) {
      $set['spotify_refresh_token'] = $datos['spotify_refresh_token'];
    } else {
      $fecha_actualizacion = new DateTime();
      $set['fecha_actualizacion'] = $fecha_actualizacion->format('Y-m-d H:i:s');
    }

    if (isset($datos['role'])) {
      $set['role'] = $datos['role'];
    }

    if (isset($datos['genero'])) {
      $set['genero'] = $datos['genero'];
    }

    if (isset($datos['descripcion'])) {
      $set['descripcion'] = $datos['descripcion'];
    }

    if (isset($datos['fotoPerfil'])) {
      $set['fotoPerfil'] = $datos['fotoPerfil'];
    }

    if (isset($datos['latitud'])) {
      $set['latitud'] = $datos['latitud'];
    }

    if (isset($datos['longitud'])) {
      $set['longitud'] = $datos['longitud'];
    }

    if (isset($datos['spotify_ID'])) {
      $set['spotify_ID'] = $datos['spotify_ID'];
    }

    if (isset($datos['nMatches'])) {
      $set['nMatches'] = $datos['nMatches'];
    }

    if (isset($datos['nPlaylists'])) {
      $set['nPlaylists'] = $datos['nPlaylists'];
    }

    if (isset($datos['nChats'])) {
      $set['nChats'] = $datos['nChats'];
    }
    
    // Finalmente, insertamos en el usuario con id $id, los nuevos campos que hay en $datos
    $result = $this->collection->updateOne(
      ['_id' => new MongoDB\BSON\ObjectId($id)],
      [
        '$set' => $set,
      ],
      //['upsert' => true] esta opcion hace que si no se encuentra el usuario que hay que actualizar, se crea uno nuevo (mejor no lo activamos)
    );

    return $result->getModifiedCount() > 0;
  }

  public function eliminarUsuario($id) {
    $result = $this->collection->deleteOne(['_id' => $id]);

    return $result->getDeletedCount() > 0;
  }

  public function listarUsuarios() {
    $result = $this->collection->find();
    $usuarios = [];
    foreach ($result as $doc) {
      $usuario = new Usuario(
        $doc['_id']->__toString(),          //mirar si lo del _id aqui funciona
        $doc['nombre'],
        $doc['correo'],
        $doc['contrasenya'],
        $doc['spotify_access_token'],
        $doc['spotify_refresh_token'],
        new DateTime($doc['fecha_creacion']),
        new DateTime($doc['fecha_actualizacion']),
        $doc['role'],
        $doc['genero'],
        $doc['descripcion'],
        $doc['fotoPerfil'],
        $doc['latitud'],
        $doc['longitud'],
        $doc['spotify_ID'],

        $doc['nMatches'], 
        $doc['nPlaylists'], 
        $doc['nChats'],
        
      );
      $usuario->setId($doc['_id']->__toString());   //mirar si lo del _id aqui funciona
      array_push($usuarios, $usuario);
    }
    return $usuarios;
  }
  
  public function obtenerUsuarioPorId($id) {
    $result = $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    if (!$result) {
      return null;
    }

    $usuario = new Usuario(
      $result['_id']->__toString(),   //mirar si lo del _id aqui funciona,
      $result['nombre'],
      $result['correo'],
      $result['contrasenya'],
      $result['spotify_access_token'],
      $result['spotify_refresh_token'],
      new DateTime($result['fecha_creacion']),
      new DateTime($result['fecha_actualizacion']),
      $result['role'],
      $result['genero'],
      $result['descripcion'],
      $result['fotoPerfil'],
      $result['latitud'] ?? null,
      $result['longitud'] ?? null,
      $result['spotify_ID'],   //nose si hará falta poner aqui un toString o algo

      $result['nMatches'], 
      $result['nPlaylists'], 
      $result['nChats'] 
    );
    $usuario->setId($result['_id']->__toString());    //mirar si lo del _id aqui funciona,

    return $usuario;
  }

  public function buscarUsuarioPorCampo($campo, $valor) {
    $resultado = $this->collection->findOne([$campo => $valor]);
    if ($resultado) {
      return new Usuario(
        $resultado['_id']->__toString(),
        $resultado['nombre'],
        $resultado['correo'],
        $resultado['contrasenya'],
        $resultado['spotify_access_token'],
        $resultado['spotify_refresh_token'],
        new DateTime($resultado['fecha_creacion']),
        new DateTime($resultado['fecha_actualizacion']),
        $resultado['role'],
        $resultado['genero'],
        $resultado['descripcion'],
        $resultado['fotoPerfil'],
        $resultado['latitud'] ?? null,
        $resultado['longitud'] ?? null,
        $resultado['spotify_ID'],

        $resultado['nMatches'], 
        $resultado['nPlaylists'], 
        $resultado['nChats'],
      );
    } else {
      return null;
    }
  }
}

?>
