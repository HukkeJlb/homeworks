<?php

class MainController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/main.php');
        return true;
    }

}