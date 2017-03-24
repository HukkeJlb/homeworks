<?php
require 'Car.php';

class Renault extends Car
{
    public $color;
    public $model;
    public $transmission;

    public function __construct($model, $color, $horsePower, $transmission)
    {
        $this->horsePower = $horsePower;
        $this->model = $model;
        $this->color = $color;
        $this->transmission = $transmission;
        echo "Создан автомобиль ".__CLASS__. " $model. Цвет - $color<br>";
    }
}

$renault1 = new Renault('Logan', 'Синий', 70, 'Механическая');
//$renault1->maxSpeed();
//$renault1->EngineOn(true);
//echo $renault1->temperature;
$renault1->move(1000,10,'forward');

