<?php 
session_start();
 require "../Model/queries.php";
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $claim_id=$_GET['id'];
    //$category_id=$_GET['category_id'];
   
    $_SESSION['claim_details']=getClaimItemDetails($claim_id);
    header("Location: ../View/View Item.php");
   // echo "<h2>"var_dump($details)"</h2>";
  
 }

 



?>