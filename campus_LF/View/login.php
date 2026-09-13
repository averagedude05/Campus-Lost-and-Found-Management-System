<?php

session_start();

?>

<!DOCTYPE html>

<html>

<head>

    <title>Lost and Found - Login</title>

    <style>

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            height: 100%;
        }

        body {
            font-family: Arial;
            background-color: #f5f6fa;
            color: #1f2937;
            overflow: hidden;
        }

        .box {
            width: 400px;
            margin: 70px auto;
            background-color: white;
            padding: 35px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }

        .login {
            width: 100%;
            padding: 11px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            background-color: #1683c7;
            color: white;
        }

        .remember {
            margin-top: 15px;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .message {
            text-align: center;
            color: red;
        }

        .register {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #1683c7;
            text-decoration: none;
        }

    </style>

</head>


<body>


<div class="box">


    <h1>Lost and Found</h1>

    <h2>Welcome Back</h2>

    <p style="text-align:center;">
        Log in to your account
    </p>


    <form
        action="../Controller/loginController.php"
        method="post"
        onsubmit="return validateLogin(this)"
    >


        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="<?php

            if (isset($_COOKIE['rememberEmail'])) {

                echo htmlspecialchars(
                    $_COOKIE['rememberEmail']
                );

            }

            ?>"
        >

        <span
            id="emailerr"
            class="error"
        >
            <?php

            if (isset($_SESSION['emailErrMsg'])) {

                echo $_SESSION['emailErrMsg'];

            }

            ?>
        </span>


        <label for="password">
            Password
        </label>

        <input
            type="password"
            id="password"
            name="password"
        >

        <span
            id="passworderr"
            class="error"
        >
            <?php

            if (isset($_SESSION['passwordErrMsg'])) {

                echo $_SESSION['passwordErrMsg'];

            }

            ?>
        </span>


        <div class="remember">

            <input
                type="checkbox"
                id="remember"
                name="remember"
                value="yes"
            >

            <label
                for="remember"
                style="display:inline;"
            >
                Remember Me
            </label>

        </div>


        <?php

        if (isset($_SESSION['loginErrMsg'])) {

            echo "<p class='message'>";
            echo $_SESSION['loginErrMsg'];
            echo "</p>";

        }

        ?>


        <input
            class="login"
            type="submit"
            value="Log in"
        >


    </form>


    <p class="register">

        Don't have an account?

        <a href="registration.php">
            Register
        </a>

    </p>


</div>


<script src="Login.js"></script>

</body>

</html>