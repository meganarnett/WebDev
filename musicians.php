<?php
	require_once('/cs401/Dao.php');
	require_once('/cs401/login_handler.php');
?>
<html>
	<head>
		<link rel="favicon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="/stylesheets/musicians.css">
	</head>
	<body>
		<div id="header">
			<a class="logo" href="/homepage.php"><img src="/pics/toplogo.jpg" title="top logo" width="150" height="75" /><a>
		<!--	<h1 class="name">Music Connect</h1>-->
			<div class="login">
				<li>
				<?php if(isset($_SESSION['logged_in'])) { ?>
					<a class"lLink" href="/cs401/logout.php">Log Out</a>
				<?php }else { ?>
					<a class="lLink" href="/cs401/login.php">Log In</a>
				</li>
				|
				<li>
					<a class="lLink" href="/cs401/signup.php">Sign Up</a>
				<?php } ?>
			</div>
		</div>
		<div id="navigation">
			<ul>
				<li>
					<a id="current" class="nLink" href="/musicians.php">Students</a>
				</li>
				<li>
					<a class="nLink" href="/teachers.php">Teachers</a>
				</li>
				<li>
					<a class="nLink" href="/schools.php">Schools</a>
				</li>
			</ul>
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
