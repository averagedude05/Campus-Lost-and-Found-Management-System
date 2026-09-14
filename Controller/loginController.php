<?php
session_start();
require_once "../Model/queries.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    
    $user = checkLogin($email, $password);

    if ($user) {
        
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['role']    = $user['role'];

    
        if ($user['role'] === 'admin') {
            header("Location: ../View/AdminDashboard.php");
        } else {
            header("Location: ../Controller/Found Item Dashboard Contoller.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../View/login.php");
        exit();
    }
}
?>