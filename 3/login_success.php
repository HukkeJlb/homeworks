<?php
$title = 'Личный кабинет Smilebook';
$active = 'Личный кабинет';
$authorized = 'y';
require 'security.php';
require "database.php";

$errors = [];
$messages = [];
$name = '';
$age = '';
$description = '';
//обращение к БД за данными юзера
$sql = "SELECT name, age, description FROM `users` WHERE id = $_SESSION[userid]";
$result = $db->query($sql);
$array = $result->fetch_all(MYSQLI_ASSOC);
$name = $array[0]['name'];
$age = $array[0]['age'];
$description = $array[0]['description'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = $_FILES['photo'];
    $dir = 'photos';
    if (!file_exists($dir)) {
        mkdir($dir, 0777);
    }
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $age = $_POST['age'];
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    if (empty($photo['name'])) {
        $sql_photo = "SELECT photo FROM `users` WHERE id = $_SESSION[userid]";
        $result = $db->query($sql_photo);
        $file_name_array = $result->fetch_all();
        $file_name = $file_name_array[0][0];
    } else {
        $pattern = '|\.+[a-zA-Z0-9]+|i'; //|.*(\.)|
        preg_match_all($pattern, $photo['name'], $photo1);
        $expansion = $photo1[0][count($photo1[0]) - 1];
        if (($expansion == '.jpg') || ($expansion == '.png') || ($expansion == '.bmp')) {
            $file_path = $dir . '/' . $_SESSION['userid'] . '.jpg';
            $file_name = $_SESSION['userid'] . '.jpg';
            $result = move_uploaded_file($photo['tmp_name'], $file_path);
        } else {
            $errors[] = 'Ошибка при загрузке файла. Ожидаемое расширение файла ".jpg", ".png", ".bmp"';
        }
    }
    if (empty($errors)) {
        $sql = "UPDATE users SET name=\"$name\", age=\"$age\", description=\"$description\", photo=\"$file_name\"WHERE id=$_SESSION[userid]";
        $result = $db->query($sql);
        if ($result) {
            $messages[] = 'Данные успешно обновлены';
        }
    }
}
?>
<?php
require './templates/header.php';
?>
<div class="form-container reg">
    <form class="col-sm-6" action="login_success.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger">
                    <strong>Ошибка:</strong> <?php echo $error; // <?= $error; ?>
                </div>
            <?php endforeach; ?>

            <?php foreach ($messages as $message): ?>
                <div class="alert alert-success">
                    <strong>Успех:</strong> <?php echo $message; ?>
                </div>
            <?php endforeach; ?>
            <div class="form-group col-sm-12">
                <label for="name" class="col-sm-4 control-label">Имя</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя"
                           value="<?= $name ?>">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="birthday" class="col-sm-4 control-label">Дата рождения</label>
                <div class="col-sm-8">
                    <input type="date" name="age" id="birthday" class="form-control" value="<?= $age ?>">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="desc" class="col-sm-4 control-label">О себе:</label>
                <div class="col-sm-8">
                    <input type="text" name="description" class="form-control" id="desc" placeholder="Пару слов о себе"
                           value="<?= $description ?>">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="name" class="col-sm-4 control-label">Загрузить фотографию</label>
                <div class="col-sm-8">
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить изменения</button>
                    <br><br>
                </div>
            </div>
    </form>
</div>
<?php
require './templates/footer.php';
?>
