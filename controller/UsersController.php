<?php

require_once "Controller.php";
include ROOT. '/model/User.php';

class UsersController extends Controller
{

    public function actionIndex($p)
    {
        $userModel = new User();

        if(!isset($p)) $page = 1;
        else {
            $page = addslashes(strip_tags(trim($p)));
            if($page < 1) $page = 1;
        }
        $max_elements = 10; // эта переменная хранит количество выводимых пользователей в одной странице
        $total = $userModel->countUsers(); // общее количество пользователей
        $num_pages = ceil($total / $max_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $max_elements; // Стартовая позиция выборки из БД
        $users = $userModel->getUsersList($start, $max_elements);
        if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']) {
            if (isset($_GET['csv'])) $this->exportToCsv($users);
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

    public function actionView($id)
    {

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

    public function actionEdit($id)
    {
        $userModel = new User();
        $result = array();
        $id = intval($id);
        $deleted = 0;
        $user = $userModel->getUserByID($id);

        if (isset($_POST['submit'])) {
            $user['login'] = $_POST['inputLogin'];
            $user['email'] = $_POST['inputEmail'];
            $user['fname'] = $_POST['inputName'];
            $user['surname'] = $_POST['inputSurname'];
            $user['id'] = $id;
            $result = $userModel->updateUser($user);
        }

        if (isset($_POST['delete'])) {
            $deleteUser = $userModel->deleteUser($id);
            if ($deleteUser) {
                $deleted = 1;
                $result[] = 'Пользователь удален';
            }
        }

        if ($user) {
            if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']){
                echo $this->twig->render('/users/edit.html.twig', [
                    'user' => $user,
                    'result' => $result,
                    'session' => $_SESSION,
                    'deleted' => $deleted
                ]);
            }
            elseif (isset($_SESSION['logged']) && ($_SESSION['logged']['id'] == $user['id'])) {
                echo $this->twig->render('/users/edit.html.twig', [
                    'user' => $user,
                    'result' => $result,
                    'session' => $_SESSION,
                    'deleted' => $deleted
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

    private function exportToCsv($users)
    {
        $usersCsvArray = [];
        foreach ($users as $key => $data) {
            $usersCsvArray[] = [
                'login' => $data['login'],
                'email' => $data['email'],
                'name' => $data['fname'],
                'surname' => $data['surname'],
                'admin' => $data['admin'] ? 'Да' : 'Нет'
            ];
        }
        $filename = 'users_' . date('Y-m-d') . '.csv';
        $this->downloadSendHeaders($filename);
        echo $this->array2csv($usersCsvArray);
        die();
    }

    private function array2csv(array &$array)
    {
        if (count($array) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    private function downloadSendHeaders($filename)
    {
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }
}