<div class="row">
    <div class="col-lg-12">
        <h2>DATA PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianpengiriman">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Pengiriman" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
</form>
<table class="table table-bordered" background="img.jpg">
	<thead>
		<tr>
			<th> No. </th>
			<th> Id Pengiriman </th>
			<th> Jasa Kirim </th>
			<th> Lama Kirim </th>
			<th> Tujuan </th>
			<th> Tarif </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM pengiriman JOIN jasa_kirim ON pengiriman.id_jasakirim=jasa_kirim.id_jasakirim JOIN
		lama_kirim ON pengiriman.id_lamakirim=lama_kirim.id_lamakirim JOIN 
		tujuan_kirim ON pengiriman.id_tujuan=tujuan_kirim.id_tujuan");?>
		
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_pengiriman']; ?></td>
			<td><?php echo $pecah['nama_jasakirim'] ?></td>
			<td> <?php echo $pecah['nama_lamakirim'] ?></td>
			<td> <?php echo $pecah['nama_tujuan'] ?></td>
			<td> Rp.<?php echo number_format($pecah['tarif']); ?></td>
			<td> 
				<a href="index.php?halaman=hapuspengiriman&id=<?php echo $pecah['id_pengiriman'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahpengiriman&id=<?php echo $pecah['id_pengiriman'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index.php?halaman=tambahpengiriman" class ="btn btn-primary"> Tambah </a>