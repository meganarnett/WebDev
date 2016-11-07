<?php/*
	session_start();
	$loggedIn = Isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;
	if(!$loggedIn) {
		header("Location:login.php");
		exit;	
	}*/
?>

<html>
	<head>
		<link rel="favicon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="/cs401/stylesheets/homepage.css">
	</head>
	<body>
		<div id="header">
			<a class= "logo" href="/cs401/homepage.php"><img src="/cs401/pics/toplogo.jpg" title="top logo" width="150" height="75" /></a>
		<!--	<h1 class="name">Music Connect</h1> -->
			<div class= "login">
			<li> 
				<a class="lLink" href="/cs401/login.php">Log In</a>
			</li>
				|
			<li>
				<a class="lLink" href="/cs401/signup.php"> Sign Up </a>
			</li>
			</div>
		</div>
		<div id="navigation">
			<ul>
				<li>
					<a class="nLink" href="/cs401/musicians.php">Students</a>
				</li>
				<li>
					<a class= "nLink" href="/cs401/teachers.php">Teachers</a>
				</li>
				<li>
					<a class= "nLink" href="/cs401/schools.php">Schools</a>
				</li>
			</ul>
		</div>
		<div id="content">
	<!--		<img src="/cs401/pics/bl.jpg" alt="big logo">-->
			<h2 class="words">Connect with Musicians Everywhere</h2>	
		</div>
		<div id="footer">
			<ul>
				<li class="fLink">About</li>
				<li class="fLink">Contact Us</li>
				<li class="fLink">Copyright</li>
			</ul>
		</div>
	</body>
</html>
