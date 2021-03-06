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
        
        $this->view->generate('reg_view.twig',
            array(
                'notauthorized' => 'y',
                'title' => 'Регистрация',
                'login' => $data['login'],
                'errors' => $data['errors'],
                'email' => $data['email'],
                'ip' => $data['ip'],
                'register' => 'active'
            )
        );
    }

}
