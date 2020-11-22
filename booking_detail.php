<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
?>

<body>
   
<!--Header-->
<?php include('includes/header.php');?>

<?php 
$kode=$_GET['kode'];
 
$sql1 	= "SELECT * FROM booking WHERE id_booking='$kode'";

$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);

$sqlrek = "SELECT * FROM admin";
$queryrek = mysqli_query($koneksidb,$sqlrek);
$resultrek = mysqli_fetch_array($queryrek)
?>

<?php
	if($result['status']=="Menunggu Pembayaran")
		{
			?>
				<div class="row_wrapper"> 
  					<h3>Upload Bukti Pembayaran</h3><br>
  					  <p>Silahkan transfer total biaya sebesar  ke <?php echo $resultrek['norek'];?> untuk <?php echo $result['nama_acara'];?> </p>
  					<span class="divider_index"></span>
  					<span class="divider_index"></span>
  					<span class="divider_index"></span>
				</div>
			<?php
		}elseif ($result['status']=="Menunggu Konfirmasi")
			{
				?>
					<div class="row_wrapper"> 
  						<h3>Upload Ulang Bukti Pembayaran</h3><br>
  						<p>Anda dapat upload ulang bukti transfer total biaya sewa untuk <?php echo $result['nama_acara'];?> (kode booking <?php echo $result['id_booking'];?>)<br> ke <?php echo $resultrek['norek'];?> maksimal tanggal</p>
  						<span class="divider_index"></span>
  						<span class="divider_index"></span>
  						<span class="divider_index"></span>
					</div>
				<?php
			}else
				{

				}
?>

<section class="user_profile inner_pages">
	<div class="container">
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" action="update_sewa.php" name="sewa" onSubmit="return valid();" enctype="multipart/form-data"> 
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
				<input type="text" class="form-control" name="kode" value="<?php echo $result['id_booking'];?>" hidden>
            </div>
			
			<?php

			if($result['status']=="Menunggu Pembayaran")
				{
					$sqlrek 	= "SELECT * FROM admin";
					$queryrek = mysqli_query($koneksidb,$sqlrek);
					$resultrek = mysqli_fetch_array($queryrek);
				?>
				
				<div class="form-group">
					<label>Upload Bukti Pembayaran</label><br/>
						<div class="custom-file mb-3">
      						<input type="file" class="custom-file-input" id="customFile" name="img1" accept="image/*" required>
      						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>											
				<div class="hr-dashed"></div>
				<div class="form-group">
						<button class="btn" type="submit" name="submit"><i class="fa fa-upload"></i> Submit</button>
				</div>

			<?php
			}elseif ($result['status']=="Menunggu Konfirmasi")
				{
				
				?>
				
				<div class="form-group">
					<label>Upload Ulang Bukti Pembayaran</label><br/>
						<div class="custom-file mb-3">
      						<input type="file" class="custom-file-input" id="customFile" name="img1" accept="image/*" required>
      						<label class="custom-file-label" for="customFile">Choose file</label>
    					</div>
				</div>											
				<div class="hr-dashed"></div>
				<div class="form-group">
						<button class="btn" type="submit" name="submit"><i class="fa fa-upload"></i> Submit</button>
				</div>
				
			<?php
			}else{
				
			}?>
        </form>
		</div>
		</div>
      </div>
</section>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

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