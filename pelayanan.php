<!DOCTYPE html>

<?php 
	include "includes/config.php"; 

    ob_start();
  session_start();


  if(isset($_POST['submit'])) {
    $kdcust = $_SESSION['cust_id'];
    $nopemesanan = $_REQUEST["inputannopemesanan"];
    $kdpelayanan = $_REQUEST["inputankdpelayanan"];
    $detilpelayanan = $_REQUEST["inputandetil"];
    mysqli_query($connection, "INSERT INTO detil_customer_pelayanan VALUES ('$kdcust', '$nopemesanan', '$kdpelayanan', '$detilpelayanan', curtime())");

    
    header("location:pelayanan.php");
  }
  $kdcust = $_SESSION['cust_id'];
  $query = mysqli_query($connection, "SELECT * FROM pemesanan WHERE cust_id = '$kdcust'");

  $query2 = mysqli_query($connection, "SELECT * FROM pelayanan")
?>

<html lang="en">
  <head>
    <title>Yatta Corporation | Our Services</title>
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
  
	<!--  menu navbar -->
	<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>




            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <img src="images/yattalogo.png" style="width: 100%">
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li>
                    <a href="cart.html" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>
      


          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children">
              <a href="index.php">Home</a>
              <ul class="dropdown">
                <li><a href="about.php">About Us</a></li>
                <li><a href="trending.php">Trending Products</a></li>
              </ul>
            </li>
            <li><a href="katalog.php">Products</a></li>
            <li><a href="newarrival.php">New Arrivals</a></li>

            <li class="has-children">
              <a href="kontak.php">Contact Us</a>
              <ul class="dropdown">
                <li><a href="pelayanan.php">Services</a></li>
                <li><a href="faq.php">FAQ</a></li>
        <li><a href="livechat.php">Live Chat</a></li>
              </ul>
            </li>
            <li><a href="#">Halo! Selamat Datang!</a><a><?php echo $_SESSION['cust_name'] ?></a></li>
          </ul>
        </div>
      </nav>
    </header>
	
  <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Get In Touch</h2>
          </div>
          <div class="col-md-12">

            <form action="pelayanan.php" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">

                  <div class="col-md-12">
                    <label for="nopemesanan" class="col-sm-3 col-form-label">No. Pemesanan</label>
                    <div class="col-sm-12">
                    <select name="inputannopemesanan" class="form-control" id="nopemesanan">
                      <option value="NULL">No. Pemesanan</option>
                      <?php if (mysqli_num_rows($query) > 0) {?>
                      <?php while($row = mysqli_fetch_array($query)) {?>
                        <option value="<?php echo $row["no_pemesanan"]?>">
                        <?php echo $row["no_pemesanan"];?>
                        </option>
                      <?php }?>
                      <?php }?>
                    </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="kdpelayanan" class="col-sm-3 col-form-label">Jenis Pelayanan</label>
                    <div class="col-sm-12">
                    <select name="inputankdpelayanan" class="form-control" id="kdpelayanan">
                      <option value="NULL">Jenis Pelayanan</option>
                      <?php if (mysqli_num_rows($query2) > 0) {?>
                      <?php while($row = mysqli_fetch_array($query2)) {?>
                        <option value="<?php echo $row["kd_pelayanan"]?>">
                        <?php echo $row["jenis_pelayanan"];?>
                        </option>
                      <?php }?>
                      <?php }?>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="detilpelayanan" class="col-sm-3 col-form-label">Message </label>
                    <textarea name="inputandetil" id="detilpelayanan" cols="150" rows="7" class="form-control"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Send Message">
                  </div>
                </div>

              </div>
            </form>
          </div>

        </div>
      </div>
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