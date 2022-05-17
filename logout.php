<?php

session_start();
$_SESSION['user'] = "";
session_destroy();
session_unset();
session_unset();


echo "<script>alert('Please come back soon')</script>";
echo "<script>window.location.assign('index.php')</script>";

?>

