<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
session_start();

$idpem= $_GET["id"];
$ambil=$koneksi->query("SELECT *FROM faktur JOIN pembayaran ON faktur.id_bayar=pembayaran.id_bayar JOIN status_bayar ON faktur.id_statbayar=status_bayar.id_statbayar 
JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses 
WHERE id_faktur='$idpem'");
$detpem=$ambil->fetch_assoc();

$idpemygbeli=$detpem["username"];
$idpemyglogin=$_SESSION["customer"]["username"];
if ($idpemyglogin!==$idpemygbeli)
{
	echo "<script>alert('Tidak dapat diproses ');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Pembayaran </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(pembayaran.JPG)">

<?php include'menu.php'?>

<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<p>Kirim bukti pembayaran anda disini</p>
	<div class="alert alert-info"> Total yang harus dibayarkan : <strong> 
	Rp. <?php echo number_format($detpem["total"])?></strong></div>
	
	
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label> Pembayaran </label>
			<input type="text" readonly value="<?php echo $detpem["nama_bayar"]?>-<?php echo $detpem["ket_bayar"]?>" class="form-control">
		</div>
		
		<div class="form-group">
			<label> Bukti Pembayaran </label>
			<input  type="file" class="form-control" name="bukti">
			<p class="text-danger"> Fhoto bukti harus .JPG maks.2MB </p>
		</div>
		<button class="btn btn-primary" name="kirim"> Kirim</button>
	</form>
</div>



<?php

//jk tombol kirim diklik
if(isset($_POST["kirim"]))
{
	//uploadfotobukti
	$namabukti=$_FILES["bukti"]["name"];
	$lokasibukti=$_FILES["bukti"]["tmp_name"];
	$namafiks=date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti,"bukti_pembayaran/$namafiks");
	

	
	$tanggal=date("Y-m-d");
	
		$koneksi->query("UPDATE faktur SET bukti_pembayaran='$namafiks',tanggal_pembayaran='$tanggal'
		WHERE id_faktur='$idpem'");			
	//update status pembayaran
	$koneksi->query("UPDATE faktur SET id_statbayar='SB1', id_statproses='SP2' WHERE id_faktur='$idpem'");
	
		echo "<script>alert('Terimakasih sudah melakukan pembayaran ');</script>";
	echo "<script>location='riwayat.php';</script>";
}



?>


</body>
</html>