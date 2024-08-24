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

$query=mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%' 
	OR stok LIKE '%$keyword%' ")


?>
<div class="row">
    <div class="col-lg-12">
        <h2>CARI STOK</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />


 <form class="form-horizontal" role="search" method="post" action="index2.php?halaman=pencarianstok2">
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


<form method="post" action="index2.php?halaman=searchstok2">
	<div class="row">
		
		<div class="col-md-3">
			<div class="form-group">
				<select class="form-control" name="status">
					<option value=" " >Pilih stok</option>
					<option value="0" >Stok Habis</option>
			
				</select>
			</div>
		</div>
		
		<div class="col-md-2">
			
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered"background="img.jpg">
	<thead>
	<thead>
		<tr>
			<th> No. </th>
			<th> Id Barang </th>
			<th> Nama Barang </th>
			<th> Stok </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM barang WHERE id_barang LIKE '%$keyword%' OR nama_barang LIKE '%$keyword%' 
	OR stok LIKE '%$keyword%' ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_barang']; ?></td>
			<td><?php echo $pecah['nama_barang']; ?></td>
		
			<td> <?php echo $pecah['stok']; ?></td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>	