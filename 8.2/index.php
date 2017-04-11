<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ДЗ №8.2</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css"/>
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<body>
<h2 align="center">Отправляем фото на стену в ВК</h2>
<div class="form-container reg">
    <form class="col-sm-6" action="vk.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form-group col-sm-12">
                <label for="name" class="col-sm-4 control-label">Выбрать фотографию</label>
                <div class="col-sm-8">
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Отправить фото</button>
                    <br><br>
                </div>
            </div>
    </form>
</div>
</body>
</html>