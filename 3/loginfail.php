<?php
$title = 'Ошибка';
$active = 'Авторизация';
require './templates/header_not_auth.php';
?>

<div class="container">

    <div class="form-container">
        <?php
        if ((!$password) || (!$login)) {
            exit ('<h1>Вы оставили пустым окно "Логин" или "Пароль"<br><a href="index.php">Вернуться назад</a></h1>');
        }
        if (!$check) {
            exit('<h1>Неверный логин или пароль<br><a href="index.php">Вернуться назад</a></h1>');
        }
        ?>
    </div>

</div><!-- /.container -->
<?php
require './templates/footer.php';
?>
