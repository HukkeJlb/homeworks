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
        $login = $this->model->getLogin($data);
        $errors = $this->model->getErrors($data);

        $this->view->generate('login_view.twig',
            array(
                'title' => 'Авторизация',
                'login' => $login,
                'errors' => $errors,
                'auth' => 'active'
            )
        );
    }
}