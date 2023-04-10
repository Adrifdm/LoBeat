<?php
class Playlist {
  private $playlist_name;
  private $playlist_description;
  private $playlist_url;
  private $playlist_images;
  private $playlist_duration;
  private $playlist_owner_name;
  private $playlist_owner_id;
  private $playlist_tracks;
  private $id;

  public function __construct($id, $name, $description, $url, $images, $duration, $owner_name, $owner_id, $tracks) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->url = $url;
    $this->images = $images;
    $this->duration = $duration;
    $this->owner_name = $owner_name;
    $this->owner_id = $owner_id;
    $this->tracks = $tracks;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getPlaylistName() {
      return $this->playlist_name;
  }

  public function setPlaylistName($playlist_name) {
      $this->playlist_name = $playlist_name;
  }

  public function getPlaylistDescription() {
      return $this->playlist_description;
  }

  public function setPlaylistDescription($playlist_description) {
      $this->playlist_description = $playlist_description;
  }

  public function getPlaylistUrl() {
      return $this->playlist_url;
  }

  public function setPlaylistUrl($playlist_url) {
      $this->playlist_url = $playlist_url;
  }

  public function getPlaylistImages() {
      return $this->playlist_images;
  }

  public function setPlaylistImages($playlist_images) {
      $this->playlist_images = $playlist_images;
  }

  public function getPlaylistDuration() {
      return $this->playlist_duration;
  }

  public function setPlaylistDuration($playlist_duration) {
      $this->playlist_duration = $playlist_duration;
  }

  public function getPlaylistOwnerName() {
      return $this->playlist_owner_name;
  }

  public function setPlaylistOwnerName($playlist_owner_name) {
      $this->playlist_owner_name = $playlist_owner_name;
  }

  public function getPlaylistOwnerId() {
      return $this->playlist_owner_id;
  }

  public function setPlaylistOwnerId($playlist_owner_id) {
      $this->playlist_owner_id = $playlist_owner_id;
  }

  public function getPlaylistTracks() {
      return $this->playlist_tracks;
  }

  public function setPlaylistTracks($playlist_tracks) {
      $this->playlist_tracks = $playlist_tracks;
  }
}

?>