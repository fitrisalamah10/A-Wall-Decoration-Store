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

$query=mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE  id_kategori LIKE '%$keyword%' OR   nama_kategori LIKE '%$keyword%'")
?>
<div class="row">
    <div class="col-lg-12">
        <h2>DATA KATEGORI BARANG</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencariankategori">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Kategori" autofocus autocomplete="off">
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
			<th> Id Kategori Barang </th>
			<th> Nama Kategori </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM kategori_barang WHERE nama_kategori LIKE '%$keyword%' OR id_kategori LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_kategori']; ?></td>
			<td> <?php echo $pecah['nama_kategori']; ?></td>
			<td> 
				<a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index.php?halaman=tambahkategori" class ="btn btn-primary"> Tambah </a>