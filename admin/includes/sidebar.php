 <?php 

  include "includes/config.php";



  ?>

    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $_SESSION['admin_name'] ?></h2><span>Web Developer</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">   
		  
            <li><a href="index.php"> <i class="icon-home"></i>Home</a></li>
            <li><a href="#dropdownproduk" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Data Produk</a>
              <ul id="dropdownproduk" class="collapse list-unstyled ">
                <li><a href="produk.php">Produk</a></li>
                <li><a href="gambar.php">Gambar Produk</a></li>
                <li><a href="jenis.php">Jenis</a></li>
                <li><a href="kategori.php">Kategori</a></li>
        				<li><a href="spesifikasi.php">Spesifikasi</a></li>
        				<li><a href="warna.php">Warna</a></li>
              </ul>
            </li>

            <li><a href="#dropdowncustomer" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-cart"></i>Data Customer</a>
              <ul id="dropdowncustomer" class="collapse list-unstyled ">
                <li><a href="customer.php">Customer</a></li>
                <li><a href="pemesanan.php">Pemesanan</a></li>
                <li><a href="metode_bayar.php">Metode Bayar</a></li>
        				<li><a href="bank.php">Bank</a></li>
        				<li><a href="kurir.php">Kurir</a></li>
        				<li><a href="pelayanan.php">Pelayanan</a></li>				
              </ul>
            </li>

          </ul>
        </div>

      </div>
    </nav>