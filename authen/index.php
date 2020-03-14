<?php

require('Model/User.class.php');
session_start();

$pageTest;



require_once('Model/Connection.class.php');
$pdoBuilder = new Connection();
$db = $pdoBuilder->getConnection();


if((isset($_GET['ctrl']) && !empty($_GET['ctrl'])) &&
	(isset($_GET['action']) && !empty($_GET['action']))){
		$ctrl = $_GET['ctrl'];
		$action = $_GET['action'];
 }else{
		$ctrl = 'user';
		$action = 'login';
 }

//test sans dss / direct -> finder
require_once('userController.php');
// require_once('/Controller/' . $ctrl  . 'Controller.php');
$ctrl = $ctrl . 'Controller';
$controller = new $ctrl($db);
$controller->$action();



require_once('View/footer.php');

?>
