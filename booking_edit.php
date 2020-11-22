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

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>

<?php 
$kode=$_GET['kode'];
$sql1 	= "SELECT booking.*,baju.*, jenis.* FROM booking, baju, jenis WHERE booking.id_baju=baju.id_baju AND baju.id_jenis=jenis.id_jenis AND booking.kode_booking='$kode'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$durasi = $result['durasi'];
$totalsewa = $durasi*$harga;
$tglmulai = strtotime($result['tgl_mulai']);
$jmlhari  = 86400*1;
$tgl	  = $tglmulai-$jmlhari;
$tglhasil = date("Y-m-d",$tgl);
?>
<section class="user_profile inner_pages">
			<center><h3>Detail Sewa</h3></center>
			<div class="container" >
			<div class="user_profile_info">	
				<div style="text-align: right;" class="col-md-12">
					<a  href="detail_cetak.php?kode=<?php echo $kode;?>" target="_blank"><i class="fa fa-print fa-2x"></i></a>
				</div>
			</div>
		</div>
	<div class="container">
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" action="update_sewa.php" name="sewa" onSubmit="return valid();" enctype="multipart/form-data"> 
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
			<label>Kode Sewa</label>
				<input type="text" class="form-control" name="kode" value="<?php echo $result['kode_booking'];?>"readonly>
            </div>
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
			<label>Paket</label>
				<input type="text" class="form-control" name="mobil" value="<?php echo $result['nama_baju'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $result['tgl_mulai'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $result['tgl_selesai'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Durasi</label>
				<input type="text" class="form-control" name="durasi" value="<?php echo $durasi;?> Hari"readonly>
            </div>
            <div class="form-group">
			<label>Total Biaya Sewa (<?php echo $durasi;?> Hari)</label><br/>
				<input type="text" class="form-control" name="total" value="<?php echo format_rupiah($totalsewa);?>"readonly>
            </div>
			<div class="form-group">
			<label>Upload Bukti Pembayaran</label><br/>
				<input type="file" class="form-control" name="img1" accept="image/*" required>
			</div>											
			<div class="hr-dashed"></div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>