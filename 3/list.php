<?php
$title = 'Data';
$active = 'Список пользователей';
$authorized = 'y';
require 'security.php';
require './templates/header.php';
?>
    <div class="container">
        <h1>Информация выводится из базы данных</h1>
        <?php
        include 'table.php';
        ?>
    </div>
<?php
require './templates/footer.php';
?>