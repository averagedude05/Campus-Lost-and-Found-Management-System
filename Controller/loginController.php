<?php

session_start();

include "../Model/dbConnection.php";
global $conn;
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {

        $_SESSION['loginError'] =
            "Email and password are required.";

        header("Location: ../View/login.php");

        exit();
    }

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT *
            FROM users
            WHERE email = '$email'
            AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {

        die("Login Query Error: " . mysqli_error($conn));

    }

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['role'] = $user['role'];

        if (isset($_POST['remember'])) {

            setcookie(
                "userEmail",
                $email,
                time() + (86400 * 30),
                "/"
            );

        }

        if ($user['role'] == 'admin') {

            header(
                "Location: ../Controller/Found Item Dashboard Contoller.php"
            );

            exit();

        }
        elseif ($user['role'] == 'user') {

            header(
                "Location: ../Controller/Found Item Dashboard Contoller.php"
            );

            exit();

        }
        else {

            $_SESSION['loginError'] =
                "Invalid user role.";

            header(
                "Location: ../View/login.php"
            );

            exit();

        }

    }

    $_SESSION['loginError'] =
        "Invalid email or password.";

    header(
        "Location: ../View/login.php"
    );

    exit();

}

?>