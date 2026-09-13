<?php 
session_start();

$foundItems = isset($_SESSION['foundItems']) ? $_SESSION['foundItems'] : [];
include "navbar.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Available Found Items</title>
    <link rel="stylesheet" href="Submit Claim dashboard.css">
</head>

<body>

<div class="page">

    <div class="top">
        
        <h1>Available Found Items</h1>
    </div>

    <div class="section">

        <h3>Available Found Items</h3>

        <table>

            <tr class="itemRow">
                <th>Item</th>
                <th>Category</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php 
            foreach($foundItems as $rows){

                echo "<tr>";

                echo "<td>".$rows['item_name']."</td>";

                echo "<td>".$rows['category_name']."</td>";

                echo "<td>".$rows['date_found']."</td>";

                echo "<td>".$rows['status']."</td>";

                echo "<td>";

                echo "<a href='../Controller/View Found Item Controller.php?id=".$rows['found_id']."&category_id=".$rows['category_id']."' class='view-btn'>View</a>";

                echo "<a href='../Controller/Submit Claim Controller.php?found_id=".$rows['found_id']."' class='claim-btn'>Claim</a>";

                echo "</td>";

                echo "</tr>";
            }
            ?>

        </table>

    </div>

</div>

</body>
</html>