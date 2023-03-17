<?php
class SpotifyService {
    private $client_id = "TU_CLIENT_ID";
    private $client_secret = "TU_CLIENT_SECRET";
    private $redirect_uri = "TU_REDIRECT_URI";

    public function __construct() {
        session_start();
    }

    public function getAuthUrl() {
        $scopes = array(
            'user-read-private',
            'user-read-email',
            'playlist-read-private',
            'playlist-modify-public',
            'playlist-modify-private'
        );
        $url = 'https://accounts.spotify.com/authorize?response_type=code&client_id=' . $this->client_id . '&scope=' . implode('%20', $scopes) . '&redirect_uri=' . urlencode($this->redirect_uri);
        return $url;
    }

    public function getTokens($code) {
        $url = 'https://accounts.spotify.com/api/token';
        $data = array(
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirect_uri,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        );
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $tokens = json_decode($result, true);
        $_SESSION['access_token'] = $tokens['access_token'];
        $_SESSION['refresh_token'] = $tokens['refresh_token'];
        return $tokens;
    }

    public function refreshTokens($id) {
        $tokens = $this->getUserTokens($id);
        $url = 'https://accounts.spotify.com/api/token';
        $data = array(
            'grant_type' => 'refresh_token',
            'refresh_token' => $tokens['refresh_token'],
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret
        );
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $tokens = json_decode($result, true);
        $_SESSION['access_token'] = $tokens['access_token'];
        $_SESSION['refresh_token'] = $tokens['refresh_token'];
        return $tokens;
    }

    public function getUserTokens($id) {
        // Implementar esta función
    }
}