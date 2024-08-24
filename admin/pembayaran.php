<div class="row">
    <div class="col-lg-12">
        <h2>DATA PEMBAYARAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianpembayaran">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Keterangan Pembayaran" autofocus autocomplete="off">
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
			<th> Id Pembayaran </th>
			<th> Nama Pembayaran </th>
			<th> Ket Pembayaran </th>
			
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM pembayaran ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_bayar']; ?></td>
			<td> <?php echo $pecah['nama_bayar']; ?></td>
			<td> <?php echo $pecah['ket_bayar']; ?></td>
			
			<td> 
				<a href="index.php?halaman=hapuspembayaran&id=<?php echo $pecah['id_bayar'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahpembayaran&id=<?php echo $pecah['id_bayar'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index.php?halaman=tambahpembayaran" class ="btn btn-primary"> Tambah </a>