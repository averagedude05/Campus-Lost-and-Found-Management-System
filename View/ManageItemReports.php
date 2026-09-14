<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once "../Model/queries.php";

$items = getAllItemReports();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Item Reports</title>
    <link rel="stylesheet" href="ManageUsers.css">
</head>
<body>

<header>
    <h1>Manage Item Reports</h1>
</header>

<div class="container">
    <div class="box">

        <div class="topBar">
            <a href="AdminDashboard.php"><button class="backButton">Back to Dashboard</button></a>
        </div>

        <?php if (isset($_SESSION['msg'])): ?>
            <p style="color: green; font-weight: bold;"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Type</th>
                    <th>Date Reported</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                            <td><?php echo htmlspecialchars(ucfirst($item['item_type'])); ?></td>
                            <td><?php echo htmlspecialchars($item['date_reported']); ?></td>
                            <td><span class="<?php echo htmlspecialchars($item['status']); ?>"><?php echo htmlspecialchars(ucfirst($item['status'])); ?></span></td>
                            <td>
                                <a href="../Controller/ManageItemController.php?view_id=<?php echo $item['id']; ?>&type=<?php echo $item['item_type']; ?>" class="viewButton">View</a>

                                <form action="../Controller/ManageItemController.php" method="POST" class="deleteForm" onsubmit="return confirm('Are you sure?')">
                                    <input type="hidden" name="itemId" value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="itemType" value="<?php echo $item['item_type']; ?>">
                                    <button type="submit" name="deleteItem" class="deleteButton">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="no-data">No item reports found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>