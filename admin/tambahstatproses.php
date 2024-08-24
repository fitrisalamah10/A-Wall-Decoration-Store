<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH STATUS PROSES</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Status Proses </label>
		<input type="text" class="form-control" name="idstatproses">
	</div>
	
	<div class="form-group">
		<label> Keterangan Status Proses </label>
		<input type="text" class="form-control" name="ketstatproses">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO status_proses (id_statproses, ket_statproses) VALUES('$_POST[idstatproses]', '$_POST[ketstatproses]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=statusproses'>";
}
?>