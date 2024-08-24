<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian'] = $_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE nama_jenis LIKE '%$keyword%' OR id_jenis LIKE '%$keyword%'")


?>
<div class="row">
    <div class="col-lg-12">
        <h2>DATA JENIS BARANG</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form class="form-horizontal" role="search" method="post" action="index2.php?halaman=pencarianjenis2">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Jenis" autofocus autocomplete="off">
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
			<th> Id Jenis Barang </th>
			<th> Nama Jenis </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM jenis_barang WHERE nama_jenis LIKE '%$keyword%' OR id_jenis LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_jenis']; ?></td>
			<td> <?php echo $pecah['nama_jenis']; ?></td>
			<td> 
				<a href="index2.php?halaman=hapusjenis2&id=<?php echo $pecah['id_jenis'];?>" class="btn-danger btn" >Hapus</a>
				<a href="index2.php?halaman=ubahjenis2&id=<?php echo $pecah['id_jenis'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index2.php?halaman=tambahjenis2" class ="btn btn-primary"> Tambah </a>