<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if(isset($_POST["lihat"]))
{
	$tgl_mulai=$_POST["tglm"];
	$tgl_selesai=$_POST["tgls"];
	$status=$_POST["status"];
	$status1=$_POST["status1"];
	$ambil=$koneksi->query("SELECT*FROM faktur JOIN customer ON faktur.username=customer.username 
	JOIN pembayaran ON faktur.id_bayar=pembayaran.id_bayar
							Join status_proses on faktur.id_statproses=status_proses.id_statproses
							Join status_bayar on faktur.id_statbayar=status_bayar.id_statbayar
							WHERE ket_statproses='$status' AND ket_statbayar='$status1' AND tgl_beli BETWEEN '$tgl_mulai' AND '$tgl_selesai'  ");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}



?>



<h3> Laporan Transaksi dari <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai?> </h3>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-3">
		<div class="form-group">
				<label> Dari Tanggal </label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai?>">
			</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
				<label> Sampai Tanggal </label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai?>">
			</div>
		</div>
		</div>
		<div class="row">
		
		<div class="col-md-3">
			<div class="form-group">
				<label>Status Bayar</label>
				<select class="form-control" name="status1">
					<option value=" " >Pilih status Kirim</option>
					<option value="Sudah Kirim Pembayaran">Sudah Kirim Pembayaran</option>
					<option value="Belum Dibayar">Belum Dibayar</option>
					
				</select>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="form-group">
				<label>Status Kirim</label>
				<select class="form-control" name="status">
					<option value=" " >Pilih status Proses</option>
					<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
					<option value="Barang Dikemas">Barang Dikemas</option>
					<option value="Barang Dikirim">Barang Dikirim</option>
					<option value="Batal">Batal</option>
					<option value="Selesai">Selesai</option>
					<option value="Retur Barang">Retur Barang</option>
				</select>
			</div>
		</div>
		
		
		<div class="col-md-2">
			<label></label><br>
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
		
		
	</div>
</form>


<table class="table table-bordered" background="img.jpg">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pembeli</th>
			<th>Tanggal Pemesanan</th>
			<th>Jumlah</th>
			<th>Status Bayar</th>
			<th>Status Proses</th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0?>
		<?php foreach ($semuadata as $key =>$value):?>
		<?php $total+=$value['total']?>
		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $value["nama_customer"]?></td>
			<td><?php echo date("d F Y",strtotime($value["tgl_beli"]))?></td>
			<td><?php echo number_format($value["total"])?></td>
			<td><?php echo $value["ket_statbayar"]?></td>
			<td><?php echo $value["ket_statproses"]?></td>
			<td> 
				<a href="index.php?halaman=hapusfaktur&id=<?php echo $value['id_faktur'];?>" class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahfaktur&id=<?php echo $value['id_faktur'];?>" class="btn btn-warning"> Ubah </a>
				<a href="index.php?halaman=detail&id=<?php echo $value['id_faktur']?>" class="btn btn-info" >Detail</a>
				
				<?php if($value['ket_statproses']=="Selesai"  ):?>
				<a href="index.php?halaman=penilaian&id=<?php echo $value['id_faktur']?>" class="btn btn-primary" >Penilaian</a>
				<?php endif?>
				
				<?php if($value['ket_statbayar']!=="Belum Dibayar"):?>
				<a href="index.php?halaman=bayar&id=<?php echo $value['id_faktur']?>
				" class="btn btn-success"> Lihat Pembayaran</a>
				<?php endif?>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3"> Total </th>
			<th> Rp.<?php echo number_format($total)?></th>
		</tr>
	</tfoot>
</table>