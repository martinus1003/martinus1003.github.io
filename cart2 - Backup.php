<?php 
  include "includes/config.php";
  ob_start();
  session_start();

        if(!isset($_SESSION['cust_id'])) {
    header("location:login.php");
  }

  $kdcust = $_SESSION['cust_id'];

    $query = mysqli_query($connection, "SELECT ca.id_cart, ca.cust_id, ca.id_produk, ca.harga, ca.jumlah_pesan, ca.sub_harga, ca.kd_spesifikasi, p.nm_produk, c.nama_cust, s.jns_spesifikasi, i.nama_img
  FROM cart ca JOIN customer c ON (ca.cust_id = c.cust_id) 
  JOIN produk p ON (p.id_produk = ca.id_produk) 
  JOIN spesifikasi s ON (s.kd_spesifikasi = ca.kd_spesifikasi)
  JOIN img_produk i ON (i.id_produk = ca.id_produk)
  GROUP BY ca.id_cart");




  $total = 0;
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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                    <th class="product-update">Update</th>
                  </tr>
                </thead>            
                <tbody>
                   <?php if(mysqli_num_rows($query) > 0)  { ?>
                                <?php $nomor = 1;
                                 while($row = mysqli_fetch_array($query)) { 
                                  $harga=number_format($row["harga"],0,",",".");
                                  $subharga=number_format($row["sub_harga"],0,",",".");
                                  $subtotal += $row['sub_harga'];
                                  $subview= number_format($subtotal,0,",",".");?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/baju/<?php echo $row['nama_img'] ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $row['nm_produk'] ?></h2>
                    </td>
                    <td>Rp. <?php echo $harga ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" name="inputanqty" value="<?php echo $row['jumlah_pesan'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td>Rp. <?php echo $subharga ?></td>
                    <td><a href="deletecart2.php?kdprodukhapus=<?php echo $row['id_produk'] ?>&idcart=<?php echo $row['id_cart'] ?>" class="btn btn-primary btn-sm">X</a></td>
                    <td>

                     <a href="updatecart2.php?kdproduk=<?php echo $row['id_produk'] ?>&idcart=<?php echo $row['id_cart'] ?>" class="btn btn-primary btn-sm btn-block" name="updateqty" value="Update">Update</a>
          
                    </td>
                  </tr>

                                <?php $nomor++; } ?>
                               <?php } ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">

              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location.href='katalog.php'">Continue Shopping</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Rp. <?php echo $subview ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Rp. <?php echo $subview ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
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
    
  </body>
</html>