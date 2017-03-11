<?php
session_start();
if (isset($_POST['login'])) {
    $login = $_POST['login'];
} else {
    $login = '';
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $login = '';
}
if ((!$password) || (!$login)) {
    exit ('<h1>Вы оставили пустым окно "Логин" или "Пароль"<br><a href="index.html">Вернуться назад</a></h1>');
}
$db = @mysqli_connect("localhost", "root", "", "smilebook");
$sql = "SELECT id FROM users WHERE BINARY login=\"$login\" AND BINARY password=\"$password\"";
$result = $db->query($sql);
$check = $result->fetch_all(MYSQLI_ASSOC); //mysqli_fetch_array($result)
if (!$check) {
    exit('<h1>Неверный логин или пароль<br><a href="index.html">Вернуться назад</a></h1>');
}
$_SESSION['userid'] = $check[0]['id'];
header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/login_success.php");
exit();

