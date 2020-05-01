<?php 
  include "includes/config.php";
  session_start();
   ob_start();
   
  $kdproduk = $_GET["kdproduk"];
  $kdcust = $_SESSION['cust_id'];

  $queryproduk = mysqli_query($connection, "SELECT * FROM produk p JOIN img_produk m ON (p.id_produk = m.id_produk) WHERE p.id_produk = '$kdproduk'" );
  $queryspesifikasi = mysqli_query($connection, "SELECT * FROM spesifikasi" );
  $queryfeatured = mysqli_query($connection, "SELECT * FROM produk p JOIN img_produk m ON (p.id_produk = m.id_produk) WHERE p.id_produk != '$kdproduk'");

  $row = mysqli_fetch_array($queryproduk);
  $harga=number_format($row["harga"],0,",",".");
  
  if(isset($_POST['cart'])) {
    $kdproduk = $_GET["kdproduk"];
    $kdcust = $_SESSION['cust_id'];
    $harga = mysqli_query($connection, "SELECT harga FROM produk WHERE id_produk = '$kdproduk'");
    $hfetch = mysqli_fetch_array($harga);
    $hrow = $hfetch['harga'];
    $quantity = $_REQUEST['quantity'];
    $subharga = $quantity * $hrow;
    $kdspesifikasi = $_REQUEST['size'];

    mysqli_query($connection, "INSERT INTO cart VALUES ('', '$kdcust', '$kdproduk', '$hrow', '$quantity', '$subharga', '$kdspesifikasi' )");
    mysqli_query($connection, "INSERT INTO confirmcart VALUES ('', '$kdcust', '$kdproduk', '$hrow', '$quantity', '$subharga', '$kdspesifikasi' )");

    header('location:cart2.php');
  }
   
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yatta Corporation | Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include "includes/navbar.php" ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $row["nm_produk"] ?></strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/baju/<?php echo $row["nama_img"] ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $row["nm_produk"] ?></h2>
            <p style="text-align: justify;"><?php echo $row["detil_produk"] ?></p>
            <p><strong class="text-primary h4">Rp. <?php echo $harga ?></strong></p>
			<form method="POST" enctype="multipart/form-data">

            <div class="mb-1 d-flex">
              <?php if(mysqli_num_rows($queryspesifikasi) > 0) { ?>
                <?php while($row = mysqli_fetch_array($queryspesifikasi)) { ?>
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="size" value="<?php echo $row["kd_spesifikasi"] ?>"></span> <span class="d-inline-block text-black"><?php echo $row["jns_spesifikasi"] ?>
                <img src="images/<?php echo $row['gambar'] ?>" width="150" /></span> 
              </label>
               <?php } ?>
                <?php } ?>

            </div>

            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" name="quantity" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
              </div>
            </div>
				<button type="submit" name="cart" value="5" class="buy-now btn btn-sm btn-primary">Add to cart</button>
			</form>
			
			
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

              <?php if(mysqli_num_rows($queryfeatured) > 0) { ?>
                <?php while($row = mysqli_fetch_array($queryfeatured)) { $hargaf=number_format($row["harga"],0,",",".")?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/baju/<?php echo $row["nama_img"] ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#"><?php echo $row["nm_produk"] ?></a></h3>
               
                    <p class="text-primary font-weight-bold"><?php echo $hargaf ?></p>
                  </div>
                </div>
              </div>
                      <?php } ?>
                <?php } ?>
              

            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"; ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dc7cb44d96992700fc6b6de/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
  </body>
</html>
    <?php
mysqli_close($connection);
ob_end_flush();
?>