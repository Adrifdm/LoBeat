<?php
class Playlist {
    private $playlist_spotifyId;
    private $playlist_name;
    private $playlist_description;
    private $playlist_url;
    private $playlist_images;
    private $playlist_duration;
    private $playlist_owner;
    private $playlist_tracks;
    private $playlist_tags;

    public function __construct($id, $name, $description, $url, $images, $duration, $owner, $tracks, $tags) {
        $this->playlist_spotifyId = $id;
        $this->playlist_name = $name;
        $this->playlist_description = $description;
        $this->playlist_url = $url;
        $this->playlist_images = $images;
        $this->playlist_duration = $duration;
        $this->playlist_owner = $owner;
        $this->playlist_tracks = $tracks;
        $this->playlist_tags = $tags;
    }

    public function getId() {
        return $this->playlist_spotifyId;
    }

    public function setId($id) {
        $this->playlist_spotifyId = $id;
    }

    public function getPlaylistTags() {
        return $this->playlist_tags;
    }

    public function setPlaylistTags($tags) {
        $this->playlist_tags= $tags;
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

    public function getPlaylistOwner() {
        return $this->playlist_owner;
    }

    public function setPlaylistOwner($playlist_owner) {
        $this->playlist_owner = $playlist_owner;
    }

    public function getPlaylistTracks() {
        return $this->playlist_tracks;
    }

    public function setPlaylistTracks($playlist_tracks) {
        $this->playlist_tracks = $playlist_tracks;
    }

}

?>