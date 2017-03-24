<?php

trait Engine
{
    public $horsePower;
    protected $engineTemperature = 17; //температура двигателя по умолчанию
    public $maxSpeed;
    protected $distance;

    public function MaxSpeed()
    {
        $maxSpeed = ($this->horsePower) * 2;
        $this->maxSpeed = $maxSpeed;
    }

    protected function EngineStatus($turn)
    {
        if ($turn == 'on') {
            echo '<b>Двигатель заведён</b><br>';
        } elseif ($turn == 'off') {
            echo '<b>Двигатель заглушён</b><br>';
            $this->engineTemperature = 17;
        }
    }

    protected function EngineCoolOn()
    {
        for ($i = 0; $i <= $this->distance; $i += 2) {
            $this->engineTemperature += 1;
            while ($this->engineTemperature >= 90) {
                echo "<i>Проехали: $i м. -  температура двигателя достигла $this->engineTemperature С</i><br>";
                echo '<i>Охлаждение включено - </i>';
                $this->EngineCooling();
            }
        }
    }

    private function EngineCooling()
    {
        $this->engineTemperature -= 10;
        echo "<i>двигатель охлаждён до $this->engineTemperature С</i><br>";
    }
}