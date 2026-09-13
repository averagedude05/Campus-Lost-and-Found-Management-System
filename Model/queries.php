<?php
require_once "dbConnection.php";







// Get Users
function getUsers($search = "") {
    $conn = connect();
    
    if (empty($search)) {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM users WHERE user_id LIKE ? OR name LIKE ? OR email LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        $param = "%" . $search . "%";
        mysqli_stmt_bind_param($stmt, "sss", $param, $param, $param);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//  Delete User
function deleteUser($user_id) {
    $conn = connect();
    $id = (int)$user_id;

    mysqli_query($conn, "DELETE FROM claim_request WHERE user_id = $id");
    mysqli_query($conn, "DELETE FROM claim_request WHERE found_id IN (SELECT found_id FROM found_item WHERE user_id = $id)");
    mysqli_query($conn, "DELETE FROM found_item WHERE user_id = $id");
    mysqli_query($conn, "DELETE FROM lost_item WHERE user_id = $id");

    return mysqli_query($conn, "DELETE FROM users WHERE user_id = $id");
}

//Item Reports
function getAllItemReports() {
    $conn = connect();

    $sql = "SELECT lost_id AS id, item_name, 'lost' AS item_type, date_lost AS date_reported, status 
            FROM lost_item
            UNION ALL
            SELECT found_id AS id, item_name, 'found' AS item_type, date_found AS date_reported, status 
            FROM found_item
            ORDER BY date_reported DESC";

    $result = mysqli_query($conn, $sql);
    $items = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
    }

    mysqli_close($conn);
    return $items;
}


// Get Single Item Detail
function getItemDetail($id, $type) {
    $conn = connect();
    $id = (int)$id;

    if ($type === "lost") {
        $sql = "SELECT * FROM lost_item WHERE lost_id = $id";
    } else if ($type === "found") {
        $sql = "SELECT * FROM found_item WHERE found_id = $id";
    } else {
        $sql = "SELECT * FROM claim_request WHERE claim_id = $id";
    }

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Delete Lost or Found Item
function deleteItemReport($id, $type) {
    $conn = connect();
    $id = (int)$id;
    $table = ($type === "lost") ? "lost_item" : "found_item";
    $key   = ($type === "lost") ? "lost_id"   : "found_id";

    return mysqli_query($conn, "DELETE FROM $table WHERE $key = $id");
}

// Fetch Claim Requests
function getAllClaimRequests($search = "", $status = "") {
    $conn = connect();
    $sql = "SELECT c.claim_id, c.claim_status, c.claim_date, u.name AS claimant_name, f.item_name 
            FROM claim_request c 
            JOIN users u ON c.user_id = u.user_id 
            JOIN found_item f ON c.found_id = f.found_id";

    $result = mysqli_query($conn, $sql);
    $claims = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $matchesSearch = empty($search) || stripos($row['item_name'], $search) !== false || stripos($row['claimant_name'], $search) !== false;
        $matchesStatus = empty($status) || $row['claim_status'] === $status;

        if ($matchesSearch && $matchesStatus) {
            $claims[] = $row;
        }
    }

    return $claims;
}

//  Claim Status
function updateClaimStatus($claim_id, $status) {
    $conn = connect();
    $sql = "UPDATE claim_request SET claim_status = ? WHERE claim_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "si", $status, $claim_id);
    return mysqli_stmt_execute($stmt);
}

//  Dashboard 

function getTotalReportsCount() {
    $conn = connect();
    $lost  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM lost_item"))['total'];
    $found = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM found_item"))['total'];
    return $lost + $found;
}

function getTotalUsersCount() {
    $conn = connect();
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"));
    return $row['total'];
}

function getPendingClaimsCount() {
    $conn = connect();
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM claim_request WHERE claim_status = 'pending'"));
    return $row['total'];
}

function getActiveUsersCount() {
    $conn = connect();
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role = 'user'"));
    return $row['total'];
}

?>