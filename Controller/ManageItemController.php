
<?php
session_start();
require_once "../Model/queries.php";

// Auth Guard: Restrict access to Admins only
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../View/login.php");
    exit();
}

// Handle Delete Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItem'])) {
    $itemId   = (int)($_POST['itemId'] ?? 0);
    $itemType = $_POST['itemType'] ?? '';

    if ($itemId > 0 && deleteItemReport($itemId, $itemType)) {
        $_SESSION['msg'] = "Item deleted successfully!";
    } else {
        $_SESSION['msg'] = "Failed to delete item.";
    }

    header("Location: ../View/ManageItemReports.php");
    exit();
}

// Handle View Details Request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['view_id'])) {
    $id   = (int)$_GET['view_id'];
    $type = $_GET['type'] ?? '';

    $details = getItemDetail($id, $type);

    if ($details) {
        $_SESSION['view_details'] = $details;
        $_SESSION['view_type']    = $type;
        header("Location: ../View/ViewDetails.php");
    } else {
        $_SESSION['msg'] = "Item details could not be found.";
        header("Location: ../View/ManageItemReports.php");
    }
    exit();
}

// Default fallback redirect if accessed without valid actions
header("Location: ../View/ManageItemReports.php");
exit();
=======
<?php
session_start();
require_once "../Model/queries.php";

// Auth Guard: Restrict access to Admins only
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../View/login.php");
    exit();
}

// Handle Delete Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItem'])) {
    $itemId   = (int)($_POST['itemId'] ?? 0);
    $itemType = $_POST['itemType'] ?? '';

    if ($itemId > 0 && deleteItemReport($itemId, $itemType)) {
        $_SESSION['msg'] = "Item deleted successfully!";
    } else {
        $_SESSION['msg'] = "Failed to delete item.";
    }

    header("Location: ../View/ManageItemReports.php");
    exit();
}

// Handle View Details Request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['view_id'])) {
    $id   = (int)$_GET['view_id'];
    $type = $_GET['type'] ?? '';

    $details = getItemDetail($id, $type);

    if ($details) {
        $_SESSION['view_details'] = $details;
        $_SESSION['view_type']    = $type;
        header("Location: ../View/ViewDetails.php");
    } else {
        $_SESSION['msg'] = "Item details could not be found.";
        header("Location: ../View/ManageItemReports.php");
    }
    exit();
}

// Default fallback redirect if accessed without valid actions
header("Location: ../View/ManageItemReports.php");
exit();

?>