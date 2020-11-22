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

if(isset($_POST['submit'])){
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$durasi=$_POST['durasi'];
$id=$_POST['id'];
$email=$_POST['email'];
$kode = buatKode("booking", "");
$status = "Menunggu Pembayaran";
$bukti = "";
$cek=0;
$tgl=date('Y-m-d');
//insert
$sql 	= "INSERT INTO booking (kode_booking,id_baju,tgl_mulai,tgl_selesai,durasi,status,email,tgl_booking)
			VALUES('$kode','$id','$fromdate','$todate','$durasi','$status','$email','$tgl')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	for($cek;$cek<$durasi;$cek++){
		$tglmulai = strtotime($fromdate);
		$jmlhari  = 86400*$cek;
		$tgl	  = $tglmulai+$jmlhari;
		$tglhasil = date("Y-m-d",$tgl);
		$sql1	="INSERT INTO cek_booking (kode_booking,id_baju,tgl_booking,status)VALUES('$kode','$id','$tglhasil','$status')";
		$query1 = mysqli_query($koneksidb,$sql1);
	}
	echo " <script> alert ('Berhasil melakukan pemesanan.'); </script> ";
	echo "<script type='text/javascript'> document.location = 'booking_detail.php?kode=$kode'; </script>";
	}else{
		echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
	}
}
?>

<body>

<!--Header-->
<?php include('includes/header.php');?>

<div>
	<br/>
	<center><h3>Paket Tersedia untuk disewa.</h3></center>
	<hr>
</div>
<?php
$email=$_SESSION['ulogin']; 
$id=$_GET['id'];
$mulai=$_GET['mulai'];
$selesai=$_GET['selesai'];
$start = new DateTime($mulai);
$finish = new DateTime($selesai);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;

$sql1 	= "SELECT baju.*,jenis.* FROM baju,jenis WHERE baju.id_jenis=jenis.id_jenis and baju.id_baju='$id'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$totalsewa = $durasi*$harga;
?>
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
 			<input type="hidden" class="form-control" name="email"  value="<?php echo $email;?>"required>
            <div class="form-group">
				<div class="col-sm-6">										
				<label>Tanggal Mulai</label>
					<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $mulai;?>"readonly>
				</div>
				<div class="col-sm-6">										
				<label>Tanggal Selesai</label>
					<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $selesai;?>"readonly>
				</div>
			</div>
            <div class="form-group">
				<div class="col-sm-6">										
				<label>Durasi</label>
					<input type="text" class="form-control" name="durasi" value="<?php echo $durasi;?> Hari"readonly>
				</div>
				<div class="col-sm-6">										
				<label>Biaya Sewa</label>
					<input type="text" class="form-control" name="sewa" value="<?php echo format_rupiah($totalsewa);?>"readonly>
				</div>
			</div>            
            <div class="form-group">
				<div class="col-sm-6">		
					&nbsp;
				</div>
				<div class="col-sm-6">										
					&nbsp;
				</div>
			</div>            
            <div class="form-group">
				<div class="col-sm-6">										
					<input type="submit" name="submit" value="Sewa" class="btn btn-block">
				</div>
				<div class="col-sm-6">										
				</div>
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