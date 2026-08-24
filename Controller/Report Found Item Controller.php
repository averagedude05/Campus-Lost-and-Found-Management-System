<?php

session_start();

$_SESSION['typeErrMsg'] = "";
$_SESSION['nameErrMsg'] = "";
$_SESSION['categoryErrMsg'] = "";
$_SESSION['dateErrMsg'] = "";
$_SESSION['locationErrMsg'] = "";
$_SESSION['descriptionErrMsg'] = "";
$_SESSION['imageErrMsg'] = "";
$_SESSION['globalErrMsg'] = "";
$_SESSION['itemtype'] = "";
$_SESSION['itemnametxt'] = "";
$_SESSION['itemcatagory'] = "";
$_SESSION['founddate'] = "";
$_SESSION['foundlocation'] = "";
$_SESSION['description'] = "";
$_SESSION['image'] = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $itemtype = htmlspecialchars($_POST['itemtype']);
    $itemnametxt = htmlspecialchars($_POST['itemnametxt']);
    $itemcatagory = htmlspecialchars($_POST['itemcatagory']);
    $founddate = htmlspecialchars($_POST['founddate']);
    $foundlocation = htmlspecialchars($_POST['foundlocation']);
    $description = htmlspecialchars($_POST['description']);
    $flag = true;
    if (empty($itemtype)) {
        $flag = false;
        $_SESSION['typeErrMsg'] = "Please select an item type";
    }
    else {
        $_SESSION['itemtype'] = $itemtype;
    }
    if (empty($itemnametxt)) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Please enter item name properly";
    }
    else {
        $_SESSION['itemnametxt'] = $itemnametxt;
    }
    if (empty($itemcatagory)) {
        $flag = false;
        $_SESSION['categoryErrMsg'] = "Please select a category";
    }
    else {
        $_SESSION['itemcatagory'] = $itemcatagory;
    }
    if (empty($founddate)) {
        $flag = false;
        $_SESSION['dateErrMsg'] = "Please enter the date properly";
    }
    else {
        $_SESSION['founddate'] = $founddate;
    }
    if (empty($foundlocation)) {
        $flag = false;
        $_SESSION['locationErrMsg'] = "Please enter the location properly";
    }
    else {
        $_SESSION['foundlocation'] = $foundlocation;
    }
    if (empty($description)) {
        $flag = false;
        $_SESSION['descriptionErrMsg'] = "Please enter the description properly";
    }
    else {
        $_SESSION['description'] = $description;
    }
    if (empty($_FILES['image']['name'])) {
        $flag = false;
        $_SESSION['imageErrMsg'] = "Please upload an image";
    }
    else {
        $_SESSION['image'] = $_FILES['image']['name'];
    }
    if ($flag) {
        $_SESSION['itemtype'] = "";
        $_SESSION['itemnametxt'] = "";
        $_SESSION['itemcatagory'] = "";
        $_SESSION['founddate'] = "";
        $_SESSION['foundlocation'] = "";
        $_SESSION['description'] = "";
        $_SESSION['image'] = "";

        header("Location: ../View/Found Item Dashboard.php");
        exit();
    }
    else {

        $_SESSION['globalErrMsg'] = "Operation failed";

        header("Location: ../View/Report Found Item.php");
        exit();
    }
}
else {

    $_SESSION['globalErrMsg'] = "Something went wrong.";
    header("Location: ../View/Report Found Item.php");
    exit();
}
?>