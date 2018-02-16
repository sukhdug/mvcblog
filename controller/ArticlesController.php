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
            'totalPages' => $num_pages,
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionView($id)
    {
        $twigPath = 'config/twig.php';
        $twig = include($twigPath);
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

                echo $twig->render('/articles/view.html.twig', [
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
}