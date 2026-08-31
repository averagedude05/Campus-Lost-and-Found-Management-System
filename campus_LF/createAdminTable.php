<?php

include "Model/dbconnect.php";


// Create admin table

$sql = "CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)";


if (mysqli_query($conn, $sql)) {

    echo "Admin table created successfully.<br>";

}
else {

    echo "Table creation error: "
         . mysqli_error($conn);

}


// Insert 3 admins

$sql = "INSERT INTO admins (name, email, password)
VALUES
('Emon', 'emon@aiub.edu', 'admin123'),
('Adib', 'adib@aiub.edu', 'admin456'),
('Tonmoy', 'tonmoy@aiub.edu', 'admin789')";


if (mysqli_query($conn, $sql)) {

    echo "3 admins inserted successfully.";

}
else {

    echo "Admin insertion error: "
         . mysqli_error($conn);

}


mysqli_close($conn);

?>