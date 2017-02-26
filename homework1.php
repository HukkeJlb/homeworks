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
echo CONST123. "<br>";
define(CONST123, 'Новое значение');
echo CONST123. "<br>";
// =====================================================================
echo "<h2>EXERCISE №4<br>_________________________<br></h2>";
$age = mt_rand (1,100);
if ($age>=18 && $age<=65) {
    echo "Вам еще работать и работать <br>";
} elseif ($age>65) {
    echo "Вам пора на пенсию <br>";
} elseif ($age>=1 && $age<=17) {
    echo "Вам ещё рано работать <br>";
} else {
    echo "Неизвестный возраст <br>";
}
// =====================================================================
echo "<h2>EXERCISE №5<br>_________________________<br></h2>";
$day = mt_rand (1,10);
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