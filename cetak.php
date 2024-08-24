<?php
 $koneksi = new mysqli("localhost","root","","awalldecoration_store");
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
	<h2>Laporan Penjualan Barang</h2>
</div>
<i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $data;?> s/d <b><?php echo $data2;?> </b></i>

<?php
$ambil= mysqli_query ($koneksi,"
SELECT *, sum(qty) AS total FROM beli inner join barang on beli.id_barang = barang.id_barang 
inner join faktur on beli.id_faktur=faktur.id_faktur where tanggal BETWEEN '$data' AND'$data2'  
GROUP BY barang.id_barang order by total desc limit 5");
?>
	<br><br><i><b>Hasil Sorting</b></i>
	<br><i><b>Berikut Laporan Penjualan Barang Terlaris</b></i><br><br>
	
<br>
			<div class="table-responsive">
				<table class="table table-bordered" >
				<thead>
					<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga </th>
					<th>Jumlah  Terjual</th>
					<th>Total Harga Terjual</th>
				</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php while($pecah=mysqli_fetch_array($ambil)){?>
		
					<tr>
						<td align="center" height="30"><?php echo $nomor; ?> </td>
						<td align="center"><?php echo $pecah['nama_barang']; ?> </td>
						<td align="center">Rp. <?php echo number_format ($pecah['harga']); ?></td>
						<td align="center"><?php echo $pecah['total']; ?></td>
						<td align="center">Rp. <?php echo number_format($pecah['harga']*$pecah['total']); ?> </td>
					</tr>
					
					<?php $nomor++ ?>
					<?php } ?>
				</tbody>
			</table>
			</center>