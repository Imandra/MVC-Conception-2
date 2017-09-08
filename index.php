<?php

require_once __DIR__ . '/autoload.php';
//$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//$pathParts = explode('/', $path);
//$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
//$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';
// в .htaccess: RewriteRule ^(.*)$ index.php
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';
//require_once __DIR__ . '/controllers/'.$controllerClassName.'.php';

try {
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();

} catch (Exception $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');
}
