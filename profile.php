<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');

if(strlen($_SESSION['ulogin'])==0){ 
header('location:index.php');
}else{
if(isset($_POST['updateprofile'])){
	$name=$_POST['fullname'];
	$mobileno=$_POST['mobilenumber'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$sql="UPDATE member SET nama_user='$name',telp='$mobileno',alamat='$address' WHERE email='$email'";
	$query = mysqli_query($koneksidb,$sql);
	if($query){
	$msg="Profile berhasi diupdate.";
	}else{
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);	}
}
?>

<head>
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
<script type="text/javascript">
function checkLetter(theform)
{
		pola_nama=/^[a-zA-Z .]*$/;
		if (!pola_nama.test(theform.fullname.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama!');
		theform.fullname.focus();
		return false;
		}
		return (true);
}
 
</script>

</head>
<body>

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<div class="row_wrapper" style="padding-bottom: 30px;"> 
            <h3>Edit Profile</h3><br>
              <p>Jika ada pertanyaan, silahkan isi form dibawah ini. Kami akan segera menghubungi anda.</p>
            <span class="divider_index"></span>
            <span class="divider_index"></span>
            <span class="divider_index"></span>
        </div>
<!-- /Page Header--> 


<?php 
$useremail=$_SESSION['ulogin'];
$sql = "SELECT * from member where email='$useremail'";
$query = mysqli_query($koneksidb,$sql);
while($result=mysqli_fetch_array($query)){
?>
<section class="user_profile inner_pages">
  <div class="container">
	<div class="user_profile_info">
	
		<div class="col-md-12 col-sm-10">
          <?php  
         if($msg){?><div class="succWrap"><strong>BERHASIL</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post" name="theform" onSubmit="return checkLetter(this);">
            <div class="form-group">
              <label class="control-label">Nama</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result['nama_user']);?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Alamat Email</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result['email']);?>" name="email" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Telepon</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result['telp']);?>" id="phone-number" type="number" min="0" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <a href="update-password.php"><input class="form-control grey_bg" value="Klik untuk mengganti password" readonly></a>
            </div>
            <div class="form-group">
              <label class="control-label">Alamat</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo htmlentities($result['alamat']);?></textarea>
            </div>

<?php } ?>
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Simpan</button>
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
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
<?php } ?>