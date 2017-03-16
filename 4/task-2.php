<?php
$armyUS = [
    'Vehicles' => [
        'Autos' => ['Hummer H1', 'Hummer H2', 'Hummer H3'],
        'Tanks' => ['M1 Abrams', 'AMX-56 Leclerc', 'Leopard 1'],
        'Planes' => ['Lockheed F-117 Nighthawk', 'A-10 Thunderbolt']
    ],
    'Weapons' => ['SCAR-H', 'M4A1', 'XM8'],
    'Ships' => ['200 Battleships', '10 Aircraft Carries'],
    'Human Resources' => ['100k - Doctors', '200k Engineers', '1000000 Soldiers']
];
file_put_contents('./output.json', json_encode($armyUS));
$jsonFile = file_get_contents('./output.json');
$jsonArray = json_decode($jsonFile, true);
$randomCase = mt_rand(0, 1);
if ($randomCase == 1) {
    $newArray = '';
    $newArray = [
        'Vehicles' => $jsonArray['Vehicles'],
        'Weapons' => $jsonArray['Weapons'] = ['AK-74', 'Pistol TT', 'Dragunov`s Sniper Rifle'],
        'Ships' => ['100 Battleships', '5 Aircraft Carries'],
        'Human Resources' => ['100k - Doctors', '250k Engineers', '1500000 Soldiers']
    ];
} else {
    $newArray = $jsonArray;
}
file_put_contents('./output2.json', json_encode($newArray));
$arr1 = json_decode(file_get_contents('./output.json'), true);
$arr2 = json_decode(file_get_contents('./output2.json'), true);
if ($arr1 != $arr2) {
    echo "Были внесены следующие изменения:<br>";
    if ($arr1['Weapons'] != $arr2['Weapons']) {
        $compare1 = array_diff_assoc($arr2['Weapons'], $arr1['Weapons']);
        foreach ($compare1 as $key => $value) {
            echo 'В элемент Weapons[' .$key. '] - внесено значение '.$value.' <br>';
        }
    }
    if ($arr1['Vehicles'] != $arr2['Vehicles']) {
        $compare2 = array_diff_assoc($arr2['Vehicles'], $arr1['Vehicles']);
        foreach ($compare2 as $key => $value) {
            echo 'В элемент Vehicles[' .$key. '] - внесено значение '.$value.' <br>';
        }
    }
    if ($arr1['Ships'] != $arr2['Ships']) {
        $compare1 = array_diff_assoc($arr2['Ships'], $arr1['Ships']);
        foreach ($compare1 as $key => $value) {
            echo 'В элемент Ships[' .$key. '] - внесено значение '.$value.' <br>';
        }
    }
    if ($arr1['Human Resources'] != $arr2['Human Resources']) {
        $compare1 = array_diff_assoc($arr2['Human Resources'], $arr1['Human Resources']);
        foreach ($compare1 as $key => $value) {
            echo 'В элемент Human Resources[' .$key. '] - внесено значение '.$value.' <br>';
        }
    }
} else {
        echo "Изменений в данных нет";
}