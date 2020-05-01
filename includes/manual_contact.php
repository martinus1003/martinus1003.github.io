<?php 
	include "includes/config.php"; 
	
	
		if(isset($_POST['Send'])) {
		$contactid = $_REQUEST["inputancontactid"];
		$fname = $_REQUEST["inputanfname"];
		$lname = $_REQUEST["inputanlname"];
		$email = $_REQUEST["inputanemail"];
		$kdpelayanan = $_REQUEST["inputankdpel"];
		$message = $_REQUEST["inputanmessage"];
		
		mysqli_query($connection, "INSERT INTO contact_us VALUES ('', '$fname', '$lname', '$email', '$kdpelayanan', '$message')");


		header("location:kontak.php");
	}	
	

  $query2 = mysqli_query($connection, "SELECT * FROM pelayanan");
	
	
	
	
	
?>

    
	
	
	<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Contact Us</h2>
          </div>
          <div class="col-md-7">

            <form action="kontak.php" method="POST"  enctype="multipart/form-data">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="inputanfname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="inputanlname">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="inputanemail" placeholder="">
                  </div>
                </div>
				


             <div class="form-group row">
              <label for="category" class="col-sm-3 text-black">Subject <span class="text-danger">*</span></label>
              <div class="col-md-12">
              <select name="inputankdpel" class="form-control" id="inputsubject" onchange="price()">
                <option value="NULL">Subject</option>
                <?php if (mysqli_num_rows($query2) > 0) {?>
                <?php while($row = mysqli_fetch_array($query2)) {?>
                  <option value="<?php echo $row["kd_pelayanan"]?>">
                  <?php echo $row["jenis_pelayanan"];?>
                  </option>
                <?php }?>
                <?php }?>
              </select>
              </div>
            </div>



                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="inputanmessage" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
				
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send" name="Send">
                  </div>
                </div>
              </div>
            </form>
          </div>


          </div>
        </div>
      </div>
    </div>