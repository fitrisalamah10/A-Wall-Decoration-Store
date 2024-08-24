<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH STATUS PEMBAYARAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Status Bayar </label>
		<input type="text" class="form-control" name="idstatbayar">
	</div>
	
	<div class="form-group">
		<label> Keterangan Status Bayar </label>
		<input type="text" class="form-control" name="ketstatbayar">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO status_bayar (id_statbayar, ket_statbayar) VALUES('$_POST[idstatbayar]', '$_POST[ketstatbayar]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=statusbayar'>";
}
?>