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

$query=mysqli_query($koneksi, "SELECT * FROM tujuan WHERE nama_tujuan LIKE '%$keyword%' OR id_tujuan LIKE '%$keyword%'")
?>
<div class="row">
    <div class="col-lg-12">
        <h2>DATA TUJUAN PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<form class="form-horizontal" role="search" method="post" action="index2.php?halaman=pencariantujuankirim2">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Jasa Tujuan" autofocus autocomplete="off">
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
			<th> Id Tujuan </th>
			<th> Nama Tujuan </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM tujuan_kirim WHERE nama_tujuan LIKE '%$keyword%' OR id_tujuan LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_tujuan']; ?></td>
			<td> <?php echo $pecah['nama_tujuan']; ?></td>
			<td> 
				<a href="index2.php?halaman=hapustujuankirim2&id=<?php echo $pecah['id_tujuan'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index2.php?halaman=ubahtujuankirim2&id=<?php echo $pecah['id_tujuan'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index2.php?halaman=tambahtujuankirim2" class ="btn btn-primary"> Tambah </a>