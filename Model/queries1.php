<?php
require_once __DIR__ . "/dbConnection.php";

function getUserByEmail($email) {
    $conn=connect();

    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();
    return $user;
}

function getAllCategories() {
    $conn=connect();

    $sql = "SELECT * FROM category ORDER BY category_name";
    $result = mysqli_query($conn, $sql);
    $rows = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function insertNewClaimItem($user_id, $found_id, $proof, $claim_date) {
    $conn=connect();

    $sql = "INSERT INTO claim_request
            (user_id, found_id, proof_details, claim_date, claim_status)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $claim_status = "pending";

    $stmt->bind_param(
        "iisss",
        $user_id,
        $found_id,
        $proof,
        $claim_date,
        $claim_status
    );

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}
function getAllReports(){
    $conn=connect();
    $sql="select f.found_id,f.item_name,c.category_id,c.category_name,f.date_found,f.status
    from found_item f join category c on f.category_id=c.category_id
    order by f.found_id desc";
    $rows=array();
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    else{
        return array();

    }
}
function getFoundItemDetails($id){
    $conn=connect();

    $sql = "select * from found_item where found_id=".$id;

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
    else{
        echo "error";
    }
}
function searchFoundItems($search) {
    $conn=connect();

    $search = "%" . $search . "%";

    $sql = "SELECT f.found_id, f.item_name, f.date_found, f.location, f.status,
                   c.category_id, c.category_name
            FROM found_item f
            JOIN category c ON f.category_id = c.category_id
            WHERE f.item_name LIKE ?
               OR f.description LIKE ?
               OR f.location LIKE ?
            ORDER BY f.date_found DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();

    $result = $stmt->get_result();
    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $stmt->close();
    return $rows;
}



 
function checkLogin($email, $password) {
    $conn = connect();
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result); 
}

function registerUser($name, $email, $password, $phone = '', $role = 'user') {
    $conn = connect();
    $sql = "INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $phone, $role);
    return mysqli_stmt_execute($stmt);
}


function emailExists($email) {
    $conn = connect();
    $sql = "SELECT user_id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_num_rows($result) > 0;
}


function getUserByPhone($phone) {
    $conn = connect();
    $sql = "SELECT * FROM users WHERE phone = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $phone);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}


function updatePasswordByPhone($phone, $newPassword) {
    $conn = connect();
    $sql = "UPDATE users SET password = ? WHERE phone = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $newPassword, $phone);
    return mysqli_stmt_execute($stmt);
}
?>