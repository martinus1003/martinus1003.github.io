<?php 

  include "includes/config.php" ;

          ob_start();
  session_start();
  if(!isset($_SESSION['admin_id'])) {
    header("location:login.php");
  }

  $query = mysqli_query($connection, "SELECT p.no_pemesanan, p.tgl_pemesanan, k.nm_kurir, b.nm_bank, mtd.jns_mtd_bayar
FROM pemesanan p JOIN kurir k ON (p.kd_kurir = k.kd_kurir)
JOIN bank b ON (b.kd_bank = p.kd_bank)
JOIN metode_bayar mtd ON (mtd.kd_mtd_bayar = p.kd_mtd_bayar)");


   if(isset($_GET['Search'])){
  $Search = $_GET['Search'];
  
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yatta Corporation | Pemesanan</title>
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
            <li class="breadcrumb-item">Data Customer </li>
            <li class="breadcrumb-item active">Pemesanan </li>
          </ul>
        </div>
      </div>

            <section>
        <div class="container-fluid">

          <!-- Page Header-->

             <div class="row">
          
           <button type="button" class="btn btn-info" style="margin-bottom: 16px; margin-left: 15px; margin-top: 20px" onclick="window.location.href='inspemesanan.php'"><b>+</b> Tambah Pemesanan</button>
           
           <div class="col-sm-6" style="margin-top: 20px">
            <form method="get" action="pemesanan.php" class="form-inline" >
           <input type="text"  class="form-control" id="nocontainer" name="Search" placeholder="Search...">
           <input type="submit" class="btn btn-primary" value="Search" style="margin-left: 10px; ">
           <button type="button" class="btn btn-info" style="margin-left: 10px" onclick="window.location.href='pemesanan.php'"> Reset Pencarian</button>
             
         </form>
           </div>
            </div>

          <div class="row">
            
           
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tabel Pemesanan</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No Pemesanan</th>
                          <th>Tgl Pemesanan</th>
                          <th>Nama Kurir</th>
                          <th>Nama Bank</th>
                          <th>Metode Bayar</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php if(mysqli_num_rows($query) > 0)  { ?>
                                <?php 
                                if(isset($_GET['Search'])){
                                    $Search = $_GET['Search'];
                                    $query = mysqli_query($connection,"SELECT p.no_pemesanan, p.tgl_pemesanan, k.nm_kurir, b.nm_bank, mtd.jns_mtd_bayar
                                      FROM pemesanan p JOIN kurir k ON (p.kd_kurir = k.kd_kurir)
                                      JOIN bank b ON (b.kd_bank = p.kd_bank)
                                      JOIN metode_bayar mtd ON (mtd.kd_mtd_bayar = p.kd_mtd_bayar) where p.no_pemesanan like '%$Search%' 
                                      or p.tgl_pemesanan like '%$Search%' or k.nm_kurir like '%$Search%' or b.nm_bank like '%$Search%' or mtd.jns_mtd_bayar like '%$Search%'
                                      ");        
                                  }else{
                                    $query = mysqli_query($connection,"SELECT p.no_pemesanan, p.tgl_pemesanan, k.nm_kurir, b.nm_bank, mtd.jns_mtd_bayar
                                    FROM pemesanan p JOIN kurir k ON (p.kd_kurir = k.kd_kurir)
                                    JOIN bank b ON (b.kd_bank = p.kd_bank)
                                    JOIN metode_bayar mtd ON (mtd.kd_mtd_bayar = p.kd_mtd_bayar)");    
                                  }

                                $nomor = 1;
                                 while($row = mysqli_fetch_array($query)) { ?>

                        <tr>
                          <th scope="row"><?php echo $nomor; ?></th>
                          <td><?php echo $row["no_pemesanan"]?></td>
                          <td><?php echo $row["tgl_pemesanan"]?></td>
                          <td><?php echo $row["nm_kurir"]?></td>
                          <td><?php echo $row["nm_bank"]?></td>
                          <td><?php echo $row["jns_mtd_bayar"]?></td>
                          <td>
								<a href="detilpemesanan.php?nopemesanan=<?php echo $row['no_pemesanan']?>"> Detil </a> |
                                <a href="updatedeletepemesanan.php?nopemesanan=<?php echo $row['no_pemesanan']?>"> Update </a> |
                                <a href="updatedeletepemesanan.php?nopemesananhapus=<?php echo $row['no_pemesanan']?>" onclick="return confirm ('Jika Anda menghapus Data ini, maka semua Data di tabel lain yang terhubung dengan Data ini akan ikut terhapus. Apakah Anda Yakin?')"> Delete </a>
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