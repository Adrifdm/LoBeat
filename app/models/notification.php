<?php
class Notification{

    private $id;
    private $name;
    private $description;
    private $icon;
    private $read;

    public function __construct($id, $name, $description, $icon, $read) {
    $this->id = $id;
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