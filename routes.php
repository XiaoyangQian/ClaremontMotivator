
<?php
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controller/' . $controller . 'Controller.php');

    if($controller == 'checklist'){
      require_once('model/task.php');
      $controller = new ChecklistController();
    } else if($controller == 'partnerInfo'){
      require_once('model/info.php');
      $controller = new PartnerInfoController();
    } else if($controller =='match'){
      require_once('model/match.php');
      $controller = new MatchController();
    }
    
    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('checklist' => ['list', 'error'], 'partnerInfo' =>['list'], 'match' =>['direct']);

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