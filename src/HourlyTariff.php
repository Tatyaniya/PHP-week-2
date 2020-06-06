<?php

class HourlyTariff extends aTariff
{
//    const PRICE_PER_MINUTES = 200 / 60;
//    const MINUTES_IN_HOUR = 60;
protected $pricePerMinutes = 200 / 60;
    protected $minutesInHours = 60;

    public function __construct()
    {
        // Вызывается пустым, чтобы родительский здесь не работал
    }

    public function priceCalculation($km, $minutes, $serviceFeatures = 0)
    {
        $for60minutes = $minutes - $minutes % $this->minutesInHours + $this->minutesInHours;
        return $km * 0 + $for60minutes * $this->pricePerMinutes + $serviceFeatures;
    }
}

// С константами вылазит ошибка
//Fatal error: Uncaught DivisionByZeroError: Modulo by zero in
//E:\OSPanel\domains\week-2\src\HourlyTariff.php:17 Stack trace:
//#0 E:\OSPanel\domains\week-2\index.php(44): HourlyTariff->priceCalculation(10, 61, true)
//# #1 {main} thrown in E:\OSPanel\domains\week-2\src\HourlyTariff.php on line 17