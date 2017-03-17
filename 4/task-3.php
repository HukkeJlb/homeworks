<?php
$array = [];
for ($i = 0; $i < 50; $i++) {
    $newValue = mt_rand(1, 100);
    array_push($array, $newValue);
}
$csv = implode(',', $array);
file_put_contents('./file.csv', $csv);
//=====================================================================
$handle = fopen('./file.csv', "r");
$data = fgetcsv($handle, 1000, ",");
foreach ($data as $value) {
    $result = 0;
    for ($i = 0; $i < count($data); $i++) {
        $result = $result + $data[$i];
    }
}
echo "<h1>Cумма всех чисел массива равна $result</h1>";
echo "<h2>Массив, случайно сгенерированных чисел:<br></h2>";
echo "<pre>";
print_r($data);
