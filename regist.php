<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
?>
<head>
<script type="text/javascript">
function checkLetter(theform)
{
		pola_nama=/^[a-zA-Z .]*$/;
		if (!pola_nama.test(theform.fullname.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama!');
		theform.fullname.focus();
		return false;
		}
		
		if(theform.pass.value!= thform.conf.value)
		{
			alert("New Password and Confirm Password Field do not match!");
			theform.conf.focus();
			return false;
		}
		return (true);
}
 
</script>

<script type="text/javascript">
	function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_availability.php",
		data:'emailid='+$("#emailid").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	}
</script>

</head>
<body>
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<div class="row_wrapper" style="padding-bottom: 30px;"> 
            <h3>Daftar Sekarang</h3><br>
             <p>Daftar akun anda sekarang di Lia Wedding.<br>Dengan mendaftar gratis, anda mulai dapat melakukan pemesanan secara aman dan terpercaya</p>
            <span class="divider_index"></span>
            <span class="divider_index"></span>
            <span class="divider_index"></span>
        </div>
<section class="user_profile inner_pages">
  <div class="container">
      <div class="user_profile_info">
		<div class="col-md-12 col-sm-10">
              <form  method="post" name="theform" action="registact.php" id="theform" onSubmit="return checkLetter(this);" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required="required">
                </div>
                <div class="form-group">
                  <input type="tel" class="form-control" name="mobileno" placeholder="Nomer Telepon" minlength="10" maxlength="15" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Alamat Email" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="conf" name="conf" placeholder="Konfirmasi Password" required="required">
                </div>
                <div class="form-group">
    				* Dengan klik Sign Up, Anda telah menyetujui <a href="#">Syarat dan Ketentuan yang berlaku</a>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up"class="btn btn-block">
                </div>
              </form>
			<div class="modal-footer text-center">
			<p>Sudah punya akun? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Disini</a></p>
			</div>

     </div>
	</div>
</div>
</section>

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