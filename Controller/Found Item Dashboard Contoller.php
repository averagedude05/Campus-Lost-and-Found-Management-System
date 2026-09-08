<?php
session_start();
require "../Model/queries.php";
$_SESSION['userid']=1;

$_SESSION['reports']= getAllReports( $_SESSION['userid']);
$_SESSION['claims'] = getAllClaimRequest( $_SESSION['userid']);

header("Location: ../View/Found Item Dashboard.php");

?> 