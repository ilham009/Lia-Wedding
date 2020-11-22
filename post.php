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
					$sql = "INSERT INTO booking (total,nama_acara, tgl_acara, status,email)
							VALUES('$total','$nama_acara','$tgl_acara','$status','$email')";
					$query = mysqli_query($koneksidb,$sql);

							$i=0;
							foreach($i_id as &$item_id)
								{
									$sql2 = "INSERT INTO booking_detail ( id_booking, id_item)
											VALUES ('$kode','$id[$i]')";
									$query2 = mysqli_query($koneksidb,$sql2);
									$i++;
								}

							echo " <script> alert ('Berhasil melakukan pemesanan.'); </script> ";
							echo "<script type='text/javascript'> document.location = 'riwayatsewa.php'; </script>";
						}
						else
							{
								echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
							}
				
			}

?>