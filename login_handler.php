<?php
	require_once 'Dao.php';
	session_start();
	$dao = new Dao();

	//get post data from login form
	$email = $_POST['email'];
	$password = $_POST['password'];

	$errors = array();

	//select user from database to see if they exist
	if($dao->doesUserExist($email, $password)) {
		$user = $dao->validateUser($email, $password);
		if($user) {
			//if they exist, login
			$_SESSION['logged_in'] = true;
			session_regenerate_id(true);
			$_SESSION['name'] = $user['name'];	
			header("Location:homepage.php");
			exit;
		}
	} else {
		$errors['validate'] = "Invalid email or password";
		$_SESSION['logged_in'] = false;
		//if not, redirect to login page
		header("Location:login.php");
		exit;
	}

	if(0 === preg_match('/^.+@.+\.[A-Za-z]{1,5}$/', email, $matches)) {
		$_SESSION['errors'][] = "Invalid email address";
	}
	
	if(empty($password)) {
		$_SESSION['errors'][] = "Missing Password";
	}

	if(isset($_SESSION['errors'])) {
		header("Location:login.php");
		exit;
	}
?>
