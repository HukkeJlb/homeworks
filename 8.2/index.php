<?php
require './vendor/autoload.php';
require './ClassVk.php';
define("MY_ID", "14422329");
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    if (isset($api->ArrayInJson['response'])){
        $result = $api->ArrayInJson['response']['post_id'];
        if ($result) {
            $message = 'Фотография была успешна отправлена';
        }
    } else {
        $error = $api->ArrayInJson['error']['error_msg'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ДЗ №8.2</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css"/>
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<body>
<h2 align="center">Отправляем фото на стену в ВК</h2>

<div class="form-container reg">
    <form class="col-sm-6" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <?php if ($message): ?>
                <div class="alert alert-success">
                    <strong>Успех:</strong> <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <strong>Неудача:</strong> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="form-group col-sm-12">
                <label for="vk_id" class="col-sm-4 control-label">ID получателя</label>
                <div class="col-sm-8">
                    <input type="text" name="vk_id" class="form-control" id="vk_id" placeholder="Введите ID получателя">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="name" class="col-sm-4 control-label">Выбрать фотографию</label>
                <div class="col-sm-8">
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Отправить фото</button>
                    <br><br>
                </div>
            </div>
    </form>
</div>
</body>
</html>