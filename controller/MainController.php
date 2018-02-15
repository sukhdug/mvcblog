<?php

include ROOT . '/model/Article.php';
include ROOT . '/config/session.php';

class MainController {

    public function actionIndex() {

        $twigPath = 'config/twig.php';
        $twig = include($twigPath);

        $articleModel = new Article();

        $total = $articleModel->countArticles(); // общее количество статей
        $min = 0;
        if ($total >= 5) {
            $max = 5;
        } elseif ($total < 5) {
            $max = $total;
        }
        $articles = array();
        $articles = $articleModel->getArticlesList($min, $max);

        echo $twig->render('/main/index.html.twig', [
            'articles' => $articles
        ]);
        return true;
    }

    public function actionAbout() {
        require_once(ROOT . '/view/main/about.php');

        return true;
    }

    public function actionContact() {
        require_once(ROOT . '/view/main/contact.php');

        return true;
    }

}
