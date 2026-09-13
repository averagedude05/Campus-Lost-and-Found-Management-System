<?php

session_start();


session_unset();

setcookie("userEmail", "", time() - 3600, "/");

session_destroy();


header(
    "Location: ../View/login.php"
);

exit();

?>