<?php

include_once ROOT. '/model/Article.php';
include_once ROOT. '/model/Comment.php';
include_once ROOT. '/config/session.php';

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
        $max_elements = 5; // эта переменная хранит количество выводимых статей в одной странице
        $total = $articleModel->countArticles(); // общее количество статей
        $num_pages = ceil($total / $max_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $max_elements; // Стартовая позиция выборки из БД

        $articlesList = array();
        $articlesList = $articleModel->getArticlesList($start, $max_elements);
        $pagination = $this->pagination($page, $num_pages);

        require_once(ROOT . '/view/articles/index.php');

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

    private function pagination($page, $num_pages)
    {
        if ($page > 2) $first_page = '<li><a href="/articles/page/1"><<</a></li>';
        else $first_page = '';
        if ($page < ($num_pages - 1)) $last_page = '<li><a href="/articles/page/'.$num_pages.'">>></a></li>';
        else $last_page = '';
        if ($page > 1) $prev_page = '<li><a href="/articles/page/'.($page - 1).'"><</a></li>';
        else $prev_page = '';
        if ($page < $num_pages) $next_page = '<li><a href="/articles/page/'.($page + 1).'">></a></li>';
        else $next_page = '';
        if ($page - 2 > 0) $prev_2_page = '<li><a href="/articles/page/'.($page - 2).'">'.($page - 2).'</a></li>';
        else $prev_2_page = '';
        if ($page - 1 > 0) $prev_1_page = '<li><a href="/articles/page/'.($page - 1).'"> '.($page - 1).' </a></li>';
        else $prev_1_page = '';
        if ($page + 2 <= $num_pages) $next_2_page = '<li><a href="/articles/page/'.($page + 2).'"> '.($page + 2).' </a></li>';
        else $next_2_page = '';
        if ($page + 1 <= $num_pages) $next_1_page = '<li><a href="/articles/page/'.($page + 1).'">'.($page + 1).'</a></li>';
        else $next_1_page = '';

        $pagination = $first_page.$prev_page.$prev_2_page.$prev_1_page.'<li class="active"><a href="#">'.$page.'</a></li>'.$next_1_page.$next_2_page.$next_page.$last_page;

        return $pagination;

    }
}