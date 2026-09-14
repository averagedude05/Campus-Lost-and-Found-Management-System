<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['view_details'])) {
    header("Location: AdminDashboard.php");
    exit();
}

$details = $_SESSION['view_details'];
$type    = $_SESSION['view_type'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Details</title>
    <link rel="stylesheet" href="ManageUsers.css">
</head>
<body>

<header>
    <h1>Details View (<?php echo ucfirst($type); ?>)</h1>
</header>

<div class="container">
    <div class="box">
        <div class="topBar">
            <button class="backButton" onclick="history.back()">Go Back</button>
        </div>

        <table>
            <?php foreach ($details as $key => $value): ?>
                <tr>
                    <th style="width: 30%;"><?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $key))); ?></th>
                    <td><?php echo htmlspecialchars($value ?? 'N/A'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

</body>
</html>