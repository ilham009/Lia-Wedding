<?php
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
$kode   =$_GET['kode'];
$sql1 	= "SELECT booking.*, item1.*, item2.*, member.* FROM booking, item1, item2, member WHERE booking.id_item1=item1.id_item1 
			AND booking.id_item2=item2.id_item2 and booking.email=member.email and booking.id_booking='$kode'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="rental mobil">
	<meta name="author" content="">

	<link href="assets/css/images/icon.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="assets/new/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/new/offline-font.css" rel="stylesheet">
	<link href="assets/new/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="assets/new/jquery.min.js"></script>

</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="float-left" style="padding-top: 30px"><img src="assets/css/images/logo2.png" alt="logo-dkm" width="200" /></td>
					</tr>
					<tr>
						<td class="text-center">Phone : 000000000 | E-mail : AAAAA@gmail.com</td>
					</tr>
					<tr>
						<td class="text-center">Magelang</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">DETAIL PESANAN</h4>
			<br />
			<table class="table">
				<tbody>
					<tr>
						<td>Penyewa</td>
						<td>:</td>
						<td><?php echo $result['nama_user'] ?></td>
					</tr>
					<tr>
						<td>Nama Acara</td>
						<td>:</td>
						<td><?php echo $result['nama_acara'];?></td>
					</tr>
					<tr>
						<td>Waktu Acara</td>
						<td>:</td>
						<td><?php echo $result['tgl_acara'];?></td>
					</tr>
					<tr>
						<td>Biaya</td>
						<td>:</td>
						<td><?php echo $result['total'];?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php echo $result['status'];?></td>
					</tr>
					<?php
						if($result['status']=="Menunggu Pembayaran"){
							$sqlrek 	= "SELECT * FROM admin";
							$queryrek = mysqli_query($koneksidb,$sqlrek);
							$resultrek = mysqli_fetch_array($queryrek);

							echo "
						<tr>
							<td colspan='3'>
								<b>*Silahkan transfer total biaya sewa ke ".$resultrek['norek']." maksimal tanggal "?><?php echo ".
							</td>
						</tr>
							";
						}else{
							
						}?>
				</tbody>
			</table>
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#jumlah').terbilang({
				'style'			: 3, 
				'output_div' 	: "jumlah2",
				'akhiran'		: "Rupiah",
			});

			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="assets/new/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="assets/new/jTerbilang.js"></script>

</body>
</html>