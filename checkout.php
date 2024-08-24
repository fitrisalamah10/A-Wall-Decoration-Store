<?php
session_start();
$koneksi=new mysqli("localhost","root","","awalldecoration_store");

//jika blm login, login dlu

if(!isset($_SESSION["customer"]))
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Checkout </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(checkout.PNG)">

<?php include'menu.php'?>
<section class="konten">
	
	<div class="container">
	<h1> Check Out </h1>
		<hr>
		<table class= "table table-bordered" style="background-color:cornsilk;" >
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php $totalbelanja=0;?>
				<?php $jumlah1=0;?>
				<?php foreach ($_SESSION['keranjang'] as $id_barang=> $jumlah):?>
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
					<td>Rp.<?php echo number_format($subharga);?> </td>
				</tr>
				<?php $nomor++;?>
				<?php $totalbelanja+=$subharga;?>
				<?php $jumlah1+=$jumlah;?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4"> Total Belanja</th>
					<th>Rp.<?php echo number_format( $totalbelanja)?>
				</tr>
			</tfoot>
		</table>
		
		
		<form method="post">
		
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["customer"]["nama_customer"]?>" 
						class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["customer"]["alamat"]?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" name="kota">
						<input type="text" readonly value="<?php echo $_SESSION["customer"]["kota"]?>" class="form-control">
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<select class="form-control" name="id_ongkir">
						<option value=""> Pilih Ongkos Kirim</option>
						<?php
						$kota=$_SESSION["customer"]["kota"];
						$ambil=$koneksi->query("SELECT * FROM pengiriman  JOIN jasa_kirim ON pengiriman.id_jasakirim=jasa_kirim.id_jasakirim JOIN
						lama_kirim ON pengiriman.id_lamakirim=lama_kirim.id_lamakirim JOIN 
						tujuan_kirim ON pengiriman.id_tujuan=tujuan_kirim.id_tujuan WHERE nama_tujuan='$kota'");
						while($perongkir=$ambil->fetch_assoc()){
						?>
						<option value="<?php echo $perongkir['id_pengiriman']?>">
							<?php echo $perongkir['nama_jasakirim']?>-
							<?php echo $perongkir['nama_lamakirim']?>-
							<?php echo $perongkir['nama_tujuan']?>-
							Rp.<?php echo number_format( $perongkir['tarif'])?>
						</option>
						<?php }?>
					</select>
				</div>
				<div class="col-md-4">
			
					<select class="form-control" name="id_pembayaran">
						<option value=""> Pilih Pembayaran</option>
						<?php
						$ambil=$koneksi->query("SELECT * FROM pembayaran");
						while($pecahh=$ambil->fetch_assoc()){
						?>
						<option value="<?php echo $pecahh['id_bayar']?>">
							<?php echo $pecahh['nama_bayar']?>-
							<?php echo $pecahh['ket_bayar']?>
						</option>
						<?php }?>
					</select>
				
				</div>
			</div>	
				
				<div class="form-group">
				<label> Alamat Lengkap Pengiriman</label>
				<textarea class="form-control" name="alamatpengiriman" placeholder="Masukkan Alamat Lengkap Pengiriman"></textarea>
				</div>
				
				<button class="btn btn-primary" name="checkout" > Check Out</button>
				</form>
			

			
			
		
		
		<?php
		if(isset($_POST["checkout"]))
		{
			$usernamee=$_SESSION["customer"]["username"];
			$id_ongkir=$_POST["id_ongkir"];
			$id_pembayaran=$_POST["id_pembayaran"];
			$tanggal=date("Y-m-d");
			$alamatpengiriman=$_POST["alamatpengiriman"];
			
			$ambil=$koneksi->query("SELECT * FROM pengiriman WHERE id_pengiriman='$id_ongkir'");
			$arrayongkir=$ambil->fetch_assoc();
			$tarif=$arrayongkir['tarif']*$jumlah1;
			
			
			$total_bayar=$totalbelanja + $tarif;
			$a="AWD";
			$b=$usernamee;
			$id_statbayar='SB2';
			$id_statproses='SP1';
			$id_faktur=$a.$b.rand(100,999);
			
			//menyimpan data ketabelfaktur
			$koneksi->query("INSERT INTO faktur ( id_faktur, tgl_beli, total, username, id_pengiriman,id_bayar,id_statbayar,id_statproses) 
			VALUES ( '$id_faktur','$tanggal','$total_bayar', '$usernamee', '$id_ongkir','$id_pembayaran','$id_statbayar','$id_statproses')");
				
					
				
			
			foreach($_SESSION["keranjang"] as $id_barang=>$qty)
			{
				$koneksi->query("INSERT INTO transaksi (id_faktur, id_barang, qty) 
				VALUES ('$id_faktur', '$id_barang','$qty')");
				
				//skrip update stok
				$koneksi->query("UPDATE barang SET stok=stok-$qty WHERE id_barang='$id_barang'");
			}
			
			//mengosongkan keranjang belanja
				unset($_SESSION['keranjang']);
			
			echo "<script>alert('Pembelian Sukses');</script>";
			echo "<script>location='riwayat.php';</script>";
			

		}
		?>
		
	</div>
</section>






</body>
</html>