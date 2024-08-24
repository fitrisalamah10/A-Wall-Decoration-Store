<?php
session_start();


$koneksi=new mysqli("localhost","root","","awalldecoration_store");

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
		echo "<script>alert('Keranjang belum diisi, silahkan belanja dahulu ^-^');</script>";
		echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Keranjang Belanja </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(keranjang.JPG)">


<?php include'menu.php'?>



<section class="konten">
	<div class="container">
	<marquee><h1> <b><font face ="cornsilk"color="black">Keranjang Belanja </font></b></h1></marquee>
		<hr>
		<table class= "table table-bordered" style="background-color:cornsilk;" >
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Ubah Jumlah Barang</th>
					<th>Sub Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php foreach ($_SESSION["keranjang"] as $id_barang=> $jumlah):?>
				<!-- menampilkan barang yg sedang diperulangkan brdsrkan id_barang-->
				<?php
					$ambil=$koneksi->query("SELECT*FROM barang WHERE id_barang='$id_barang'");
					$pecah=$ambil->fetch_assoc();
					$subharga=$pecah["harga"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah["nama_barang"];?> </td>
					<td>Rp.<?php echo number_format($pecah['harga']);?> </td>
					<td><?php echo $jumlah; ?></td>
					<td>
					<form method="post">
				<div class="form-group">
					<div class="input-group">
						<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $pecah["stok"]?>">
						<div class="input-group-btn">
							<button class="btn btn-primary" name="beli">ubah</button>
						</div>
					</div>
						</div>
					</form>
					</td>
					
					
					<td>Rp.<?php echo number_format($subharga);?> </td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_barang?>" class="btn btn-danger btn-xs"> Hapus </a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
		</table>
		
		
		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary"> Checkout</a>
	</div>
	
	

</section>
<?php 
			
			if (isset($_POST["beli"]))
			{
				$jumlah =$_POST["jumlah"];
				//masukkan dikeranjang
				$_SESSION["keranjang"][$id_barang]=$jumlah;
				
				echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
				echo "<script>location='keranjang.php';</script>";
			}
			

			
			?>
			
</body>
</html>