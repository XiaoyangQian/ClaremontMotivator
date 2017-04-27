<?php
function call($controller, $action)
{
    // require the file that matches the controller name
    require_once('controller/' . $controller . 'Controller.php');

    if ($controller == 'checklist') {
        $controller = new ChecklistController();
    } else if ($controller == 'partnerInfo') {
        $controller = new PartnerInfoController();
    } else if ($controller == 'match') {
        $controller = new MatchController();
    }

    // call the action
    $controller->{$action}();
}


function ResolveRoute($controller, $action)
{

    if (!$controller && !$action) {
        // default route
        $controller = 'partnerInfo';
        $action = 'ls';
    }

    function showError()
    {
        (new BaseController())->renderView('/message/error.php');
    }

    // just a list of the controllers we have and their actions
    // we consider those "allowed" values
    $controllers = array('checklist' => ['ls'], 'partnerInfo' => ['ls'], 'match' => ['direct']);

    // check that the requested controller and action are both allowed
    // if someone tries to access something else he will be redirected to the error action of the pages controller
    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            showError();
        }
    } else {
        showError();
    }
}