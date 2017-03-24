<?php

trait ReverseGear
{
    public $transmission;
    protected $direction;
    protected $gear;

    protected function move_backward($speed)
    {
        echo "Включена задняя передача: едем назад со скоростью $speed км/ч<br>";
    }

    protected function transmissionOn($transmission, $direction, $speed = 0)
    {
        if ($transmission == 'автоматическая') {
            if ($direction == 'вперёд') {
                $this->move_forward_auto($speed);
            } elseif ($direction == 'назад') {
                $this->move_backward($speed);
            }
        } elseif ($transmission == 'механическая') {
            if ($direction == 'вперёд') {
                $this->move_forward_manual($speed);
            } elseif ($direction == 'назад') {
                $this->move_backward($speed);
            }
        }
    }
}

trait TransmissionManual
{
    use ReverseGear;

    protected function move_forward_manual($speed)
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
//    use ReverseGear;

    protected function move_forward_auto($speed)
    {
        echo "Включаем селектор Drive, едем вперед со скоростью " . $speed . " м/с<br>";
    }
}