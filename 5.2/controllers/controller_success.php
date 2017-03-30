<?php


class Controller_Success extends Controller
{

    public function action_index()
    {
        session_start();

        $this->view->generate('base_view.twig',
            array(
                'title' => 'Личный кабинет',
                'content' => "Привет, $_SESSION[login]"
            )
        );
        session_destroy(); //добавленно временно
    }
}