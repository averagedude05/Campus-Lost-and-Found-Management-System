<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "campus_lost_found";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Database connection failed");
}

?>