<?php 
  session_start(); 

  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }


?>