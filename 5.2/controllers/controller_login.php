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
        $this->view->generate('login_view.twig',
            array(
                'title' => 'Авторизация',
                'login' => $login,
                'errors' => $errors,
                'auth' => 'active'
            ));
    }
}