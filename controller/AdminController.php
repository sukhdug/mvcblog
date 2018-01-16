<?php

include_once ROOT. '/model/Article.php';
include_once ROOT. '/model/Comment.php';

class AdminController
{
    public function actionIndex()
    {
        
        require_once(ROOT . '/view/admin/index.php');

        return true;
    }

}