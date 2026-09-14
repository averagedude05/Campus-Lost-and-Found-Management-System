<?php

session_start();

// Logout

session_unset();

session_destroy();

// Redirect

header(
    "Location: ../View/login.php"
);

exit();

?>