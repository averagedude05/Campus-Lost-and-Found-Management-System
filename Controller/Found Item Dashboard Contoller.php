<?php
session_start();
require "../Model/queries.php";
$_SESSION['userid']=1;

$_SESSION['reports']= getAllReports( $_SESSION['userid']);
$_SESSION['claims']= getAllClaims( $_SESSION['userid']);
header("Location: ../View/Found Item Dashboard.php");

var_dump($_SESSION['reports']);
var_dump($_SESSION['claims']);

?> 