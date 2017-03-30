<?php


class Controller_Success extends Controller
{

    public function action_index()
    {

        $this->view->generate('base_view.twig',
            array(
                'title' => 'Личный кабинет',
                'content' => 'Авторизация успешна'
            ));
    }
}