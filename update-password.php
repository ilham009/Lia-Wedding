<?php
session_start();
error_reporting(0);

include('includes/config.php');
include('includes/bootstrap.php');

if(strlen($_SESSION['ulogin'])==0)
  { 
    header('location:index.php');
  }
  else
  {
?>

<body>
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!-- /Page Header--> 
<div class="row_wrapper" style="padding-bottom: 30px;"> 
            <h3>Edit Password</h3><br>
             <p>Jika ada pertanyaan, silahkan isi form dibawah ini. Kami akan segera menghubungi anda.</p>
            <span class="divider_index"></span>
            <span class="divider_index"></span>
            <span class="divider_index"></span>
        </div>

<section class="user_profile inner_pages">
  <div class="container">
	<div class="user_profile_info">
		<div class="col-md-12 col-sm-10">
      <h6><a href="profile.php"><i class="fa fa-caret-left" aria-hidden="true"></i> Kembali</a></h6>
        <?php
			$mail=$_SESSION['ulogin'];
		?>
          <form  method="post" action="update-passwordact.php">
            <div class="form-group">
              <label class="control-label">Password Sekarang</label>
			        <input class="form-control white_bg" name="mail" id="mail" type="hidden" value="<?php echo $mail;?>"required>
              <input class="form-control white_bg" name="pass" id="pass" type="password"required>
            </div>
            <div class="form-group">
              <label class="control-label">Password Baru</label>
              <input class="form-control white_bg" name="new" id="new" type="password"required>
            </div>
            <div class="form-group">
              <label class="control-label">Konfirmasi Password</label>
              <input class="form-control white_bg" name="confirm" id="confirm" type="password"required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn">Update Password</button>
            </div>
          </form>
		 </div>
	</div>
</div>
</section>
<!--/Profile-setting--> 

<<!--Footer -->
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
<?php } ?>