<?php 
  
  include "includes/config.php";
  
  ob_start();
  session_start();
  if(isset($_SESSION['admin_id'])) {
    header("location:index.php");
  }
  
  if(isset($_POST['submit'])) {
    $username = $_POST['loginUsername'];
    $namapassword = ($_POST['loginPassword']);
    $sql_login = mysqli_query($connection, "SELECT * FROM admin WHERE id_admin = '$username' AND pass_admin = '$namapassword'");
  
  
    if(mysqli_num_rows($sql_login) > 0) {
      $row_admin = mysqli_fetch_assoc($sql_login);
      $_SESSION['admin_id'] = $row_admin["id_admin"];
      $_SESSION['admin_name'] = $row_admin["nama_admin"];
      header("location:index.php");
    }

    
  else {
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
  }

  ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="css/csslogin.css" rel="stylesheet">

<div class="sidenav">
         <div class="login-main-text">
            <h2>Yatta Corporation<br>Application Login Page</h2>
            <p>Login from here to access Dashboard Admin.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form class="form-signin" method="post" action="login.php" class="form-validate">
                  <div class="form-group">
                     <label for="loginUsername">User Name</label>
                     <input type="username" id="loginUsername" name="loginUsername" class="form-control" placeholder="Username" required autofocus>
                  </div>

                  <div class="form-group">
                     <label for="loginPassword">Password</label>
                     <input type="password" name="loginPassword" id="loginPassword" class="form-control" placeholder="Password" required>
                  </div>
                  <button id="login" type="submit" href="index.php" name="submit" class="btn btn-black">Login</button>
				  
				  
               </form>
            </div>
         </div>
      </div>

<?php
mysqli_close($connection);
ob_end_flush();
?>

