<?php
// entry point for site
require_once('dbconn/dbconn.php');
require_once('routes.php');

$controller = @$_GET['controller'];
$action = @$_GET['action'];
ResolveRoute($controller, $action);

