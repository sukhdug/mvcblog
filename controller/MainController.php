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

        $twigPath = 'config/twig.php';
        $twig = include($twigPath);

        echo $twig->render('/main/about.html.twig');
        return true;
    }

    public function actionContact() {

        $twigPath = 'config/twig.php';
        $twig = include($twigPath);

        echo $twig->render('/main/contact.html.twig');
        return true;
    }

}
