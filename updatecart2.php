<?php 
	include "includes/config.php";

	$kdproduk = $_GET['kdproduk'];
	$idcart = $_GET['idcart'];

   if (isset($_GET["kdproduk"])) {
    $kdproduk = $_GET["kdproduk"];
    $idcart = $_GET['idcart'];
    $quantity = $_REQUEST['inputanqty'];
    mysqli_query($connection, "UPDATE cart SET jumlah_psn = $quantity WHERE id_produk = '$kdproduk' AND id_cart = '$idcart'");
    header("location:cart2.php");
  }

 ?>