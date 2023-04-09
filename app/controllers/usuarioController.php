<?php
// incluir el archivo usuarioService.php
require_once '../../../app/services/usuarioService.php';

class UsuarioController {
    private $usuarioService;

    public function __construct() {
        $this->usuarioService = new UsuarioService();
    }

    public function crearUsuario($datos) {
        try {
            // llamar al método de crear usuario del servicio
            $resultado = $this->usuarioService->crearUsuario($datos);
            //echo json_encode($resultado);            
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function actualizarUsuario($id, $datos) {
        try {
            // llamar al método de actualizar usuario del servicio
            $resultado = $this->usuarioService->actualizarUsuario($id, $datos);
            // devolver la respuesta en formato JSON
            //echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function eliminarUsuario($id) {
        try {
            // llamar al método de eliminar usuario del servicio
            $resultado = $this->usuarioService->eliminarUsuario($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function listarUsuarios() {
        try {
            // llamar al método de listar usuarios del servicio
            $usuarios = $this->usuarioService->listarUsuarios();
            // devolver la lista de usuarios en formato JSON
            //echo json_encode($usuarios);
            return $usuarios;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerUsuarioPorId($id) {
        try {
            // llamar al método de obtener usuario por id del servicio
            $usuarioEncontrado = $this->usuarioService->obtenerUsuarioPorId($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $usuarioEncontrado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function buscarUsuarioPorCampo($campo, $valor) {
        try {
            // llamar al método de buscar usuario por campo del servicio
            $usuarioEncontrado = $this->usuarioService->buscarUsuarioPorCampo($campo, $valor);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $usuarioEncontrado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
}
?>