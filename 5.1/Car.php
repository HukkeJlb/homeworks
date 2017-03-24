<?php
require 'Engine.php';
require 'Transmission.php';

class Car
{
    use Engine, TransmissionManual, TransmissionAuto;
    protected $speed;

    public function move($distance, $speed, $direction)
    {
        $this->distance = $distance;
        $this->speed = $speed;
        $this->direction = $direction;
//        if ($direction == 'backward') {
//            $this->Backward();
//        }

        $this->EngineOn(true);
        $this->transmissionOn($direction, $speed);

        $this->EngineCoolOn();
        $this->EngineOff(true);
    }
}