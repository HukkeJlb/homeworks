<?php

class Controller_404 {

    public function action_index()
    {

        require_once(ROOT . '/views/404.php');

        return true;
    }

}
