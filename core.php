<?php
	ob_start();
	session_start();
	$fileName = $_SERVER['SCRIPT_NAME'];

	function loggedIn(){
		if(isset($_SESSION['userID']) && !empty($_SESSION['userID']))
			return true;
		return false;
	}

	function testInputData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>