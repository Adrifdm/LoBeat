<?php
class Usuario {
  private $id;
  private $nombre;
  private $correo;
  private $contrasenya;
  private $spotify_access_token;
  private $spotify_refresh_token;
  private $fecha_creacion; 
  private $fecha_actualizacion;
  private $role;
  private $genero;
  private $descripcion;
  private $fotoPerfil;
  private $latitud; 
  private $longitud;
  private $spotify_ID;
  private $nMatches;
  private $nChats;
  private $nPlaylists;
  //private $chatsList; lista de chats de cada usuario (para no estar buscando en la coleccion chats los de este usuario en concreto y directamente usar esta lista)

  public function __construct($id, $nombre, $correo, $contrasenya, $spotify_access_token, $spotify_refresh_token, $fecha_creacion, $fecha_actualizacion, $role, $genero, $descripcion, $fotoPerfil, $latitud, $longitud, $spotify_ID, $nChats, $nPlaylists, $nMatches) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->correo = $correo;
    $this->contrasenya = $contrasenya;
    $this->spotify_access_token = $spotify_access_token;  
    $this->spotify_refresh_token = $spotify_refresh_token; 
    $this->fecha_creacion = $fecha_creacion;
    $this->fecha_actualizacion = $fecha_actualizacion;
    $this->role = $role;
    $this->genero = $genero;
    $this->descripcion = $descripcion;
    $this->fotoPerfil = $fotoPerfil;
    $this->latitud = $latitud;
    $this->longitud = $longitud;
    $this->spotify_ID = $spotify_ID;
    
    $this->nMatches = $nMatches;
    $this->nPlaylists = $nPlaylists;
    $this->nChats = $nChats;
  
  }

  public function getnMatches(){
    return $this->nMatches;
  }

  public function setnMatches($nMatches){
    $this->nMatches = $nMatches;
  }

  public function getnPlaylists(){
    return $this->nPlaylists;
  }

  public function setnPlaylists($nPlaylists){
    $this->nPlaylists = $nPlaylists;
  }

  public function getnChats(){
    return $this->nChats;
  }

  public function setnChats($nChats){
    $this->nChats = $nChats;
  }

  public function getFotoPerfil(){
    return $this->fotoPerfil;
  }

  public function setFotoPerfil($fotoPerfil){
    $this->fotoPerfil = $fotoPerfil;
  }
  public function getLatitud() {
    return $this->latitud;
  }
  
  public function setLatitud($latitud) {
    $this->latitud = $latitud;
  }

  public function getLongitud() {
    return $this->longitud;
  }
  
  public function setLongitud($longitud) {
    $this->longitud = $longitud;
  }
  public function getDescripcion() {
    return $this->descripcion;
  }
  
  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getCorreo() {
    return $this->correo;
  }

  public function setCorreo($correo) {
    $this->correo = $correo;
  }

  public function getContrasenya() {
    return $this->contrasenya;
  }

  public function setContrasenya($contrasenya) {
    $this->contrasenya = $contrasenya;
  }

  public function getSpotify_access_token() {
    return $this->spotify_access_token;
  }

  public function setSpotify_access_token($spotify_access_token) {
    $this->spotify_access_token = $spotify_access_token;
  }

  public function getSpotify_refresh_token() {
    return $this->spotify_refresh_token;
  }

  public function setSpotify_refresh_token($spotify_refresh_token) {
    $this->spotify_refresh_token = $spotify_refresh_token;
  }

  public function getFecha_creacion() {
    return $this->fecha_creacion;
  }

  public function setFecha_creacion($fecha_creacion) {
    $this->fecha_creacion = $fecha_creacion;
  }

  public function getFecha_actualizacion() {
    return $this->fecha_actualizacion;
  }

  public function setFecha_actualizacion($fecha_actualizacion) {
    $this->fecha_actualizacion = $fecha_actualizacion;
  }

  public function getRole() {
    return $this->role;
  }

  public function setRole($role) {
    $this->role = $role;
  }

  public function getGenero() {
    return $this->genero;
  }

  public function setGenero($genero) {
    $this->genero = $genero;
  }

  public function getSpotifyID() {
    return $this->spotify_ID;
  }

  public function setSpotifyID($spotify_ID) {
    $this->spotify_ID = $spotify_ID;
  }
}
?>