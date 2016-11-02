<?php
	session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	
	//get post data from login form
	$email = $_POST['email'];
	$password = $_POST['password'];

	//select user from database to see if they exist
	if($dao->doesUserExist($email, $password)) {
		//if they exist, login
		$_SESSION['logged_in'] = true;
		header("Location:homepage.php");
		exit;
	} else {
		//if not, redirect to login page
		header("Location:login.php");
		exit;
	}

	if(0 === preg_match('/^.+@.+\.[A-Za-z]{1,5}$/', email, $matches)) {
		$_SESSION['message'][] = "Invalid email address";
	}
	
	if(empty($password)) {
		$_SESSION['message'][] = "Missing Password";
	}

	if(isset($_SESSION['message'])) {
		header("Location:login.php");
		exit;
	}

	//select user from database to see if they are there.
	if($dao -> doesUserExist($email, $password)) {
		//if they exist
		$_SESSION['logged in'] = true;
		header("Location:homepage.php");
	}
