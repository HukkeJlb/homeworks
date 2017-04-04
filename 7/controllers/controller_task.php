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
        $this->model->rotateImg(45);
        $this->model->addWatermark();

        $this->view->generate('task_view.twig',
            array(
                'notauthorized' => 'y',
                'title' => 'Задание',
                'data' => $data,
                'task' => 'active'
            )
        );
    }

}

