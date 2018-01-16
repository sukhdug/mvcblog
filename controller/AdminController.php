<?php

include_once ROOT. '/model/Article.php';
include_once ROOT. '/model/Comment.php';

class AdminController
{
    public function actionIndex()
    {
        $articleModel = new Article();

        $articlesList = array();
        $articlesList = $articleModel->getArticlesList();

        require_once(ROOT . '/view/admin/index.php');

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

            require_once(ROOT . '/view/admin/view.php');

        }

        return true;
    }

}