<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Smilebook</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Авторизация</a></li>
                <li class="active"><a href="reg.php">Регистрация</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="form-container">
<?php
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
    exit ("<h1>Вы ввели не всю информацию, вернитесь назад и заполните все поля!<br><a href='reg.php'>Возврат к форме регистрации</a></h1>");
} elseif ($_POST['password'] != $_POST['verification']) {
    exit ("<h1>Пароли не совпадают<br><a href='reg.php'>Возврат к форме регистрации</a></h1>");
}
$db = @mysqli_connect("localhost", "root", "", "smilebook");
// проверка на существование пользователя с таким же логином
$sql = "SELECT id FROM users WHERE login=\"$login\"";
$result = $db->query($sql); //$result = mysqli_query($db, $sql)
$check_login = mysqli_fetch_array($result); //$check_login = $result->fetch_all(MYSQLI_ASSOC)
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
?>
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

