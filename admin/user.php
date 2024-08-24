<div class="row">
    <div class="col-lg-12">
        <h2>DATA ADMIN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<table class="table table-bordered"background="img.jpg">
	<thead>
		<tr>
			<th> No. </th>
			<th> Username </th>
			<th> Password </th>
			<th> Level </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM user");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['username']; ?></td>
			<td> <?php echo $pecah ['password']; ?></td>
			<td><?php echo $pecah['level']; ?></td>
			<td> 
		<a href="index2.php?halaman=hapususer&id=<?php echo $pecah['username'];?> " class="btn-danger btn" >Hapus</a>
		<a href="index2.php?halaman=ubahuser&id=<?php echo $pecah['username'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index2.php?halaman=tambahuser" class ="btn btn-primary"> Tambah </a>