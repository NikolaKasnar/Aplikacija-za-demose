<?php

if (!isset($_GET['rt'])) {
    $controllerName = 'LoginController';
    $action = 'index';
} else {
    $rt = $_GET['rt'];
    $parts = explode('/', $rt);
    $controllerName = ucfirst($parts[0]) . 'Controller';
    $action = isset($parts[1]) ? $parts[1] : 'index';
}

require_once __DIR__ . '/controller/' . $controllerName . '.class.php';

$c = new $controllerName;

$c->$action();
