<?php
session_start();
require "../Model/queries.php";
require "ImageFileUpload.php";
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $_SESSION['item_nameErrMsg'] = "";
    $_SESSION['dateErrMsg'] = "";
    $_SESSION['globalErrMsg'] = "";
    $_SESSION['locationErrMsg'] = "";
    $_SESSION['descriptionErrMsg'] = "";
    $_SESSION['imageErrMsg'] = "";
    $_SESSION['categoryErrMsg'] = "";

    $_SESSION['found_id'] = $_GET['id'];
    $_SESSION['category_id'] = $_GET['category_id'];

    $found_id = $_SESSION['found_id'];
    $original_category_id = $_SESSION['category_id'];

    $_SESSION['result'] = getDetails($found_id);
    $_SESSION['rows'] = getAllCategories();

    header("Location:../View/Edit item.php");
  

}
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    require_once "../Model/queries.php";
    require_once "ImageFileUpload.php";
    $_SESSION['item_nameErrMsg'] = "";
    $_SESSION['dateErrMsg'] = "";
    $_SESSION['globalErrMsg'] = "";
    $_SESSION['locationErrMsg'] = "";
    $_SESSION['descriptionErrMsg'] = "";
    $_SESSION['imageErrMsg'] = "";
    $_SESSION['categoryErrMsg'] = "";

    $found_id = $_SESSION['found_id'];
    

    // Field sanitization
    $item_name = htmlspecialchars($_POST['item_name']);
    $date = htmlspecialchars($_POST['date']);
    $location = htmlspecialchars($_POST['location']);
    $description = htmlspecialchars($_POST['description']);
    $category_id = $_POST['category_id'];
    $flag = true;
    //business logic
    if (empty($item_name)) {
        $flag = false;
        $_SESSION['item_nameErrMsg'] = "Please fill up the item name properly";
    }
    else {
        $_SESSION['item_name'] = $item_name;
    }
    if (empty($date)) {
        $flag = false;
        $_SESSION['dateErrMsg'] = "Please fill up the date properly";
    }
    else {
        $_SESSION['date'] = $date;
    }
    if (empty($location)) {
        $flag = false;
        $_SESSION['locationErrMsg'] = "Please fill up the location properly";
    }
    else {
        $_SESSION['location'] = $location;
    }
    if (empty($description)) {
        $flag = false;
        $_SESSION['descriptionErrMsg'] = "Please fill up the description properly";
    }
    else {
        $_SESSION['description'] = $description;
    }
    if (empty($category_id)) {
        $flag = false;
        $_SESSION['categoryErrMsg'] = "Please choose a category";
    }
    if ($flag) {
      
        if (!empty($_FILES['new_image']['name'])) {
            $_SESSION['image'] = $_FILES['new_image']['name'];
            $result = imageUpload('new_image');
            if ($result['file_path'] == 0) {
                $_SESSION['imageErrMsg'] = $result['msg'];
                header("Location: ../View/Edit Item.php?id=".$found_id."&category_id=".$category_id);
                exit();
            }
            else {
                updateRequest(
                    $_SESSION['userid'],
                    $category_id,
                    $description,
                    $date,
                    $location,
                    $result['file_path'],
                    $item_name,
                    $found_id
                );
            }
        }
        else {
            $old_image = getDetails($found_id);
            updateRequest(
                $_SESSION['userid'],
                $category_id,
                $description,
                $date,
                $location,
                $old_image['image_url'],
                $item_name,
                $found_id
            );
        }
     
        unset($_SESSION['item_name']);
        unset( $_SESSION['date'] );
        unset($_SESSION['location']);
        unset( $_SESSION['description']);
        unset($_SESSION['image']);
        unset($_SESSION['found_id']);
        unset($_SESSION['category_id']);
        header("Location: ../View/Found Item Dashboard.php");
        exit();
    }
    else {
        $_SESSION['globalErrMsg'] = "Operation failed";
        header("Location: ../View/Edit item.php?id=".$found_id."&category_id=".$_SESSION['category_id']);
        exit();
    }
}
else {
    $_SESSION['globalErrMsg'] = "Something went wrong please try again";
    header("Location: ../View/Found Item Dashboard.php");
    exit();
}
?>

