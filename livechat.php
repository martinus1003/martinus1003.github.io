<?php 

  include "includes/config.php";
  ob_start();
  session_start();

        if(!isset($_SESSION['cust_id'])) {
    header("location:login.php");
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yatta Corporation | Live Chat</title>
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
	
  <div style="overflow:auto; width:30%; height:320px; margin-left:35%;margin-right:35%;">
  <table class="art-article" border="0" cellspacing="0" cellpadding="0" style=" margin: 0; width: 100%;">
    <tbody>
      <?php
      //*koneksi ke database*//
      $connection = mysqli_connect("localhost","root","", "projectyattacorp");
        if (!$connection){
          die ("mysqli E !<br>");
        }
        $namacust = $_SESSION['cust_name'];
      $Tampil="SELECT * FROM chat WHERE nama = '$namacust' OR nama = 'Administrator' ORDER BY waktu ASC LIMIT 99";
      $query = mysqli_query($connection, $Tampil);
      while ( $hasil = mysqli_fetch_array ($query)) {
        $komen = stripslashes ($hasil['komen']);
        $waktu = stripslashes ($hasil['waktu']);
        $nama = stripslashes ($hasil['nama']);  
      ?>  
      <style type="text/css">
        #atas {
          border-bottom-width: 1px;
          border-bottom-style: ridge;
          border-bottom-color: #CCC;
          margin-top: 1px;
          margin-right: 1px;
          margin-bottom: 2px;
          margin-left: 0px;
          padding-bottom: 1px;
          color: #7971ea;
        }
        #pesan {
          padding-right: 1px;
          padding-left: 0px;
          margin-bottom: 10px;
          color: #080808;
        }
        .waktu {
          float: right;
          color: #871214;
          font-family: Arial;
          font-size: 9px;
        }
      </style>
      <?php
      echo"
        <div id='atas'>$hasil[nama]<span class='waktu'>$hasil[waktu]</span></div>
        <div id='pesan'>$hasil[komen]</div>";
      }
      ?>
    </tbody>
  </table>  
</div><br>
<div style="width:30%; height:320px; margin-left:35%;margin-right:35%;">
  <form method="POST" name="chat" action="#" enctype="application/x-www-form-urlencoded">
    <p>Post your chat:</p><br>

    <p>Chat</p>
    <textarea placeholder=" Obrolan Anda" name="komen" rows="2" cols="40" maxlength="120" style="width: 95%;"></textarea><br><br>

    <input type="submit" name="submit" value="Send" class="art-button"></input>&nbsp;<input type="reset" name="reset" value="Clear" class="art-button"></input>
  <?php
    if (isset($_POST['submit'])) {
    $nama = $_SESSION['cust_name'];
    $komen  = $_POST['komen'];
    $waktu  = date ("Y-m-d, H:i a");
    if ($_POST['nama']=='Admin') { //validasi kata admin
  ?>
    <script language="JavaScript">
      alert('Anda bukan Admin !');
        document.location='index.php';
    </script>
  <?php
    mysqli_close($connection);
  }
    if (empty($_SESSION['cust_name']) || empty($_POST['komen'])) { //validasi data
  ?>
    <script language="JavaScript">
      alert('Data yang Anda masukan tidak lengkap !');
        document.location='livechat.php';
      </script>
  <?php
  }
  else {
    $input_chat = "INSERT INTO chat (nama, komen, waktu, send_to) VALUES ('$nama', '$komen', curtime(), 'Administrator')";
    $query_input =mysqli_query($connection, $input_chat);
    if ($query_input) {
  ?>
    <script language="JavaScript">
      document.location='livechat.php';
    </script>
  <?php
  }
  else{
    echo'Dbase E';
  }
  }
  }
  mysqli_close($connection);
  ?>
  </form>
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