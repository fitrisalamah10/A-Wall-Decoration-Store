<div class="row">
    <div class="col-lg-12">
        <h2>UBAH JASA PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM jasa_kirim WHERE id_jasakirim='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Jasa Kirim </label>
		<input type="text" class="form-control" name="idjasakirim" value="<?php echo $pecah['id_jasakirim'];?>">
	</div>
	<div class="form-group">
		<label> Nama Jasa Kirim  </label>
		<input type="text" class="form-control" name="namajasakirim" value="<?php echo $pecah['nama_jasakirim'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE jasa_Kirim SET id_Jasakirim='$_POST[idjasakirim]',
	nama_jasakirim='$_POST[namajasakirim]' WHERE id_jasakirim='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=jasakirim';</script>";
}

?>