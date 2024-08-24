<div class="row">
    <div class="col-lg-12">
        <h2>PENILAIAN PEMBELI</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php

$id_faktur=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur WHERE id_faktur='$id_faktur' ");
$detail = $ambil->fetch_assoc();


?>

<table class="table table-bordered" background="img.jpg">
<div class="row">
	<div class="col-md-6"></div>
		
					<tr>
				<strong><td>Nama</td></strong>
				<strong><td>Id Faktur  </td></strong>
				<strong><td>Penilaian  </td></strong>
			</tr>			
			<tr>
				<td><?php echo $detail['username'];?></td>
				<td><?php echo $detail['id_faktur'];?></td>
				<td><?php echo $detail['penilaian_produk'];?></td>
			</tr>	
</div>
</table>