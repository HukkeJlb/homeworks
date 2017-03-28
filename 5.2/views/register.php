<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Учим MVC</title>
    <link rel="stylesheet" href="/assets/template/css/bootstrap.css"/>
    <link rel="stylesheet" href="/assets/template/css/bootstrap-theme.css"/>
    <link href="../starter-template.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle</span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Учим MVC</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="task">Задание</a></li>
                <li><a href="register">Регистрация</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="form-container reg">
    <form class="form-horizontal" action="register" method="post">
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
                    Зарегистрированы? <a href="404">Авторизируйтесь</a>
                </div>
            </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="/assets/template/js/bootstrap.min.js"></script>
</body>
</html>