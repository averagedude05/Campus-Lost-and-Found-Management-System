<?php
session_start();

$search = $_POST['search'];

$flag = true;

if ($search === "") {
    $flag = false;
    $_SESSION['searchErrMsg'] = "Please enter something to search";
}
else {
    $_SESSION['searchErrMsg'] = "";
}

if ($flag === false) {
    header("Location: ../View/Search Found Item.php");
    exit();
}


?>