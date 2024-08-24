<div class="row">
    <div class="col-lg-12">
        <h2>CARI STOK</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianstok">
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


<form method="post" action="index.php?halaman=searchstok">
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


<?php 
$semuadata=array();
if(isset($_POST["lihat"]))
{
	
	$status=$_POST["status"];
	$ambil=$koneksi->query("SELECT*FROM barang WHERE stok='$status' ");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}



?>



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
		<?php foreach ($semuadata as $key =>$value):?>
		<tr>
			<td><?php echo $key+1;?></td>
			<td> <?php echo $value['id_barang']; ?></td>
			<td><?php echo $value['nama_barang']; ?></td>
			<td> <?php echo $value['stok']; ?></td>
			
		</tr>
		<?php endforeach ?>
	</tbody>
	
</table>	