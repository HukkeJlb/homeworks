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
    $password = '';
}
$salt = 'stfu228solo322';
$hashedpassword = crypt($password, $salt);
require "database.php";
$sql = "SELECT id FROM users WHERE BINARY login=\"$login\" AND BINARY password=\"$hashedpassword\"";
$result = $db->query($sql);
$check = $result->fetch_all(MYSQLI_ASSOC); //mysqli_fetch_array($result)
//require "loginfail.php";
$_SESSION['userid'] = $check[0]['id'];
header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/login_success.php");
exit();

