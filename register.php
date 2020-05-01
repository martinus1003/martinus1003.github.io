<!DOCTYPE html>

<?php 
	include "includes/config.php"; 

  
 	if(isset($_POST['Simpan'])) {
		$idcust = $_REQUEST["inputanid"];
		$namacust = $_REQUEST["inputannama"];
		$emailcust = $_REQUEST["inputanemail"];
		$password = md5($_REQUEST["inputanpassword"]);
		$confirmpass = md5($_REQUEST["inputanconfirmpass"]);
		$notlpcust = $_REQUEST["inputannotlp"];
		$provinsicust = $_REQUEST["inputanprovinsi"];
		$kotacust = $_REQUEST["inputankota"];
		$kelurahancust = $_REQUEST["inputankelurahan"];
		$alamatcust = $_REQUEST["inputanalamat"];
		$kodeposcust = $_REQUEST["inputankodepos"];
		
		if ($password == $confirmpass) {
		mysqli_query($connection, "INSERT INTO customer VALUES ('$idcust','$namacust', '$emailcust', '$password', '$notlpcust', '$provinsicust', '$kotacust', '$kelurahancust' , '$alamatcust' , '$kodeposcust')");
		header('location:login.php');
		}
		else {
		  $message = "Konfirmasi Password Salah.\\nCoba lagi.";
		 echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
  
  
  
?>

<html lang="en">
  <head>
    <title>Yatta Corporation | Register </title>
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
            <li><a href="register.php">Products</a></li>
            <li><a href="newarrival.php">New Arrivals</a></li>

            <li class="has-children">
              <a href="register.php">Contact Us</a>
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


          <!-- Forms Section-->	
          <div class="col-md-8">
				<section class="forms">
			  <form method="POST" enctype="multipart/form-data">
				 <div class="container-fluid">




					  <div class="form-group row">
						<label for="id_cust" class="col-sm-3 col-form-label">Username</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="id_cust" name="inputanid" placeholder="Inputkan Username" required="">
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="namacust" class="col-sm-3 col-form-label">Nama Customer</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="nama_cust" name="inputannama" placeholder="Inputkan Nama Customer" required="">
						</div>
					  </div>

					  <div class="form-group row">
						<label for="emailcust" class="col-sm-3 col-form-label">E-mail</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="email_cust" name="inputanemail" placeholder="Inputkan E-mail Customer" required="">
						</div>
					  </div>
					  
					<!-- Password input-->
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label" for="password">Password</label>
					  <div class="col-sm-6">
						<input id="password" name="inputanpassword" type="password" placeholder="" class="form-control input-md" required="">
					  </div>
					</div>

					  <div class="form-group row">
						<label class="col-sm-3 col-form-label" for="confirmpass">Confirm Password</label>
						<div class="col-sm-6">
						<input id="confirmpass" name="inputanconfirmpass" type="password" placeholder="" class="form-control input-md" required="">
						</div>
					  </div>

					  <div class="form-group row">
						<label for="notlpcust" class="col-sm-3 col-form-label">Nomor Telepon</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="notlp_cust" name="inputannotlp" placeholder="Inputkan Nomor Telepon" required="">
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="provinsi_cust" class="col-sm-3 col-form-label">Provinsi</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="provinsi_cust" name="inputanprovinsi" placeholder="Inputkan Provinsi" required="">
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="kota_cust" class="col-sm-3 col-form-label">Kota</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="kota_cust" name="inputankota" placeholder="Inputkan Kota" required="">
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="kelurahan_cust" class="col-sm-3 col-form-label">Kelurahan</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="kelurahan_cus" name="inputankelurahan" placeholder="Inputkan Kelurahan" required="">
						</div>
					  </div>

					  <div class="form-group row">
						<label for="alamat_cust" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="alamat_cust" name="inputanalamat" placeholder="Inputkan Alamat" required="">
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="kodepos_cust" class="col-sm-3 col-form-label">Kode Pos</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="kode_pos" name="inputankodepos" placeholder="Inputkan Kode Pos" required="">
						</div>
					  </div>

					  

					  <div class="form-group row">
					  <div class="col-sm-3">
					  </div>
					  <div class="col-sm-9">
						<input type="submit" class="btn btn-primary" value="Submit" name="Simpan">
						<a href="customer.php" style="margin-left: 10px; text-decoration: none; color: #0f2c7d">Cancel</a>
					  </div>
					  </div>
					  
				</div>
			</form> 

		  </section>
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