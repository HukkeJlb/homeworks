<?php

class Controller_Task extends Controller

{
    function __construct()
    {
        parent::__construct();
        $this->model = new Task();
    }

    public function action_index()
    {
        $data = $this->model->getData();

        $this->view->generate('task_view.twig',
            array(
                'title' => 'Задание',
                'data' => $data,
                'task' => 'active'
            )
        );
    }

}

