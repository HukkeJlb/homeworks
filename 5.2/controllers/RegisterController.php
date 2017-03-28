<?php

require ROOT . '/models/Register.php';

class RegisterController
{

    public function actionIndex()
    {
        require_once(ROOT . '/views/register.php');
        return true;
    }

}
