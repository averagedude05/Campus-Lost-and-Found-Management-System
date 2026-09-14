<?php
session_start();
require_once "../Model/queries.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}



$totalReports  = getTotalReportsCount();
$pendingClaims = getPendingClaimsCount();
$activeUsers   = getActiveUsersCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Campus Lost & Found</title>
    <link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>

    <div class="header">
        <h1 id="systemTitle">Campus Lost & Found Management System</h1>
        <p id="pageTitle">Admin Dashboard</p>
    </div>

    <div class="container">

        <div class="sidebar">
            <h2>Lost & Found</h2>
            <a id="dashboardLink" href="AdminDashboard.php">Dashboard</a>
            <a id="reportsLink" href="ManageItemReports.php">Manage Item Reports</a>
            <a id="claimsLink" href="ManageClaimReq.php">Manage Claim Requests</a>
            <a id="usersLink" href="manageUser.php">Manage Users</a>
            <a id="logoutLink" href="../Controller/logoutController.php">Logout</a>
        </div>

        <div class="content">
            <h2 id="welcomeMessage">
                Welcome, <?php echo htmlspecialchars($_SESSION['name'] ?? 'Admin'); ?>
            </h2>

            <p id="dashboardDescription">
                Manage campus lost and found activities from here.
            </p>

            <div class="cards">

                <div class="card">
                    <p>Total Reports</p>
                    <h2 id="totalReports"><?php echo $totalReports; ?></h2>
                    <p>All item reports</p>
                </div>

                <div class="card">
                    <p>Pending Claims</p>
                    <h2 id="pendingClaims"><?php echo $pendingClaims; ?></h2>
                    <p>Claims waiting for review</p>
                </div>

                <div class="card">
                    <p>Active Users</p>
                    <h2 id="activeUsers"><?php echo $activeUsers; ?></h2>
                    <p>Registered users</p>
                </div>

            </div>
        </div>

    </div>

</body>
</html>