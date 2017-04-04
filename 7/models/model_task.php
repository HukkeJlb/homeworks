<?php


class Task extends Model
{

    public function getData()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT name, age, description, photo, if(CURRENT_DATE()-age >= 180000,\'Совершеннолетний\',\'Несовершеннолетний\') as ageStatus FROM users ORDER BY 2 DESC ');
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $taskList = $data;
        return $taskList;
    }

    public function rotateImg($degrees)
    {
        $source = imagecreatefromjpeg(ROOT."/photos/before.jpg");
        $rotate = imagerotate($source, $degrees, 0);
        imagejpeg($rotate, ROOT."/photos/after.jpg");
    }

}