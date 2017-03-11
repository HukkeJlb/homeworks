<?php
require("security.php");
?>
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
    <div class="form-container">
        <form class="col-sm-6" action="update_db.php" method="post" enctype="multipart/form-data">
            <div class="form-group col-sm-12">
                <label for="name" class="col-sm-4 control-label">Имя</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="birthday" class="col-sm-4 control-label">Дата рождения</label>
                <div class="col-sm-8">
                    <input type="date" name="age" id="birthday" class="form-control">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="desc" class="col-sm-4 control-label">О себе:</label>
                <div class="col-sm-8">
                    <input type="text" name="description" class="form-control" id="desc" placeholder="Пару слов о себе">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="name" class="col-sm-4 control-label">Загрузить фотографию</label>
                <div class="col-sm-8">
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить изменения</button>
                    <br><br>
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
