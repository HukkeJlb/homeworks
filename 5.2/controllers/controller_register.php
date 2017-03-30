<?php

class Controller_Register extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Register();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        if (!empty($data[0])) {
            $login = $data[0];
        } else {
            $login = '';
        }
        if (!empty($data[1])) {
            $errors = $data[1];
        } else {
            $errors = '';
        }

        $this->view->generate('reg_view.twig',
            array(
                'title' => 'Регистрация',
                'login' => $login,
                'errors' => $errors,
                'register' => 'active'
            )
        );
    }

}
