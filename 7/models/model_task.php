<?php

class Task extends Model
{

    public function getData()
    {
        $taskList = $users = User::all()->sortByDesc('age');
        foreach ($users as $user) {
            if (18 > (date('Y-m-d') - $user->age)) {
                $user->ageStatus = 'Несовершеннолетний';
            } else {
                $user->ageStatus = 'Совершеннолетний';
            }
        }
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

    public function resizeImage($width, $height)
    {
        $image = imagecreatefrompng(ROOT . "/photos/imageWithWatermark.png");
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
        imagepng($newImage, ROOT . "/photos/newImageWithWatermark.png");
    }

    public function resizeToWidth($width)
    {
        $image = imagecreatefrompng(ROOT . "/photos/imageWithWatermark.png");
        $ratio = $width / imagesx($image);
        $height = imagesy($image) * $ratio;
        $this->resizeImage($width, $height);
    }

}