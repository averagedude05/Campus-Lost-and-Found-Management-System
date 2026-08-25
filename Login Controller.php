<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$flag = true;

if ($email === "") {
    $flag = false;
    $_SESSION['emailErrMsg'] = "Please enter email properly";
}
else {
    $_SESSION['emailErrMsg'] = "";
}

if ($password === "") {
    $flag = false;
    $_SESSION['passwordErrMsg'] = "Please enter password properly";
}
else {
    $_SESSION['passwordErrMsg'] = "";
}

if ($flag === false) {
    header("Location: ../View/Login.php");
    exit();
}


?>