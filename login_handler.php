<?php
	session_start();
	require_once ('dao.php');
	$dao = new dao();
	
	//get post data from login form
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (0 === preg_match('/^.+@.+\.[A-Za-z]{1,5}$/', $email, $matches)) {
		$_SESSION['message'][] = "Invalid email address";
	}
	if (empty($password)){
		$_SESSION['message'][] = "Missing password";
	}
	if (isset($_SESSION['message'])){
		$_SESSION['presets']['email'] = $email;
		header("Location:login.php");
		exit;
	} 
	
	$daoReturn = $dao->doesUserExist($email,$password);
	if ($daoReturn['password'] == $password) {
		$_SESSION['logged_in'] = true;
		$table = $dao->getTableName($email);
		$_SESSION['folder'] = $table->tableName;
		$_SESSION['email'] = $email;
		header("Location:dashboard.php");
		exit;
	} else {
		$_SESSION['presets']['email'] = $email;
		$_SESSION['message'][] = "Password Doesn't match";
		header("Location:login.php");
		exit;
	}
?>