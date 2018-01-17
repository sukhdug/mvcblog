<?php

include_once ROOT. '/model/Article.php';

class MainController
{

    private function pagination($p, $num_pages)
    {
        //Check whether the link "first"
        if($p > 2){
            $first_page = ' <a href="index.php?page=1"><<</a> ';   //или просто $first_page = ' <a href="/index.php"><<</a> ';
        }
        else{
            $first_page = '';
        }
        //Check whether the link "last"
        if($p < ($num_pages - 2)){
            $last_page = ' <a href="index.php?page='.$num_pages.'">>></a> ';
        }
        else{
            $last_page = '';
        }
        //Check whether the link "To previous"
        if($p > 1){
            $prev_page = ' <a href="index.php?page='.($p - 1).'"><</a> ';
        }
        else{
            $prev_page = '';
        }
//Check whether the link "next"
        if($p < $num_pages){
            $next_page = ' <a href="index.php?page='.($p + 1).'">></a> ';
        }
        else{
            $next_page = '';
        }
        //Formed on 2 pages before and after the current (if any exist)
        if($p - 2 > 0){
            $prev_2_page = ' <a href="index.php?page='.($p - 2).'">'.($p - 2).'</a> ';
        }
        else{
            $prev_2_page = '';
        }
        if($p - 1 > 0){
            $prev_1_page = ' <a href="index.php?page='.($p - 1).'"> '.($p - 1).' </a> ';
        }
        else{
            $prev_1_page = '';
        }
        if($p + 2 <= $num_pages){
            $next_2_page = ' <a href="index.php?page='.($p + 2).'"> '.($p + 2).' </a> ';
        }
        else{
            $next_2_page = '';
        }
        if($p + 1 <= $num_pages){
            $next_1_page = ' <a href="index.php?page='.($p + 1).'">'.($p + 1).'</a> ';
        }
        else{
            $next_1_page = '';
        }
        $nav = $first_page.$prev_page.$prev_2_page.$prev_1_page.$p.$next_1_page.$next_2_page.$next_page.$last_page;
        // Return the result of pagination
        return $nav;

    }
    public function actionIndex()
    {

        $articleModel = new Article();

        if(!isset($_GET['page'])) $page = 1;
         else {
            $page = addslashes(strip_tags(trim($_GET['page'])));
            if($page < 1) $page = 1;
        }
        $num_elements = 2; // эта переменная хранит количество выводимых статей в одной странице
        $total = $articleModel->countArticles(); // общее количество статей
        $num_pages = ceil($total / $num_elements);
        if ($page > $num_pages) $page = $num_pages;
        $start = ($page - 1) * $num_elements; // Стартовая позиция выборки из БД

        $articlesList = array();
        $pagination = $this->pagination($page, $num_pages);
        $articlesList = $articleModel->getArticlesList($start, $num_elements);

        require_once(ROOT . '/view/main/index.php');

        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT . '/view/main/about.php');

        return true;
    }
}