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
<div class="row">
    <div class="col-lg-12">
        <h2>KONFIRMASI PENERIMAAN BARANG</h2>
</div>
    </div>              
<!-- /. ROW  -->
<hr />
	
	
	
	<?php

$id_faktur=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur  
JOIN customer ON faktur.username=customer.username
		JOIN pembayaran ON faktur.id_bayar=pembayaran.id_bayar JOIN status_bayar ON faktur.id_statbayar=status_bayar.id_statbayar
		JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses WHERE id_faktur='$id_faktur' ");
$detail = $ambil->fetch_assoc();


?>



			
				<h4><td>Nama  : <?php echo $detail['nama_customer'];?></td><br>
				<td>Id Faktur : <?php echo $detail['id_faktur'];?></td><br>
				<td>No Resi   : <?php echo $detail['no_resi'];?></td><br>
				<td>Jumlah    : Rp. <td><?php echo number_format($detail['total']);?></td></h4><br>
			

<hr />			
		





<form method="post">
	<div class = "form-group">
		
		<label> Status Proses </label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="SP5">Barang Diterima</option>
			<option value="SP7">Retur Barang</option>
			
		</select>
	</div>
		<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php

if(isset($_POST["proses"]))
{
	$status =$_POST["status"];
	$koneksi->query(" UPDATE faktur SET id_statproses='$status' WHERE id_faktur='$id_faktur'");
	echo "<script>location='riwayat.php';</script>";
}
?>


</body>
</html>