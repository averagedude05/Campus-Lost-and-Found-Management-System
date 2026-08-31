<?php

session_start();

require "../Model/dbconnect.php";


$_SESSION['fullNameErrMsg'] = "";
$_SESSION['studentIdErrMsg'] = "";
$_SESSION['uniEmailErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['confirmPasswordErrMsg'] = "";
$_SESSION['phoneErrMsg'] = "";
$_SESSION['globalErrMsg'] = "";


$_SESSION['fullName'] = "";
$_SESSION['studentId'] = "";
$_SESSION['uniEmail'] = "";
$_SESSION['phone'] = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // Get form data

    $fullName = htmlspecialchars($_POST['fullName']);
    $studentId = htmlspecialchars($_POST['studentId']);
    $uniEmail = htmlspecialchars($_POST['uniEmail']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $phone = htmlspecialchars($_POST['phone']);


    $flag = true;


    // Full Name

    if (empty($fullName)) {

        $flag = false;

        $_SESSION['fullNameErrMsg'] =
            "Please enter your full name properly";

    }
    else {

        $_SESSION['fullName'] = $fullName;

    }


    // Student ID

    if (empty($studentId)) {

        $flag = false;

        $_SESSION['studentIdErrMsg'] =
            "Please enter your student ID properly";

    }
    else {

        $_SESSION['studentId'] = $studentId;

    }


    // Email

    if (empty($uniEmail)) {

        $flag = false;

        $_SESSION['uniEmailErrMsg'] =
            "Please enter your university email";

    }
    else {

        $_SESSION['uniEmail'] = $uniEmail;

    }


    // Password

    if (empty($password)) {

        $flag = false;

        $_SESSION['passwordErrMsg'] =
            "Please enter a password";

    }
    else if (strlen($password) < 6) {

        $flag = false;

        $_SESSION['passwordErrMsg'] =
            "Password must be at least 6 characters";

    }


    // Confirm Password

    if (empty($confirmPassword)) {

        $flag = false;

        $_SESSION['confirmPasswordErrMsg'] =
            "Please confirm your password";

    }
    else if ($password !== $confirmPassword) {

        $flag = false;

        $_SESSION['confirmPasswordErrMsg'] =
            "Passwords do not match";

    }


    // Phone

    if (empty($phone)) {

        $flag = false;

        $_SESSION['phoneErrMsg'] =
            "Please enter your phone number";

    }
    else {

        $_SESSION['phone'] = $phone;

    }


    // Database operation

    if ($flag) {


        $checkSql = "SELECT * FROM users
                     WHERE studentId = '$studentId'
                     OR uniEmail = '$uniEmail'";


        $checkResult = mysqli_query($conn, $checkSql);


        if (mysqli_num_rows($checkResult) > 0) {

            $flag = false;

            $_SESSION['globalErrMsg'] =
                "Student ID or Email already exists";

        }

    }


    if ($flag) {


        // Password encryption

        $password = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        // INSERT DATA

        $sql = "INSERT INTO users
                VALUES (
                    NULL,
                    '$fullName',
                    '$studentId',
                    '$uniEmail',
                    '$password',
                    '$phone'
                )";


        if (mysqli_query($conn, $sql)) {


            $_SESSION['fullName'] = "";
            $_SESSION['studentId'] = "";
            $_SESSION['uniEmail'] = "";
            $_SESSION['phone'] = "";


            $_SESSION['globalErrMsg'] =
                "Registration successful";


        }
        else {

            $_SESSION['globalErrMsg'] =
                "Registration failed";

        }

    }
    else {

        if (empty($_SESSION['globalErrMsg'])) {

            $_SESSION['globalErrMsg'] =
                "Please correct the errors";

        }

    }


    mysqli_close($conn);


    header("Location: ../View/registration.php");

    exit();

}


else {

    $_SESSION['globalErrMsg'] =
        "Something went wrong please try again";

    header("Location: ../View/registration.php");

    exit();

}

?>