<?php
require ("security.php");
function tab($data)
{
    $ret = '';

    $ret .= '<table class="table table-bordered">';

    $row = $data[0];
    $ret .= '<tr>';
    foreach ($row as $key => $val) {
        $ret .= '<th>' . $key . '</th>';
    }
    $ret .= '</tr>';
    foreach ($data as $key1 => $val1) {
        $ret .= '<tr>';
        foreach ($val1 as $key2 => $val2) {
            if ($key2 == 'Фотография'){
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
        cng_key('login', 'Пользователь', $arr[$i], true);
        cng_key('name', 'Имя', $arr[$i], true);
        cng_key('age', 'Дата рождения', $arr[$i], true);
        cng_key('description', 'Описание', $arr[$i], true);
        cng_key('photo', 'Фотография', $arr[$i], true);
    }
    return $arr;
}
$db = @mysqli_connect("localhost", "root", "", "smilebook");
$sql = 'SELECT id, login, name, age, description, photo FROM `users`';
$result = $db->query($sql);
$records = $result->fetch_all(MYSQLI_ASSOC);
$data = change_key($records);

for ($i = 0; ($i <= count($data) - 1); $i++) {
    $index = $data[$i]['id'];
    $data[$i]['Действие'] = "<form action='deleteuser.php' method='post'><input type='hidden' value='$index' name='id'><button type='submit'>Удалить пользователя</button></form>";
}
echo tab($data);
?>