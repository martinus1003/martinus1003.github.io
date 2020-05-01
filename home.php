<!DOCTYPE html>

<?php 
	include "includes/config.php"; 
ob_start();
  session_start();

  if(!isset($_SESSION['cust_id'])) {
    header("location:login.php");
  }

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
  
	<!--  menu navbar -->
  <marquee> Ada Naganya </marquee>
	<?php include "includes/navbar.php"; ?>
  <p style="text-align: center;"><a href="https://api.whatsapp.com/send?phone=+6287889102155&text=Saya%20ingin%20bertanya%20" target="_blank"> Click to WhatsApp Chat</a></p>
	
	<!--  home banner -->
	<?php include "includes/home_banner.php"; ?>
  <h3 style="text-align: center; background: #a7f3ee; color:black"> Kupon Pertama untuk Pengguna Baru! </h3>
  <h2 style="text-align: center; background: #a7f3ee; color: #7971ea"> <?php echo $fetch['id_kupon'] ?></h2>

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