<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Наш сайт</title>
    <link rel="stylesheet" href="/assets/template/css/bootstrap.css"/>
    <link rel="stylesheet" href="/assets/template/css/bootstrap-theme.css"/>
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
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <?php print_r($taskList); ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="/assets/template/js/bootstrap.min.js"></script>
</body>
</html>