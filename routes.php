<?php
function call($controller, $action)
{
    // require the file that matches the controller name
    $controller_name = ucfirst($controller) . 'Controller';
    require_once('controller/' . $controller_name . '.php');
    $controller = new $controller_name();

    // call the action
    if (method_exists($controller, $action)) {
        $controller->{$action}();
    } else if (method_exists($controller, strtolower($_SERVER["REQUEST_METHOD"]) . '_' . $action)) {
        $controller->{strtolower($_SERVER["REQUEST_METHOD"]) . '_' . $action}();
    } else {
        (new BaseController())->renderView('message/error');
    }
}


function ResolveRoute($controller, $action)
{
    session_start();
    if (!$controller && !$action) {
        // default route
        $controller = 'Checklist';
        $action = 'index';
    }
    call($controller, $action);
}