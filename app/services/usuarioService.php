<?php
//use MongoDB\BSON\ObjectID;
require_once 'usuario.php';
require_once 'conexion.php';;

class UsuarioService {

  private $collection;

  public function __construct() {
    //$this->db = Conexion::conectar();   en principio conexion.php ya estaría bien asi y no habria que hacer fnciones
    $this->collection = DB->usuario;
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
      $fecha_actualizacion
    );

    $result = $this->collection->insertOne([
      'nombre' => $usuario->getNombre(),
      'correo' => $usuario->getCorreo(),
      'contrasenya' => $usuario->getContrasenya(),
      'spotify_access_token' => $usuario->getSpotify_access_token(),
      'spotify_refresh_token' => $usuario->getSpotify_refresh_token(),
      'fecha_creacion' => $usuario->getFecha_creacion()->format('Y-m-d H:i:s'),
      'fecha_actualizacion' => $usuario->getFecha_actualizacion()->format('Y-m-d H:i:s')
    ]);

    return $result->getInsertedId();
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
      new DateTime($result['fecha_creacion']),
      new DateTime($result['fecha_actualizacion'])
    );
    $usuario->setId($result['_id']);

    return $usuario;
  }

  public function actualizarUsuario($id, $datos) {
    $usuario = new Usuario(
      $datos['nombre'],
      $datos['correo'],
      $datos['contrasenya'],
      $datos['spotify_access_token'],
      $datos['spotify_refresh_token'],
      null, // la fecha de creación no se actualiza
      new DateTime() // se actualiza la fecha de actualización con la fecha y hora actuales
    );
  
    $result = $this->collection->updateOne(
      ['_id' => $id],
      ['$set' => [
        'nombre' => $usuario->getNombre(),
        'correo' => $usuario->getCorreo(),
        'contrasenya' => $usuario->getContrasenya(),
        'spotify_access_token' => $usuario->getSpotify_access_token(),
        'spotify_refresh_token' => $usuario->getSpotify_refresh_token(),
        'fecha_actualizacion' => $usuario->getFecha_actualizacion()->format('Y-m-d H:i:s')
      ]]
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
        new DateTime($doc['fecha_creacion']),
        new DateTime($doc['fecha_actualizacion'])
      );
      $usuario->setId($doc['_id']);
      array_push($usuarios, $usuario);
    }
    return $usuarios;
  }
  
}

?>
