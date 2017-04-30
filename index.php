<?php
<<<<<<< HEAD
	// entry point for site
	require_once('dbconn.php');

	if (isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action     = $_GET['action'];
	} else {
		$controller = 'partnerInfo';
		$action     = 'list';
	}
	require_once('view/layout.php');
?>
=======
// entry point for site
require_once('dbconn/dbconn.php');
require_once('model/autoload.php');
require_once('controller/BaseController.php');
require_once('routes.php');

$controller = @$_GET['controller'];
$action = @$_GET['action'];
ResolveRoute($controller, $action);

>>>>>>> origin/master
