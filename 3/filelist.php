<?php
$title = 'Photos';
$active = 'Список файлов';
require 'security.php';
require './templates/header_auth.php';
?>
<div class="container">
    <h1>Информация выводится из списка файлов</h1>
    <?php
    include 'photo_table.php';
    ?>
</div>

<?php
require './templates/footer.php';
?>
