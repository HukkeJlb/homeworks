<?php
echo "<h2>EXERCISE №1<br>_________________________<br></h2>";
$array1 = [
    0 => "Na`Vi, Virtus.Pro, Team Spirit, Vega Squadron",
    1 => "Team Liquid, Team Secret, Alliance, Ad Finem",
    2 => "Digital Chaos, Evil Geniuses, Team NP",
    3 => "Newbee, Wings, VG.J"
];
function cool_func($array, $case = false)
{
    if ($case) {
        $resFunction = implode(', ', $array);
        return $resFunction;
    } else {
        foreach ($array as $value) {
            echo "<p>" . $value . "</p>";
        }
    }
    return null;
}

cool_func($array1);
echo "<br>===========================================================================<br>";
$asd = cool_func($array1, true);
echo "$asd";
//===============================================================================
echo "<h2>EXERCISE №2<br>_________________________<br></h2>";
operation([2, 4, 7], '/');
function operation($data, $operation)
{
    if (!is_array($data)) {
        echo 'Необходимо ввести массив чисел<br>';
        return;
    }
    foreach ($data as $value) {
        if (!is_int($value)) {
            echo 'Некорректный массив! Введите только числа!<br>';
            return;
        }
    }
    switch ($operation) {
        case "+" :
            $rez = 0;
            for ($i = 0; $i <= count($data); $i++) {
                $rez = $rez + $data[$i];
            }
            echo "Результат вычислений = $rez";
            break;
        case "-" :
            $rez = $data[0];
            for ($i = 0; $i <= count($data); $i++) {
                $rez = $rez - $data[$i + 1];
            }
            echo "Результат вычислений = $rez";
            break;
        case "*" :
            $rez = 1;
            for ($i = 0; $i < count($data); $i++) {
                $rez = $rez * $data[$i];
            }
            echo "Результат вычислений = $rez";
            break;
        case "/" :
            $rez = $data[0];
            for ($i = 1; $i < count($data); $i++) {
                $rez = $rez / $data[$i];
                if ($data[$i] == 0) {
                    echo "Деление на ноль - запрещено<br>";
                    return;
                }
            }
            echo "Результат вычислений = $rez";
            break;
        case "**" :
            $rez = $data[0];
            for ($i = 0; $i < (count($data) - 1); $i++) {
                $rez = pow($rez, $data[$i + 1]);
            }
            echo "Результат вычислений = $rez";
            break;
        default:
            echo "Некорректный арифметический оператор";
    }
}

//===============================================================================
echo "<h2>EXERCISE №3<br>_________________________<br></h2>";
calcEverything('+', 2, 3, 1.5, 4.5, 5);
function calcEverything()
{
    function output($fullArr, $spliceArr, $result)
    {
        $output = '';
        for ($a = 0; $a < count($spliceArr); $a++) {
            $q = "$spliceArr[$a]";
            $w = "$fullArr[0]";
            if ($a == (count($spliceArr) - 1)) {
                $output = $output . $q;
            } else {
                $output = $output . $q . $w;
            }
        }
        echo "$output=$result";
    }

    $argArray = func_get_args();
    $arr = array_splice($argArray, 1);
    foreach ($arr as $value) {
        if ((!is_int($value)) && (!is_float($value))) {
            echo 'Введите корректные аргументы(2-ой и последующие аргумент должны быть числами)';
            return;
        }
    }
    switch ($argArray[0]) {
        case '+':
            $rez = 0;
            for ($i = 0; $i <= count($arr); $i++) {
                $rez = $rez + $arr[$i];
            }
            output($argArray, $arr, $rez);
            break;
        case '-':
            $rez = $arr[0];
            for ($i = 0; $i <= count($arr); $i++) {
                $rez = $rez - $arr[$i + 1];
            }
            output($argArray, $arr, $rez);
            break;
        case '/':
            $rez = $arr[0];
            for ($i = 1; $i < count($arr); $i++) {
                $rez = $rez / $arr[$i];
                if ($arr[$i] == 0) {
                    echo "Деление на ноль - запрещено<br>";
                    return;
                }
            }
            output($argArray, $arr, $rez);
            break;
        case '*':
            $rez = 1;
            for ($i = 0; $i < count($arr); $i++) {
                $rez = $rez * $arr[$i];
            }
            output($argArray, $arr, $rez);
            break;
        case '**':
            $rez = $arr[0];
            for ($i = 0; $i < (count($arr) - 1); $i++) {
                $rez = pow($rez, $arr[$i + 1]);
            }
            output($argArray, $arr, $rez);
            break;
        default:
            echo 'Первый аргумент должен содержать корректный арифметический оператор<br>';
    }
}

//===============================================================================
echo "<h2>EXERCISE №4<br>_________________________<br></h2>";
table(4, 7);
function table($firstNumber, $secondNumber)
{
    if ((!is_int($firstNumber)) || (!is_int($secondNumber))) {
        echo "Введите ЦЕЛЫЕ числа";
        return;
    } else {
        echo "<table><tr>";
        for ($a = 1; $a <= $firstNumber; $a++) {
            for ($b = 1; $b <= $secondNumber; $b++) {
                echo "<td>" . $a * $b . "</td>";
            }
            if ($a != $firstNumber) {
                echo "</tr>";
            };
        };
        echo "</table>";
    }
}

//===============================================================================
echo "<h2>EXERCISE №5<br>_________________________<br></h2>";
$palindrom = is_palindrom('anna');
echo "$palindrom";
function is_palindrom($string)
{
    $revString = '';
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $revString = $revString.$string[mb_strlen($string) - 1 - $i];
    }
    if ($string == $revString) {
        $result = true;
    } else {
        $result = false;
    }
    function newOutput($result)
    {
        if ($result){
            $message = "Введённая строка является палиндромом";
        } else {
            $message = "Введённая строка не палиндром";
        }
        return $message;
    }
    $message = newOutput($result);
    return $message;
}
