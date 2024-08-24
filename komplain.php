<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
session_start();

$id_faktur=$_GET['id'];
$ambil=$koneksi->query("SELECT *FROM faktur JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses
WHERE id_faktur='$id_faktur'");
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
	<title> Penilaian </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(penilaian.JPG)">

<?php include'menu.php'?>

<div class="container">
	<h2>Komplain Barang</h2>
	<div class="alert alert-info"> <strong>Silahkan Hubungi 081284209663 untuk Melakukan Retur Barang</strong></div>
	
	
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label> Silahkan berikan komplain anda ! </label>
			<textarea class="form-control" name="penilaian" placeholder="Berikan Komplain Anda"></textarea>
		</div>
		<button class="btn btn-primary" name="kirim"> Kirim</button>
	</form>
</div>



<?php

//jk tombol kirim diklik
if(isset($_POST["kirim"]))
{
	

	$nilai =$_POST["penilaian"];
	
		$koneksi->query("UPDATE faktur SET penilaian_produk='$nilai'WHERE id_faktur='$id_faktur'");			
	//update status pembayaran
	$koneksi->query("UPDATE faktur SET id_statproses='SP8' WHERE id_faktur='$id_faktur'");
	
	echo "<script>alert('Terimakasih sudah memberi penilaian ');</script>";
	echo "<script>location='riwayat.php';</script>";
}



?>


</body>
</html>