<?php
$db = mysqli_connect("localhost", "root", "", "smilebook");
// проверка на наличие таблицы
$tableExists = "SHOW TABLES FROM smilebook LIKE 'users'";
$result = $db->query($tableExists);
$check = $result->fetch_all(MYSQLI_ASSOC);
if (!isset($check[0])) {
    // создание таблицы
    $createTable = "
 CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` text NULL,
  `age` date NULL,
  `description` text NULL,
  `photo` text NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $db->query($createTable);
}
