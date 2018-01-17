<?php

include_once ROOT. '/model/Article.php';

class MainController
{
    public function actionIndex()
    {
        $articleModel = new Article();

        $articlesList = array();
        $articlesList = $articleModel->getArticlesList();

        require_once(ROOT . '/view/main/index.php');

        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT . '/view/main/about.php');

        return true;
    }
}