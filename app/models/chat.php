<?php
class Chat {

    private $chat_participants; //array con los id de los usuarios participantes
    private $chat_messages;
    /*
    array que se divide en:
    id: del 1 en adelante (también sirve para el orden)
    content: texto de los mensajes
    time: fecha y hora del mensaje
    remitente:
    destinatario:
    */

    public function __construct($participants, $messages) {
        $this->chat_participants = $participants;
        $this->chat_messages = $messages;
    }

    public function getParticipants() {
        return $this->chat_participants;
    }

    public function setParticipants($participants) {
        $this->chat_participants = $participants;
    }

    public function getMessages() {
        return $this->chat_messages;
    }

    public function setMessages($messages) {
        $this->chat_messages = $messages;
    }

}

?>