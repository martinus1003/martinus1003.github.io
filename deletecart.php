<?php
session_start();
$id = $_GET['idsesi'];
if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($id == $k)
			{
				unset($_SESSION["cart_item"][$k]);		
			}				
			if(empty($_SESSION["cart_item"]))
			{
				unset($_SESSION["cart_item"]);
			}
		}
	}
header("location:cart.php");
?>