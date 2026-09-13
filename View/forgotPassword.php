<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <p style="color: green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>

    <form action="../Controller/forgotPasswordController.php" method="POST">
        <label>Enter Phone Number:</label><br>
        <input type="text" name="phone" required><br><br>

        <label>Enter New Password:</label><br>
        <input type="password" name="new_password" required><br><br>

        <button type="submit">Update Password</button>
    </form>
    <br>
    <a href="login.php">Back to Login</a>
</body>
</html>