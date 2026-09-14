<?php 
session_start(); 
require_once "../Model/queries1.php"; 



if (isset($_GET['found_id'])) {

    $found_id = $_GET['found_id'];

    $foundItem = getFoundItemDetails($found_id);

    $_SESSION['found_id'] = $foundItem['found_id'];

    $_SESSION['item'] = $foundItem['item_name'];
    $_SESSION['category'] = $foundItem['category_name'];
    $_SESSION['location'] = $foundItem['location'];
    $_SESSION['date'] = $foundItem['date_found'];
    $_SESSION['info'] = "";

    header("Location: ../View/Submit Claim.php");
    exit();
}

$item = trim($_POST['item'] ?? ""); 
$category = $_POST['category'] ?? ""; 
$location = trim($_POST['location'] ?? ""); 
$date = $_POST['date'] ?? ""; 
$info = trim($_POST['info'] ?? ""); 

$_SESSION['item'] = $item; 
$_SESSION['category'] = $category;
$_SESSION['location'] = $location; 
$_SESSION['date'] = $date; 
$_SESSION['info'] = $info; 

$flag = true;

if ($info === "") {
    $_SESSION['infoErrMsg'] = "Please enter additional information";
    $flag = false;
}

if ($flag) {

    $success = insertNewClaimItem(
        $_SESSION['user_id'],
        $_SESSION['found_id'],
        $info,
        date("Y-m-d")
    );

    if ($success) {

        header("Location: ../View/Submit Claim dashboard.php");
        exit();

    } else {

        $_SESSION['generalErrMsg'] = "Failed to submit claim.";

        header("Location: ../View/Submit Claim.php");
        exit();
    }
}

header("Location: ../View/Submit Claim.php");
exit();

?>