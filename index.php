<?php 
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
include('includes/format_rupiah.php');
include('includes/alert.php');

?>
<body>
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header -->



<!-- Banners -->
<section class="banner-section" >
  <div class="banner-section-row">
    <div class="banner_content">
      <h1>Lia Wedding</h1>
      <p>ORGANIZER</p>

      <?php
        if(strlen($_SESSION['ulogin'])==0)
          {  
            ?>
              <div><a class="a_login" href="regist.php">JOIN NOW</a></div>
            <?php
          }
          else
            {
              ?> 
                <li class='user_login' >
                  <a class = 'echo_a' href='profile.php'> Hallo,
              <?php
            }
              ?>
                <?php 
                  $email=$_SESSION["ulogin"];
                  $sql ="SELECT nama_user FROM member WHERE email='$email'";
                  $query = mysqli_query($koneksidb,$sql);

                  if(mysqli_num_rows($query)>0)
                    {
                      while($results = mysqli_fetch_array($query))
                        {
                          echo htmlentities($results['nama_user']);
                          ?>
                            <i class="fa fa-cog"></i>
                          <?php 
               
                        }
                    }
                ?>
                  </a>
                </li>
              
      </div>
  </div>
</section>
<!-- /Banners --> 

<!-- Resent Cat--> 

<section class="index-section-padding">
  <div class="container">
    <div class="row_wrapper"> 
      <h6>Prioritas pelayanan</h6><br>
      <p>Lia Wedding menawarkan berbagai produk wedding organizer yang dapat anda pilih sesuai kebutuhan.<br>Kami melayani anda dengan segenap hati dan kepuasan pelanggan adalah nomor satu</p><br>
      <span class="divider_index"></span>
      <span class="divider_index"></span>
      <span class="divider_index"></span>
    </div>
  </div><br>
    <div class="img_row"> 
      <div class="img_column">
        <img src="assets/css/images/section_padding/1.jpg" style="width:100%">
        <img src="assets/css/images/section_padding/2.jpg" style="width:100%">
      </div>
            <div class="img_column">
        <img src="assets/css/images/section_padding/3.jpg" style="width:100%">
        <img src="assets/css/images/section_padding/4.jpg" style="width:100%">
      </div>
      <div class="img_column">
        <img src="assets/css/images/section_padding/5.jpg" style="width:100%">
        <img src="assets/css/images/section_padding/6.jpg" style="width:100%">
      </div>
    </div>
  </div>
  <div class="row_gallery">
  <a href="gallery.php"><button class="btn">GALLERY</button></a>
</div>
</section>
<!-- /Resent Cat --> 



<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 


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