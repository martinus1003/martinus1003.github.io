<?php 
  include "includes/config.php";
  $noimg = $_GET["idimagehapus"];
    if (isset($_GET["idimagehapus"])) {
    $noimg = $_GET["idimagehapus"];
    mysqli_query($connection, "DELETE FROM img_produk WHERE id_img = '$noimg'");
    header("location:gambar.php");
  }
 ?>