<?php 
  include "includes/config.php";
  ob_start();
  session_start();

        if(!isset($_SESSION['cust_id'])) {
    header("location:login.php");
  }
  $kdcust = $_SESSION['cust_id'];
  $querycust = mysqli_query($connection, "SELECT * FROM customer WHERE cust_id = '$kdcust'");
  $custfetch = mysqli_fetch_array($querycust);

  $query = mysqli_query($connection, "SELECT ca.id_cart, ca.cust_id, ca.id_produk, ca.harga, ca.jumlah_pesan, ca.sub_harga, ca.kd_spesifikasi, p.nm_produk, c.nama_cust, s.jns_spesifikasi, i.nama_img
        FROM cart ca JOIN customer c ON (ca.cust_id = c.cust_id) 
        JOIN produk p ON (p.id_produk = ca.id_produk) 
        JOIN spesifikasi s ON (s.kd_spesifikasi = ca.kd_spesifikasi)
        JOIN img_produk i ON (i.id_produk = ca.id_produk)
        GROUP BY ca.id_cart");

  $querypemesanan = mysqli_query($connection, "SELECT * FROM pemesanan WHERE cust_id = '$kdcust'");
  $pemfetch = mysqli_fetch_array($querypemesanan);

  if(isset($_POST['submitkupon'])) {
    $idkupon = $_REQUEST["applykupon"];

    mysqli_query($connection, "UPDATE pemesanan, kupon SET total_pemesanan = total_pemesanan - (total_pemesanan * potongan) WHERE cust_id = '$kdcust' AND id_kupon = '$idkupon'");

    header("location:checkout.php");
  }
  if(isset($_POST['checkout'])) {
    $kdcust = $_SESSION['cust_id'];
    mysqli_query($connection, "DELETE FROM cart WHERE cust_id = '$kdcust'");

    header("location:thankyou.php");
  }


  $subtotal = 0;
 ?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <title>Yatta Corporation | Shopping Cart</title>
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
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
             
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Nama </label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" readonly="" value="<?php echo $custfetch['nama_cust'] ?>">
                </div>
              </div>


              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Alamat </label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address" readonly="" value="<?php echo $custfetch['alamat'] ?>">
                </div>
              </div>

        

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="provinsi" class="text-black">Provinsi</label>
                  <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $custfetch['provinsi'] ?>" readonly="">
                </div>
                <div class="col-md-6">
                  <label for="kota" class="text-black">Kota </label>
                  <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $custfetch['kota'] ?>" readonly="">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="Kelurahan" class="text-black">Kelurahan</label>
                  <input type="text" class="form-control" id="Kelurahan" name="Kelurahan" value="<?php echo $custfetch['kelurahan'] ?>" readonly="">
                </div>
                <div class="col-md-6">
                  <label for="kodepos" class="text-black">Kode Pos </label>
                  <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?php echo $custfetch['kode_pos'] ?>" readonly="">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email </label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address" value="<?php echo $custfetch['email'] ?>" readonly="">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone </label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number" value="<?php echo $custfetch['no_tlp'] ?>" readonly="">
                </div>
              </div>


          

            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">
                  
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <form method="POST" enctype="multipart/form-data">
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" name="applykupon" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <input  class="btn btn-primary btn-sm" type="submit" id="button-addon2" name="submitkupon">
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php if(mysqli_num_rows($query) > 0)  { ?>
                                <?php $nomor = 1;
                                 while($row = mysqli_fetch_array($query)) { 
                                  $harga=number_format($row["harga"],0,",",".");
                                  $subharga=number_format($row["sub_harga"],0,",",".");
                                  $subtotal += $row['sub_harga'];
                                  $subview= number_format($subtotal,0,",","."); 
                                  ?>
                      <tr>
                        <td><?php echo $row['nm_produk'] ?> <strong class="mx-2">x</strong> <?php echo $row['jumlah_pesan'] ?></td>
                        <td>Rp. <?php echo $subharga ?></td>
                      </tr>

             <?php $nomor++; } ?>
                               <?php } ?>
                        <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">Rp. <?php echo $subview ?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">Rp. <?php echo $subview ?></td>
                      </tr>
                               <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>Rp. <?php $totalcart=number_format($pemfetch['total_pemesanan'],0,",","."); echo $totalcart ?></strong></td>
                      </tr>

                    </tbody>
                  </table>
              
                  <div class="form-group">
                    <form method="POST" enctype="multipart/form-data">
                    <input type="submit" class="btn btn-primary btn-lg py-3 btn-block" name="checkout" value="Place Order">
                  </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
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