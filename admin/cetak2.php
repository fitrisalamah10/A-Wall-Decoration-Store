
<div class="row">
	<div class="col-md-12">
		<h2>Laporan Penjualan Barang Terlaris</h2>
	</div>
	
	<br>
	<br>
	<hr>
	<div class="col-md-12">
		<form method="POST" class="form-inline">
			<div class="form-group">
				<input type="date" class="form-control" name="tgl1">
			</div>
			<div class="form-group">
				<label>  Sampai  </label>
				<input type="date" class="form-control" name="tgl2">
			</div>
			<div class="form-group">
				<button  name="proses" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Proses</button>
			</div>
			<div class="form-group">
				<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
				
			</div>
		</form>
	</div>
</div>
</hr>

<?php
            //proses jika sudah klik tombol pencarian data
            if(isset($_POST['proses'])){
            //menangkap nilai form
            $dt1=$_POST['tgl1'];
            $dt2=$_POST['tgl2'];
            if(empty($dt1) || empty($dt2)){
            //jika data tanggal kosong
?>
			<script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='index.php?halaman=cetak';
            </script>
			
            <?php
            }else{
            ?><br><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tgl1']?></b> s/d <b><?php echo $_POST['tgl2']?></b></i>
            <?php
            $ambil= mysqli_query ($koneksi,"SELECT *, sum(qty) AS total FROM transaksi inner join barang
										on transaksi.id_barang = barang.id_barang inner join faktur on transaksi.id_faktur=faktur.id_faktur where tgl_beli BETWEEN '$dt1' AND'$dt2'  
										GROUP BY barang.id_barang order by total desc limit 5");
            }?>
        </p> 

			<table class="table table-bordered" background="img.jpg">
				<thead>
					<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga </th>
					<th>Jumlah  Terjual</th>
					<th>Total Harga Terjual</th>
				</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $total=0; ?>
					<?php while($pecah=mysqli_fetch_array($ambil)){?>
					<tr>
						<td><?php echo $nomor; ?> </td>
						<td><?php echo $pecah['nama_barang']; ?> </td>
						<td>Rp. <?php echo number_format ($pecah['harga']); ?></td>
						<td><?php echo $pecah['total']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga']*$pecah['total']); ?> </td>
					</tr>
					<?php $total+=($pecah['harga']*$pecah['total']);?>
					<?php $nomor++ ?>
					<?php } ?>
					
				</tbody>
			<tfoot>
				<tr>
				
					<th colspan="4"> Total </th>
					<th>Rp.<?php echo number_format($total)?>
				</tr>
				</tfoot>
			</table>
	
<tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysqli_num_rows($ambil)==0){
                  echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <?php
        }
        else{
            unset($_POST['proses']);
        }
        ?>