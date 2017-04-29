<?php
<<<<<<< HEAD
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controller/' . $controller . 'Controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'checklist':
        require_once('model/task.php');
        $controller = new ChecklistController();
      break;
    }
    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('checklist' => ['list', 'error']);

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('checklist', 'error');
    }
  } else {
    call('checklist', 'error');
  }
?>
=======
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
        $controller = 'PartnerInfo';
        $action = 'ls';
    }
    call($controller, $action);
}
>>>>>>> 3843066bf7482b27d17ad6e925af8ca4c022f38d
