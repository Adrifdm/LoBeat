<?php
require_once PATH5 . '/LoBeat/app/models/notification.php';
class NotificationService{

    private $collection;

    public function __construct() {
        $this->collection = (new MongoDB\Client)->LoBeat->notifications;
      }
    
    public function crearNotificacion($datos) {

        $notification = new Notification(
            "",
            $datos['userId'],
            $datos['name'],
            $datos['description'],
            $datos['icon'],
            $datos['read']
        );

        $result = $this->collection->insertOne([
            'userId' => $notification->getUserId(),
            'name' => $notification->getName(),
            'description' => $notification->getDescription(),
            'icon' => $notification->getIcon(),
            'read' => $notification->getRead()
        ]);

        return $result->getInsertedId();
    }
    
    public function listarNotificaciones() {
        $result = $this->collection->find();
        $notifications = [];
        foreach ($result as $doc) {
            $notification = new Notification(
            $doc['id'],
            $doc['userId'],
            $doc['name'],
            $doc['description'],
            $doc['icon'],
            $doc['read']
            );
            $notifications[] = $notification;
        }
        return $notifications;
    }

    public function listarNotificacionesPorId($userId) {
        $result = $this->collection->find();
        $notifications = [];
        foreach ($result as $doc) {
            if ($doc->userId == $userId){
                $notification = new Notification(
                $doc['_id']->__toString(),
                $doc['userId'],
                $doc['name'],
                $doc['description'],
                $doc['icon'],
                $doc['read']
                );
                $notifications[] = $notification;
            }
        }
        return $notifications;
    }
    
    public function obtenerNotification($id) {
        $result = $this->collection->findOne(['id' => new MongoDB\BSON\ObjectID($id)]);
        if ($result) {
            $notification = new Notification(
            $result['_id']->__toString(),
            $result['userId'],
            $result['name'],
            $result['description'],
            $result['icon'],
            $result['read']
            );
            return $notification;
        } else {
            return null;
        }
    }
    
    public function buscarNotificacionPorCampo($campo, $valor) {
        $result = $this->collection->find([$campo => $valor])->toArray();
        $notifications = [];
        if (!empty($result)) {
            foreach ($result as $doc) {
                $docArray = $doc->getArrayCopy();
                $notification = new Notification(
                    $docArray['_id']->__toString(),
                    $docArray['userId'],
                    $docArray['name'],
                    $docArray['description'],
                    $docArray['icon'],
                    $docArray['read'],
                );
                $notifications[] = $notification;
            } 
            return $notifications;
        } else {
            return null;
        }
    }
    
    public function eliminarNotificacion($id) {
        $result = $this->collection->deleteMany(['id' => $id]);

        return $result->getDeletedCount() > 0;
    }

    public function leerNotificacion($id) {
        
        $set['read'] = true;

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
      
/*
    public function listNotifications(){
        foreach($this->notifications as $notification){
            if (!$notification["read"]){
                echo "<li>
                  <div>
                    <div class='notification'>
                      <div class='icon-container'>
                          <img src= '../../../public/assets/img/".$notification["icon"]."' alt='Icono de notificación'>
                      </div>
                      <div class='info-container'>
                          <p class='sender'>".$notification['name']."</p>
                          <p class='type'>".$notification["description"]."</p>
                      </div>
                      <div class='button-container'>
                          <button onclick='deleteNotification(".$notification["id"].")' class='view-button'>Marcar como vista</button>
                      </div>
                    </div>
                  </div>
                </li>";
              }
        }
    }
    */
}
?>