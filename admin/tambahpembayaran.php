<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH PEMBAYARAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Bayar </label>
		<input type="text" class="form-control" name="idbayar">
	</div>
	
	<div class="form-group">
		<label> Nama Bayar </label>
		<input type="text" class="form-control" name="namabayar">
	</div>
	
	<div class="form-group">
		<label> Ket Bayar </label>
		<input type="text" class="form-control" name="ketbayar">
	</div>
	
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO pembayaran (id_bayar, nama_bayar,ket_bayar) VALUES('$_POST[idbayar]', '$_POST[namabayar]','$_POST[ketbayar]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembayaran'>";
}
?>