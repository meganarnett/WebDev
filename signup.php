<?php
	session_start();
?>

<html>
	<head></head>
	<body>
		<h2> Sign Up! </h2>
		<form method="POST" action="signup_handler.php">
			<div>name: <input type="text" name="name">
			<?php if(isset($_SESSION['errors']['name'])) { ?>
				<span id="nameError" class="error"><?=$_SESSION['errors']['name'] ?></span>
			<?php } ?>
			</div>
			<div>email: <input type="email" name="email">
			<?php if(isset($_SESSION['errors']['email'])) { ?>
				<span id="emailError" class="error"><?=$_SESSION['errors']['email'] ?></span>
			<?php } ?>
			</div>
			<div>password: <input type="password" name="password">
			<?php if(isset($_SESSION['errors']['password'])) { ?>
				<span id="passError" class="error"><?=$_SESSION['errors']['password'] ?></span>
			<?php } ?>
			</div>
			<div>
				Occupation: <input type="text" name="occupation">
			<?php /*if(isset($_SESSION['errors']['occupation'])) { ?>
				<span id="occError" class="error"><?=$_SESSION['errors']['occupation'] ?></span>
			<?php {*/ ?>
		<!--		Occupation:
				<select>
					<option value="blank"></option>
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
					<option value="school">School</option>
				</select>-->
			</div>
			<div><input type="submit" value="Sign Up"></div>
		</form>
	</body>
</html>
