<?php 

  include "includes/config.php";

	$queryproduk = mysqli_query($connection, "SELECT DISTINCT p.id_produk, p.nm_produk, p.detil_produk, m.nama_img
FROM produk p JOIN img_produk m ON (p.id_produk = m.id_produk)
GROUP BY p.id_produk" );
	
	$row = mysqli_fetch_array($queryproduk);

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">




  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">

      <!-- Featured Project Row -->
	  <?php if(mysqli_num_rows($queryproduk) > 0) { ?>
                <?php while($row = mysqli_fetch_array($queryproduk)) { ?>
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
		          <figure class="block-4-image">
					<img src="images/baju/<?php echo $row["nama_img"]?>" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4><?php echo $row["nm_produk"]?></h4>
            <p class="text-black-50 mb-0"><?php echo $row["detil_produk"]?></p>
          </div>
        </div>
      </div>
	  
				<?php } ?>
	  <?php } ?>



    </div>
  </section>






  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>

</body>

</html>
