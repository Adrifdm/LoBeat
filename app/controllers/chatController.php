<?php
require_once '../../../app/services/chatService.php';

class ChatController {
    private $chatService;

    public function __construct() {
        $this->chatService = new ChatService();
    }

    public function crearChat($datosChat) {
        try {
            // llamar al método de crear chat del servicio
            $resultado = $this->chatService->crearChat($datosChat);
            //echo json_encode($resultado);            
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function eliminarChat($idChat) {
        try {
            // llamar al método de eliminar chat del servicio
            $resultado = $this->chatService->eliminarChat($idChat);
            //echo json_encode($resultado);            
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function listarChats() {
        try {
            // llamar al método de listar chats del servicio
            $chats = $this->chatService->listarChats();
            // devolver la lista de playlists en formato JSON
            //echo json_encode($playlists);
            return $chats;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerChatPorId($id) {
        try {
            // llamar al método de obtener chat por id del servicio
            $chatEncontrado = $this->chatService->obtenerChatPorId($id);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $chatEncontrado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function buscarChatPorCampo($campo, $valor) {
        try {
            // llamar al método de buscar chat por campo del servicio
            $chatEncontrado = $this->chatService->buscarChatPorCampo($campo, $valor);
            // devolver la respuesta en formato JSON
            //echo json_encode($usuarioEncontrado);
            return $chatEncontrado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function crearMensaje($chatId, $datosMensaje) {
        try {
            // llamar al método de crear mensaje del servicio
            $resultado = $this->chatService->crearMensaje($chatId, $datosMensaje);
            //echo json_encode($resultado);            
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerMensajes($chatId) {
        try {
            // llamar al método de obtener mensajes del servicio
            $resultado = $this->chatService->obtenerMensajes($chatId);
            //echo json_encode($resultado);            
            return $resultado;
        } catch (Exception $e) {
            // capturar cualquier excepción y devolver un mensaje de error al cliente
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

}
?>