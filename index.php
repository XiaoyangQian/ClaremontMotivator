<?php
// entry point for site
require_once('dbconn/dbconn.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'partnerInfo';
    $action = 'ls';
}
require_once('view/layout.php');
