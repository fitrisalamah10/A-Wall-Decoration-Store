<div class="row">
    <div class="col-lg-12">
        <h2>DETAIL PEMBELIAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />


<?php 
$ambil= $koneksi->query("SELECT * FROM faktur JOIN customer 
						ON faktur.username=customer.username
						WHERE faktur.id_faktur='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
Nama Customer : <strong><?php echo $detail['nama_customer'];?></strong><br> 
Id Faktur : <strong><?php echo $detail['id_faktur'];?></strong><br> 
Alamat Pengiriman : <?php echo $detail['alamat']?> <br>
	<?php 
$ambill= $koneksi->query("SELECT * FROM faktur JOIN pengiriman 
						ON faktur.id_pengiriman=pengiriman.id_pengiriman JOIN tujuan_kirim
						ON pengiriman.id_tujuan=tujuan_kirim.id_tujuan JOIN jasa_kirim
						ON pengiriman.id_jasakirim=jasa_kirim.id_jasakirim
						WHERE faktur.id_faktur='$_GET[id]'");
$detaill = $ambill->fetch_assoc();
?>
	Kota Tujuan : <?php echo $detaill["nama_tujuan"]; ?> <br>
	Jasa Kirim	: <?php echo $detaill["nama_jasakirim"]; ?> <br>

<p>
	Tanggal	: <?php echo $detail['tgl_beli']; ?> <br>
</p>
<table class="table table-bordered"background="img.jpg">
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
			<td> Rp.<?php echo number_format ($pecah['harga']); ?></td>
			<td><?php echo $pecah['qty']; ?></td>
			<td> 
				Rp.<?php echo number_format($pecah['harga']*$pecah['qty']); ?> </td>
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