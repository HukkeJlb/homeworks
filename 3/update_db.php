<?php
require("security.php");
$photo = $_FILES['photo'];
$dir = 'photos';
if (!file_exists($dir)) {
    mkdir($dir, 0777);
}
$pattern = '|\.+[a-zA-Z0-9]+|i'; //|.*(\.)|
preg_match_all($pattern, $photo['name'], $photo1);
$file_path = $dir . '/' . $_SESSION['userid']. $photo1[0][count($photo1[0]) - 1];
$file_name = $_SESSION['userid']. $photo1[0][count($photo1[0]) - 1];
$result = move_uploaded_file($photo['tmp_name'], $file_path);
$db = @mysqli_connect("localhost", "root", "", "smilebook");
$sql = "UPDATE users SET name=\"$_POST[name]\", age=\"$_POST[age]\", description=\"$_POST[description]\", photo=\"$file_name\"
WHERE id=$_SESSION[userid]";
$result = $db->query($sql);
echo "<h1>Данные успешно обновлены</h1><br>";
echo "<a href='login_success.php'>Назад в личный кабинет</a>";
//header('Refresh: 5; URL="http://\' . $_SERVER[\'HTTP_HOST\'] . "/3/login_success.php"');
//exit();
