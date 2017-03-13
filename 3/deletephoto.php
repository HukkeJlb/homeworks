<?php
require("security.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$path = 'photos\\' . "$id" . '.jpg';
@unlink($path);
header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/filelist.php");
exit();