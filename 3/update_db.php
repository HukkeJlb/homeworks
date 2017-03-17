<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Личный кабинет Smilebook</title>

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
                <li class="active"><a href="login_success.php">Личный кабинет</a></li>
                <li><a href="list.php">Список пользователей</a></li>
                <li><a href="filelist.php">Список файлов</a></li>
                <li><a href="logout.php">Выйти</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
<?php
require("security.php");
$photo = $_FILES['photo'];
$dir = 'photos';
if (!file_exists($dir)) {
    mkdir($dir, 0777);
}
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$age = $_POST['age'];
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
if (empty($photo['name'])) {
    $db = @mysqli_connect("localhost", "root", "", "smilebook");
    $sql_photo = "SELECT photo FROM `users` WHERE id = $_SESSION[userid]";
    $result = $db->query($sql_photo);
    $file_name_array = $result->fetch_all();
    $file_name = $file_name_array[0][0];
} else {
    $pattern = '|\.+[a-zA-Z0-9]+|i'; //|.*(\.)|
    preg_match_all($pattern, $photo['name'], $photo1);
    $expansion = $photo1[0][count($photo1[0]) - 1];
    if (($expansion == '.jpg') || ($expansion == '.png') || ($expansion == '.bmp')) {
        $file_path = $dir . '/' . $_SESSION['userid'] . '.jpg';
        $file_name = $_SESSION['userid'] . '.jpg';
        $result = move_uploaded_file($photo['tmp_name'], $file_path);
    } else {
        echo '<h1>Ошибка при загрузке файла. Ожидаемое расширение файла ".jpg", ".png", ".bmp"</h1>';
        echo "<h2><a href='login_success.php'>Назад в личный кабинет</a></h2>";
        exit();
    }

}
$db = @mysqli_connect("localhost", "root", "", "smilebook");
$sql = "UPDATE users SET name=\"$name\", age=\"$age\", description=\"$description\", photo=\"$file_name\"
WHERE id=$_SESSION[userid]";
$result = $db->query($sql);
echo "<h1>Данные успешно обновлены</h1><br>";
echo "<h2><a href='login_success.php'>Назад в личный кабинет</a></h2>";
?>
</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

