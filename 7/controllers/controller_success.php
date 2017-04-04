<?php


class Controller_Success extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Success();
    }

    public function action_index()
    {
        session_start();

        $data = $this->model->getData();

        $this->view->generate('success_view.twig',
            array(
                'authorized' => 'y',
                'title' => "Привет, $_SESSION[login]",
                'content' => "Привет, $_SESSION[login]",
                'errors' => $data['errors'],
                'messages' => $data['messages'],
                'name' => $data['name'],
                'age' => $data['age'],
                'description' => $data['description'],
                'success' => 'active'
            )
        );
    }
}