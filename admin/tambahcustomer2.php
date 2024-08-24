<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH CUSTOMER</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="idcustomer">
	</div>
	
	<div class="form-group">
		<label> Password </label>
		<input type="text" class="form-control" name="pass">
	</div>
	
	<div class="form-group">
		<label> Nama Customer </label>
		<input type="text" class="form-control" name="namacustomer">
	</div>
	
	<div class="form-group">
		<label> Alamat </label>
		<input type="text" class="form-control" name="alamat">
	</div>
	
	<div class="form-group">
		<label> Kota </label>
		<input type="text" class="form-control" name="kota">
	</div>
	
	<div class="form-group">
		<label> No HP </label>
		<input type="text" class="form-control" name="no_hp">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO customer (username, pass, nama_customer,alamat,kota, no_hp) VALUES('$_POST[idcustomer]',
	'$_POST[pass]', '$_POST[namacustomer]','$_POST[alamat]','$_POST[kota]','$_POST[no_hp]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index2.php?halaman=customer2'>";
}
?>