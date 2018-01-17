<?php

include_once ROOT. '/model/Article.php';
include_once ROOT. '/model/Comment.php';

class ArticlesController
{
    public function actionIndex($p)
    {
        $articleModel = new Article();

        if(!isset($p)) $page = 1;
        else {
            $page = addslashes(strip_tags(trim($p)));
            if($page < 1) $page = 1;
        }
        $num_elements = 2; // эта переменная хранит количество выводимых статей в одной странице
        $total = $articleModel->countArticles(); // общее количество статей
        $num_pages = ceil($total / $num_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $num_elements; // Стартовая позиция выборки из БД

        $articlesList = array();
        $articlesList = $articleModel->getArticlesList($start, $num_elements);
        $pagination = $this->pagination($page, $num_pages);

        require_once(ROOT . '/view/articles/index.php');

        return true;
    }

    public function actionView($id)
    {
        $commentModel = new Comment();
        $articleModel = new Article();
        $id = intval($id);
        if ($id) {

            $articlesItem = $articleModel->getArticlesItemByID($id);
            $commentsList = $commentModel->getCommentsList($id);

            require_once(ROOT . '/view/articles/view.php');

        }
        if (isset($_POST['submit'])) {

            $d = $commentModel->addCommentForArticle($_POST['inputAuthor'], $_POST['inputComment'], $id);
            echo $d;
        }

        return true;

    }

    private function pagination($p, $num_pages)
    {
        //Check whether the link "first"
        if ($p > 2) $first_page = ' <a href="/articles/page/1"><<</a> ';
        else $first_page = '';
        if ($p < ($num_pages - 1)) $last_page = ' <a href="/articles/page/'.$num_pages.'">>></a> ';
        else $last_page = '';
        if ($p > 1) $prev_page = ' <a href="/articles/page/'.($p - 1).'"><</a> ';
        else $prev_page = '';
        if ($p < $num_pages) $next_page = ' <a href="/articles/page/'.($p + 1).'">></a> ';
        else $next_page = '';
        if ($p - 2 > 0) $prev_2_page = ' <a href="/articles/page/'.($p - 2).'">'.($p - 2).'</a> ';
        else $prev_2_page = '';
        if ($p - 1 > 0) $prev_1_page = ' <a href="/articles/page/'.($p - 1).'"> '.($p - 1).' </a> ';
        else $prev_1_page = '';
        if ($p + 2 <= $num_pages) $next_2_page = ' <a href="/articles/page/'.($p + 2).'"> '.($p + 2).' </a> ';
        else $next_2_page = '';
        if ($p + 1 <= $num_pages) $next_1_page = ' <a href="/articles/page/'.($p + 1).'">'.($p + 1).'</a> ';
        else $next_1_page = '';

        $pagination = $first_page.$prev_page.$prev_2_page.$prev_1_page.$p.$next_1_page.$next_2_page.$next_page.$last_page;

        return $pagination;

    }
}