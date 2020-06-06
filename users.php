<?php

$users = [];
$userName = ['Neo', 'Morpheus', 'Trinity', 'Cypher', 'Tank'];

for ($i = 0; $i < 50; $i++) {
    $user = [
        'id' => $i,
        'name' => $userName[array_rand($userName)],
        'age' => mt_rand(18, 45)
    ];
    $users[] = $user;
}

$usersJson = json_encode($users);

file_put_contents('users.txt', $usersJson);

$usersData = file_get_contents('users.txt');

$decodedUsers = json_decode($usersData, true);

$sumAge = 0;
$names = [];

foreach ($decodedUsers as $user) {
    if (isset($names[$user['name']])) {
        $names[$user['name']]++;
    } else {
        $names[$user['name']] = 1;
    }

    $sumAge += $user['age'];
    $averageAge = $sumAge / sizeof($users);
}

echo 'В массиве встречается ';
foreach ($names as $kay => $name) {
    if (!next($names)) {
        echo $name . ' раз имя ' . $kay . '.<br>';
    } else {
        echo $name . ' раз имя ' . $kay . ', ';
    }
}

echo 'Средний возраст пользователей: ' . $averageAge . ' лет<br>';
