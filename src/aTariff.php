<?php

abstract class aTariff implements iPriceCalculation, iAddService
{
    protected $pricePerKm;
    protected $pricePerMinute;
    protected $km;
    protected $minutes;
    protected $gpsStatus;
    protected $driverStatus;

    public function __construct($km, $minutes)
    {
        $this->km = $km;
        $this->minutes = $minutes;
    }

    public function AddService($gps = 0, $addDriver = 0)
    {
        if ($gps != 0) {
            $this->gpsStatus = 'GPS';
        }
        if ($addDriver != 0) {
            $this->driverStatus = 'Водитель';
        }
        $hours = ceil($gps / 60);
        return $serviceFeatures = $hours * 15 + $addDriver * 100;
    }

    public function priceCalculation($serviceFeatures = 0)
    {
        return $this->km * $this->pricePerKm + $this->minutes * $this->pricePerMinute + $serviceFeatures;
    }

    /**
     * @return mixed
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @return mixed
     */
    public function getMinutes()
    {
        return $this->minutes;
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

