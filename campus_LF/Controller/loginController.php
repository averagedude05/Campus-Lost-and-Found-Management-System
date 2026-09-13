<?php

session_start();

require "../Model/dbconnect.php";


$_SESSION['emailErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['loginErrMsg'] = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);


    $flag = true;


    // Email validation

    if (empty($email)) {

        $_SESSION['emailErrMsg'] =
            "Please enter your email";

        $flag = false;

    }


    // Password validation

    if (empty($password)) {

        $_SESSION['passwordErrMsg'] =
            "Please enter your password";

        $flag = false;

    }


    // Continue if validation is successful

    if ($flag) {


       //admin


        $sql = "SELECT * FROM admins
                WHERE email = '$email'
                AND password = '$password'";


        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {


            $admin = mysqli_fetch_assoc($result);


            $_SESSION['adminId'] =
                $admin['id'];

            $_SESSION['adminName'] =
                $admin['name'];

            $_SESSION['adminEmail'] =
                $admin['email'];


            /*
            Remember Me
            */

            if (isset($_POST['remember'])) {

                setcookie(
                    "rememberEmail",
                    $email,
                    time() + (86400 * 30),
                    "/"
                );

            }
            else {

                setcookie(
                    "rememberEmail",
                    "",
                    time() - 3600,
                    "/"
                );

            }


            mysqli_close($conn);


            header(
                "Location: ../View/AdminDashboard.php"
            );

            exit();

        }


      


        $sql = "SELECT * FROM users
                WHERE uniEmail = '$email'";


        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {


            $user = mysqli_fetch_assoc($result);


            /*
            Check password
            */

            if (
                password_verify(
                    $password,
                    $user['password']
                )
            ) {


                $_SESSION['userId'] =
                    $user['id'];

                $_SESSION['userName'] =
                    $user['fullName'];

                $_SESSION['userEmail'] =
                    $user['uniEmail'];

                $_SESSION['studentId'] =
                    $user['studentId'];


                /*
                Remember Me
                */

                if (isset($_POST['remember'])) {

                    setcookie(
                        "rememberEmail",
                        $email,
                        time() + (86400 * 30),
                        "/"
                    );

                }
                else {

                    setcookie(
                        "rememberEmail",
                        "",
                        time() - 3600,
                        "/"
                    );

                }


                mysqli_close($conn);


                header(
                    "Location: ../View/studentDashboard.php"
                );

                exit();

            }
            else {

                $_SESSION['loginErrMsg'] =
                    "Invalid email or password";

            }

        }
        else {

            $_SESSION['loginErrMsg'] =
                "Invalid email or password";

        }

    }


    mysqli_close($conn);


    header(
        "Location: ../View/login.php"
    );

    exit();

}


else {

    header(
        "Location: ../View/login.php"
    );

    exit();

}

?>