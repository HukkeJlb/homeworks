<?php
require 'Engine.php';
require 'Transmission.php';

class Car
{
    use Engine, TransmissionManual, TransmissionAuto;
    protected $speed;
    protected $time;
    public $color;

    public function move($distance, $speed, $direction) // $distance - В метрах, $speed в км/ч
    {
        $this->distance = $distance;
        if ($speed <= $this->maxSpeed) {
            $this->speed = $speed;
        } else {
            $speed = $this->maxSpeed;
            $this->speed = $speed;
        }

        $this->direction = $direction;
        $time = (($this->distance / 1000) / $this->speed) * 60;

        echo '<h2>Тест-драйв:</h2><hr>';
        $this->EngineStatus('on');
        $this->transmissionOn($this->transmission, $direction, $speed);
        $this->EngineCoolOn();
        $this->EngineStatus('off');
        echo "Расстояние в $distance м преодолено за $time минут<br><hr>";
    }
}