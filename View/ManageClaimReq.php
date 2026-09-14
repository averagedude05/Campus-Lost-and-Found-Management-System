<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once "../Model/queries.php";

$search = $_GET['search'] ?? '';
$status = $_GET['status'] ?? '';

$claims = getAllClaimRequests($search, $status);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Claim Requests</title>
    <link rel="stylesheet" href="ManageUsers.css">
</head>
<body>

<header>
    <h1>Manage Claim Requests</h1>
</header>

<div class="container">
    <div class="box">

        <div class="topBar">
            <a href="AdminDashboard.php"><button class="backButton">Back to Dashboard</button></a>
        </div>

        <?php if (isset($_SESSION['claim_msg'])): ?>
            <p style="color: green; font-weight: bold;"><?php echo $_SESSION['claim_msg']; unset($_SESSION['claim_msg']); ?></p>
        <?php endif; ?>

        <form method="GET" class="searchArea">
            <input type="text" name="search" class="search" placeholder="Search item or claimant..." value="<?php echo htmlspecialchars($search); ?>">
            
            <select name="status">
                <option value="">All Status</option>
                <option value="pending" <?php if ($status === "pending") echo "selected"; ?>>Pending</option>
                <option value="approved" <?php if ($status === "approved") echo "selected"; ?>>Approved</option>
                <option value="rejected" <?php if ($status === "rejected") echo "selected"; ?>>Rejected</option>
            </select>

            <button type="submit" class="searchButton">Filter</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Claim ID</th>
                    <th>Item</th>
                    <th>Claimant</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($claims)): ?>
                    <?php foreach ($claims as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['claim_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['claimant_name']); ?></td>
                            <td><span class="<?php echo htmlspecialchars($row['claim_status']); ?>"><?php echo htmlspecialchars(ucfirst($row['claim_status'])); ?></span></td>
                            <td>
                                <a href="../Controller/ManageItemController.php?view_id=<?php echo $row['claim_id']; ?>&type=claim" class="viewButton">View</a>

                                <?php if (trim($row['claim_status']) === "pending"): ?>
                                    <form method="POST" action="../Controller/ClaimController.php" style="display:inline;">
                                        <input type="hidden" name="claim_id" value="<?php echo $row['claim_id']; ?>">
                                        <input type="hidden" name="action" value="approve">
                                        <button type="submit" style="background:#16a34a; color:white;">Approve</button>
                                    </form>

                                    <form method="POST" action="../Controller/ClaimController.php" style="display:inline;">
                                        <input type="hidden" name="claim_id" value="<?php echo $row['claim_id']; ?>">
                                        <input type="hidden" name="action" value="reject">
                                        <button type="submit" class="deleteButton">Reject</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="no-data">No claim requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>