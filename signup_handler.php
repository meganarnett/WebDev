<?php
	session_start();
	include 'Dao.php';

	$name= $_POST['name'];
	$email= $_POST['email'];
	$password= $_POST['password'];
	$occupation= $_POST['occupation'];
	$errors= array();
	$dao = new Dao();

	if(!valid_length($name, 0)) {
		$errors['name'] = "Please put your name";
	}
	
	if(!valid_length($email, 0)) {
		$errors['email'] = "Please put your email";
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email']="Must be a valid email address";
	}
	
	if(!valid_length($password, 0)) {
		$errors['password']="Please put in a password";
	}
	
	if(!valid_length($occupation, 0)) {
		$errors['occupation']="Please put in an occupation";
	}

	function valid_length($field, $min) {
		$trimmed = trim($field);
		return (strlen($trimmed) > $min);
	}
	
	if(empty($errors)) {
		if($dao->doesUserExist($email, $password)) {
			$_SESSION['errors']['userExists'] = "Account already exists";
			header('Location: /cs401/signup.php');
		}else{
		    if($dao->addUser($name, $email, $password, $occupation)) {
			
			header('Location: /cs401/homepage.php');	
		    }
		}
	}else{
		$_SESSION['errors'] = $errors;
		$_SESSION['presets'] = array('name'=>htmlspecialchars($name), 
					     'email' => htmlspecialchars($email));
		header('Location: signup.php');
	}

?>
