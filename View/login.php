<?php

session_start();

?>

<!DOCTYPE html>

<html>

<head>

    <title>Lost and Found - Login</title>

    <link rel="stylesheet" href="Login.css">

</head>

<body>

<div class="box">

    <h1>
        Lost and Found
    </h1>

    <h2>
        Welcome Back
    </h2>

    <p style="text-align:center;">
        Log in to your account
    </p>


    <form
        action="../Controller/loginController.php"
        method="post"
        onsubmit="return validateLogin()"
    >

        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="<?php

            if (isset($_COOKIE['userEmail'])) {

                echo htmlspecialchars($_COOKIE['userEmail']);

            }

            ?>"
        >

        <span
            id="emailErr"
            class="error"
        ></span>


        <label for="password">
            Password
        </label>

        <input
            type="password"
            id="password"
            name="password"
        >

        <span
            id="passwordErr"
            class="error"
        ></span>


        <div class="remember">

            <input
                type="checkbox"
                id="remember"
                name="remember"
            >

            <label for="remember">
                Remember Me
            </label>

        </div>


        <input
            class="login"
            type="submit"
            name="login"
            value="Log in"
        >

    </form>


    <?php

    if (isset($_SESSION['loginError'])) {

        echo "<p class='error'>";
        echo $_SESSION['loginError'];
        echo "</p>";

        unset($_SESSION['loginError']);

    }

    ?>


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