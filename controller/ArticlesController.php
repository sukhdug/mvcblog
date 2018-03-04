<?php

require_once "Controller.php";
include ROOT. '/model/Article.php';
include ROOT. '/model/Comment.php';

class ArticlesController extends Controller{

    public function actionIndex($p) {

        $articleModel = new Article();

        if(!isset($p)) $page = 1;
        else {
            $page = addslashes(strip_tags(trim($p)));
            if($page < 1) $page = 1;
        }
        $max_elements = 5; // эта переменная хранит количество выводимых статей в одной странице
        $total = $articleModel->countArticles(); // общее количество статей
        $num_pages = ceil($total / $max_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $max_elements; // Стартовая позиция выборки из БД

        $articles = array();
        $articles = $articleModel->getArticlesList($start, $max_elements);

        echo $this->twig->render('/articles/index.html.twig', [
            'articles' => $articles,
            'currentPage' => $page,
            'totalPages' => $num_pages,
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionView($id) {

        $commentModel = new Comment();
        $articleModel = new Article();
        $result = array();
        $WriteComment = [
            'comment' => '',
            'author' => '',
            'id' => 0
        ];
        $id = intval($id);
        if (isset($_POST['submit'])) {

            $WriteComment['comment'] = $_POST['inputComment'];
            $WriteComment['author'] = $_POST['inputAuthor'];
            $WriteComment['id'] = $id;
            $result = $commentModel->addCommentForArticle($WriteComment);
        }

        if ($id) {

            $article = $articleModel->getArticlesItemByID($id);
            $comments = $commentModel->getCommentsList($id);

            if ($article) {

                echo $this->twig->render('/articles/view.html.twig', [
                    'article' => $article,
                    'comments' => $comments,
                    'result' => $result,
                    'writecomment' => $WriteComment,
                    'session'   => $_SESSION
                ]);
            }
            else {
                require_once(ROOT . '/view/errors/noarticle.php');
            }
        }
        return true;
    }

    public function actionEdit($id) {

        $articleModel = new Article();
        $id = intval($id);
        $result = array();

        if (isset($_POST['submit'])) {

            $article['title'] = $_POST['inputTitle'];
            $article['author'] = $_POST['inputAuthor'];
            $article['body'] = $_POST['inputBody'];
            $article['id'] = $id;
            if (isset($_FILES['inputPicture'])){
                $article['picture'] = $_FILES['inputPicture']['name'];
                $article['file_tmp'] = $_FILES['inputPicture']['tmp_name'];
                $article['file_type'] = $_FILES['inputPicture']['type'];
            }
            $result = $articleModel->updateArticle($article);
        }

        if ($id) {

            $articlesItem = $articleModel->getArticlesItemByID($id);

            if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']) {
                echo $this->twig->render('/articles/edit.html.twig', [
                    'article' => $articlesItem,
                    'result' => $result,
                    'session'   => $_SESSION
                ]);
            }
            elseif (isset($_SESSION['logged']) && !$_SESSION['logged']['admin']) require_once(ROOT . '/view/errors/notadmin.php');
            else require_once(ROOT . '/view/errors/noauth.php');

        }

        return true;
    }

    public function actionDelete($id) {

        $articleModel = new Article();
        $id = intval($id);
        $result = 0;

        if (isset($_POST['submit'])) {

            $result = $articleModel->deleteArticle($id);

        }

        if ($id) {

            $articlesItem = $articleModel->getArticlesItemByID($id);

            if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']) require_once(ROOT . '/view/admin/delete.php');
            elseif (isset($_SESSION['logged']) && !$_SESSION['logged']['admin']) require_once(ROOT . '/view/errors/notadmin.php');
            else require_once(ROOT . '/view/errors/noauth.php');

        }

        return true;
    }

    public function actionAdd() {

        $articleModel = new Article();
        $result = array();
        $article = [
            'title' => '',
            'author' => '',
            'body' => '',
            'picture' => '',
            'file_tmp' => '',
            'file_type' => ''
        ];

        if (isset($_POST['submit'])) {

            $article['title'] = $_POST['inputTitle'];
            $article['author'] = $_POST['inputAuthor'];
            $article['body'] = $_POST['inputBody'];
            if (isset($_FILES['inputPicture'])){
                $article['picture'] = $_FILES['inputPicture']['name'];
                $article['file_tmp'] = $_FILES['inputPicture']['tmp_name'];
                $article['file_type'] = $_FILES['inputPicture']['type'];
            }
            $result = $articleModel->insertArticle($article);
        }

        if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']) {
            echo $this->twig->render('/articles/add.html.twig', [
                'article' => $article,
                'result' => $result,
                'session'   => $_SESSION
            ]);
        }
        elseif (isset($_SESSION['logged']) && !$_SESSION['logged']['admin'])
            require_once(ROOT . '/view/errors/notadmin.php');
        else
            require_once(ROOT . '/view/errors/noauth.php');

        return true;
    }

    public function actionLiked($id) {
        echo $id;
        return true;
    }
}