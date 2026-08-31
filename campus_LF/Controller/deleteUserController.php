
<?php

session_start();




if (!isset($_SESSION['adminId'])) {

    header("Location: ../View/login.php");

    exit();

}


// Database connection

include "../Model/dbconnect.php";


// Check delete request

if (isset($_POST['deleteUser'])) {


    $userId = $_POST['userId'];


    // Delete user

    $sql = "DELETE FROM users
            WHERE id = '$userId'";


    if (mysqli_query($conn, $sql)) {

        header("Location: ../View/manageUser.php");

        exit();

    }
    else {

        echo "Delete failed: "
             . mysqli_error($conn);

    }

}


mysqli_close($conn);

?>
```
