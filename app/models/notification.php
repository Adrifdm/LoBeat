<?php
class Notification{

    private $id;
    private $userId;
    private $name;
    private $description;
    private $icon;
    private $read;

    public function __construct($id, $userId, $name, $description, $icon, $read) {
    $this->id = $id;
    $this->userId = $userId;
    $this->name = $name;
    $this->description = $description;
    $this->icon = $icon;
    $this->read = $read;
    }

    public function getId(){
        return $this->id;
    }

    public function setid($id){
        $this->id = $id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getIcon(){
        return $this->icon;
    }

    public function setIcon($icon){
        $this->icon = $icon;
    }

    public function getRead(){
        return $this->read;
    }

    public function setRead($read){
        $this->read = $read;
    }
}
?>