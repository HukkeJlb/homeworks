<?php
require './templates/header.php';
?>

<div class="container">

    <div class="form-container">
        <?php
        $errors = [];
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            $login = stripslashes($login);
            $login = htmlspecialchars($login);
            $login = trim($login);
            if ($login == '') {
                unset($login);
            }
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
        if (empty($login) || empty($password)) {
            $errors[] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
        } elseif ($_POST['password'] != $_POST['verification']) {
            $errors[] = 'Пароли не совпадают';
        }
        require "database.php";
        // проверка на существование пользователя с таким же логином
        if (empty($errors)) {
            $sql = "SELECT id FROM users WHERE login=\"$login\"";
            $result = $db->query($sql);
            $check_login = mysqli_fetch_array($result);
            if (!empty($check_login['id'])) {
                exit ("<h1>Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<br><a href='reg.php'>Вернуться назад</a></h1>");
            }
            $sql2 = "INSERT INTO users (login,password) VALUES(\"$login\",\"$hashedpassword\")";
            //$user_id = $db->insert_id;
            $result2 = mysqli_query($db, $sql2);
            if ($result2) {
                echo "<h1>Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.<br> <a href='index.php'>Главная страница</a></h1>";
            } else {
                echo "<h1>Ошибка! Вы не зарегистрированы.</h1>";
            }
        }
        ?>
        <?php foreach ($errors as $error): ?>
            <div class="alert alert-warning">
                <strong>Ошибка</strong> <?php echo $error; // <?= $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="form-horizontal" action="reg.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" name="login" maxlength="16" class="form-control" id="inputEmail3"
                           placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" maxlength="16" class="form-control" id="inputPassword3"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4" class="col-sm-2 control-label">Повторите пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="verification" maxlength="16" class="form-control" id="inputPassword4"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" value="reg" name="button">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.html">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
