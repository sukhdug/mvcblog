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
            }
        }
        if (!empty($segments)) {
            $controllerName = ucfirst(array_shift($segments)) . 'Controller';
            $controllerFile = ROOT . '/controller/' . $controllerName . '.php';
            if ($controllerName == 'AdminController') {
                $match = ucfirst(array_shift($segments));
                if ($match == 'Page') {
                    include_once($controllerFile);
                    $actionName = 'actionIndex';
                    $controllerObject = new $controllerName;
                    $parameters[] = array_shift($segments);
                    call_user_func_array(array($controllerObject, $actionName), $parameters);
                } else if ((!empty($match)) && ($match != 'Page')) {
                    $controllerName = $match . 'Controller';
                    $controllerFile = ROOT . '/controller/' . $controllerName . 'php';
                    if (file_exists($controllerFile)) {
                        include_once($controllerFile);
                        $controllerObject = new $controllerName;
                        $parameters = array();
                        $match = array_shift($segments);
                        if (preg_match('([0-9]+)', $match)) {
                            $actionName = 'actionView';
                            $parameters[] = $match;
                            call_user_func_array(array($controllerObject, $actionName), $parameters);
                        } else {
                            $actionName = 'action' . ucfirst($match);
                            $parameters[] = array_shift($segments);
                            call_user_func_array(array($controllerObject, $actionName), $parameters);
                        }
                    }
                }
            }
            if (file_exists($controllerFile)) {
                include_once($controllerFile);
                $controllerObject = new $controllerName;
                $parameters = array();
                $match = array_shift($segments);
                if (preg_match('([0-9]+)', $match)) {
                    $actionName = 'actionView';
                    $parameters[] = $match;
                    call_user_func_array(array($controllerObject, $actionName), $parameters);
                } else if (empty($match)) {
                    $actionName = 'actionIndex';
                    $parameters[] = $match;
                    call_user_func_array(array($controllerObject, $actionName), $parameters);
                } else if ($match == 'page') {
                    $actionName = 'actionIndex';
                    $parameters[] = array_shift($segments);
                    call_user_func_array(array($controllerObject, $actionName), $parameters);
                } else {
                    $actionName = 'action' . ucfirst($match);
                    $parameters[] = array_shift($segments);
                    call_user_func_array(array($controllerObject, $actionName), $parameters);
                }
            }
        }
    }
}