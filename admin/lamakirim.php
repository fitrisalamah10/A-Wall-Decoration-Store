<div class="row">
    <div class="col-lg-12">
        <h2>DATA DURASI PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianlamakirim">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Lama Kirim" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
</form>

<table class="table table-bordered"background="img.jpg">
	<thead>
		<tr>
			<th> No. </th>
			<th> Id Lama Pengiriman </th>
			<th> Nama Lama Pengiriman </th>
			<th> Keterangan Lama Pengiriman </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM lama_kirim ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_lamakirim']; ?></td>
			<td> <?php echo $pecah['nama_lamakirim']; ?></td>
			<td> <?php echo $pecah['ket_lamakirim']; ?></td>
			<td> 
				<a href="index.php?halaman=hapuslamakirim&id=<?php echo $pecah['id_lamakirim'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahlamakirim&id=<?php echo $pecah['id_lamakirim'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index.php?halaman=tambahlamakirim" class ="btn btn-primary"> Tambah </a>