<?php
$title = 'Личный кабинет Smilebook';
$active = 'Личный кабинет';
require 'security.php';
require './templates/header_auth.php';
?>
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
<?php
require './templates/footer.php';
?>
