<?php

trait Engine
{
    public $horsePower;
    public $engineTemperature = 18;
    public $maxSpeed;
    public $distance;

    public function MaxSpeed()
    {
        $maxSpeed = ($this->horsePower) * 2;
        echo "Максимальная скорость автомобиля равна $maxSpeed км/ч<br>";
        $this->maxSpeed = $maxSpeed;
    }


    protected function EngineOn($turn)
    {
        if ($turn == true) {
            echo 'Двигатель заведён<br>';
        }
    }

    protected function EngineOff($turn)
    {
        if ($turn == false) {
            echo 'Двигатель заглушён<br>';
        }
    }

    public function EngineCoolOn()
    {
        while ($this->engineTemperature >= 90) {
            echo 'Охлаждение включено. Температура двигателя уменьшена на 10 градусов<br>';
            $this->EngineCooling();
        }
    }

    private function EngineCooling()
    {
        $this->engineTemperature -= 10;
        echo "Двигатель охлаждён до $this->engineTemperature<br>";
    }
}