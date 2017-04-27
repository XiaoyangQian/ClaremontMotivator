<?php
// entry point for site
require_once('dbconn/dbconn.php');
require_once('model/autoload.php');
require_once('controller/BaseController.php');
require_once('routes.php');

$controller = @$_GET['controller'];
$action = @$_GET['action'];
ResolveRoute($controller, $action);

