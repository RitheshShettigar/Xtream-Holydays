<?php 
session_start();
session_destroy();
unset($_SESSION['name']);
unset($_SESSION['userid']);
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['login']);
unset($_SESSION['cat']);
header("location:login.php");

?>