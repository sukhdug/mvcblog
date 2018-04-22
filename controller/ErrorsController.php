<?php

require_once "Controller.php";

class ErrorsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionError404()
    {
        echo $this->twig->render('/errors/page_not_found.html.twig', [
            'session'   => $_SESSION
        ]);
        return true;
    }
}