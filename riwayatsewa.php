<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
include('includes/format_rupiah.php');
include('includes/library.php');
include('includes/alert.php');


if(strlen($_SESSION['ulogin'])==0){ 
	$currentpage=$_SERVER['REQUEST_URI'];
	echo "<script type='text/javascript'> document.location = 'index.php';
        alert('Anda harus login terlebih dahulu'); 
         </script>";
}else{
?>

<body>

<!--Header-->
<?php include('includes/header.php');?>


<?php
$email=$_SESSION['ulogin'];  
$sql1 	= "SELECT booking.* FROM booking, member WHERE  booking.email=member.email and booking.email='$email'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
?>
<div class="row_wrapper"> 
  <h3>Riwayat Sewa</h3><br>
  <p>Tabel di bawah ini menampilkan riwayat data sewa pesanan yang telah Anda buat.<br>Anda dapat mengedit status pemesanan dan mengupload bukti bayar pada kolom Opsi</p>
  <span class="divider_index"></span>
  <span class="divider_index"></span>
  <span class="divider_index"></span>
</div>
<section class="user_profile inner_pages">
	<div class="container">
	<div class = "table-responsive">
	<table class="table table-striped table-bordered">
	<thead>
		<tr>    
			<th width="23" align="center">No</th>
			<th width="100">Kode Sewa</th>		
			<th width="100">Nama Acara</th>
			<th width="80">Waktu Acara</th>
			<th width="100">Status</th>
			<th width="90">Opsi</th>
		</tr>
	</thead>
	<?php
	$email=$_SESSION['ulogin'];  
	$sql1 	= "SELECT booking.* FROM booking, member WHERE  booking.email=member.email and booking.email='$email'";
	$query1 = mysqli_query($koneksidb,$sql1);
	if(mysqli_num_rows($query1)!=0){
		
		while($result = mysqli_fetch_array($query1)){
			$nomor++;
		?>
			<tr>
				<td align="center"><?php echo $nomor; ?></td>
				<td><?php echo $result['id_booking']; ?></td>
				<td><?php echo $result['nama_acara']; ?></td>
				<td><?php echo $result['tgl_acara']; ?></td>

				<td style="text-align: left; ">
					<?php 
					if($result['status']=="Menunggu Pembayaran"||$result['status']=="Menunggu Konfirmasi"||$result['status']=="Sudah Dibayar")
						{
							?>
								<?php
									echo $result['status'];
								?><br>
								<a href="booking_cancel.php?id=<?php echo $result['id_booking'];?>" onclick="return confirm('Apakah anda yakin ingin membatalkan pesanan ?');" ><i class="fa fa-ban"></i>&nbsp;Batalkan Pesanan</a>
							<?php 
						}else
							{
								?>
									<?php
										echo $result['status'];
									?> 
								<?php
							}
					?>

				<td style="text-align: left;">
				<?php 
					if($result['status']=="Menunggu Pembayaran")
						{
							?>	
								<a  href="detail_cetak.php?kode=<?php echo $result['id_booking'];?>" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak Pesanan</a><br>
								<a href="booking_hapus.php?id=<?php echo $result['id_booking'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?');" ><i class="fa fa-trash"></i>&nbsp;Hapus Pesanan</a><br>
								<a href="booking_detail.php?kode=<?php echo $result['id_booking'];?>" ><i class="fa fa-upload"></i>&nbsp;Upload Bukti Bayar</a>
							<?php 
						}elseif($result['status']=="Menunggu Konfirmasi")
							{
								?>
									<a  href="detail_cetak.php?kode=<?php echo $result['id_booking'];?>" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak Pesanan</a><br>
									<a href="booking_hapus.php?id=<?php echo $result['id_booking'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?');" ><i class="fa fa-trash"></i>&nbsp;Hapus Pesanan</a><br>
									<a href="booking_detail.php?kode=<?php echo $result['id_booking'];?>" ><i class="fa fa-upload"></i>&nbsp;Upload Ulang Bukti</a><br>
								<?php 
							}
							else{
									?>
										<a  href="detail_cetak.php?kode=<?php echo $result['id_booking'];?>" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak Pesanan</a><br>
									<?php
							}
				?>
				</td>
			</tr>
		<?php } ?>
		
	<?php
	}else{
	?>
		<tr>
			<td colspan="11" align="center"><b>Belum ada riwayat sewa.</b></td>
		</tr>
<?php }?>
	</table>
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