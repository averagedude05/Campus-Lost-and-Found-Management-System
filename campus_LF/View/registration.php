<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Create Account</title>

    <link rel="stylesheet" href="Registration.css">

</head>

<body>

    <div class="container">

        <h2>Create Account</h2>

        <div class="subtitle">
            Join the Campus Lost and Found System
        </div>


        <form action="../Controller/registrationController.php"
              method="post"
              onsubmit="return validateform(this)">


            <div class="form-group">

                <label for="fullName">
                    Full Name:
                </label>

                <input
                    type="text"
                    id="fullName"
                    name="fullName"
                    value="<?php
                    echo isset($_SESSION['fullName'])
                    ? $_SESSION['fullName']
                    : "";
                    ?>"
                >

                <span class="error" id="fullNameerr">
                    <?php
                    echo isset($_SESSION['fullNameErrMsg'])
                    ? $_SESSION['fullNameErrMsg']
                    : "";
                    ?>
                </span>

            </div>


            <div class="form-group">

                <label for="studentId">
                    Student ID:
                </label>

                <input
                    type="text"
                    id="studentId"
                    name="studentId"
                    value="<?php
                    echo isset($_SESSION['studentId'])
                    ? $_SESSION['studentId']
                    : "";
                    ?>"
                >

                <span class="error" id="studentIderr">
                    <?php
                    echo isset($_SESSION['studentIdErrMsg'])
                    ? $_SESSION['studentIdErrMsg']
                    : "";
                    ?>
                </span>

            </div>


            <div class="form-group">

                <label for="uniEmail">
                    Uni Email:
                </label>

                <input
                    type="email"
                    id="uniEmail"
                    name="uniEmail"
                    value="<?php
                    echo isset($_SESSION['uniEmail'])
                    ? $_SESSION['uniEmail']
                    : "";
                    ?>"
                >

                <span class="error" id="uniEmailerr">
                    <?php
                    echo isset($_SESSION['uniEmailErrMsg'])
                    ? $_SESSION['uniEmailErrMsg']
                    : "";
                    ?>
                </span>

            </div>


            <div class="form-group">

                <label for="password">
                    Password:
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                >

                <span class="error" id="passworderr">
                    <?php
                    echo isset($_SESSION['passwordErrMsg'])
                    ? $_SESSION['passwordErrMsg']
                    : "";
                    ?>
                </span>

            </div>


            <div class="form-group">

                <label for="confirmPassword">
                    Confirm Password:
                </label>

                <input
                    type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                >

                <span class="error" id="confirmPassworderr">
                    <?php
                    echo isset($_SESSION['confirmPasswordErrMsg'])
                    ? $_SESSION['confirmPasswordErrMsg']
                    : "";
                    ?>
                </span>

            </div>


            <div class="form-group">

                <label for="phone">
                    Phone:
                </label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="<?php
                    echo isset($_SESSION['phone'])
                    ? $_SESSION['phone']
                    : "";
                    ?>"
                >

                <span class="error" id="phoneerr">
                    <?php
                    echo isset($_SESSION['phoneErrMsg'])
                    ? $_SESSION['phoneErrMsg']
                    : "";
                    ?>
                </span>

            </div>


            <div class="buttons">

                <input
                    type="submit"
                    value="Register"
                    class="register"
                >

                <button
                    type="button"
                    class="back">
                      <a href="login.php">
               Back
            </a>

                </button>

            </div>

        </form>


        <?php

        if (isset($_SESSION['globalErrMsg'])) {

            echo "<span class='error'>";
            echo $_SESSION['globalErrMsg'];
            echo "</span>";

        }

        ?>


        <div class="login">

            Already Have an Account?

            <a href="login.php">
                Log In
            </a>

        </div>

    </div>


    <script src="Registration.js"></script>

</body>

</html>