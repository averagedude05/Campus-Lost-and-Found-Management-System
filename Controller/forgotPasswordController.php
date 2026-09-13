<?php
session_start();
require_once "../Model/queries1.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone       = trim($_POST['phone'] ?? '');
    $newPassword = $_POST['new_password'] ?? '';

    // Check if phone exists in database
    $user = getUserByPhone($phone);

    if ($user) {
        // Update to new plain-text password
        if (updatePasswordByPhone($phone, $newPassword)) {
            $_SESSION['success'] = "Password updated successfully! Please login.";
            header("Location: ../View/login.php");
            exit();
        } else {
            $_SESSION['error'] = "Something went wrong. Try again.";
            header("Location: ../View/forgotPassword.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Phone number not found!";
        header("Location: ../View/forgotPassword.php");
        exit();
    }
}
?>