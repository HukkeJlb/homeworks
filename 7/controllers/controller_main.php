<?php

class Controller_Main extends Controller
{
    public function action_index()
    {
        $this->view->generate('base_view.twig',
            array(
                'notauthorized' => 'y',
                'title'   => 'Главная страница',
                'content' => 'Главная страница'
            ));
    }

}