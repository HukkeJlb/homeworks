<?php
//echo "<pre>";
//print_r($_POST);
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
$sql = "SELECT id FROM users WHERE (login=\"$login\") & (password=\"$password\")";
$result = $db->query($sql);
$check = $result->fetch_all(MYSQLI_ASSOC); //mysqli_fetch_array($result)
if (!$check) {
    exit('<h1>Неверный логин или пароль<br><a href="index.html">Вернуться назад</a></h1>');
}
header('HTTP/1.1 200 OK');
header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/list.html");
exit();
//session_start();