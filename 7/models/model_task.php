<?php


class Task extends Model
{

    public function getData()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT name, age, description, photo, if(CURRENT_DATE()-age >= 180000,\'Совершеннолетний\',\'Несовершеннолетний\') as ageStatus FROM users ORDER BY 2 DESC ');
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $taskList = $data;
        return $taskList;
    }

}