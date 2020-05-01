<?php 
	include "includes/config.php";

	$kdproduk = $_GET['kdprodukhapus'];
	$idcart = $_GET['idcart'];

   if (isset($_GET["kdprodukhapus"])) {
    $kdproduk = $_GET["kdprodukhapus"];
    $idcart = $_GET['idcart'];
    mysqli_query($connection, "DELETE FROM cart WHERE id_produk = '$kdproduk' AND id_cart = '$idcart'");
    header("location:cart2.php");
  }

 ?>