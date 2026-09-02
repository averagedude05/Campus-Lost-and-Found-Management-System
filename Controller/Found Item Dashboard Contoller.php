<?php
session_start();
require "../Model/queries.php";
$_SESSION['userid']=getUserId();

$_SESSION['reports']= getAllReports( $_SESSION['userid']);
$_SESSION['claims']= getAllClaims( $_SESSION['userid']);
header("Location: ../Controller/Found Item Dashboard Contoller.php");



?> 