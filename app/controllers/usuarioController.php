<?php
// incluir el archivo usuarioService.php
require_once('usuarioService.php');

class UsuarioController {
    private $usuarioService;

    public function __construct() {
        $this->usuarioService = new UsuarioService();
    }

    public function listarUsuarios() {
        // llamar al método de listar usuarios del servicio
        $usuarios = $this->usuarioService->listarUsuarios();
        // devolver la lista de usuarios en formato JSON
        echo json_encode($usuarios);
    }

    public function crearUsuario($datos) {
        // llamar al método de crear usuario del servicio
        $resultado = $this->usuarioService->crearUsuario($datos);
        // devolver la respuesta en formato JSON
        echo json_encode($resultado);
    }

    public function actualizarUsuario($id, $datos) {
        // llamar al método de actualizar usuario del servicio
        $resultado = $this->usuarioService->actualizarUsuario($id, $datos);
        // devolver la respuesta en formato JSON
        echo json_encode($resultado);
    }

    public function eliminarUsuario($id) {
        // llamar al método de eliminar usuario del servicio
        $resultado = $this->usuarioService->eliminarUsuario($id);
        // devolver la respuesta en formato JSON
        echo json_encode($resultado);
    }
}
