<div class="row">
    <div class="col-lg-12">
        <h2>UBAH UKURAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM ukuran WHERE id_ukuran='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Ukuran </label>
		<input type="text" class="form-control" name="idukuran" value="<?php echo $pecah['id_ukuran'];?>">
	</div>
	<div class="form-group">
		<label> Ket Ukuran  </label>
		<input type="text" class="form-control" name="ketukuran" value="<?php echo $pecah['ket_ukuran'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE ukuran SET id_ukuran='$_POST[idukuran]',
	ket_ukuran='$_POST[ketukuran]' WHERE id_ukuran='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=ukuran';</script>";
}

?>