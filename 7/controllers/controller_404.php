<?php

class Controller_404 extends Controller
{

    public function action_index()
    {
        $this->view->generate('404.twig',
            array(
                'notauthorized' => 'y',
                'title' => 'Ошибка',
                'content' => 'Ошибка 404 - Not Found'
            ));
    }

}
