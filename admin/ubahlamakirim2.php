<div class="row">
    <div class="col-lg-12">
        <h2>UBAH DURASI PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM lama_kirim WHERE id_lamakirim='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Lama Kirim </label>
		<input type="text" class="form-control" name="idlamakirim" value="<?php echo $pecah['id_lamakirim'];?>">
	</div>
	<div class="form-group">
		<label> Nama Lama Kirim </label>
		<input type="text" class="form-control" name="namalamakirim" value="<?php echo $pecah['nama_lamakirim'];?>">
	</div>
	<div class="form-group">
		<label> Keterangan Lama Kirim  </label>
		<input type="text" class="form-control" name="ketlamakirim" value="<?php echo $pecah['ket_lamakirim'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE lama_kirim SET id_lamakirim='$_POST[idlamakirim]',nama_lamakirim='$_POST[namalamakirim]',
	ket_lamakirim='$_POST[ketlamakirim]' WHERE id_lamakirim='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index2.php?halaman=lamakirim2';</script>";
}

?>