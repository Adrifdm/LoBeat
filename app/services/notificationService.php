<?php
require_once '../../../app/models/notification.php';
class notificationService{

    private $notifications;
    
    public function __construct(){
        $this->notifications = array();
    }

    public function addNotification($name, $icon, $description){
        $newNotification = new Notification(rand(), $name, $description, $icon, false);
        array_push($this->notifications, $newNotification);
    }

    public function deleteNotification($id){
        if (($clave = array_search($id, $this->notifications)) !== false) {
            unset($this->notifications[$clave]);
        }
    }

    public function getNotification($id){
        $result = -1;

        if (($clave = array_search($id, $this->notifications)) !== false) {
            $result = ($this->notifications[$clave]);
        }

        return $result;
    }

    public function readNotification($id){
        if (($clave = array_search($id, $this->notifications)) !== false) {
            $not['read'] = true;
        }
    }

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
}
?>