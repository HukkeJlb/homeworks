<?php

class Controller_Main
{
    public function action_index()
    {
        require_once(ROOT . '/views/main.php');
        return true;
    }

}