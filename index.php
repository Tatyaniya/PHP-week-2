<?php

require_once 'src/iAddService.php';
require_once 'src/iPriceCalculation.php';
require_once 'src/aTariff.php';
require_once 'src/BasicTariff.php';
require_once 'src/HourlyTariff.php';
require_once 'src/StudentTariff.php';



$basic = new BasicTariff(10, 3);
$hourly = new HourlyTariff();
$student = new StudentTariff(4, 1);

function getNameClass($obj) {
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

echo getNameClass($basic) . '(' . $basic->$km . ' км, ' . $basic->$minutes . ' минут)<br>';
echo 1;
echo $basic->priceCalculation(5, 6);
echo '<br>';

echo '<br>';
echo $hourly->priceCalculation(10,123, $basic->AddService(123, 1));
echo '<br>';
echo $student->priceCalculation(20, 25);


















