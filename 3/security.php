<?php
@session_start();
if (!isset($_SESSION['userid'])) { //!is_int($_SESSION['userid'])
    header('HTTP/1.1 401 Unauthorized');
    echo "<h1>Ошибка 401 - Для доступа необходимо авторизоваться</h1>";
    exit();
}
