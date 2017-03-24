<?php
require 'Car.php';

class Renault extends Car
{
    public $model;

    public function __construct($model, $color, $horsePower, $transmission)
    {
        $this->horsePower = $horsePower;
        $this->model = $model;
        $this->color = $color;
        $this->transmission = $transmission;
        $this->MaxSpeed();
        echo "Создан автомобиль " . __CLASS__ . " $model<br>";
        echo "Характеристики:<ul>
                    <li>Цвет - $color</li>
                    <li>Коробка передач - $transmission</li>
                    <li>Мощность двигателя - $horsePower л.с. </li>
                    <li>Максимальная скорость - $this->maxSpeed км/ч </li>
         </ul>";
    }
}

$renault1 = new Renault('Logan', 'синий', 70, 'механическая');
$renault1->move(350, 30, 'вперёд');
$renault2 = new Renault('Duster', 'жёлтый', 115, 'автоматическая');
$renault2->move(150, 10, 'назад');


