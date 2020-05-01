<!DOCTYPE html>

<?php 
	include "includes/config.php"; 
  ob_start();
  session_start();

        if(!isset($_SESSION['cust_id'])) {
    header("location:login.php");
  }
?>

<html lang="en">
  <head>
    <title>Yatta Corporation | About Us</title>
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
	<?php include "includes/navbar.php"; ?>
	
	<section style="background: url(images/aboutus.jpg)" class="py-5 bg-cover bg-center">
      <div class="hero-overlay"></div>
      <div class="container py-5 text-white text-center">
        <h1 class="text-shadow hero-heading"></h1>
        <p class="text-shadow lead my-4"><a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></a></p>
      </div>
    </section>
    <section class="py-5">
      <div class="container py-5">
        <h2 class="mb-4">About Yatta Corporation</h2>
        <p class="lead">Yatta Corp merupakan usaha yang di dirikan pada tahun 2016 yang bergerak dalam pembuatan  pakaian dengan Design yang original di mana design dari pakaian yang di buat Yatta Corp Mengusung tema FUTURISTIC yang di design dengan sangat baik untuk dapat bersaing di pasaran di mana penjual baju sudah sangat banyak sehinga untuk dapat bersaing suatu produk harus mampu menyediakan inovasi baru yang dapat menarik pelanggan .</p>
        <p class="lead">Visi:</p>
        <a>Menjadi toko baju online yang professional dan memiliki produk yang berkualitas serta mampu memberikan kesan puas dan nyaman di hati pelanggannya di tingkat Nasional untuk 5 tahun kedepan.</a>
		<p class="lead">Misi:</p>
		<p> •	Kepuasan pelanggan adalah tujuan utama kami</p>
		<p>	•	Menciptakan dan menggali peluang pasar yang potensial</p>
		<p>	•	Memacu kreativitas dan aktivitas dalam produksi dan penjualan yang dikelola oleh Yatta CORP</p>
		<p>	•	Mempermudah kalangan masyarakat yang mempunyai kesibukan dalam memenuhi kebutuhan sehari-harinya</p>
		<p>	•	Mampu menyediakan variasi pilihan baju yang selalu mengikuti trend masa kini</p>

      </div>
    </section>
	

	
	
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