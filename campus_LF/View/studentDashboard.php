```php
<?php

session_start();


// Check if normal user is logged in

if (!isset($_SESSION['userId'])) {

    header("Location: login.php");

    exit();

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dashboard</title>


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


        .page {

            width: 85%;
            margin: 35px auto;

        }


        .top {

            height: 90px;
            position: relative;
            text-align: center;

        }


        .back {

            position: absolute;
            left: 0;
            top: 8px;

            padding: 8px 15px;

            background-color: #d1d5db;
            color: #1f2937;

            border-radius: 6px;

            text-decoration: none;

        }


        .top h1 {

            margin: 10px;

        }


        .report-button {

            position: absolute;
            right: 0;
            top: 0;

            padding: 10px 20px;

            background-color: #1683c7;
            color: white;

            border-radius: 6px;

            text-decoration: none;

        }


        .card {

            background-color: white;

            padding: 25px 30px;

            margin-bottom: 30px;

            border-radius: 10px;

        }


        .card h2 {

            margin-top: 0;

        }


        table {

            width: 100%;

            border-collapse: collapse;

        }


        th {

            background-color: #f1f3f7;

            text-align: left;

            padding: 12px;

        }


        td {

            padding: 14px 12px;

            border-bottom: 1px solid #ddd;

        }


        .edit {

            background-color: #d1d5db;

            color: #1f2937;

            border: none;

            padding: 7px 12px;

            border-radius: 6px;

        }


        .withdraw {

            background-color: #ff1f1f;

            color: white;

            border: none;

            padding: 7px 12px;

            border-radius: 6px;

        }

    </style>

</head>


<body>


<div class="page">


    <div class="top">


        <a
            href="../Controller/logoutController.php"
            class="back">

            Logout

        </a>


        <h1>

            Welcome,

            <?php

            echo htmlspecialchars(
                $_SESSION['userName']
            );

            ?>

        </h1>


        <a
            href="submit-claim.html"
            class="report-button">

            + Report Item

        </a>


    </div>



    <div class="card">


        <h2>
            My Reports
        </h2>


        <table>


            <tr>

                <th>
                    Item
                </th>

                <th>
                    Category
                </th>

                <th>
                    Date
                </th>

                <th>
                    Status
                </th>

                <th>
                    Action
                </th>

            </tr>



            <tr>

                <td>
                    Black Wallet
                </td>

                <td>
                    Others
                </td>

                <td>
                    Aug 10, 2026
                </td>

                <td>
                    Pending
                </td>

                <td>

                    <button class="edit">
                        Edit
                    </button>

                    <button class="withdraw">
                        Withdraw
                    </button>

                </td>

            </tr>


        </table>


    </div>



    <div class="card">


        <h2>
            My Claims
        </h2>


        <table>


            <tr>

                <th>
                    Item
                </th>

                <th>
                    Claim Date
                </th>

                <th>
                    Status
                </th>

                <th>
                    Action
                </th>

            </tr>



            <tr>

                <td>
                    Black Wallet
                </td>

                <td>
                    Aug 11, 2026
                </td>

                <td>
                    Pending
                </td>

                <td>

                    <button class="edit">
                        Edit
                    </button>

                </td>

            </tr>


        </table>


    </div>


</div>


</body>

</html>
```
