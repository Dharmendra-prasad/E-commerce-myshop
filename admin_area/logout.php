<?php session_start();
session_destroy();
echo "<script>window.open('login.php?logout=You logged out!','_self')</script>";

 ?>