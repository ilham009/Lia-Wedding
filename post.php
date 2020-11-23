<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/bootstrap.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if(strlen($_SESSION['ulogin'])==0)
	{ 
		header('location:index.php');
	}
	else
		{

			if(isset($_POST['submit']))
				{
					$id = $_POST['id_item'];
					$nama=$_POST['nama_item'];
					$harga=$_POST['harga_item'];
					$nama_acara=$_POST['nama_acara'];
					$tgl_acara=$_POST['tgl_acara'];
					$status = "Menunggu Pembayaran";
					$email=$_SESSION['ulogin'];
					$total = 0;
//insert
					$sql = "INSERT INTO booking (id_booking, nama_acara, tgl_acara, status,email, total_biaya)
							VALUES(NULL,'$nama_acara','$tgl_acara','$status','$email','$total')";
					$query = mysqli_query($koneksidb,$sql);

						//if $query , insert juga ke tabel booking_detail


							echo " <script> alert ('Berhasil melakukan pemesanan.'); </script> ";
							echo "<script type='text/javascript'> document.location = 'riwayatsewa.php'; </script>";
						}
						else
							{
								echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
							}
				
			}

?>
