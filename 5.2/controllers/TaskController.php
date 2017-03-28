<?php

require ROOT . '/models/Task.php';

class TaskController
{

    public function actionIndex()
    {
        $taskList = array();
        $taskList = Task::getList();

        require_once(ROOT . '/views/task.php');

        return true;
    }

}

