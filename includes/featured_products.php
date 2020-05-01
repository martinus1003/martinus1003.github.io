<?php 
  
  include "includes/config.php";

  $queryfeatured = mysqli_query($connection, "SELECT DISTINCT * FROM produk p JOIN img_produk m ON (p.id_produk = m.id_produk)");

 ?>

<div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

              <?php if(mysqli_num_rows($queryfeatured) > 0) { ?>
                <?php while($row = mysqli_fetch_array($queryfeatured)) { $hargaf=number_format($row["harga"],0,",",".")?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/baju/<?php echo $row["nama_img"] ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#"><?php echo $row["nm_produk"] ?></a></h3>
               
                    <p class="text-primary font-weight-bold"><?php echo $hargaf ?></p>
                  </div>
                </div>
              </div>
                      <?php } ?>
                <?php } ?>
              

            </div>
          </div>
        </div>
      </div>
    </div>