<html>
	<head></head>
	<body>
		<h2> Sign Up! </h2>
		<form method="post" action="login_handler.php">
			<div>name: <input type="text" name="name"></div>
			<div>email: <input type="text" name="email"></div>
			<div>password: <input type="password" name="password">
				<p>Choose wisely </p>
			</div>
			<div>
				Occupation:
				<select>
					<option value="blank"></option>
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
					<option value="school">School</option>
				</select>
			</div>
			<div><input type="submit" value="Sign Up"></div>
		</form>
	</body>
</html>
