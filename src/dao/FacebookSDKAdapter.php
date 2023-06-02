<?php

use FacebookAds\Api;
use FacebookAds\Object\Page;
use FacebookAds\Object\Fields\PostFields;

class FacebookSDKAdapter
{
    //use FacebookAds\Api;
    // use FacebookAds\Object\Page;
    // use FacebookAds\Object\Fields\PostFields;

    private string $app_id;
    private string $app_secret;
    private string $access_token;
    private string $page_id;

    function __construct(
        string $app_id,
        string $app_secret,
        string $access_token,
        string $page_id
    ) {
        $this->app_id = $app_id;
        $this->app_secret = $app_secret;
        $this->access_token = $access_token;
        $this->page_id = $page_id;
        Api::init($this->app_id, $this->app_secret, $this->access_token);
    }


    /**
     * Obtener publicaciones de una pagina de facebook
     * @param int $tokenRenewThreshold Especificamos cuantos segundos antes de que expire el token de acceso se debe renovar
     * @param callable $onUpdateAccessToken Funcion que se ejecuta cuando el token de acceso se actualiza
     * @return array
     */
    public function getPosts(
        int $tokenRenewThreshold,
        callable $onUpdateAccessToken
    ) {
        $tokenRenewThreshold = $tokenRenewThreshold + 60; // ?le sumamos 60 segundos para que no se renueve justo cuando expira
        $timeout = $this->getTimeOut();
        if ($timeout < $tokenRenewThreshold) {
            $this->access_token = $this->updateAccessToken();
            $onUpdateAccessToken($this->access_token);
        }

        return [
            "expire_in" => $timeout,
            "posts" => $this->_getPosts()
        ] ?? null;
    }

    private function _getPosts()
    {
        $page = new Page($this->page_id);

        $posts_arr = $page->getFeed(array(
            PostFields::FULL_PICTURE,
            PostFields::MESSAGE,
            PostFields::PERMALINK_URL
        ), ['limit' => 20]);

        $posts = [];
        foreach ($posts_arr as $post) {
            $posts[] = [
                "img" => trim($post->{PostFields::FULL_PICTURE} . PHP_EOL) ?? '',
                "desc" => trim($post->{PostFields::MESSAGE} . PHP_EOL) ?? '',
                "url" => trim($post->{PostFields::PERMALINK_URL} . PHP_EOL) ?? ''
            ];
        }
        return $posts ?? [];
    }

    private function getTimeOut(string $type = 'seconds')
    {
        $url = "https://graph.facebook.com/debug_token?input_token={$this->access_token}&access_token={$this->app_id}|{$this->app_secret}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $expiresAt = $data['data']['expires_at'];
        $timeRemaining = $expiresAt - time();
        if ($type == 'minutes') return $timeRemaining / 60;
        if ($type == 'hours') return $timeRemaining / 60 / 60;
        if ($type == 'days') return $timeRemaining / 60 / 60 / 24;
        return (int)$timeRemaining;
    }

    private function updateAccessToken()
    {
        // Incluye las librerías de FacebookAds

        // Inicializa la API de FacebookAds

        // Renueva el token de acceso
        $response = Api::instance()->call('/oauth/access_token', 'GET', [
            'grant_type' => 'fb_exchange_token',
            'client_id' => $this->app_id,
            'client_secret' => $this->app_secret,
            'fb_exchange_token' => $this->access_token,
        ]);

        return json_decode($response->getBody())->access_token;
    }
}
