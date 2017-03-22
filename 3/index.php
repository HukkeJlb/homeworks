<?php
$title = 'Добро пожаловать в Smilebook';
$active = 'Авторизация';
$errors = [];
$login = '';
require "database.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $errors = [];
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
    if ((!$password) || (!$login)) {
        $errors[] = 'Вы оставили пустым окно "Логин" или "Пароль"';
    }
    if (empty($errors)) {
        $salt = 'stfu228solo322';
        $hashedpassword = crypt($password, $salt);
        $sql = "SELECT id FROM users WHERE BINARY login=\"$login\" AND BINARY password=\"$hashedpassword\"";
        $result = $db->query($sql);
        $check = $result->fetch_all(MYSQLI_ASSOC); //mysqli_fetch_array($result)
        if (!$check) {
            $errors[] = 'Неверный логин или пароль';
        }
        if (empty($errors)) {
            $_SESSION['userid'] = $check[0]['id'];
        }
    }
    if (empty($errors)) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/login_success.php");
    }
}
?>
<?php
require './templates/header_not_auth.php';
?>
<div class="form-container reg">
    <form class="form-horizontal" action="index.php" method="post">
        <div class="form-group">
            <?php foreach ($errors as $error): ?>
                <div class="alert alert-warning">
                    <strong>Ошибка:</strong> <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
            <?php if (isset($_GET['reg']) && ($_GET['reg'] === 'ok')): ?>
            <div class="form-group">
                <div class="alert alert-success">
                    <?php echo "<strong>Успех:</strong> Вы успешно зарегистрировали аккаунт! <br>Можете воспользоваться формой авторизации"; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин"
                               value="<?= $login ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Войти</button>
                        <br><br>
                        Нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>
                    </div>
                </div>
    </form>
</div>

<?php
require './templates/footer.php';
?>
