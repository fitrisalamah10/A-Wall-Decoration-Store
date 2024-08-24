<?php
 $koneksi = new mysqli("localhost","root","","toko_bukuto");
$data = $_GET["tgl1"];
$data2 = $_GET["tgl2"];
?>
<script>
    window.print();
</script>
<br>
<br>
<br>
<center><div class="col-md-12">
	<h2>Laporan Penjualanan Buku</h2>
</div>
<i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $data;?> s/d <b><?php echo $data2;?> </b></i>

<?php
$ambil= mysqli_query ($koneksi,"SELECT * FROM rs_membeli inner join tb_buku on rs_membeli.id_buku = tb_buku.id_buku  inner join tb_faktur on rs_membeli.id_faktur = tb_faktur.id_faktur where tanggal_faktur BETWEEN '$data' and '$data2'");
?>
	<br><br><i><b>Hasil Sorting</b></i>
	<br><i><b>Berikut Laporan Penjualanan Buku!</b></i><br><br>
	
<br>
			<div class="table-responsive">
				<table class="table table-bordered" >
				<thead>
					<tr>
					<th>No.</th>
					<th>Tanggal_Faktur</th>
					<th>Nama Buku</th>
					<th>Harga Buku</th>
					<th>Jumlah Buku Terjual</th>
					<th>Total Harga Terjual</th>
				</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php while($pecah=mysqli_fetch_array($ambil)){?>
					
					<tr>
						<td align="center" height="30"><?php echo $nomor; ?> </td>
						<td align="center"><?php echo $pecah['tanggal_faktur']; ?> </td>
						<td align="center"><?php echo $pecah['nama_buku']; ?> </td>
						<td align="center">Rp. <?php echo number_format ($pecah['harga_buku']); ?></td>
						<td align="center"><?php echo $pecah['jumlah_buku']; ?></td>
						<td align="center">Rp. <?php echo number_format($pecah['harga_buku']*$pecah['jumlah_buku']); ?> </td>
					</tr>
					
					<?php $nomor++ ?>
					<?php } ?>
				</tbody>
			</table>
			</center>