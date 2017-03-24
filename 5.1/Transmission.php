<?php

trait ReverseGear
{
    public $direction;
    protected $gear;
    protected function transmissionOn($direction, $speed = 0)
    {
        if ($direction == 'Вперёд') {
            $this->move_forward($speed);
        } elseif ($direction == 'Назад') {
            $this->move_backward($speed);
        }
    }

    protected function move_backward($speed)
    {
        echo "Включена задняя передача: едем назад со скоростью $speed км/ч<br>";
    }

}

trait TransmissionManual
{
    use ReverseGear;

    protected function move_forward($speed)
    {
        if ($speed >= 0 && $speed < 20 && $this->gear != 1) {
            $this->gear = 1;
            echo "Включена 1 передача: едем вперед со скоростью $speed км/ч<br>";
        }
        if ($speed >= 20 && $this->gear != 2) {
            $this->gear = 2;
            echo "Включена 2 передача: едем вперед со скоростью $speed км/ч<br>";
        }

    }
}

trait TransmissionAuto
{
    use ReverseGear;

    protected function move_forward($speed)
    {
        echo "Включена автоматическая коробка передач, едем вперед со скоростью " . $speed . " м/с<br>";
    }
}