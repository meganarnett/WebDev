<?php
	session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$email="";
	if(isset($_SESSION["email_present"])) {
		$email = $_SESSION["email_present"];
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/stylesheets/login.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script|Ruthie">
	</head>
	<body>
	<div id="loginBox">
		<h2>LOGIN!</h2>
		<div id= "message"> <?php
			if(isset($_SESSION['errors'])) {
				foreach($_SESSION['errors'] as $errors) {
					echo "<div>" . $errors . "</div>";
				}
				unset($_SESSION['errors']);
			} ?> 
		</div>

		<form method="POST" action= "login_handler.php">
			<div><label for= "email"> email: </label> 
			<input type="text" class="emailTxt" value= "<?php echo isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : ""; ?>" type= "text" name="email">
			</div>
			
		<!--	<form action="login_handler.php" method="POST"> -->
		<!--	<div>email: <input type="text" name="email" value="<?php/* echo $email;*/ ?>"/>
			</div> -->
			<div><label for="password">password: </label>
			<input type="password" name="password" />
			<?php if(isset($_SESSION['errors']['password'])) { ?>
				<span id="pasError" class="error"> <?=$_SESSION['errors']['password'] ?></span>
				<?php } ?>
			</div>
			<div> <input type="submit" id="button" value="Login"></div>
		</form>
	</div>
	</body>
</html>
