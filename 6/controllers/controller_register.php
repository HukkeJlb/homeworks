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
        $login = $this->model->getLogin($data);
        $errors = $this->model->getErrors($data);
        $email = $this->model->getEmail($data);

        $this->view->generate('reg_view.twig',
            array(
                'title' => 'Регистрация',
                'login' => $login,
                'errors' => $errors,
                'email' => $email,
                'register' => 'active'
            )
        );
    }

}
