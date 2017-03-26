<?php

trait ReverseGear
{
    public $transmission;
    protected $direction;
    protected $gear;

    protected function moveBackward($speed)
    {
        echo "Включена задняя передача: едем назад со скоростью $speed км/ч<br>";
    }

}

trait TransmissionManual
{
    use ReverseGear;

    protected function moveForwardManual($speed)
    {
        if ($speed >= 0 && $speed < 20 && $this->gear != 1) {
            $this->gear = 1;
            echo "Включаем 1 передачу: едем вперед со скоростью $speed км/ч<br>";
        }
        if ($speed >= 20 && $this->gear != 2) {
            $this->gear = 2;
            echo "Включаем 2 передачу: едем вперед со скоростью $speed км/ч<br>";
        }

    }
}

trait TransmissionAuto
{
    use ReverseGear;

    protected function moveForwardAuto($speed)
    {
        echo "Включаем селектор Drive, едем вперед со скоростью " . $speed . " м/с<br>";
    }
}