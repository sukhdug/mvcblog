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

    public function actionEdit($id)
    {
        $articleModel = new Article();
        $id = intval($id);
        if ($id) {

            $articlesItem = $articleModel->getArticlesItemByID($id);

            require_once(ROOT . '/view/admin/edit.php');

        }

        if (isset($_POST['submit'])) {

            $article['title'] = $_POST['inputTitle'];
            $article['author'] = $_POST['inputAuthor'];
            $article['body'] = $_POST['inputBody'];
            $article['id'] = $id;
            $result = $articleModel->updateArticle($article);
            if($result) {
                echo "Success";
            }
        }

        return true;
    }
}