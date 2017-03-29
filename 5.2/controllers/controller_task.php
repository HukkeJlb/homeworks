<?php

class Controller_Task
{

    public function action_index()
    {
        $taskList = array();
        $taskList = Task::getList();

        require_once(ROOT . '/views/task.php');

        return true;
    }

}

