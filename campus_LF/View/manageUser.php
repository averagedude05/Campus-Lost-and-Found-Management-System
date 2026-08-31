```php
<?php

session_start();


// Check admin login

if (!isset($_SESSION['adminId'])) {

    header("Location: login.php");

    exit();

}


// Connect database

include "../Model/dbconnect.php";


// Search value

$search = "";

if (isset($_GET['userSearch'])) {

    $search = $_GET['userSearch'];

}


// Select users

if ($search == "") {

    $sql = "SELECT * FROM users";

}
else {

    $sql = "SELECT * FROM users
            WHERE fullName LIKE '%$search%'
            OR studentId LIKE '%$search%'
            OR uniEmail LIKE '%$search%'";

}


$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Users</title>

    <link rel="stylesheet"
          href="ManageUsers.css">

</head>


<body>


<header>

    <h1 id="systemTitle">
        Campus Lost & Found
    </h1>

    <p id="pageTitle">
        Manage Users
    </p>

</header>



<div class="container">


    <div class="box">


        <div class="topBar">


            <div>

                <h2 id="userHeading">
                    Manage Users
                </h2>

                <p id="userDescription">
                    View and remove registered users.
                </p>

            </div>


            <button
                id="backButton"
                name="backButton"
                class="backButton"
                type="button"
                onclick="window.location.href='AdminDashboard.php'">

                ← Back

            </button>


        </div>



        <!-- Search -->

        <div class="searchArea">


            <form method="get"
                  action="manageUser.php">


                <input
                    type="text"
                    id="userSearch"
                    name="userSearch"
                    class="search"
                    placeholder="Search name, email or ID..."
                    value="<?php echo htmlspecialchars($search); ?>"
                >


                <button
                    id="searchButton"
                    name="searchButton"
                    class="searchButton"
                    type="submit">

                    Search

                </button>


            </form>


        </div>



        <!-- Users Table -->

        <table id="usersTable">


            <tr>

                <th>
                    User ID
                </th>

                <th>
                    Name
                </th>

                <th>
                    Student ID
                </th>

                <th>
                    Email
                </th>

                <th>
                    Phone
                </th>

                <th>
                    Actions
                </th>

            </tr>


            <?php


            if (mysqli_num_rows($result) > 0) {


                while ($row = mysqli_fetch_assoc($result)) {

            ?>


            <tr>


                <td>

                    <?php

                    echo $row['id'];

                    ?>

                </td>


                <td>

                    <?php

                    echo htmlspecialchars(
                        $row['fullName']
                    );

                    ?>

                </td>


                <td>

                    <?php

                    echo htmlspecialchars(
                        $row['studentId']
                    );

                    ?>

                </td>


                <td>

                    <?php

                    echo htmlspecialchars(
                        $row['uniEmail']
                    );

                    ?>

                </td>


                <td>

                    <?php

                    echo htmlspecialchars(
                        $row['phone']
                    );

                    ?>

                </td>


                <td>


                    <form
                        action="../Controller/deleteUserController.php"
                        method="post"
                        onsubmit="return confirm('Are you sure you want to delete this user?');"
                    >


                        <input
                            type="hidden"
                            name="userId"
                            value="<?php echo $row['id']; ?>"
                        >


                        <button
                            type="submit"
                            name="deleteUser"
                            class="deleteButton">

                            Delete

                        </button>


                    </form>


                </td>


            </tr>


            <?php

                }

            }
            else {

            ?>


            <tr>

                <td colspan="6"
                    style="text-align:center;">

                    No users found.

                </td>

            </tr>


            <?php

            }

            ?>


        </table>


    </div>


</div>


</body>

</html>


<?php

mysqli_close($conn);

?>
```
