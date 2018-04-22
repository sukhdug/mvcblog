<?php

class Router
{
    private $uri;

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $this->uri = trim($_SERVER['REQUEST_URI'], '/');
            return $this->uri;
        }
    }

    public function run()
    {
        $this->uri = $this->getURI();
        $segments = explode('/', $this->uri);
        $segments = array_filter($segments);
        if (empty($segments)) {
            $controllerName = 'MainController';
            $controllerFile = ROOT . '/controller/' . $controllerName . '.php';
            if (file_exists($controllerFile)) {
                include_once($controllerFile);
                $actionName = 'actionIndex';
                $controllerObject = new $controllerName;
                call_user_func_array(array($controllerObject, $actionName), array());
            } else {
                $this->callErrorsController();
            }
        }
        if (!empty($segments)) {
            $controllerName = ucfirst(array_shift($segments)) . 'Controller';
            if ($controllerName == 'AdminController') {
                $match = ucfirst(array_shift($segments));
                if ($match == 'Page' || empty($match)) {
                    $controllerFile = ROOT . '/controller/' . $controllerName . '.php';
                    include_once($controllerFile);
                    $actionName = 'actionIndex';
                    $controllerObject = new $controllerName;
                    $parameters[] = array_shift($segments);
                    $methodExist = method_exists($controllerObject, $actionName);
                    if ($methodExist) {
                        call_user_func_array(array($controllerObject, $actionName), $parameters);
                    } else {
                        $this->callErrorsController();
                    }
                } else if ((!empty($match)) && ($match != 'Page')) {
                    $controller = $match . 'Controller';
                    $controllerFile = ROOT . '/controller/' . $controller . '.php';
                    if (file_exists($controllerFile)) {
                        include_once($controllerFile);
                        $controllerObject = new $controller;
                        $parameters = array();
                        $match = array_shift($segments);
                        if (preg_match('([0-9]+)', $match)) {
                            $actionName = 'actionView';
                            $parameters[] = $match;
                            $methodExist = method_exists($controllerObject, $actionName);
                            if ($methodExist) {
                                call_user_func_array(array($controllerObject, $actionName), $parameters);
                            } else {
                                $this->callErrorsController();
                            }
                        } else {
                            $actionName = 'action' . ucfirst($match);
                            $parameters[] = array_shift($segments);
                            $methodExist = method_exists($controllerObject, $actionName);
                            if ($methodExist) {
                                call_user_func_array(array($controllerObject, $actionName), $parameters);
                            } else {
                                $this->callErrorsController();
                            }
                        }
                    } else {
                        $this->callErrorsController();
                    }
                }
            }
            if ($controllerName != 'AdminController') {
                $controllerFile = ROOT . '/controller/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                    $controllerObject = new $controllerName;
                    $parameters = array();
                    $match = array_shift($segments);
                    if (preg_match('([0-9]+)', $match)) {
                        $actionName = 'actionView';
                        $parameters[] = $match;
                        $methodExist = method_exists($controllerObject, $actionName);
                        if ($methodExist) {
                            call_user_func_array(array($controllerObject, $actionName), $parameters);
                        } else {
                            $this->callErrorsController();
                        }
                    } else if (empty($match)) {
                        $actionName = 'actionIndex';
                        $parameters[] = $match;
                        $methodExist = method_exists($controllerObject, $actionName);
                        if ($methodExist) {
                            call_user_func_array(array($controllerObject, $actionName), $parameters);
                        } else {
                            $this->callErrorsController();
                        }
                    } else if ($match == 'page') {
                        $actionName = 'actionIndex';
                        $parameters[] = array_shift($segments);
                        $methodExist = method_exists($controllerObject, $actionName);
                        if ($methodExist) {
                            call_user_func_array(array($controllerObject, $actionName), $parameters);
                        } else {
                            $this->callErrorsController();
                        }
                    } else {
                        $actionName = 'action' . ucfirst($match);
                        $parameters[] = array_shift($segments);
                        $methodExist = method_exists($controllerObject, $actionName);
                        if ($methodExist) {
                            call_user_func_array(array($controllerObject, $actionName), $parameters);
                        } else {
                            $this->callErrorsController();
                        }
                    }
                } else {
                    $this->callErrorsController();
                }
            }
        }
    }

    private function callErrorsController()
    {
        $controller = 'ErrorsController';
        $controllerFile = ROOT . '/controller/' . $controller . '.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
            $controllerObject = new $controller;
            $actionName = 'actionError404';
            call_user_func_array(array($controllerObject, $actionName), array());
        } else {
            die('Внутренняя ошибка сайта!');
        }
    }
}