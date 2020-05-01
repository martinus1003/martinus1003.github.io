<?php 

  include "includes/config.php" ;

          ob_start();
  session_start();
  if(!isset($_SESSION['admin_id'])) {
    header("location:login.php");
  }

  $query = mysqli_query($connection, "SELECT p.id_produk, p.nm_produk, k.nm_kategori, p.head_img FROM produk p JOIN kategori k ON (p.kd_kategori = k.kd_kategori)");


   if(isset($_GET['Search'])){
  $Search = $_GET['Search'];
  
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yatta Corporation | Produk</title>
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
                <li class="nav-item"><a href="login.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>.
	  
	        <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Data Produk </li>
            <li class="breadcrumb-item active">Produk </li>
          </ul>
        </div>
      </div>

            <section>
        <div class="container-fluid">

          <!-- Page Header-->

             <div class="row">
          
           <button type="button" class="btn btn-info" style="margin-bottom: 16px; margin-left: 15px; margin-top: 20px" onclick="window.location.href='insproduk.php'"><b>+</b> Tambah Produk</button>
           
           <div class="col-sm-6" style="margin-top: 20px">
            <form method="get" action="produk.php" class="form-inline" >
           <input type="text"  class="form-control" id="nocontainer" name="Search" placeholder="Search...">
           <input type="submit" class="btn btn-primary" value="Search" style="margin-left: 10px; ">
           <button type="button" class="btn btn-info" style="margin-left: 10px" onclick="window.location.href='produk.php'"> Reset Pencarian</button>
             
         </form>
           </div>
            </div>

          <div class="row">
            
           
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tabel Produk</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID Produk</th>
                          <th>Nama Produk</th>
                          <th>Detil Produk</th>
                          <th>Harga</th>
                          <th>Point</th>
                          <th>Nama Kategori</th>
                          <th>Gambar Utama</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php if(mysqli_num_rows($query) > 0)  { ?>
                                <?php 
                                if(isset($_GET['Search'])){
                                    $Search = $_GET['Search'];
                                    $query = mysqli_query($connection,"SELECT p.id_produk, p.nm_produk, k.nm_kategori, p.head_img, p.detil_produk, p.harga, p.point FROM produk p JOIN kategori k ON (p.kd_kategori = k.kd_kategori) where p.id_produk like '%$Search%' 
                                      or p.nm_produk like '%$Search%' or k.nm_kategori like '%$Search%'
                                      ");        
                                  }else{
                                    $query = mysqli_query($connection,"SELECT p.id_produk, p.nm_produk, k.nm_kategori, p.head_img, p.detil_produk, p.harga, p.point FROM produk p JOIN kategori k ON (p.kd_kategori = k.kd_kategori)");    
                                  }

                                $nomor = 1;
                                 while($row = mysqli_fetch_array($query)) { ?>

                        <tr>
                          <th scope="row"><?php echo $nomor; ?></th>
                          <td><?php echo $row["id_produk"]?></td>
                          <td><?php echo $row["nm_produk"]?></td>
                          <td><?php echo $row["detil_produk"]?></td>
                          <td><?php echo $row["harga"]?></td>
                          <td><?php echo $row["point"]?></td>
                          <td><?php echo $row["nm_kategori"]?></td>
                          <td>
                                <?php if($row['head_img']=="") { 
                                echo "<img src='img/noimage.png' width='90' />";
                                } 
                                else {?>
                                <img src="../images/baju/<?php echo $row['head_img'] ?>" width="100" class="img-responsive" />
                              <?php } ?>
                             </td>
                          <td>
                                <a href="updatedeleteproduk.php?idproduk=<?php echo $row['id_produk']?>"> Update </a> |
                                <a href="updatedeleteproduk.php?idprodukhapus=<?php echo $row['id_produk']?>" onclick="return confirm ('Jika Anda menghapus Data ini, maka semua Data di tabel lain yang terhubung dengan Data ini akan ikut terhapus. Apakah Anda Yakin?')"> Delete </a>
                              </td>
                        </tr>

                                <?php $nomor++; } ?>
                               <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
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