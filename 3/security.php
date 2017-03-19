<?php
session_start();
if (!isset($_SESSION['userid'])) {
    echo "<h1>Ошибка 401 - Для доступа необходимо авторизоваться</h1>";
    header()
    exit();
}
