<?php
echo "<h2>EXERCISE №1<br>_________________________<br></h2>";
$name = "Никита";
$age = "23";
print "Меня зовут $name.<br> Мне $age лет.<br>";
echo "\"!|\\/'\"\\<br>";
//// =====================================================================
echo "<h2>EXERCISE №2<br>_________________________<br></h2>";
$totalPicture = 80;
$felttipPicture = 23;
$pencilPicture = 40;
$paintPicture = $totalPicture - ($felttipPicture + $pencilPicture);
echo "На выставке было $totalPicture картин. ";
echo "Из них: $felttipPicture было выполнено фломастерами, $pencilPicture - карандашами, $paintPicture - красками.<br>";
// =====================================================================
echo "<h2>EXERCISE №3<br>_________________________<br></h2>";
const CONST123 = "Это константа";
if (defined('CONST123')) {
    echo "Проверка на наличие константы - она существует<br>";
}
echo CONST123 . "<br>";
define("CONST123", 'Новое значение');
echo CONST123 . "<br>";
// =====================================================================
echo "<h2>EXERCISE №4<br>_________________________<br></h2>";
$age = mt_rand(1, 100);
if ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать <br>";
} elseif ($age > 65) {
    echo "Вам пора на пенсию <br>";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать <br>";
} else {
    echo "Неизвестный возраст <br>";
}
// =====================================================================
echo "<h2>EXERCISE №5<br>_________________________<br></h2>";
$day = mt_rand(1, 10);
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день <br>";
        break;
    case 6:
    case 7:
        echo "Это выходной день <br>";
        break;
    default:
        echo "Неизвестный день <br>";
}
// =====================================================================
echo "<h2>EXERCISE №6<br>_________________________<br></h2>";
$bmw = [
    'model' => 'X5',
    'speed' => '120',
    'doors' => '5',
    'year' => '2015',
];
$toyota = [
    'model' => 'Corolla',
    'speed' => '140',
    'doors' => '5',
    'year' => '2017',
];
$opel = [
    'model' => 'Astra',
    'speed' => '110',
    'doors' => '5',
    'year' => '2016',
];
$car = [
    'BMW' => $bmw,
    'Toyota'  => $toyota,
    'Opel' => $opel
];
echo "Объединение 3ёх массивов в многомерный:<pre>";
print_r($car);
foreach ($car as $carName => $value) {
    echo "CAR $carName <br>";
    echo $value['model'] . ' ';
    echo $value['speed'] . ' ';
    echo $value['doors'] . ' ';
    echo $value['year'] . "<br></pre>";
};
// =====================================================================
echo "<h2>EXERCISE №7<br>_________________________<br></h2>";
echo "<table border=\"2\"><tr>";
for ($a = 1; $a <= 10; $a++) {
    for ($b = 1; $b <= 10; $b++) {
        if ($a % 2 == 0 && $b % 2 == 0) {
            echo "<td>(" . $a * $b . ")</td>";
        } elseif ($a % 2 != 0 && $b % 2 != 0) {
            echo "<td>[" . $a * $b . "]</td>";
        } else {
            echo "<td>" . $a * $b . "</td>";
        };
    }
    if ($a != 10) {
        echo "</tr>";
    };
};
echo "</table>";
// =====================================================================
echo "<h2>EXERCISE №8<br>_________________________<br></h2>";
$str = 'лина джаггернаут тайдхантер лич войд дарксир';
echo $str . "<br><pre>";
$array = explode(' ', $str);
print_r($array);
echo "<br>";
$i = 0;
while ($i < count($array)) {
    $newArray[]= $array[count($array)-1 - $i];
    $i++;
};
print_r($newArray);
$newLine = implode('-', $newArray);
echo $newLine;