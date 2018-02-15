<?php

include ROOT. '/model/Article.php';
include ROOT. '/model/Comment.php';
include ROOT. '/config/session.php';

class ArticlesController
{
    public function actionIndex($p)
    {
        $twigPath = 'config/twig.php';
        $twig = include($twigPath);
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

        echo $twig->render('/articles/index.html.twig', [
            'articles' => $articles,
            'currentPage' => $page,
            'totalPages' => $num_pages
        ]);
        return true;
    }

    public function actionView($id)
    {
        $commentModel = new Comment();
        $articleModel = new Article();
        $result = array();
        $comment = [
            'comment' => '',
            'author' => '',
            'id' => 0
        ];
        $id = intval($id);
        if (isset($_POST['submit'])) {

            $comment['comment'] = $_POST['inputComment'];
            $comment['author'] = $_POST['inputAuthor'];
            $comment['id'] = $id;
            $result = $commentModel->addCommentForArticle($comment);
        }

        if ($id) {

            $articlesItem = $articleModel->getArticlesItemByID($id);
            $commentsList = $commentModel->getCommentsList($id);

            if ($articlesItem) require_once(ROOT . '/view/articles/view.php');
            else require_once(ROOT . '/view/errors/noarticle.php');

        }
        return true;

    }
}