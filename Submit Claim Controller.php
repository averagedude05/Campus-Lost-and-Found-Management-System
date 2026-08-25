<?php
session_start();

$item = $_POST['item'];
$category = $_POST['category'];
$location = $_POST['location'];
$date = $_POST['date'];
$info = $_POST['info'];

$flag = true;

if ($item === "") {
    $flag = false;
    $_SESSION['itemErrMsg'] = "Please enter item name properly";
}
else {
    $_SESSION['itemErrMsg'] = "";
}

if ($category === "") {
    $flag = false;
    $_SESSION['categoryErrMsg'] = "Please select a category";
}
else {
    $_SESSION['categoryErrMsg'] = "";
}

if ($location === "") {
    $flag = false;
    $_SESSION['locationErrMsg'] = "Please enter location properly";
}
else {
    $_SESSION['locationErrMsg'] = "";
}

if ($date === "") {
    $flag = false;
    $_SESSION['dateErrMsg'] = "Please select lost date";
}
else {
    $_SESSION['dateErrMsg'] = "";
}

if ($info === "") {
    $flag = false;
    $_SESSION['infoErrMsg'] = "Please enter additional information";
}
else {
    $_SESSION['infoErrMsg'] = "";
}

if ($flag === false) {
    header("Location: ../View/Submit Claim.php");
    exit();
}



?>