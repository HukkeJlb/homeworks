<?php
echo "<h2>EXERCISE №1<br>_________________________<br></h2>";
$array1 = [
    0 => "Na`Vi, Virtus.Pro, Team Spirit, Vega Squadron",
    1 => "Team Liquid, Team Secret, Alliance, Ad Finem",
    2 => "Digital Chaos, Evil Geniuses, Team NP",
    3 => "Newbee, Wings, VG.J"
];
function cool_func($array, $case = null) {
    if ($case == true) {
        $resFunction = implode(', ', $array);
        return $resFunction;
    } else {
        foreach ($array as $key => $value) {
            echo "<p>" . $value . "</p>";
        };
    };
};

cool_func($array1);
echo "<br>===========================================================================<br>";
$asd = cool_func($array1, true);
echo "$asd";

