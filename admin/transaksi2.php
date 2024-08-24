<div class="row">
    <div class="col-lg-12">
        <h2>DATA TRANSAKSI</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
  

<table class="table table-bordered"background="img.jpg">
	<thead>
		<tr>
			<th> No. </th>
			<th> Id Faktur </th>
			<th> Id Barang </th>
			<th> QTY </th>
			<th> Jumlah </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM transaksi ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_faktur']; ?></td>
			<td> <?php echo $pecah['id_barang']; ?></td>
			<td><?php echo $pecah['qty']; ?></td>
			<td> Rp.<?php echo number_format($pecah['jumlah']); ?></td>
			<td> 
				<a href="index.php?halaman=hapuspembeli2&id=<?php echo $pecah['usernamee'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahpembeli2&id=<?php echo $pecah['usernamee'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>