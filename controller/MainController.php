<?php

include "Controller.php";
include ROOT . '/model/Article.php';

class MainController extends Controller{

    public function actionIndex() {

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

        echo $this->twig->render('/main/index.html.twig', [
            'articles' => $articles,
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionAbout() {

        echo $this->twig->render('/main/about.html.twig', [
            'session'   => $_SESSION
        ]);
        return true;
    }

    public function actionContact() {

        echo $this->twig->render('/main/contact.html.twig', [
            'session'   => $_SESSION
        ]);
        return true;
    }

}
