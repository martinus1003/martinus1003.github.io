 <?php 

  include "includes/config.php";

  ob_start();
  session_start();
  if(!isset($_SESSION['admin_id'])) {
    header("location:login.php");
  }
  
  
	if(isset($_POST['Simpan'])) {
		$noproduk = $_POST['editnoproduk'];
		$namaproduk = $_POST['editnamaproduk'];
		$kdkategori = $_POST['editkategori'];
    $detilproduk = $_POST['editdetil'];
    $harga = $_POST['editharga'];
    $point = $_POST['point'];
    $kdkategori = $_POST['editkategori'];

    $fotonama = $_FILES["gambar"]['name'];
    $file_tmp = $_FILES["gambar"]['tmp_name'];

    $foto = mysqli_query($connection, "SELECT head_img FROM produk WHERE id_produk = '$noproduk'");
    $fotof = mysqli_fetch_array($foto);
    $fotorow = $fotof['head_img'];

    if (!empty($fotonama)) {
      move_uploaded_file($file_tmp, '../images/baju/' . $fotonama);
      mysqli_query($connection, "UPDATE produk SET nm_produk = '$namaproduk' , kd_kategori = '$kdkategori', detil_produk = '$detilproduk', harga = '$harga', head_img='$fotonama' WHERE id_produk = '$noproduk'");
    header("location:produk.php");
    }
    else {
      mysqli_query($connection, "UPDATE produk SET nm_produk = '$namaproduk' , kd_kategori = '$kdkategori', detil_produk = '$detilproduk', harga = '$harga', head_img = '$fotorow' WHERE id_produk = '$noproduk'");
      header("location:produk.php");
      
    }

		
	}	
   else if (isset($_GET["idprodukhapus"])) {
    $noproduk = $_GET["idprodukhapus"];
    mysqli_query($connection, "DELETE FROM produk WHERE id_produk = '$noproduk'");
    header("location:produk.php");
  }
	
  $noproduk = $_GET["idproduk"];
  $edit = mysqli_query($connection, "SELECT * FROM produk WHERE id_produk = '$noproduk'");
  $row_edit = mysqli_fetch_array($edit);

  $query2 = mysqli_query($connection, "SELECT * FROM kategori");


  ?>


<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yatta Corporation </title>
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
            <li class="breadcrumb-item">Data Produk </li>
            <li class="breadcrumb-item active">Produk </li>
			<li class="breadcrumb-item active">Edit Produk </li>
          </ul>
        </div>
      </div>

          <!-- Forms Section-->
          
			<section class="forms">
				  <form method="POST" enctype="multipart/form-data">
				  <div class="container-fluid">




					  <div class="form-group row">
            <label for="namaproduk" class="col-sm-3 col-form-label">Nama Produk</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="namaproduk" name="editnamaproduk" value="<?php echo $row_edit["nm_produk"]?>">
            </div>
            </div>

            <div class="form-group row">
            <label for="detil_produk" class="col-sm-3 col-form-label">Detil Produk</label>
            <div class="col-sm-6">
              <textarea class="form-control" id="detil_produk" name="editdetil" cols="40" rows="5"><?php echo $row_edit["detil_produk"] ?></textarea>
            </div>
            </div>

             <div class="form-group row">
            <label for="harga" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="harga" name="editharga" value="<?php echo $row_edit["harga"]?>">
            </div>
            </div>

            <div class="form-group row">
            <label for="point" class="col-sm-3 col-form-label">Point</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="point" name="editpoint" value="<?php echo $row_edit["point"]?>">
            </div>
            </div>
			
					  
             <div class="form-group row">
              <label for="category" class="col-sm-3 col-form-label">Kategori</label>
              <div class="col-sm-6">
              <select name="editkategori" class="form-control">
                <option value="<?php echo $row_edit["kd_kategori"]?>">Kategori</option>
                <?php if (mysqli_num_rows($query2) > 0) {?>
                <?php while($row = mysqli_fetch_array($query2)) {?>
                  <option>
                  <?php echo $row["kd_kategori"] . ' ' . $row['nm_kategori'];?>
                  </option>
                <?php }?>
                <?php }?>
              </select>
              </div>
            </div>

            Nama Foto: <?php echo $row_edit["head_img"] ?><br>
            Foto Produk: <input type="file" name="gambar"><br>
              <img src="../images/baju/<?php echo $row_edit['head_img'] ?>" style="width: 90px; height: 90px;"><br>


            

					   <div class="form-group row">
					  <div class="col-sm-3">
					  </div>
					  <div class="col-sm-9">
						<input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
						<a href="produk.php" style="margin-left: 10px; text-decoration: none; color: #0f2c7d">Cancel</a>
            <input type="hidden" name="editnoproduk" value="<?php echo $row_edit["id_produk"]?>">
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