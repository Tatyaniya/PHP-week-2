<?php

abstract class aTariff implements iPriceCalculation, iAddService
{
    protected $pricePerKm;
    protected $pricePerMinute;
    protected $gpsStatus;
    protected $driverStatus;

    public function __construct($pricePerKm, $pricePerMinute)
    {
        $this->pricePerKm = $pricePerKm;
        $this->pricePerMinute = $pricePerMinute;
    }

    public function AddService($gps = 0, $addDriver = 0)
    {

        $hours = ceil($gps / 60);
        return $serviceFeatures = $hours * 15 + $addDriver * 100;
    }

    public function priceCalculation($km, $minutes, $serviceFeatures = 0)
    {
        return $km * $this->pricePerKm + $minutes * $this->pricePerMinute + $serviceFeatures;
    }

    /**
     * @return mixed
     */
    public function getGpsStatus()
    {
        return $this->gpsStatus;
    }

    /**
     * @return mixed
     */
    public function getDriverStatus()
    {
        return $this->driverStatus;
    }
}

