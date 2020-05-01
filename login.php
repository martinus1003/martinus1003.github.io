<?php 
  
  include "includes/config.php";
  
  ob_start();
  session_start();
  if(isset($_SESSION['cust_id'])) {
    header("location:home.php");
  }
  
  if(isset($_POST['submit'])) {
    $username = $_POST['loginUsername'];
    $namapassword = md5($_POST['loginPassword']);
    $sql_login = mysqli_query($connection, "SELECT * FROM customer WHERE cust_id = '$username' AND password = '$namapassword'");
  
  
    if(mysqli_num_rows($sql_login) > 0) {
      $row_admin = mysqli_fetch_assoc($sql_login);
      $_SESSION['cust_id'] = $row_admin["cust_id"];
      $_SESSION['cust_name'] = $row_admin["nama_cust"];
      $_SESSION['email'] = $row_admin["email"];
      $_SESSION['no_telp'] = $row_admin["no_tlp"];
      $_SESSION['provinsi'] = $row_admin["provinsi"];
      $_SESSION['kota'] = $row_admin["kota"];
      $_SESSION['kelurahan'] = $row_admin["kelurahan"];
      $_SESSION['alamat'] = $row_admin["alamat"];
      $_SESSION['kodepos'] = $row_admin["kode_pos"];
      header("location:home.php");
    }

    
  else {
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
  }

  ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Yatta Corporation | Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
              <div class="site-logo">
                <img src="images/yattalogo.png" style="width: 100%">
              </div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="loginUsername">User Name</label>
									<input id="loginUsername" type="username" class="form-control" name="loginUsername" value="" required autofocus>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="form-group">
									<input id="password" type="password" class="form-control" name="loginPassword" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" href="index.php" name="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2019 &mdash; Yatta Corporation
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
