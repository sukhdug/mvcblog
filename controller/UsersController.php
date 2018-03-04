<?php

require_once "Controller.php";
include ROOT. '/model/User.php';

class UsersController extends Controller
{

    public function actionIndex($p) {

        $userModel = new User();

        if(!isset($p)) $page = 1;
        else {
            $page = addslashes(strip_tags(trim($p)));
            if($page < 1) $page = 1;
        }
        $max_elements = 5; // эта переменная хранит количество выводимых пользователей в одной странице
        $total = $userModel->countUsers(); // общее количество пользователей
        $num_pages = ceil($total / $max_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $max_elements; // Стартовая позиция выборки из БД
        $users = $userModel->getUsersList($start, $max_elements);
        if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']){
            echo $this->twig->render('/users/index.html.twig', [
                'users' => $users,
                'currentPage' => $page,
                'totalPages' => $num_pages,
                'session'   => $_SESSION
            ]);
        }
        elseif (isset($_SESSION['logged']) && !$_SESSION['logged']['admin'])
            require_once(ROOT . '/view/errors/notadmin.php');
        else require_once(ROOT . '/view/errors/noauth.php');

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

    public function actionEdit($id) {
        $userModel = new User();
        $result = array();
        $id = intval($id);
        $user = $userModel->getUserByID($id);

        if (isset($_POST['submit'])) {
            $user['login'] = $_POST['inputLogin'];
            $user['email'] = $_POST['inputEmail'];
            $user['fname'] = $_POST['inputName'];
            $user['surname'] = $_POST['inputSurname'];
            $user['id'] = $id;
            $result = $userModel->updateUser($user);
        }

        if ($user) {
            if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']){
                echo $this->twig->render('/users/edit.html.twig', [
                    'user' => $user,
                    'result' => $result,
                    'session' => $_SESSION
                ]);
            }
            elseif (isset($_SESSION['logged']) && ($_SESSION['logged']['id'] == $user['id'])) {
                echo $this->twig->render('/users/edit.html.twig', [
                    'user' => $user,
                    'result' => $result,
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