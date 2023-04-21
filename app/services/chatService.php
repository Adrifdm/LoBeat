<?php
require_once '../../../vendor/autoload.php';
require_once '../../../app/models/chat.php';

class ChatService {

    private $collection;

    public function __construct() {
        $this->collection = (new MongoDB\Client)->LoBeat->chats;
    }

    public function crearChat($datos) {

        if (isset($datos['chat_participante1'], $datos['chat_participante2'])) {

            // Formateo atributo participants
            $participants = array();
            $participants['p1'] = $datos['chat_participante1'];
            $participants['p2'] = $datos['chat_participante2'];

            // Formateo atributo message
            $messages = array();

            $chat = new Chat(
                $participants,
                $messages
            );

            $result = $this->collection->insertOne([
                'participantes' => $chat->getParticipants(),
                'mensajes' => $chat->getMessages()
            ]);

            return $result->getInsertedId();

        }
        else {
            return null;
        }

        
    }

    public function eliminarChat($id) {

        $result = $this->collection->deleteOne(['_id' => $id]);

        return $result->getDeletedCount() > 0;
    }

    public function actualizarChat($id, $datos) {
        
        // Comprobamos campo a campo si $datos lo tiene
        if (isset($datos['participantes'])) {
            $set['participantes'] = $datos['participantes'];
        }

        // El campo mensaje no se actualiza desde aquí
        
        // Finalmente, insertamos en el chat con id $id, los nuevos campos que hay en $datos
        $result = $this->collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            [
            '$set' => $set,
            ]
        );

        return $result->getModifiedCount() > 0;
    }

    public function listarChats() {
        $result = $this->collection->find();
        $chats = [];
        foreach ($result as $doc) {
            $chat = new Chat(
                $doc['participantes'],
                $doc['mensajes']
            );
            $chats[] = $chat;
        }
        return $chats;
    }

    public function obtenerChatPorId($id) {
        $result = $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
        if ($result) {
            $chat = new Chat(
                $result['participantes'],
                $result['mensajes']
            );
            return $chat;
        } else {
            return null;
        }
    }

    public function buscarChatPorCampo($campo, $valor) {
        $result = $this->collection->findOne([$campo => $valor]);
        if (!empty($result)) {
            $chat = new Chat(
                $result['participantes'],
                $result['mensajes']
            );
            return $chat;
        } else {
            return null;
        }
    }

    public function crearMensaje($id, $message) {

        $datos = null;

        if (isset($message['content'], $message['remitente'], $message['destinatario'])) {

            // Generamos un hash único que funcionará como id del mensaje (se obtiene en base a su fecha y contenido)
            $time = new DateTime();
            $hash = md5($message['content'] . $time->format('Y-m-d H:i:s'));

            // Construccion del mensaje
            $datosMensaje = array(
                'id' => $hash,
                'content' => $message['content'],
                'time' => $time->format('Y-m-d H:i:s'),
                'remitente' => $message['remitente'],
                'destinatario' => $message['destinatario']
            );
    
            // Actualizar el chat con el nuevo mensaje
            $this->collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$push' => ['mensajes' => $datosMensaje]]
            );

            $datos = $datosMensaje;
 
        }

        return $datos;

    }

    /*
    public function eliminarMensaje($id, $messageId) {

        $chat = $this->obtenerChatPorId($id);
        
        if ($chat) {
            $messages = $chat->getMessages();
            foreach ($messages as $index => $message) {
                $messageArray = $message->getArrayCopy();
                if ($messageArray['id'] == $messageId) {
                    unset($messages[$index]);
                    $result = $this->collection->updateOne(
                        ['_id' => new MongoDB\BSON\ObjectID($id)],
                        ['$set' => ['mensajes' => array_values($messages)]]     //esta linea da error
                    );
                    if ($result->getModifiedCount() == 1) {
                        return true;
                    }
                }
            }
        }
        return false;

    }
    */
    
    public function obtenerMensajes($id) {
        $resultado = $this->obtenerChatPorId($id);

        if ($resultado && !empty($resultado->getMessages())) {
            return $resultado->getMessages();
        }
        else {
            return null;
        }

    }

}

?>