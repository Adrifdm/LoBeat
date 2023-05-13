<?php
define("PATH5", $_SERVER['DOCUMENT_ROOT']);
require_once PATH5 . '/LoBeat/app/services/notificationService.php';

class NotificationController {
    private $usuarioController;
    private $notificationService;

    public function __construct() {
        $this->usuarioController = new UsuarioController();
        $this->notificationService = new NotificationService();
    }

    public function crearNotificacion($datos) {
        try {
             // llamar al método de crear notificación del servicio
             $resultado = $this->notificationService->crearNotificacion($datos);
             //echo json_encode($resultado);            
             return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function listarNotificaciones() {
        try {
            // llamar al método de listar notificaciones del servicio
            $notifications = $this->notificationService->listarNotificaciones();
            // devolver la lista de playlists en formato JSON
            //echo json_encode($playlists);
            return $notifications;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function listarNotificacionesPorUserId($userId) {
        try {
            // llamar al método de listar notificaciones del servicio
            $notifications = $this->notificationService->listarNotificacionesPorId($userId);
            // devolver la lista de playlists en formato JSON
            //echo json_encode($playlists);
            return $notifications;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerNotificacionPorId($id) {
        try {
            // llamar al método de obtener notificacion por id del servicio
            $notificationFound = $this->notificationService->obtenerNotification($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $notificationFound;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function buscarNotificacionPorCampo($campo, $valor) {
        try {
            // llamar al método de buscar notificacion por campo del servicio
            $notificationFound = $this->notificationService->buscarNotificacionPorCampo($campo, $valor);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $notificationFound;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }  

    public function eliminarNotificacion($id) {
        try {
            // llamar al método de eliminar notificacion del servicio
            $resultado = $this->notificationService->eliminarNotificacion($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($resultado);
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function leerNotificacion($id){
        try{
            //llamar al método que lee una notificacion por id del servicio
            $resultado = $this->notificationService->leerNotificacion($id);
            return $resultado;
        } catch (Exception $e){
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>