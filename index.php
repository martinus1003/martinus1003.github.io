<!DOCTYPE html>

<?php 
	include "includes/config.php"; 


  $query = mysqli_query($connection, "SELECT * FROM kupon WHERE id_kupon = 'YATTAFRST' ");
  $fetch = mysqli_fetch_array($query);
  
?>

<html lang="en">
  <head>
    <title>Yatta Corporation</title>
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
                  <li><a href="login.php"><span class="icon icon-person"></span></a></li>
                  <li>
                    <a href="cart2.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
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
              <a href="home.php">Home</a>
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
			
              </ul>
            </li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div>
      </nav>
    </header>
	
	<!--  home banner -->
	<?php include "includes/home_banner.php"; ?>

	<!--  menu collections -->
	<?php include "includes/collections.php"; ?>
	
	<!-- menu featured products -->
	<?php include "includes/featured_products.php"; ?>

	<!-- menu new arrival -->
	<?php include "includes/new_arrival.php"; ?>
	
	<!-- footer -->
	<?php include "includes/footer.php"; ?>
	
	
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

    <?php
mysqli_close($connection);
ob_end_flush();
?>