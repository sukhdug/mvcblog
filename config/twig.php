<?php
/* Файл подключения шаблонизатора twig */
include ROOT. '/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, array(
    'cache' => 'compilation_cache',
    'auto_reload' => true
));
return $twig;