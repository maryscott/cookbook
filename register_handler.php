<?php
	session_start();
	require_once ('dao.php');
	$dao = new dao();
	
	unset($_SESSION['message']);
	
	//get post data from register form
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordCheck = $_POST['passwordCheck'];
	
	//validate and sanitize data
	
	//first name?
	if (empty($firstName)){
		$_SESSION['message'][] = "Please enter first name";
	}
	
	//last name?
	if (empty($lastName)){
		$_SESSION['message'][] = "Please enter last name";
	}
	
	//email look like an email?
	if (0 === preg_match('/^.+@.+\.[A-Za-z]{1,5}$/', $email, $matches)) {
		$_SESSION['message'][] = "Invalid email address";
	}
	
	//has a password been put in?
	if (empty($password)){
		$_SESSION['message'][] = "Missing password";
	}
	
	//has password check been put in?
	if (empty($passwordCheck)){
		$_SESSION['message'][] = "Please confirm your password";
	}
	
	//do password and password check match?
	if ($password != $passwordCheck) {
		$_SESSION['message'][] = "passwords do not match";
	}
	
	//set pre-sets  How to do more than one preset?
	if (isset($_SESSION['message'])){
		$_SESSION['presets']['email'] = $email;
		$_SESSION['presets']['fname'] = $firstName;
		$_SESSION['presets']['lname'] = $lastName;
		header("Location:register.php");
		exit;
	} 
	
	//remove excess space from fname and lname before putting them in the db
	$firstName = trim($firstName);
	$lastName = trim($lastName);
	
	
	//build tablename - I would like to remove all special characters from an email address and turn it into the tablename
	$tablename = preg_replace('/[^A-Za-z0-9\-]/', '', $email); 

	//put into table
	if ($dao->registerUser($email, $password, $firstName, $lastName, $tablename)){
		if ($dao->createTable($tablename)){
			mkdir('./' . $tablename);
			header("Location:login.php");
		} else {
			$_SESSION['message'][] = "problem creating table";
			$_SESSION['presets']['email'] = $email;
			$_SESSION['presets']['fname'] = $firstName;
			$_SESSION['presets']['lname'] = $lastName;
			header("Location:register.php");
		}
	}

	exit;

?>
