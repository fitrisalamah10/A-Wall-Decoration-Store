<?php 
session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$kategori = "";
$jenis = "";
$ukuran="";
$strq = "";
$strw = "";
$jmlget = 0;

	
	if(isset($_GET['kategori'])){
      $kategori = $_GET['kategori'];
      $strc[] = "barang.id_kategori = '$kategori'";
      $jmlget++;
    }
    if(isset($_GET['jenis'])){
      $jenis = $_GET['jenis'];
	  $strc[] = "barang.id_jenis= '$jenis'";
      $jmlget++;
	if(isset($_GET['ukuran'])){
      $ukuran = $_GET['ukuran'];
      $strc[] = "barang.id_ukuran = '$ukuran'";
      $jmlget++;
    }
    }


    // susun string
    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

    $query = "SELECT * FROM `barang` 
	inner join ukuran on barang.id_ukuran=ukuran.id_ukuran
	inner join satuan_barang on barang.id_satuan=satuan_barang.id_satuan
			 inner join kategori_barang on barang.id_kategori=kategori_barang.id_kategori inner join jenis_barang
			 on barang.id_jenis=jenis_barang.id_jenis
    $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

	
	$query_ukuran  = "SELECT * FROM ukuran";
    $result_ukuran= mysqli_query($koneksi,$query_ukuran);
	
    $query_kategori  = "SELECT * FROM kategori_barang";
    $result_kategori = mysqli_query($koneksi,$query_kategori);

	$query_jen  = "SELECT * FROM jenis_barang";
	$result_jen = mysqli_query($koneksi,$query_jen);


    $title = "A Wall Decoration Store";
    
?>

<!DOCTYPE html>
<html>
<head>
	<title> A Wall Decoration Store </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>


<BODY STYLE="BACKGROUND-IMAGE:URL(indexx.jpg)">

<?php include'menu.php'?>

<!--konten-->
<section class="konten">
	<div class="container">
	
	<div class="row">
        <form action="cbcb.php" method="GET">
		<br></br>
          <div class="row">
            <div class="col-sm">

			<div class="col-md-12 col-lg-3 products-number-sort" >
				<div class="products-sort-by mt-3 mt-lg-0" width="15">
					  <select name="jenis" class="form-control" >
						<option selected disabled>-- JENIS -- </option>
							 <?php while($row = mysqli_fetch_assoc($result_jen)) { ?>
								<option value="<?php echo $row['id_jenis']; ?>"> <?php echo $row['nama_jenis']; ?></option>
							 <?php } ?>
						</select>
                      </div></div>
				
				<div class="col-md-12 col-lg-3 products-number-sort">
				<div class="products-sort-by mt-3 mt-lg-0">
					  <select name="kategori" class="form-control">
						<option selected disabled>-- KATEGORI -- </option>
							 <?php while($row = mysqli_fetch_assoc($result_kategori)) { ?>
								<option value="<?php echo $row['id_kategori']; ?>"> <?php echo $row['nama_kategori']; ?></option>
							 <?php } ?>
						</select>
                      </div></div>
					  
				
				<div class="col-md-12 col-lg-3 products-number-sort">
				<div class="products-sort-by mt-3 mt-lg-0">
					  <select name="ukuran" class="form-control">
						<option selected disabled>--UKURAN -- </option>
							 <?php while($row = mysqli_fetch_assoc($result_ukuran)) { ?>
								<option value="<?php echo $row['id_ukuran']; ?>"> <?php echo $row['ket_ukuran']; ?></option>
							 <?php } ?>
						</select>
                      </div></div>
       
          
          <div class="row">
            <div class="col-sm">
              <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
            </div>
          </div>
          
          <?php if($resnum == 0){ ?>
          <div clas="row">
            <div class="col-sm">
			<br>
			<br>
			<br>
              <p> Maaf, Barang Tidak Tersedia</p>
            </div>
          </div>
          <?php } ?>
        </form>
    </div>
<!-- konten -->


<!--konten-->
<section class="konten">
	<div class="container">
		
		<div class="row">
    <div class="col-lg-12">
        <h2>DAFTAR BARANG</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
		<div>
		<div class="row">
		
			
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="col-md-3" >
				<div class="thumbnail">
					<img src="photo/<?php echo $row['photo'];?>" width="300" height="300">
					<div class="caption">
						<h4> <?php echo $row['nama_barang'];?>-<?php echo $row['ket_ukuran'];?></h4>
						<h6> Stok :<?php echo $row['stok'];?></h6>
						<h5> Rp.<?php echo number_format($row['harga']);?>/<?php echo $row['ket_satuan'];?></h5>
			<a href="transaksi.php?id=<?php echo $row['id_barang'];?>" class="btn btn-primary"> Beli</a>
			<a href="detail.php?id=<?php echo $row["id_barang"]?>" class="btn btn-default"> Detail</a>
					</div>
				</div>
			</div>
			<?php }?>
			
	
	</div>
</section>
</body>
</html>
