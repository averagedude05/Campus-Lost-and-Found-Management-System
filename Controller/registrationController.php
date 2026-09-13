<?php
session_start();
require_once "../Model/queries1.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name            = trim($_POST['name'] ?? '');
    $email           = trim($_POST['email'] ?? '');
    $password        = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $phone           = trim($_POST['phone'] ?? '');

    $errors = [];

    // Validation
    if ($name === "") {
        $errors[] = "Please enter your full name.";
    }

    if ($email === "") {
        $errors[] = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($password === "") {
        $errors[] = "Please enter a password.";
    } else if (strlen($password) < 3) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($confirmPassword === "") {
        $errors[] = "Please confirm your password.";
    } else if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if ($phone === "") {
        $errors[] = "Please enter your phone number.";
    }

    // Check duplicate email
    if (empty($errors)) {
        if (emailExists($email)) {
            $errors[] = "Email already exists.";
        }
    }

    // Process Registration
    if (empty($errors)) {
        if (registerUser($name, $email, $password, $phone, 'user')) {
            echo "<span class='success'>Registration successful! You can now <a href='../View/login.php'>log in</a>.</span>";
        } else {
            echo "<span class='error'>Database error. Registration failed.</span>";
        }
    } else {
        echo "<span class='error'>" . implode("<br>", $errors) . "</span>";
    }
}
?>