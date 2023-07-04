<?php 
session_start();
unset($_SESSION['User_Id']);
header("Location:login.php");
die();
?>