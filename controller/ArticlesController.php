<?php

include_once ROOT. '/model/Article.php';
include_once ROOT. '/model/Comment.php';

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
        $id = intval($id);
        if ($id) {

            $articlesItem = Article::getArticlesItemByID($id);
            $commentsList = Comment::getCommentsList($id);

            require_once(ROOT . '/view/articles/view.php');

        }
        if (isset($_POST['submit'])) {

            $d = Comment::addCommentForArticle($_POST['inputAuthor'], $_POST['inputComment'], $id);
            echo $d;
        }

        return true;

    }

}