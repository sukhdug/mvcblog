<?php

include_once ROOT. '/model/Article.php';
include_once ROOT. '/model/Comment.php';

class ArticlesController
{
    public function actionIndex()
    {
        $articleModel = new Article();

        $articlesList = array();
        $articlesList = $articleModel->getArticlesList();

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

}