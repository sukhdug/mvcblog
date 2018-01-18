<?php

class UsersController
{
    public function actionSignup()
    {
        require_once(ROOT . '/view/users/signup.php');

        return true;
    }

    public function actionLogin()
    {
        require_once(ROOT . '/view/users/login.php');

        return true;
    }
}