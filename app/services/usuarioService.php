<?php
//use MongoDB\BSON\ObjectID;
//require_once 'conexion.php';
require_once '../../vendor/autoload.php';
require_once '../models/usuario.php';

class UsuarioService {

  private $collection;

  public function __construct() {
    //$this->db = Conexion::conectar();   en principio conexion.php ya estaría bien asi y no habria que hacer fnciones
    $this->collection = (new MongoDB\Client)->LoBeat->usuarios;
  }

  public function crearUsuario($datos) {
    $fecha_creacion = new DateTime();
    $fecha_actualizacion = new DateTime();
    $usuario = new Usuario(
      $datos['nombre'],
      $datos['correo'],
      $datos['contrasenya'],
      $datos['spotify_access_token'],
      $datos['spotify_refresh_token'],
      $fecha_creacion,
      $fecha_actualizacion,
      $datos['role'],
      $datos['genero']
    );


    //...........................
    $result = $this->collection->insertOne([
      'nombre' => $usuario->getNombre(),
      'correo' => $usuario->getCorreo(),
      'contrasenya' => $usuario->getContrasenya(),
      'spotify_access_token' => $usuario->getSpotify_access_token(),
      'spotify_refresh_token' => $usuario->getSpotify_refresh_token(),
      'fecha_creacion' => $usuario->getFecha_creacion()->format('Y-m-d H:i:s'),
      'fecha_actualizacion' => $usuario->getFecha_actualizacion()->format('Y-m-d H:i:s'),
      'role' => $usuario->getRole(),
      'genero' => $usuario->getGenero()
    ]);

    return $result->getInsertedId();
  }

  public function actualizarUsuarioANTIGUO($id, $datos) {
    $usuario = new Usuario(
      $datos['nombre'],
      $datos['correo'],
      $datos['contrasenya'],
      $datos['spotify_access_token'],
      $datos['spotify_refresh_token'],
      null, // la fecha de creación no se actualiza
      new DateTime(), // se actualiza la fecha de actualización con la fecha y hora actuales
      null, // el rol no se actualiza
      null// el genero no se actualiza
    );
  
    //....................................
    $result = $this->collection->updateOne(
      ['_id' => $id],
      ['$set' => [
        'nombre' => $usuario->getNombre(),
        'correo' => $usuario->getCorreo(),
        'contrasenya' => $usuario->getContrasenya(),
        'spotify_access_token' => $usuario->getSpotify_access_token(),
        'spotify_refresh_token' => $usuario->getSpotify_refresh_token(),
        'fecha_actualizacion' => $usuario->getFecha_actualizacion()->format('Y-m-d H:i:s'),
        'role' => $usuario->getRole(),
        'genero' => $usuario->getGenero()
      ]]
    );
  
    return $result->getModifiedCount() > 0;
  }
  
  //esta función es la misma que actualizarUsuarioANTIGUO pero solo actualiza aquellos campos que $datos tenga, por lo que datos ya no tiene porque definir
  //todos los campos. Dejo la antigua en este fichero por si acaso
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

    // Finalmente, insertamos en el usuario con id $id, los nuevos campos que hay en $datos
    $result = $this->collection->updateOne(
      ['_id' => $id],
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
        $doc['nombre'],
        $doc['correo'],
        $doc['contrasenya'],
        $doc['spotify_access_token'],
        $doc['spotify_refresh_token'],
        $doc['role'],
        $doc['genero'],
        new DateTime($doc['fecha_creacion']),
        new DateTime($doc['fecha_actualizacion'])
      );
      $usuario->setId($doc['_id']);
      array_push($usuarios, $usuario);
    }
    return $usuarios;
  }
  
  public function obtenerUsuarioPorId($id) {
    $result = $this->collection->findOne(['_id' => $id]);
    if (!$result) {
      return null;
    }

    $usuario = new Usuario(
      $result['nombre'],
      $result['correo'],
      $result['contrasenya'],
      $result['spotify_access_token'],
      $result['spotify_refresh_token'],
      $result['role'],
      $result['genero'],
      new DateTime($result['fecha_creacion']),
      new DateTime($result['fecha_actualizacion'])
    );
    $usuario->setId($result['_id']);

    return $usuario;
  }

  public function buscarUsuarioPorCampo($campo, $valor) {
    $resultado = $this->collection->findOne([$campo => $valor]);
    if ($resultado) {
        return new Usuario(
            $resultado['nombre'],
            $resultado['correo'],
            $resultado['contrasenya'],
            $resultado['spotify_access_token'],
            $resultado['spotify_refresh_token'],
            $resultado['role'],
            $resultado['genero'],
            new DateTime($resultado['fecha_creacion']),
            new DateTime($resultado['fecha_actualizacion'])
        );
    } else {
        return null;
    }
  }

  public function actualizarUsuarioPorCorreo($correo, $datos) {
    $usuario = new Usuario(
      $datos['nombre'],
      $datos['correo'],
      $datos['contrasenya'],
      $datos['spotify_access_token'],
      $datos['spotify_refresh_token'],
      null, // la fecha de creación no se actualiza
      new DateTime(), // se actualiza la fecha de actualización con la fecha y hora actuales
      //$datos['role'],
      //$datos['genero'],
      null, // el rol no se actualiza
      null// el genero no se actualiza
    );
  
    //....................................
    $result = $this->collection->updateOne(
      ['correo' => $correo],
      ['$set' => [
        'nombre' => $usuario->getNombre(),
        'correo' => $usuario->getCorreo(),
        'contrasenya' => $usuario->getContrasenya(),
        'spotify_access_token' => $usuario->getSpotify_access_token(),
        'spotify_refresh_token' => $usuario->getSpotify_refresh_token(),
        'fecha_actualizacion' => $usuario->getFecha_actualizacion()->format('Y-m-d H:i:s'),
        'role' => $usuario->getRole(),
        'genero' => $usuario->getGenero()
      ]]
    );
  
    return $result->getModifiedCount() > 0;
  }


}

?>
