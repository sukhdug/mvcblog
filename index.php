<?php
session_start();

// FRONT CONTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/config/Router.php');
require_once(ROOT.'/config/Database.php');

// 3. Вызор Router

$router = new Router();
$router->run();