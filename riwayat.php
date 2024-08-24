<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Riwayat Belanja </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(riwayat.PNG)">


<?php include'menu.php'?>


<section class="riwayat">
	<div class="container">
		<h3> Riwayat Belanja <?php echo $_SESSION["customer"]["nama_customer"]?> </h3>
		
		
		<table class="table table-bordered" style="background-color:cornsilk;">
			<thead>
				<tr>
					<th> No</th>
					<th> Tanggal</th>
					<th> Status Pembayaran</th>
					<th> Status Proses</th>
					<th> Total</th>
					<th> Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nomor=1;
					//mendptkan username pelanggan yg login
					$usernamee= $_SESSION["customer"]['username'];
					
					$ambil=$koneksi->query("SELECT * FROM faktur JOIN status_bayar ON faktur.id_statbayar=status_bayar.id_statbayar
					JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses
					WHERE username='$usernamee'");
					while($pecah=$ambil->fetch_assoc()){		
				?>
				<tr>
				<td><?php echo $nomor;?></td>
				
				<td><?php echo $pecah["tgl_beli"]?></td>
				<td><?php echo $pecah["ket_statbayar"]?></td>
				<td><?php echo $pecah["ket_statproses"]?><br>
				<?php echo $pecah["no_resi"]?></td>
				
				<td>Rp.<?php echo number_format($pecah["total"]);?></td>
				
				<td>
				<?php if($pecah['ket_statbayar']=="Belum Dibayar"):?>
					<a href="faktur.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-danger">Faktur</a>
					<a href="pembayaran.php?id=<?php echo $pecah['id_faktur']?>" class="btn btn-success"> Pembayaran</a>
				<?php endif?>
						
				<?php if($pecah['ket_statbayar']=="Sudah Kirim Pembayaran" && $pecah['ket_statproses']=="Barang Dikemas" ):?>
					<a href="faktur2.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-success">Faktur</a>
				<?php endif?>	
					
				<?php if($pecah['ket_statproses']=="Barang Dikirim"  ):?>
					<a href="faktur2.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-success">Faktur</a>
					<a href="barangditerima.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-primary">Konfirmasi</a>
				<?php endif?>
				
				<?php if($pecah['ket_statproses']=="Barang Diterima"  ):?>
					<a href="faktur2.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-success">Faktur</a>
					<a href="penilaian.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-primary">Penilaian</a>
				<?php endif?>
				
				<?php if($pecah['ket_statproses']=="Retur Barang"  ):?>
					<a href="faktur2.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-success">Faktur</a>
					<a href="komplain.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-danger">Komplain</a>
				<?php endif?>
				
				<?php if($pecah['ket_statproses']=="Retur Barang Diproses"  ):?>
					<a href="faktur4.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-warning">Faktur</a>
					
				<?php endif?>
				
				<?php if($pecah['ket_statproses']=="Selesai"  ):?>
					<a href="faktur3.php?id=<?php echo $pecah["id_faktur"]?>" class="btn btn-success">Faktur</a>
				<?php endif?>
			
				</td>
				</tr>
					<?php $nomor++;?>
					<?php } ?>

			</tbody>
		</table>
	</div>
</section>



</body>
</html>