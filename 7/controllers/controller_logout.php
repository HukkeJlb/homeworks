<?php

class Controller_Logout extends Controller
{

    public function action_index()
    {
        session_start();
        session_destroy();
        header('Location: http://' . $_SERVER['HTTP_HOST'] . "/");
    }

}
