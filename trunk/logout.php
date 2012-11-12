<?php

session_start();
session_destroy();
echo 'Log out successfully. Redirecting to index page...';
header("location:index.php");


?>
