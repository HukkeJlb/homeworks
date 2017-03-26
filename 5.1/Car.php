<?php
require 'Engine.php';
require 'Transmission.php';

class Car
{
    use Engine, TransmissionManual, TransmissionAuto {
    TransmissionManual::moveBackward insteadof TransmissionAuto;
    TransmissionAuto::moveBackward as goBackAuto;
}


    protected $speed;
    protected $time;
    public $color;
    const TRANSMISSION_AUTO = 'transmission_auto';
    const TRANSMISSION_MANUAL = 'transmission_manual';
    
    protected function transmissionOn($transmission, $direction, $speed = 0)
    {
        if (($transmission == Car::TRANSMISSION_AUTO) || ($transmission == 'автоматическая')) {
            if ($direction == 'вперёд') {
                $this->moveForwardAuto($speed);
            } elseif ($direction == 'назад') {
                $this->goBackAuto($speed);
            }
        } elseif (($transmission == Car::TRANSMISSION_MANUAL) || ($transmission == 'механическая')) {
            if ($direction == 'вперёд') {
                $this->moveForwardManual($speed);
            } elseif ($direction == 'назад') {
                $this->moveBackward($speed);
            }
        }
    }

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
