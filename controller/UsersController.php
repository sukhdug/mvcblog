<?php

require_once "Controller.php";
include ROOT. '/model/User.php';

class UsersController extends Controller
{

    public function actionIndex($p) {

        return true;
    }

    public function actionView($id) {

        $userModel = new User();
        $id = intval($id);
        $usersItem = $userModel->getUserByID($id);

        if ($usersItem) {
            if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']){
                echo $this->twig->render('/users/view.html.twig', [
                    'user' => $usersItem,
                    'session' => $_SESSION
                ]);
            }
            elseif (isset($_SESSION['logged']) && ($_SESSION['logged']['id'] == $usersItem['id'])) {
                echo $this->twig->render('/users/view.html.twig', [
                    'user' => $usersItem,
                    'session' => $_SESSION
                ]);
            }
            elseif (isset($_SESSION['logged']) && !$_SESSION['logged']['admin'])
                require_once(ROOT . '/view/errors/notadmin.php');
            else require_once(ROOT . '/view/errors/noauth.php');
        }
        else {
            require_once(ROOT . '/view/errors/noarticle.php');
        }



        return true;
    }

    public function actionSignup() {

        $userModel = new User();
        $result = array();
        $user = [
            'login' => '',
            'email' => '',
            'name' => '',
            'surname' => '',
            'password' => '',
            'password2' => ''
        ];

        if (isset($_POST['submit'])) {

            $user['login'] = $_POST['inputLogin'];
            $user['email'] = $_POST['inputEmail'];
            $user['name'] = $_POST['inputName'];
            $user['surname'] = $_POST['inputSurname'];
            $user['password'] = $_POST['inputPassword'];
            $user['password2'] = $_POST['inputPassword2'];

            $result = $userModel->addUser($user);

        }

        if (isset($_SESSION['logged'])) require_once(ROOT . '/view/users/logged.php');
        else {
            echo $this->twig->render('/users/signup.html.twig', [
                'user' => $user,
                'result' => $result
            ]);
        }

        return true;
    }

    public function actionLogin() {

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

            echo $this->twig->render('/users/login.html.twig', [
                'user' => $user,
                'result' => $result
            ]);
        }

        return true;
    }

    public function actionLogout() {

        if (isset($_SESSION['logged'])) {

            unset($_SESSION['logged']);
            header('Location: ' . $_SERVER['REQUEST_URI']);
        }
        if (!isset($_SESSION['logged'])) {
            header('Location: /login');
        }

    }
}