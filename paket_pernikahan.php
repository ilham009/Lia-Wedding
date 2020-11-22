<?php 
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
include('includes/format_rupiah.php');
?>

<body>



<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<div class="row_wrapper"> 
  <h3>Pilih Paket Anda</h3><br>
  <p>Di bawah ini adalah daftar paket yang dapat Anda pilih. Anda tidak harus memilih paket yang ada, pilihlah sesuai kebutuhan.<br>** Klik ikon info &nbsp;<i class="fa fa-info-circle"></i> &nbsp;untuk melihat detail paket **</p><br>
  <span class="divider_index"></span>
  <span class="divider_index"></span>
  <span class="divider_index"></span>
</div>

<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <form class="form cf" action="post.php" method="post" name="form1" id="form1">
      <hr>
      <section class="plan cf">
        <div class="row_wrapper"> 
          <h5><i class="fa fa-sticky-note-o"></i>&nbsp;Nama Acara</h5>
          <div class="calendar">
            <input class="form-control" style="display: block; background: #fbfbfb" type="text" id="nama_acara" name="nama_acara" placeholder="Ex : Pernikahan Ana & Bayu" required>
          </div>
        </div>
      </section>
      <hr>
      <section class="plan cf">
        <div class="row_wrapper"> 
          <h5><i class="fa fa-calendar"></i>&nbsp;Tanggal & Waktu Acara</h5>
          <div class="calendar">
            <input class="form-control" style="display: block; background: #fbfbfb" type="datetime-local" id="tgl_acara" name="tgl_acara" required>
          </div>
        </div>
      </section>
      <hr>
      <section class="plan cf">
        <div class="row_wrapper"> 
        <h5><i class="fa fa-camera"></i>&nbsp;Fotografi Dan Videografi</h5>
      </div>

          <?php 
                $sql1="SELECT * FROM item WHERE id_jenis = 1 ORDER BY harga ASC";
                $query1 = mysqli_query($koneksidb,$sql1); 
                $id='id_item';
                $nama='nama_item';
                $harga='harga';
                $deskripsi='deskripsi';
                if(mysqli_num_rows($query1)>0)
                    {
                      while($result1 = mysqli_fetch_array($query1))
                          { 
                            ?>

                              <input type="radio" name="item1" id="<?php echo htmlentities($result1[$nama]);?>" value="<?php echo htmlentities($result1[$id]);?>" required>
                              <label class="free-label four col" for="<?php echo htmlentities($result1[$nama]);?>">
                                <?php
                                  echo"
                                    <div>
                                      $result1[$nama]
                                  ";
                                ?>
                                    </div><br>
                                    <p style = "font-size: 17px;"><?php echo htmlentities(format_rupiah($result1["harga"]));?><br>
                                <?php
                                  echo"
                                    <i class='fa fa-info' data-toggle='modal' data-target='#$result1[$id]'></i></p>
                                    ";
                                ?>
                                     
                                
                              </label>

                              <?php
                                echo "
                                  <div class='modal fade' id='$result1[$id]'>
                                    <div class='modal-dialog' style='width: 900px'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <a href=''><i class='login_close fa fa-times' data-dismiss='modal'></i></a>
                                          <h4 class='modal-title'>$result1[$nama]</h4>
                                        </div>
                                        <div class='modal-body'>
                                          <p class='item_detail'>$result1[$deskripsi]
                                        </div>
                                        <hr>
                                  ";
                                ?>
                                        <div class='modal-footer'>
                                          <h5><?php echo htmlentities(format_rupiah($result1["harga"]));?></h5>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>
                                
                              
                              
                            <?php
                          }
                    }

              ?> 

      </section>
      <hr>
      <section class="plan cf">
        <div class="row_wrapper"> 
        <h5><i class='fa fa-envira'></i>&nbsp;Dekorasi</h5>
      </div>

          <?php 
                $sql2="SELECT * FROM item WHERE id_jenis = 2 ORDER BY harga ASC";
                $query2 = mysqli_query($koneksidb,$sql2); 
                if(mysqli_num_rows($query2)>0)
                    {
                      while($result2 = mysqli_fetch_array($query2))
                          { 
                            ?>

                              <input type="radio" name="item2" id="<?php echo htmlentities($result2[$nama]);?>" value="<?php echo htmlentities($result2[$id]);?>" required>
                              <label class="free-label four col" for="<?php echo htmlentities($result2[$nama]);?>">
                                <?php
                                  echo"
                                    <div>
                                      $result2[$nama]
                                  ";
                                ?>
                                    </div><br>
                                    <p style = "font-size: 17px;"><?php echo htmlentities(format_rupiah($result2["harga"]));?><br>
                                <?php
                                  echo"
                                    <i class='fa fa-info' data-toggle='modal' data-target='#$result2[$id]'></i></p>
                                    ";
                                ?>
                                     
                                
                              </label>

                              <?php
                                echo "
                                  <div class='modal fade' id='$result2[$id]'>
                                    <div class='modal-dialog' style='width: 900px'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <a href=''><i class='login_close fa fa-times' data-dismiss='modal'></i></a>
                                          <h4 class='modal-title'>$result2[$nama]</h4>
                                        </div>
                                        <div class='modal-body'>
                                          <p class='item_detail'>$result2[$deskripsi]
                                        </div>
                                        <hr>
                                  ";
                                ?>
                                        <div class='modal-footer'>
                                          <h5><?php echo htmlentities(format_rupiah($result2["harga"]));?></h5>
                                        </div> 
                                      </div>
                                    </div>
                                  </div>
                                
                              
                              
                            <?php
                          }
                    }

              ?>
      </section>
      <hr>
      <div class="col-md-6">
        <button class="btn" type="submit" name="submit">Pembayaran</button>
      </div>
    </form> 
    </div>
  </div>
</section>
<!--/Listing-detail--> 



<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>


</body>
</html>
