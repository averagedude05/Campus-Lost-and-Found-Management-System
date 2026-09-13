<?php 
session_start();
 require "../Model/queries2.php";
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $found_id=$_GET['id'];
    //$category_id=$_GET['category_id'];
   
    $_SESSION['found_details']=getFoundItemDetails($found_id);
    header("Location: ../View/View Found Item.php");
   // echo "<h2>"var_dump($details)"</h2>";
  
 }

 



?>