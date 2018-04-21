<?php

require_once "Controller.php";
include ROOT . '/model/Article.php';
include ROOT. '/model/User.php';

class MainController extends Controller{

    public function actionIndex() {

        $articleModel = new Article();

        $total = $articleModel->countArticles(); // общее количество статей
        $min = 0;
        if ($total >= 5) {
            $max = 5;
        } elseif ($total < 5) {
            $max = $total;
        }
        $articles = $articleModel->getArticlesList($min, $max);
        echo $this->twig->render('/main/index.html.twig', [
            'articles' => $articles,
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionAbout() {

        echo $this->twig->render('/main/about.html.twig', [
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionContact() {

        echo $this->twig->render('/main/contact.html.twig', [
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionSignup()
    {

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

            echo $this->twig->render('/users/login.html.twig', [
                'user' => $user,
                'result' => $result
            ]);
        }
        return true;
    }

    public function actionLogout()
    {

        if (isset($_SESSION['logged'])) {

            unset($_SESSION['logged']);
            header('Location: ' . $_SERVER['REQUEST_URI']);
        }
        if (!isset($_SESSION['logged'])) {
            header('Location: /main/login');
        }
    }
}
