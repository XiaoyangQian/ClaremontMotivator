<?php
	// entry point for site
	require_once('dbconn.php');

	if (isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action     = $_GET['action'];
	} else {
		$controller = 'checklist';
		$action     = 'list';
	}
	require_once('view/layout.php');
?>