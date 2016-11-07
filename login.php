<?php
	session_start();
	session_destroy();
	require_once 'Dao.php';
	$dao = new Dao();
	unset($_SESSION['logged_in']);
?>
<html>
	<head></head>
	<body>
		<h2>LOGIN!</h2>
	<!--	<div id= "message"> <?php
		/*	foreach($_SESSION['message'] as $message) {
				echo "<div>" . $message . "</div>";
			}
			unset($_SESSION['message']);*/ ?> 
		</div>

		<form method="post" action= "login_handler.php">
			<div><label for= "email"> email: </label> <input id="email" value= "<?php /*echo isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : "";*/ ?>" type= "text" name="email">
			</div> -->
			<div>email: <input type="text" name="email"></div>
			<div>password: <input type="text" name="password"></div>
			<div> <input type="submit" value="login"></div>
		</form>
	</body>
</html>
