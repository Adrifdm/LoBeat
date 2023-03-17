<?php
require_once 'services/spotifyService.php';

class SpotifyController {
    private $spotifyService;

    public function __construct() {
        $this->spotifyService = new SpotifyService();
    }

    public function getAuthUrl() {
        return $this->spotifyService->getAuthUrl();
    }

    public function getTokens($code) {
        return $this->spotifyService->getTokens($code);
    }

    public function refreshTokens($id) {
        return $this->spotifyService->refreshTokens($id);
    }
}