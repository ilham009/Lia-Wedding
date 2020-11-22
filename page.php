<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
?>

<body>
        
<!--Header-->
<?php include('includes/header.php');?>
<?php 
$pagetype=$_GET['type'];
$sql = "SELECT * from tblpages where type='$pagetype'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>=1){
while($results = mysqli_fetch_array($query))
{ ?>
<section class="page-header aboutus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1><?php   echo htmlentities($results['PageName']); ?></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li><?php   echo htmlentities($results['PageName']); ?></li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2><?php   echo htmlentities($results['PageName']); ?></h2>
      <p><?php  echo $results['detail']; ?> </p>
    </div>
   <?php } }?>
  </div>
</section>
<!-- /About-us--> 

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