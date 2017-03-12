<?php
//echo "<pre>";
//print_r($_POST);
//header('Refresh: 5; URL="index.html"');
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
if (empty($login) || empty($password)) {
    exit ("<h1>Вы ввели не всю информацию, вернитесь назад и заполните все поля!<br><a href='reg.html'>Возврат к форме регистрации</a></h1>");
} elseif ($_POST['password'] != $_POST['verification']) {
    exit ("<h1>Пароли не совпадают<br><a href='reg.html'>Возврат к форме регистрации</a></h1>");
}
$db = @mysqli_connect("localhost", "root", "", "smilebook");
// проверка на существование пользователя с таким же логином
$sql = "SELECT id FROM users WHERE login=\"$login\"";
$result = $db->query($sql); //$result = mysqli_query($db, $sql)
$check_login = mysqli_fetch_array($result); //$check_login = $result->fetch_all(MYSQLI_ASSOC)
if (!empty($check_login['id'])) {
    exit ("<h1>Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<br><a href='reg.html'>Вернуться назад</a></h1>");
}
$sql2 = "INSERT INTO users (login,password) VALUES(\"$login\",\"$password\")";
//$user_id = $db->insert_id;
$result2 = mysqli_query($db, $sql2);
if ($result2) {
    echo "<h1>Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.<br> <a href='index.html'>Главная страница</a></h1>";
} else {
    echo "<h1>Ошибка! Вы не зарегистрированы.</h1>";
}