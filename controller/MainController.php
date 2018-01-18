<?php

include_once ROOT. '/model/Article.php';

class MainController
{

    public function actionIndex()
    {

        $articleModel = new Article();

        $total = $articleModel->countArticles(); // общее количество статей
        $min = 0;
        if($total >= 5) {
            $max = 5;
        } elseif ($total < 5) {
            $max = $total;
        }
        $articlesList = array();
        $articlesList = $articleModel->getArticlesList($min, $max);

        require_once(ROOT . '/view/main/index.php');

        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT . '/view/main/about.php');

        return true;
    }

    public function actionContact()
    {
        require_once(ROOT . '/view/main/contact.php');

        return true;
    }
}