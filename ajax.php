<?php

$controller = @$_POST["controller"];
$action = @$_POST["action"];
$id = @$_POST['id'];

if ($controller && $action && $id) {

    $controller .= "Controller";
    $controllerFile = "controller/" . $controller . ".php";
    if (file_exists($controllerFile))
        require_once($controllerFile);
    $controllerObject = new $controller;
    $method = "action" . $action;
    $result = $controllerObject->$method($id);
    echo $result;
} else {
    die("Unknown error! Sorry :(");
}