<?php

include ROOT. '/config/session.php';
include ROOT. '/config/twig.php';

class Controller
{
    protected $twig;

    public function __construct()
    {
        $twigPath = 'config/twig.php';
        $this->twig = include($twigPath);
    }

}