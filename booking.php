<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
include('includes/format_rupiah.php');

if(strlen($_SESSION['ulogin'])==0)
	{ 
		header('location:index.php');
	}
	else
		{
			$tglnow   = date('Y-m-d');
			$tglmulai = strtotime($tglnow);
			$jmlhari  = 86400*1;
			$tglplus  = $tglmulai+$jmlhari;
			$now = date("Y-m-d",$tglplus);

			if(isset($_POST['submit']))
				{
					$fromdate=$_POST['fromdate'];
					$todate=$_POST['todate'];
					$id=$_POST['id'];

					$sql 	= "SELECT kode_booking FROM cek_booking WHERE tgl_booking between '$fromdate' AND '$todate' AND id_baju='$id' AND status!='Cancel' AND status!='Selesai' ";

					$query 	= mysqli_query($koneksidb,$sql);
					$tersewa = mysqli_num_rows($query);

					if($tersewa<1)
						{
							echo "<script type='text/javascript'> document.location = 'booking_ready.php?id=$id&mulai=$fromdate&selesai=$todate'; </script>";
						}
						else
							{
							echo " <script> alert ('Sudah terdapat pemesan pada hari tersebut !'); </script> ";
							}
			
				}
?>

<body>
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<?php 
$id=$_GET['id'];
$useremail=$_SESSION['login'];

$sql1 = "SELECT baju.*,jenis.* FROM baju,jenis WHERE baju.id_jenis=jenis.id_jenis and baju.id_baju='$id'";

$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
?>

<script type="text/javascript">
	function valid()
		{
			if(document.sewa.todate.value < document.sewa.fromdate.value)
				{
					alert("Tanggal selesai harus lebih besar dari tanggal mulai sewa!");
			return false;
				}
			if(document.sewa.fromdate.value < document.sewa.now.value)
				{
					alert("Tanggal sewa minimal H-1!");
			return false;
				}	
		return true;
		}
</script>

<section class="user_profile inner_pages">
	<div class="container">
		<div class="col-md-6 col-sm-8">
	      <div class="product-listing-img"><img src="admin/img/baju/<?php echo htmlentities($result['gambar1']);?>" class="img-responsive" alt="Image" /> </a> </div>
          <div class="product-listing-content">
            <h5><?php echo htmlentities($result['nama_baju']);?></a></h5>
            <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
          </div>	
	</div>
	
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
       		<form method="post" name="sewa" onSubmit="return valid();"> 
				<input type="hidden" class="form-control" name="id"  value="<?php echo $id;?>"required>
            		<div class="form-group">
						<label>Tanggal Mulai</label>
						<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
						<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>">
            		</div>
           			<div class="form-group">
						<label>Tanggal Selesai</label>
						<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            		</div>
					<br/>			
					<div class="form-group">
                		<input type="submit" name="submit" value="Cek Ketersediaan" class="btn btn-block">
            		</div>
        	</form>
		</div>
	</div>
</div>
</section>
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