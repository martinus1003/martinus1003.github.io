<?php
	session_start();
	$_SESSION['cust_id']; 
	$_SESSION['cust_name'];

	unset($_SESSION['cust_id']);
	unset($_SESSION['cust_name']);
	
	session_unset();
	session_destroy();
	
	header("location:index.php")
?>