<?php
$title = 'Регистрация';
$active = 'Регистрация';
$authorized = 'n';
require "database.php";

$errors = [];
$login = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $login = trim($login);
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $password = trim($password);
        $salt = 'stfu228solo322';
        $hashedpassword = crypt($password, $salt);
        if ($hashedpassword == '') {
            unset($hashedpassword);
        }
    }
    if (empty($login) || empty($password) || empty($_POST['verification'])) {
        $errors[] = 'Вы ввели не всю информацию. Заполните все поля!';
    }
    if (empty($errors)) {
        // проверка на существование пользователя с таким же логином
        $sql = "SELECT id FROM users WHERE login=\"$login\"";
        $result = $db->query($sql);
        $check_login = mysqli_fetch_array($result);
        if (!empty($check_login['id'])) {
            $errors[] = 'Извините, введённый вами логин уже зарегистрирован. Введите другой логин.';
        }
    }
    if (empty($errors)) {
        if ($_POST['password'] != $_POST['verification']) {
            $errors[] = 'Пароли не совпадают';
        }
    }
    if (empty($errors)) {
        $sql2 = "INSERT INTO users (login,password) VALUES(\"$login\",\"$hashedpassword\")";
        $result2 = mysqli_query($db, $sql2);
        if ($result2) {
            header('HTTP/1.1 200 OK');
            header('Location: http://' . $_SERVER['HTTP_HOST'] . "/3/index.php?reg=ok");
            exit;
        } else {
            $errors[] = 'Ошибка! Вы не зарегистрированы.';
        }
    }
}
?>
<?php
require './templates/header.php';
?>
    <div class="form-container reg">
        <form class="form-horizontal" action="reg.php" method="post">
            <div class="form-group">
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-warning">
                        <strong>Ошибка:</strong> <?php echo $error; // <?= $error; ?>
                    </div>
                <?php endforeach; ?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Логин</label>
                    <div class="col-sm-9">
                        <input type="text" name="login" maxlength="16" class="form-control" id="inputEmail3"
                               placeholder="Логин" value="<?= $login ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Пароль</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" maxlength="16" class="form-control" id="inputPassword3"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">Повторите пароль</label>
                    <div class="col-sm-9">
                        <input type="password" name="verification" maxlength="16" class="form-control"
                               id="inputPassword4"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" value="reg" name="button">Зарегистрироваться
                        </button>
                        <br><br>
                        Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
                    </div>
                </div>
        </form>
    </div>
<?php
require './templates/footer.php';