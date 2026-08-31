<?php

session_start();

require "../Model/dbconnect.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['deleteUser'])) {


        $deleteId = $_POST['deleteId'];


        if (empty($deleteId)) {

            $_SESSION['deleteMsg'] =
                "User ID is missing";

        }
        else {


            $sql = "DELETE FROM users
                    WHERE id = '$deleteId'";


            if (mysqli_query($conn, $sql)) {

                $_SESSION['deleteMsg'] =
                    "User deleted successfully";

            }
            else {

                $_SESSION['deleteMsg'] =
                    "User could not be deleted";

            }

        }


        mysqli_close($conn);


        header(
            "Location: ../View/manageUser.php"
        );

        exit();

    }

}


mysqli_close($conn);


header(
    "Location: ../View/manageUser.php"
);

exit();

?>