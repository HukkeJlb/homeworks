<?php


class Task extends Model
{

    public function getData()
    {
        $db = Db::getConnection();
        $taskList = array();

        $result = $db->query('SELECT name, age, description, photo, if(CURRENT_DATE()-age >= 180000,\'Совершеннолетний\',\'Несовершеннолетний\') as ageStatus FROM users ORDER BY 2 DESC ');

        $records = $result->fetch_all(MYSQLI_ASSOC);
        $data = Task::changeKey($records);
        $taskList = Task::makeTab($data);

        return $taskList;
    }

    private static function makeTab($data)
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
                if ($key2 == 'Фотография') {
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

    private static function cngKey($key, $new_key, &$arr, $rewrite = true)
    {
        if (!array_key_exists($new_key, $arr) || $rewrite) {
            $arr[$new_key] = $arr[$key];
            unset($arr[$key]);
            return true;
        }
        return false;
    }

    private static function changeKey($arr)
    {
        for ($i = 0; ($i <= count($arr) - 1); $i++) {
            Task::cngKey('name', 'Имя', $arr[$i], true);
            Task::cngKey('age', 'Дата рождения', $arr[$i], true);
            Task::cngKey('description', 'Описание', $arr[$i], true);
            Task::cngKey('photo', 'Фотография', $arr[$i], true);
            Task::cngKey('ageStatus', 'Статус', $arr[$i], true);
        }
        return $arr;
    }

}