<?php
require('security.php');
function tab($data)
{
    $ret = '';

    $ret .= '<table class="table table-bordered">';


    $ret .= '<tr>';
    $ret .= '<th>' . 'id' . '</th>';
    $ret .= '<th>' . 'Название файла' . '</th>';
    $ret .= '<th>' . 'Фотография' . '</th>';
    $ret .= '<th>' . 'Действие' . '</th>';
    $ret .= '</tr>';
    foreach ($data as $key1 => $val1) {
        $ret .= '<tr>';
        foreach ($val1 as $key2 => $val2) {
            if ($key2 == 'Название файла') {
                $ret .= '<td>' . $val2 . '</td>';
                $ret .= "<td><img src='photos/$val2' height='100px'></td>";
            } else {
                $ret .= '<td>' . $val2 . '</td>';
            }
        }
        $ret .= '</tr>';
    }
    $ret .= '</table>';

    return $ret;
}

function cng_key($key, $new_key, &$arr, $rewrite = true)
{
    if (!array_key_exists($new_key, $arr) || $rewrite) {
        $arr[$new_key] = $arr[$key];
        unset($arr[$key]);
        return true;
    }
    return false;
}

function change_key($arr)
{
    for ($i = 0; ($i <= count($arr) - 1); $i++) {
        cng_key('photo', 'Название файла', $arr[$i], true);
//        cng_key('Название файла', 'Фотография', $arr[$i], true);
    }
    return $arr;
}

require "database.php";
$sql = 'SELECT id, photo, photo FROM `users`';
$result = $db->query($sql);
$records = $result->fetch_all(MYSQLI_ASSOC);
$data = change_key($records);
for ($i = 0; ($i <= count($data) - 1); $i++) {
    $index = $data[$i]['id'];
    $data[$i]['Действие'] = "<form action='deletephoto.php' method='post'><input type='hidden' value='$index' name='id'><button type='submit'>Удалить фотографию</button></form>";
}
echo tab($data);