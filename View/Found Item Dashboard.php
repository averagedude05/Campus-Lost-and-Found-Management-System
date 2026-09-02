<?php
session_start();
$reports=$_SESSION['reports'];
$claims =$_SESSION['claims'];
?>
<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="Found Item Dashboard.css">
</head>

<body>
<form>
    <div class="header">
        <h2>Dashboard</h2>
    </div>
    <div class="new_itm"><a href="../Controller/Report Found Item Controller.php" id="reportBtn">+Report New Item</a></div>
    <div class="dashboard">

        <div class="section">
            <h3>My Reports</h3>

            <table>
                <tr class="itemRow">
                    <th>Item</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th> Action</th>
                    
                </tr>
                <?php 
                    foreach($reports as $rows){
                    echo "<tr>";
                    echo "<td>".$rows['item_name']."</td>";
                    echo "<td>".$rows['category_name']."</td>";
                    echo "<td>".$rows['date_found']."</td>";
                    echo "<td>".$rows['status']."</td>";
                    echo "<td><a href='../Controller/Edit Item Controller.php?id=".$rows['found_id']."&category_id=".$rows['category_id']."' class='edit-btn'>Edit</a></td>";
                    echo "</tr>";

                    }
                    
                    ?>
                </tr>
            </table>
        </div>

        <div class="section">
            <h3>My Claims</h3>
            <table>
                <tr class="claimsHead">
                    <th>Item</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th> Action</th>
                    
                </tr>
                <tr>
                    <?php 
                    foreach($claims as $rows){
                    echo "<tr>";
                    echo "<td>".$rows['item_name']."</td>";
                    echo "<td>".$rows['category_name']."</td>";
                    echo "<td>".$rows['date_lost']."</td>";
                    echo "<td>".$rows['status']."</td>";
                    echo "<td><a href='../Controller/View Item Controller.php?id=".$rows['lost_id']."&category_id=".$rows['category_id']."' class='view-btn'>View</a></td>";
                    echo "</tr>";

                    }
                    
                    ?>
                </tr>
            </table>
        </div>
    </div>
</form>
</body>