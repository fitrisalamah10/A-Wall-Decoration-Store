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

$query=mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%' OR nama_jenis LIKE '%$keyword%' 
		OR nama_kategori LIKE '%$keyword%' OR ket_ukuran LIKE '%$keyword%' OR ket_satuan LIKE '%$keyword%' ")


?>
<div class="row">
    <div class="col-lg-12">
        <h2>DATA BARANG</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
 <form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianbarang">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Barang" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
</form> 
<table class="table table-bordered"background="img.jpg">
	<thead>
	<thead>
		<tr>
			<th> No. </th>
			<th> Id Barang </th>
			<th> Nama Barang </th>
			<th> Jenis 
			<th> kategori Barang </th>
			<th> Ukuran Barang  </th>
			<th> Satuan Barang </th>
			<th> photo </th>
			<th> Harga </th>
			<th> Stok </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM barang JOIN jenis_barang ON barang.id_jenis=jenis_barang.id_jenis JOIN
		kategori_barang ON barang.id_kategori=kategori_barang.id_kategori JOIN 
		satuan_barang ON barang.id_satuan=satuan_barang.id_satuan JOIN
		ukuran ON barang.id_ukuran=ukuran.id_ukuran WHERE id_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%' OR nama_jenis LIKE '%$keyword%' 
		OR nama_kategori LIKE '%$keyword%' OR ket_ukuran LIKE '%$keyword%' OR ket_satuan LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_barang']; ?></td>
			<td><?php echo $pecah['nama_barang']; ?></td>
			<td><?php echo $pecah['nama_jenis'] ?></td>
			<td><?php echo $pecah['nama_kategori'] ?></td>
			<td> <?php echo $pecah['ket_ukuran'] ?></td>
			<td><?php echo $pecah['ket_satuan'] ?></td>
			<td> 
				<img src="../photo/<?php echo $pecah['photo'];?>" width="100">
			</td>
			<td> Rp.<?php echo number_format($pecah['harga']); ?></td>
			<td> <?php echo $pecah['stok']; ?></td>
			<td> 
				<a href="index.php?halaman=hapusbarang&id=<?php echo $pecah['id_barang'];?>" class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahbarang&id=<?php echo $pecah['id_barang'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>	
<a href=" index.php?halaman=tambahbarang" class ="btn btn-primary"> Tambah </a>