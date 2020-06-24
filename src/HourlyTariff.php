<?php

class HourlyTariff extends aTariff
{
    protected $pricePerKm = 0;
    protected $pricePerMinutes = 200 / 60;
    protected $minutesInHours = 60;

    public function priceCalculation($serviceFeatures = 0)
    {
        $for60minutes = $this->minutes - $this->minutes % $this->minutesInHours + $this->minutesInHours;
        return $this->km * $this->pricePerKm + $for60minutes * $this->pricePerMinutes + $serviceFeatures;
    }
}
