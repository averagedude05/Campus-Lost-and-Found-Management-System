<?php 
session_start(); 
require_once "../Model/queries1.php"; 

$_SESSION['foundItems'] = getAllReports();


header("Location: ../View/Submit Claim dashboard.php");
exit();
?>