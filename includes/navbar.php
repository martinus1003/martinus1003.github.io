<?php 

  include "includes/config.php";
  

 ?>


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
					<li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
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
            <li><a>Halo! Selamat Datang! <?php echo $_SESSION['cust_name'] ?></a></li>
          </ul>
        </div>
      </nav>
    </header>

