<?php

require_once 'src/iAddService.php';
require_once 'src/iPriceCalculation.php';
require_once 'src/aTariff.php';
require_once 'src/BasicTariff.php';
require_once 'src/HourlyTariff.php';
require_once 'src/StudentTariff.php';

$basic = new BasicTariff(10, 20);
$hourly = new HourlyTariff(60, 123);
$student = new StudentTariff(20, 25);

function getNameClass($obj)
{
    $tariff = [
        [
            'name' => 'Тариф студенческий',
            'class' => StudentTariff::class
        ],
        [
            'name' => 'Базовый тариф',
            'class' => BasicTariff::class
        ],
        [
            'name' => 'Тариф почасовый',
            'class' => HourlyTariff::class
        ],
    ];

    foreach ($tariff as $value) {
        if (get_class($obj) == $value['class']) {
            return $value['name'];
        }
    }
}

$basicPrice = $basic->priceCalculation($basic->AddService(10, 1));

echo getNameClass($basic) . '(' . $basic->getKm() . ' км, ' . $basic->getMinutes() . ' минут)<br>';
echo 'Дополнительная услуга: ' . $basic->getGpsStatus() . ', ' . $basic->getDriverStatus() . '<br>';
echo 'Цена: ' . $basicPrice . 'руб.<br>';

echo '<br>';


$hourlyPrice = $hourly->priceCalculation($hourly->AddService(0, 1));

echo getNameClass($hourly) . '(' . $hourly->getKm() . ' км, ' . $hourly->getMinutes() . ' минут)<br>';
echo 'Дополнительная услуга: ' . $hourly->getGpsStatus() . ' ' . $hourly->getDriverStatus() . '<br>';
echo 'Цена: ' . $hourlyPrice . 'руб.<br>';

echo '<br>';

$studentPrice = $student->priceCalculation($student->AddService(20));

echo getNameClass($student) . '(' . $student->getKm() . ' км, ' . $student->getMinutes() . ' минут)<br>';
echo 'Дополнительная услуга: ' . $student->getGpsStatus() . ' ' . $student->getDriverStatus() . '<br>';
echo 'Цена: ' . $studentPrice . 'руб.<br>';
