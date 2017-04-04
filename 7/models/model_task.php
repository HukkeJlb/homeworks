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
        $source = imagecreatefromjpeg(ROOT . "/photos/before.jpg");
        $rotate = imagerotate($source, $degrees, 0);
        imagejpeg($rotate, ROOT . "/photos/after.jpg");
    }

    public function addWatermark()
    {
        $image = imagecreatefromjpeg(ROOT . "/photos/after.jpg");
        $watermark = imagecreatefrompng(ROOT . "/photos/watermark.png");
        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($watermark);
        $sy = imagesy($watermark);
        imagecopy($image, $watermark, imagesx($image) - $sx - $marge_right, imagesy($image) - $sy - $marge_bottom, 0, 0, imagesx($watermark), imagesy($watermark));
        imagepng($image, ROOT . "/photos/imageWithWatermark.png");
    }

}