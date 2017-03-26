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
