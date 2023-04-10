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
  private $playlist_spotifyId;

  public function __construct($id, $name, $description, $url, $images, $duration, $owner_name, $owner_id, $tracks) {
    $this->playlist_spotifyId = $id;
    $this->playlist_name = $name;
    $this->playlist_description = $description;
    $this->playlist_url = $url;
    $this->playlist_images = $images;
    $this->playlist_duration = $duration;
    $this->playlist_owner_name = $owner_name;
    $this->playlist_owner_id = $owner_id;
    $this->playlist_tracks = $tracks;
  }

  public function getId() {
    return $this->playlist_spotifyId;
  }

  public function setId($id) {
    $this->playlist_spotifyId = $id;
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