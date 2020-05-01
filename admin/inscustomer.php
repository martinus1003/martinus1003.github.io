 <?php 

  include "includes/config.php";

  ob_start();
  session_start();
  if(!isset($_SESSION['admin_id'])) {
    header("location:login.php");
  }
  
  
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
		header('location:customer.php');
		}
		else {
		  $message = "Konfirmasi Password Salah.\\nCoba lagi.";
		 echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}

		
		
	

  ?>


<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yatta Corporation | Tambah Customer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <?php include "includes/sidebar.php" ?>

    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span></span><strong class="text-primary">Yatta Corporation</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
 
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
	  
	  <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Data Customer </li>
            <li class="breadcrumb-item active">Customer </li>
			<li class="breadcrumb-item active">Tambah Customer </li>
          </ul>
        </div>
      </div>

          <!-- Forms Section-->
          
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
						<input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
						<a href="customer.php" style="margin-left: 10px; text-decoration: none; color: #0f2c7d">Cancel</a>
					  </div>
					  </div>
					  
				</div>
			</form> 

		  </section>



      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Yatta Corp &copy; <?php echo date('Y')?></p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>

    <?php
mysqli_close($connection);
ob_end_flush();
?>