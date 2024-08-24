<div class="row">
    <div class="col-lg-12">
        <h2>DATA UKURAN BARANG</h2>   
</div>
    </div> 
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

$query=mysqli_query($koneksi, "SELECT * FROM ukuran WHERE ket_ukuran LIKE '%$keyword%' OR id_ukuran LIKE '%$keyword%'")
?>
<form class="form-horizontal" role="search" method="post" action="index2.php?halaman=pencarianukuran2">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Keterangan Ukuran Barang" autofocus autocomplete="off">
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
			<th> Id Ukuran Barang </th>
			<th> Keterangan Ukuran </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM ukuran WHERE ket_ukuran LIKE '%$keyword%' OR id_ukuran LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_ukuran']; ?></td>
			<td> <?php echo $pecah['ket_ukuran']; ?></td>
			<td> 
				<a href="index2.php?halaman=hapusukuran2&id=<?php echo $pecah['id_ukuran'];?> " class="btn-danger btn" >Hapus</a>
				<a href="index2.php?halaman=ubahukuran2&id=<?php echo $pecah['id_ukuran'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index2.php?halaman=tambahukuran2" class ="btn btn-primary"> Tambah </a>