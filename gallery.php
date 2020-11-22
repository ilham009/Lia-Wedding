<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
?>

<body>

        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<div class="row_wrapper" style="padding-bottom: 30px;"> 
  <h3>Gallery Foto</h3><br>
  <p>Dibawah ini adalah beberapa gallery foto dokumentasi dari para pelanggan kami</p>
  <span class="divider_index"></span>
  <span class="divider_index"></span>
  <span class="divider_index"></span>
</div>
<!-- /Page Header--> 

<!--Contact-us-->


<section class="section-padding">
  <div class="container">
    <div class="row">
       
    </div>
  </div>
</section>
<!-- /Contact-us--> 


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

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
