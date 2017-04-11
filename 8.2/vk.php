<?php
require './vendor/autoload.php';
require './ClassVk.php';
define("MY_ID", "14422329");


$api = new VkApi();

$api->vkRequest('photos.getWallUploadServer');//Получние ссылку от сервара для загрузки
echo '<pre>';
print_r($api);
echo '</pre>-----------------------------------------';
$linkForDownload = $api->toArray()['response']['upload_url'];

$api->downloadServer($linkForDownload, 'success.jpg');

echo '<pre>';
print_r($api);
echo '</pre>-----------------------------------------';
//по ссылке от отсылаем запросы
$api->vkRequest('photos.saveWallPhoto', [
    'user_id'     => MY_ID,
    'photo'       => $api->requestDowl->photo,
    'server'      => $api->requestDowl->server,
    'hash'        => $api->requestDowl->hash,
]);
$api->toArray();

$optionsWall        = array(
    'owner_id'      => 14422329,//куда отправляем
    'message'       => 'ДЗ №8 - loftschool',//текст
    'attachments'   => $api->ArrayInJson['response'][0]['id'],//что отправить
);
echo '<pre>';
print_r($api);
echo '</pre>';
$api->vkRequest('wall.post', $optionsWall);
$api->toArray();
echo $api->ArrayInJson['response']['post_id'];
