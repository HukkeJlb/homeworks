<?php
require("security.php");
if (isset($_POST['id'])){
    $id = $_POST['id'];
    delete_user($id);
}
function delete_user($id)
{
    $db = @mysqli_connect("localhost", "root", "", "smilebook");
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $db->query($sql);
    $path = 'photos\\'. "$id" . '.jpg';
    unlink($path);
}

header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/list.php");
exit();
