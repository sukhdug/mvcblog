<?php

$controller = @$_POST["controller"];
$action = @$_POST["action"];
$id = @$_POST['id'];

if ($controller && $action && $id) {

    $controller .= "Controller";
    $controllerFile = __DIR__ . "/controller/" . $controller . ".php";
    include($controllerFile);
    $controllerObject = new $controller;
    $method = "action" . $action;
    $result = call_user_func(array($controllerObject, $method), $id);

} else {
    die("Unknown error! Sorry :(");
}