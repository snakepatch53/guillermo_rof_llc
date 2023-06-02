<?php
$posts = [];

#region now
use FacebookAds\Api;
use FacebookAds\Object\Page;
use FacebookAds\Object\Fields\PostFields;





$app_id = $_ENV['FB_APP_ID'];
$app_secret = $_ENV['FB_APP_SECRET'];
$access_token = $_ENV['FB_ACCESS_TOKEN'];
$page_id = $_ENV['FB_PAGE_ID'];

// $url = "https://graph.facebook.com/debug_token?input_token={$access_token}&access_token={$app_id}|{$app_secret}";

// $response = file_get_contents($url);
// $data = json_decode($response, true);

// $expiresAt = $data['data']['expires_at'];
// $timeRemaining = $expiresAt - time();
// echo "Tiempo restante del token: " . $timeRemaining . " segundos";



Api::init($app_id, $app_secret, $access_token);
$page = new Page($page_id);

$posts_arr = $page->getFeed(array(
    PostFields::FULL_PICTURE,
    PostFields::MESSAGE,
    PostFields::PERMALINK_URL
), ['limit' => 20]);

foreach ($posts_arr as $post) {
    $posts[] = [
        "img" => trim($post->{PostFields::FULL_PICTURE} . PHP_EOL) ?? '',
        "desc" => trim($post->{PostFields::MESSAGE} . PHP_EOL) ?? '',
        "url" => trim($post->{PostFields::PERMALINK_URL} . PHP_EOL) ?? ''
    ];
}


#endregion




#region old
// $fb = new \Facebook\Facebook([
//     'app_id' => $_ENV['FB_APP_ID'],
//     'app_secret' => $_ENV['FB_APP_SECRET'],
//     'default_graph_version' => $_ENV['FB_GRAPH_VERSION'],
// ]);

// // $PATH_REQUEST = $_ENV['FB_PATH_REQUEST'] . $_ENV['FB_PAGE_ID'] . "/posts?fields=full_picture,permalink_url,message";
// // $PATH_REQUEST = $_ENV['FB_PATH_REQUEST'] . $_ENV['FB_PAGE_ID'] . "/posts";
// $PATH_REQUEST = $_ENV['FB_PATH_REQUEST'] . "453395385426480?fields=posts{full_picture,message,permalink_url}";

// try {
//     $response = $fb->get($PATH_REQUEST, $_ENV['FB_ACCESS_TOKEN']);
// } catch (\Facebook\Exception\FacebookResponseException $e) {
//     echo 'Graph returned an error: ' . $e->getMessage();
//     exit;
// } catch (\Facebook\Exception\FacebookSDKException $e) {
//     echo 'Facebook SDK returned an error: ' . $e->getMessage();
//     exit;
// }

// $data = $response->getDecodedBody();

// var_dump($data);

// $posts = $data['posts']['data'] ?? [];




// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => $_ENV['FB_HTTP_REQUEST'],
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "GET"
// ));

// $response = curl_exec($curl);

// curl_close($curl);

// $posts = json_decode($response, true)['posts']['data'];
#endregion











#region update access token
// // Incluye las librerías de FacebookAds
// use FacebookAds\Api;

// // Obtiene las credenciales de Facebook desde un archivo .env
// $app_id = $_ENV['FB_APP_ID'];
// $app_secret = $_ENV['FB_APP_SECRET'];
// $access_token = $_ENV['FB_ACCESS_TOKEN'];
// $page_id = $_ENV['FB_PAGE_ID'];

// // Inicializa la API de FacebookAds
// Api::init($app_id, $app_secret, $access_token);

// // Renueva el token de acceso
// $response = Api::instance()->call('/oauth/access_token', 'GET', [
//     'grant_type' => 'fb_exchange_token',
//     'client_id' => $app_id,
//     'client_secret' => $app_secret,
//     'fb_exchange_token' => $access_token,
// ]);

// echo (json_decode($response->getBody())->access_token);
#endregion














?>


<div class="container">
    <div class="title">
        <h2>Publicaciones de nuestra pagina de Facebook</h2>
        <p>Estas son las publicaciones de nuestra pagina de Facebook</p>
    </div>
    <div class="items">
        <?php
        foreach ($posts as $post) {
            $img = $post['img'] ?? '';
            $url = $post['url'] ?? '';
            $msg = $post['msg'] ?? '';
            if (!$img && !$msg) continue;
        ?>
            <div class="item">
                <?php if ($img) { ?>
                    <img src="<?= $img ?>" alt="Imagen de publicacion de Facebook">
                <?php } ?>
                <?php if ($msg) { ?>
                    <p><?= $msg ?></p>
                <?php } ?>
                <a href="<?= $url ?>" target="_blank">Ver publicación</a>
            </div>
        <?php } ?>
    </div>
</div>