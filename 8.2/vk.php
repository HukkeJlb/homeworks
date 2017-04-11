<?php
require './vendor/autoload.php';
require './ClassVk.php';
define("MY_ID", "14422329");
move_uploaded_file($_FILES['photo']['tmp_name'], 'photo.jpg');

$api = new VkApi();


$api->vkRequest('photos.getWallUploadServer');//Получние ссылку от сервара для загрузки

$linkForDownload = $api->toArray()['response']['upload_url'];

$api->downloadServer($linkForDownload, dirname(__FILE__) . '/photo.jpg');

//по ссылке от отсылаем запросы
$api->vkRequest('photos.saveWallPhoto', [
    'user_id' => MY_ID,
    'photo' => $api->requestDowl->photo,
    'server' => $api->requestDowl->server,
    'hash' => $api->requestDowl->hash,
]);
$api->toArray();

$optionsWall = array(
    'owner_id' => $_POST['vk_id'],//куда отправляем
    'message' => 'ДЗ №8 - loftschool',//текст
    'attachments' => $api->ArrayInJson['response'][0]['id'],//что отправить
);
$api->vkRequest('wall.post', $optionsWall);
$api->toArray();
//echo $api->ArrayInJson['response']['post_id'];
header('Location: http://' . $_SERVER['HTTP_HOST']);
