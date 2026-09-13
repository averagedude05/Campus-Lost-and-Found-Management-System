<?php session_start();
unset($_SESSION['name']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
	<link rel="stylesheet" href="Registration.css";>
</head>
<body>

	<h2>Create Account</h2>
	<p>Join the Campus Lost and Found System</p>

	<form method="post" action="../Controller/registrationController.php" onsubmit="return validateform(this)" novalidate>
		<label for="name">Full Name</label>
		<input type="text" name="name" id="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : "" ?>">
		<span id="nameerr" style="color:red;"></span>
		<?php echo isset($_SESSION['nameErrMsg']) ? $_SESSION['nameErrMsg'] : "" ?>
		<br><br>

		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
		<span id="emailerr" style="color:red;"></span>
		<?php echo isset($_SESSION['emailErrMsg']) ? $_SESSION['emailErrMsg'] : "" ?>
		<br><br>

		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<span id="passworderr" style="color:red;"></span>
		<?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : "" ?>
		<br><br>

		<label for="confirmPassword">Confirm Password</label>
		<input type="password" name="confirmPassword" id="confirmPassword">
		<span id="confirmPassworderr" style="color:red;"></span>
		<?php echo isset($_SESSION['confirmPasswordErrMsg']) ? $_SESSION['confirmPasswordErrMsg'] : "" ?>
		<br><br>

		<label for="phone">Phone</label>
		<input type="tel" name="phone" id="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>">
		<span id="phoneerr" style="color:red;"></span>
		<?php echo isset($_SESSION['phoneErrMsg']) ? $_SESSION['phoneErrMsg'] : "" ?>
		<br><br>

		<input type="submit" value="Register">
	</form>

	<span id="msg"></span>
	<span id="msg1"></span>

	<?php echo isset($_SESSION['globalErrMsg']) ? $_SESSION['globalErrMsg'] : "" ?>

	<script src="Registration.js"></script>

</body>
</html>