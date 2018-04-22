<?php

$controller = @$_GET["controller"];
$action = @$_GET["action"];
$id = @$_GET['id'];

if ($controller && $action) {

    $controller .= 'Controller';
    $controllerFile = __DIR__ . '/controller/' . $controller . '.php';
    if (file_exists($controllerFile)) {
        require_once ($controllerFile);
        $actionName = 'action' . $action;
        $parameters = array();
        $controllerObject = new $controller(true);
        $controllerObject->$actionName($id);
    }
} else {
    die("Unknown error! Sorry :(");
}