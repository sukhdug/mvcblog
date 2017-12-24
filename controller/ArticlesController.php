<?php

include_once ROOT. '/model/Article.php';

class ArticlesController
{
    public function actionIndex()
    {

        $articlesList = array();
        $articlesList = Article::getArticlesList();

        require_once(ROOT . '/view/articles/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {

            $articlesItem = Article::getArticlesItemByID($id);

            require_once(ROOT . '/view/articles/view.php');

        }

        return true;

    }

}