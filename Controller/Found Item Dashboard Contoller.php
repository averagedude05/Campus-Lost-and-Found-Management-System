<?php
session_start();
require "../Model/queries2.php";
//  $_SESSION['user_id']=1;

$_SESSION['reports']= getAllReports(  $_SESSION['user_id'] );
$_SESSION['claims'] = getAllClaimRequest( $_SESSION['user_id'] );

header("Location: ../View/Found Item Dashboard.php");

?> 