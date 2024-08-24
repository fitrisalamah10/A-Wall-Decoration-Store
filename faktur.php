<?php $koneksi=new mysqli("localhost","root","","awalldecoration_store");
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title> Faktur </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(faktur.PNG)">



<?php include'menu.php'?>

<section class="konten>
	<div class="container"> 
	
<div class="col-lg-12">
        <h2>FAKTUR</h2>   

<?php 
$ambil= $koneksi->query("SELECT * FROM faktur JOIN customer 
						ON faktur.username=customer.username JOIN pembayaran ON faktur.id_bayar=pembayaran.id_bayar
						WHERE faktur.id_faktur='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>




<?php 
$pembeliygbeli=$detail["username"];

$pembeliyglogin= $_SESSION["customer"]["username"];
if($pembeliygbeli!==$pembeliyglogin)
{
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>







<strong><?php echo $detail['nama_customer'];?></strong><br> 
Id Faktur : <?php echo $detail['id_faktur'];?><br>
Alamat Pengiriman : <?php echo $detail['alamat']?> <br>

<?php 
$ambill= $koneksi->query("SELECT * FROM faktur JOIN pengiriman 
						ON faktur.id_pengiriman=pengiriman.id_pengiriman JOIN tujuan_kirim
						ON pengiriman.id_tujuan=tujuan_kirim.id_tujuan JOIN jasa_kirim
						ON pengiriman.id_jasakirim=jasa_kirim.id_jasakirim JOIN pembayaran
						ON faktur.id_bayar=pembayaran.id_bayar JOIN status_bayar
						ON faktur.id_statbayar=status_bayar.id_statbayar JOIN status_proses
						ON faktur.id_statproses=status_proses.id_statproses
						WHERE faktur.id_faktur='$_GET[id]'");
$detaill = $ambill->fetch_assoc();
?>
	Kota Tujuan  : <?php echo $detaill["nama_tujuan"]; ?> <br>
	Jasa Kirim	 : <?php echo $detaill["nama_jasakirim"]; ?> <br>
	Pembayaran	 : <?php echo $detaill["nama_bayar"]; ?> <br>
	Status Bayar : <?php echo $detaill["ket_statbayar"]; ?> <br>
	Status Proses: <?php echo $detaill["ket_statproses"]; ?> <br>
	
<p>
	Tanggal	: <?php echo $detail['tgl_beli']; ?> <br>
</p>
<table class="table table-bordered" style="background-color:cornsilk;">
	<thead>
		<tr>
			<th> No </th>
			<th> Nama Barang </th>
			<th> Harga </th>
			<th> Jumlah Barang </th>
			<th> Sub Total </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $totalbelanja=0;?>
		<?php $qty1=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.id_barang=barang.id_barang 
		WHERE transaksi.id_faktur='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?> </td>
			<td><?php echo $pecah['nama_barang']; ?> </td>
			<td><?php echo $pecah['harga']; ?></td>
			<td><?php echo $pecah['qty']; ?></td>
			
			<td> 
				Rp. <?php echo number_format($pecah['harga']*$pecah['qty']); ?> </td>
			</td>
		</tr>
		<?php $qty1+= $pecah['qty']; ?>
		<?php $totalbelanja+=($pecah['harga']*$pecah['qty']);?>
		<?php $nomor++ ?>
		<?php } ?>
	</tbody>
	
				<tfoot>
				<tr>
					<th colspan="4"> Total Belanja</th>
					<th>Rp.<?php echo number_format( $totalbelanja)?>
				</tr>
				<tr>
					<th colspan="4"> Biaya Pengiriman</th>
					<th>Rp.<?php echo number_format( $detaill["tarif"]*$qty1); ?> 
				</tr>
				<tr>
					<th colspan="4"> Total Bayar</th>
					<th>Rp. <?php echo number_format($detail['total']);?></th>
				</tr>
			</tfoot>
</table>

	
	
	
	
<div class="row">
		<div class="col-md-7">
			<div class="alert alert-info">
				<p>
					Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total']);?> ke 
					<strong> <?php echo $detail['nama_bayar']?>-<?php echo $detail['ket_bayar']?></strong>
					
				</p>
			</div>	
		</div>
</div>
	
</div>	
	
	
	
	
	
	
	
	</div>
</section>


</body>
</html>