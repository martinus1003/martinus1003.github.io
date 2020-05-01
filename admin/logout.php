<?php
	session_start();
	$_SESSION['admin_id']; 
	$_SESSION['admin_name'];

	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_name']);
	
	session_unset();
	session_destroy();
	
	header("location:login.php")
?>