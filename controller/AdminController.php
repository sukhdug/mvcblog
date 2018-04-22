<?php

require_once "Controller.php";
require_once ROOT. '/model/Article.php';
require_once ROOT. '/model/Comment.php';

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex($p)
    {
        $articleModel = new Article();

        if(!isset($p)) $page = 1;
        else {
            $page = addslashes(strip_tags(trim($p)));
            if($page < 1) $page = 1;
        }
        $max_elements = 9; // эта переменная хранит количество выводимых статей в одной странице
        $total = $articleModel->countArticles(); // общее количество статей
        $num_pages = ceil($total / $max_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $max_elements; // Стартовая позиция выборки из БД

        $articlesList = array();
        $articlesList = $articleModel->getArticlesList($start, $max_elements);
        $pagination = $this->pagination($page, $num_pages);

        if (isset($_SESSION['logged']) && $_SESSION['logged']['admin']) require_once(ROOT . '/view/admin/index.php');
        elseif (isset($_SESSION['logged']) && !$_SESSION['logged']['admin']) require_once(ROOT . '/view/errors/notadmin.php');
        else require_once(ROOT . '/view/errors/noauth.php');

        return true;
    }

    private function pagination($page, $num_pages)
    {
        if ($page > 2) $first_page = '<li><a href="/admin/page/1"><<</a></li>';
        else $first_page = '';
        if ($page < ($num_pages - 1)) $last_page = '<li><a href="/admin/page/'.$num_pages.'">>></a></li>';
        else $last_page = '';
        if ($page > 1) $prev_page = '<li><a href="/admin/page/'.($page - 1).'"><</a></li>';
        else $prev_page = '';
        if ($page < $num_pages) $next_page = '<li><a href="/admin/page/'.($page + 1).'">></a></li>';
        else $next_page = '';
        if ($page - 2 > 0) $prev_2_page = '<li><a href="/admin/page/'.($page - 2).'">'.($page - 2).'</a></li>';
        else $prev_2_page = '';
        if ($page - 1 > 0) $prev_1_page = '<li><a href="/admin/page/'.($page - 1).'"> '.($page - 1).' </a></li>';
        else $prev_1_page = '';
        if ($page + 2 <= $num_pages) $next_2_page = '<li><a href="/admin/page/'.($page + 2).'"> '.($page + 2).' </a></li>';
        else $next_2_page = '';
        if ($page + 1 <= $num_pages) $next_1_page = '<li><a href="/admin/page/'.($page + 1).'">'.($page + 1).'</a></li>';
        else $next_1_page = '';

        $pagination = $first_page.$prev_page.$prev_2_page.$prev_1_page.'<li class="active"><a href="#">'.$page.'</a></li>'.$next_1_page.$next_2_page.$next_page.$last_page;

        return $pagination;

    }
}