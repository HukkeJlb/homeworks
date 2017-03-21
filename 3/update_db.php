<?php
$title = 'Личный кабинет Smilebook';
$active = 'Личный кабинет';
require 'security.php';
require './templates/header_auth.php';
?>
<div class="container">
<?php
require 'security.php';
$photo = $_FILES['photo'];
$dir = 'photos';
if (!file_exists($dir)) {
    mkdir($dir, 0777);
}
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$age = $_POST['age'];
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
if (empty($photo['name'])) {
    require "database.php";
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
        echo '<h1>Ошибка при загрузке файла. Ожидаемое расширение файла ".jpg", ".png", ".bmp"</h1>';
        echo "<h2><a href='login_success.php'>Назад в личный кабинет</a></h2>";
        exit();
    }

}
require "database.php";
$sql = "UPDATE users SET name=\"$name\", age=\"$age\", description=\"$description\", photo=\"$file_name\"
WHERE id=$_SESSION[userid]";
$result = $db->query($sql);
echo "<h1>Данные успешно обновлены</h1><br>";
echo "<h2><a href='login_success.php'>Назад в личный кабинет</a></h2>";
?>
</div>
<?php
require './templates/footer.php';
?>

