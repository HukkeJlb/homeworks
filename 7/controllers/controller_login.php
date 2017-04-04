<?php


class Controller_Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Login();
    }

    public function action_index()
    {
        $data = $this->model->getData();

        $this->view->generate('login_view.twig',
            array(
                'notauthorized' => 'y',
                'title' => 'Авторизация',
                'login' => $data['login'],
                'errors' => $data['errors'],
                'auth' => 'active'
            )
        );
    }
}