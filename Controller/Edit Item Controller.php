<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['item_nameErrMsg'] = "";
    $_SESSION['dateErrMsg'] = "";
    $_SESSION['globalErrMsg'] = "";
    $_SESSION['locationErrMsg'] = "";
    $_SESSION['descriptionErrMsg'] = "";
    $_SESSION['imageErrMsg'] = "";

    $_SESSION['item_name'] = "";
    $_SESSION['date'] = "";
    $_SESSION['location'] = "";
    $_SESSION['description'] = "";
    $_SESSION['image'] = "";

    $flag = true;

    //field sanitization
    $item_name = htmlspecialchars($_POST['item_name']);
    $date = htmlspecialchars($_POST['date']);
    $location = htmlspecialchars($_POST['location']);
    $description = htmlspecialchars($_POST['description']);

    //business logic
    if (empty($item_name)) {
        $flag = false;
        $_SESSION['item_nameErrMsg'] = "Please fill up the item name properly";
    }
    else {
        $_SESSION['item_name'] = $_POST["item_name"];
    }
    if (empty($date)) {
        $flag = false;
        $_SESSION['dateErrMsg'] = "Please fill up the date properly";
    }
    else {
        $_SESSION['date'] = $_POST["date"];
    }
    if (empty($location)) {
        $flag = false;
        $_SESSION['locationErrMsg'] = "Please fill up the location properly";
    }
    else {
        $_SESSION['location'] = $_POST["location"];
    }
    if (empty($description)) {
        $flag = false;
        $_SESSION['descriptionErrMsg'] = "Please fill up the description properly";
    }
    else {
        $_SESSION['description'] = $_POST["description"];
    }
    if (empty($_FILES['image']['name'])) {
        $flag = false;
        $_SESSION['imageErrMsg'] = "Please upload an image";
    }
    else {
        $_SESSION['image'] = $_FILES['image']['name'];
    }
    if($flag){
        $_SESSION['item_name']="";
        $_SESSION['date']="";
        $_SESSION['location']="";
        $_SESSION['description']="";
        $_SESSION['image']="";
        header("Location: ../View/Edit item.php");
        exit();
    }
    else{
        $_SESSION['globalErrMsg'] = "Operation failed";
		header("Location: ../View/Edit item.php");
		exit();
    }
}
else {
    $_SESSION['globalErrMsg'] = "Something went wrong please try again";
    header("Location: ../View/Edit item.php");
	exit();
}