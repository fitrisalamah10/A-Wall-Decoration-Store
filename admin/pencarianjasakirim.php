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

$query=mysqli_query($koneksi, "SELECT * FROM jasa_kirim WHERE nama_jasakirim LIKE '%$keyword%' OR id_jasakirim LIKE '%$keyword%'")

?>
<div class="row">
    <div class="col-lg-12">
        <h2>DATA JASA PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianjasakirim">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Keterangan Jasa Kirim" autofocus autocomplete="off">
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
			<th> Id Jasa Pengiriman </th>
			<th> Nama Pengiriman </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM jasa_kirim WHERE nama_jasakirim LIKE '%$keyword%' OR id_jasakirim LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_jasakirim']; ?></td>
			<td> <?php echo $pecah['nama_jasakirim']; ?></td>
			<td> 
				<a href="index.php?halaman=hapusjasakirim&id=<?php echo $pecah['id_jasakirim'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahjasakirim&id=<?php echo $pecah['id_jasakirim'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index.php?halaman=tambahjasakirim" class ="btn btn-primary"> Tambah </a>