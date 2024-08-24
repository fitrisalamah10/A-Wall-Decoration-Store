<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH TUJUAN PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Tujuan </label>
		<input type="text" class="form-control" name="idtujuan">
	</div>
	
	<div class="form-group">
		<label> Nama Tujuan </label>
		<input type="text" class="form-control" name="namatujuan">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO tujuan_kirim (id_tujuan, nama_tujuan) VALUES('$_POST[idtujuan]', '$_POST[namatujuan]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tujuankirim'>";
}
?>