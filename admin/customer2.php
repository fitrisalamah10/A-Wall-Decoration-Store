<div class="row">
    <div class="col-lg-12">
        <h2>DATA CUSTOMER</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
 
<form class="form-horizontal" role="search" method="post" action="index2.php?halaman=pencariancustomer2">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Customer" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
</form>
 

<table class="table table-bordered "background="img.jpg">
	<thead>
		<tr>
			<th> No. </th>
			<th> Username </th>
			<th> Password </th>
			<th> Nama Customer </th>
			<th> Alamat </th>
			<th> Kota </th>
			<th> No HP </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM customer ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['username']; ?></td>
			<td> <?php echo $pecah['pass']; ?></td>
			<td> <?php echo $pecah['nama_customer']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td><?php echo $pecah['kota']; ?></td>
			<td><?php echo $pecah['no_hp']; ?></td>
			<td> 
				<a href="index2.php?halaman=hapuscustomer2&id=<?php echo $pecah['username'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index2.php?halaman=ubahcustomer2&id=<?php echo $pecah['username'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index2.php?halaman=tambahcustomer2" class ="btn btn-primary"> Tambah </a>