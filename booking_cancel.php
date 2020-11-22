<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ulogin'])==0){	
header('location:index.php');
}
else{
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "UPDATE booking SET booking.status = 'Cancel' WHERE booking.id_booking='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Berhasil membatalkan pesanan.'); 
			document.location = 'riwayatsewa.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'riwayatsewa.php'; 
		</script>";
}
}
?>