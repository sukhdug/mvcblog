<?php

include_once ROOT. '/model/User.php';
include_once ROOT. '/config/session.php';

class UsersController
{
    public function actionSignup()
    {
        $userModel = new User();
        $result = '';
        $user = [
            'login' => '',
            'email' => '',
            'name' => '',
            'surname' => '',
            'password' => '',
            'password2' => ''
        ];
        $errors = array();

        if (isset($_POST['submit'])) {

            $user['login'] = $_POST['inputLogin'];
            $user['email'] = $_POST['inputEmail'];
            $user['name'] = $_POST['inputName'];
            $user['surname'] = $_POST['inputSurname'];
            $user['password'] = $_POST['inputPassword'];
            $user['password2'] = $_POST['inputPassword2'];

            if ($user['password'] == $user['password2']) {

                $result = $userModel->addUser($user);

            } else {
                 $errors['repeat_password'] = 'Повторный пароль введен неправильно';
            }
        }

        if ($result) {
            echo "Success";
        }

        require_once(ROOT . '/view/users/signup.php');

        return true;
    }

    public function actionLogin()
    {
        $userModel = new User();
        $result = array();
        $user = [
            'login' => '',
            'password' => ''
        ];

        if (isset($_POST['submit'])) {

            $user['login'] = $_POST['inputLogin'];
            $user ['password'] = $_POST['inputPassword'];

            $result = $userModel->login($user);
        }

        if (isset($_SESSION['logged'])) {

            header('Location: /');

        }else {

            require_once(ROOT . '/view/users/login.php');
        }

        return true;
    }

    public function actionLogout()
    {

        if (isset($_SESSION['logged'])) {

            unset($_SESSION['logged']);
            header('Location: /');

        } else {

            header('Location: /login');
        }

    }
}