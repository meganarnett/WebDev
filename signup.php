<?php
	session_start();
	require_once('Dao.php');
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets/signup.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script|Ruthie">
	</head>
	<body>
		<div id="loginBox">
		<h2> Sign Up! </h2>
		<form method="POST" action="signup_handler.php">
			<div><label for="name" class="name"> Name: </label>
				<input type="text" name="name" class="nameTxt" value="<?=isset($_SESSION['presets']['name']) ? $_SESSION['presets']['name'] : "" ?>">
			<?php if(isset($_SESSION['errors']['name'])) { ?>
				<span id="nameError" class="error"><?=$_SESSION['errors']['name'] ?></span>
			<?php } ?>
			</div>
			<div><label for="email" class="email"> Email: </label>
				<input type="email" name="email" class="emailTxt" value="<?=isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : "" ?>">
			<?php if(isset($_SESSION['errors']['email'])) { ?>
				<span id="emailError" class="error"><?=$_SESSION['errors']['email'] ?></span>
			<?php } ?>
			</div>
			<div><label for="password" class="password"> Password: </label>
				<input type="password" name="password" class="passTxt">
			<?php if(isset($_SESSION['errors']['password'])) { ?>
				<span id="passError" class="error"><?=$_SESSION['errors']['password'] ?></span>
			<?php } ?>
			</div>
			<div><label for="occupation" class="occupation"> Occupation: </label>
				<input type="text" name="occupation" class="occTxt" placeholder="student/teacher" value="<?=isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : "" ?>">
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
			<div><label for="text" class="loc">Location: </label>
                                <input type="text" name="location" placeholder="City,ST" class="locTxt" value="<?= isset($_SESSION['presets']['location']) ? $_SESSION['presets']['location'] : "" ?>">
                        <!--    value="=/*isset($_SESSION['presets']['location'] ? $_SESSION['presets']['location'] : ""*/ " -->
                        </div>
                        <div><label for="text" class="inst">Instrument: </label>
                                <input type="text" name="instrument" class="instTxt" value="<?= isset($_SESSION['presets']['instrument']) ? $_SESSION['presets']['instrument'] : "" ?>">
                        </div>
			<div><input type="submit" value="Sign Up"></div>
		</form>
	</body>
</html>
