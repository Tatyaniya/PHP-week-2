<?php

interface iPriceCalculation
{
    public function priceCalculation($km, $minutes, iAddService $service);
}