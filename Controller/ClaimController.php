<?php
session_start();
require_once "../Model/queries.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../View/login.php");
    exit();
}

// Handle Approve or Reject Action
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $claim_id = (int)($_POST["claim_id"] ?? 0);
    $action   = $_POST["action"] ?? "";

    if ($claim_id > 0) {
        if ($action === "approve") {
            updateClaimStatus($claim_id, "approved");
            $_SESSION["claim_msg"] = "Claim request approved.";
        } else if ($action === "reject") {
            updateClaimStatus($claim_id, "rejected");
            $_SESSION["claim_msg"] = "Claim request rejected.";
        }
    }

    header("Location: ../View/ManageClaimReq.php");
    exit();
}
?>