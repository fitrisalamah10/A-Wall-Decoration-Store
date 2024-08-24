<?php
session_start();
$koneksi=new mysqli("localhost","root","","awalldecoration_store");

//jika blm login, login dlu

if(!isset($_SESSION["user"]))
{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A Wall Decoration Store : Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/lgo.png" width="80" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                
                    <li><a href="index.php" ><i class="fa fa-desktop "></i>Dashboard </a></li>
                    <li><a href="index.php?halaman=customer"><i class="fa fa-user "></i>Customer </a></li>
					<li><a href="index.php?halaman=barang"><i class="fa fa-archive "></i>Barang</a></li>
					<li><a href="index.php?halaman=jenis"><i class="fa fa-inbox "></i>Jenis Barang </a></li>
                    <li><a href="index.php?halaman=kategori"><i class="fa fa-list "></i>Kategori Barang</a></li>
                    <li><a href="index.php?halaman=satuan"><i class="fa fa-table "></i>Satuan Barang</a></li>
					<li><a href="index.php?halaman=ukuran"><i class="fa fa-qrcode "></i>Ukuran Barang </a></li>
					
					<li><a href="index.php?halaman=faktur"><i class="fa fa-file "></i>Faktur</a></li>
					<li><a href="index.php?halaman=pengiriman"><i class="fa fa-plane "></i>Pengiriman Barang </a></li>
					
                    <li><a href="index.php?halaman=jasakirim"><i class="fa fa-truck "></i>Jasa Pengiriman</a></li>
					<li><a href="index.php?halaman=lamakirim"><i class="fa fa-history "></i>Durasi Pengiriman </a></li>
					<li><a href="index.php?halaman=tujuankirim"><i class="fa fa-globe "></i>Tujuan Pengiriman</a></li>
                    <li><a href="index.php?halaman=pembayaran"><i class="fa fa-money "></i>Pembayaran</a></li>
                    <li><a href="index.php?halaman=statusbayar"><i class="fa fa-print "></i>Status Pembayaran</a></li>
					<li><a href="index.php?halaman=statusproses"><i class="fa fa-bolt"></i>Status Proses</a></li>
                    
                   
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
        
                <div class="row">
                    <div class="col-lg-12 ">
                        
                      <?php
					if (isset($_GET['halaman']))
					{
						if($_GET['halaman']=="barang")
						{
							include 'barang.php';
						}
						elseif($_GET['halaman']=="laporan")
						{
							include 'laporanpenjualan.php';
						}
						elseif($_GET['halaman']=="cetak")
						{
							include 'cetak.php';
						}
						elseif($_GET['halaman']=="caristok")
						{
							include 'caristok.php';
						}
						elseif($_GET['halaman']=="pencarianstok")
						{
							include 'pencarianstok.php';
						}
						elseif($_GET['halaman']=="customer")
						{
							include 'customer.php';
						}	
						elseif($_GET['halaman']=='jenis')
						{
							include 'jenis.php';
						}
						elseif($_GET['halaman']=='kategori')
						{
							include 'kategori.php';
						}
						elseif($_GET['halaman']=='satuan')
						{
							include 'satuan.php';
						}
						elseif($_GET['halaman']=='ukuran')
						{
							include 'ukuran.php';
						}
						
						elseif($_GET['halaman']=='faktur')
						{
							include 'faktur.php';
						}
						elseif($_GET['halaman']=='pengiriman')
						{
							include 'pengiriman.php';
						}
						
						elseif($_GET['halaman']=='jasakirim')
						{
							include 'jasakirim.php';
						}
						elseif($_GET['halaman']=='lamakirim')
						{
							include 'lamakirim.php';
						}
						elseif($_GET['halaman']=='tujuankirim')
						{
							include 'tujuankirim.php';
						}
						elseif($_GET['halaman']=='pembayaran')
						{
							include 'pembayaran.php';
						}
						elseif($_GET['halaman']=='statusbayar')
						{
							include 'statusbayar.php';
						}
						elseif($_GET['halaman']=='statusproses')
						{
							include 'statusproses.php';
						}
					
						elseif($_GET['halaman']=='tambahcustomer')
						{
							include 'tambahcustomer.php';
						}
						elseif($_GET['halaman']=='hapuscustomer')
						{
							include 'hapuscustomer.php';
						}
						elseif($_GET['halaman']=='ubahcustomer')
						{
							include 'ubahcustomer.php';
						}
					
						elseif($_GET['halaman']=='tambahbarang')
						{
							include 'tambahbarang.php';
						}
						elseif($_GET['halaman']=='hapusbarang')
						{
							include 'hapusbarang.php';
						}
						elseif($_GET['halaman']=='ubahbarang')
						{
							include 'ubahbarang.php';
						}

						elseif($_GET['halaman']=='tambahjenis')
						{
							include 'tambahjenis.php';
						}
						elseif($_GET['halaman']=='hapusjenis')
						{
							include 'hapusjenis.php';
						}
						elseif($_GET['halaman']=='ubahjenis')
						{
							include 'ubahjenis.php';
						}
						
						elseif($_GET['halaman']=='tambahkategori')
						{
							include 'tambahkategori.php';
						}
						elseif($_GET['halaman']=='hapuskategori')
						{
							include 'hapuskategori.php';
						}
						elseif($_GET['halaman']=='ubahkategori')
						{
							include 'ubahkategori.php';
						}
					
						elseif($_GET['halaman']=='tambahsatuan')
						{
							include 'tambahsatuan.php';
						}
						elseif($_GET['halaman']=='hapussatuan')
						{
							include 'hapussatuan.php';
						}
						elseif($_GET['halaman']=='ubahsatuan')
						{
							include 'ubahsatuan.php';
						}
						
						elseif($_GET['halaman']=='tambahukuran')
						{
							include 'tambahukuran.php';
						}
						elseif($_GET['halaman']=='hapusukuran')
						{
							include 'hapusukuran.php';
						}
						elseif($_GET['halaman']=='ubahukuran')
						{
							include 'ubahukuran.php';
						}
						
						elseif($_GET['halaman']=='tambahkategori')
						{
							include 'tambahkategori.php';
						}
						elseif($_GET['halaman']=='hapuskategori')
						{
							include 'hapuskategori.php';
						}
						elseif($_GET['halaman']=='ubahkategori')
						{
							include 'ubahkategori.php';
						}
						
						elseif($_GET['halaman']=='hapusfaktur')
						{
							include 'hapusfaktur.php';
						}
						elseif($_GET['halaman']=='ubahfaktur')
						{
							include 'ubahfaktur.php';
						}
						
						elseif($_GET['halaman']=='tambahpengiriman')
						{
							include 'tambahpengiriman.php';
						}
						elseif($_GET['halaman']=='hapuspengiriman')
						{
							include 'hapuspengiriman.php';
						}
						elseif($_GET['halaman']=='ubahpengiriman')
						{
							include 'ubahpengiriman.php';
						}
						
						elseif($_GET['halaman']=='tambahjasakirim')
						{
							include 'tambahjasakirim.php';
						}
						elseif($_GET['halaman']=='hapusjasakirim')
						{
							include 'hapusjasakirim.php';
						}
						elseif($_GET['halaman']=='ubahjasakirim')
						{
							include 'ubahjasakirim.php';
						}
						
						elseif($_GET['halaman']=='tambahlamakirim')
						{
							include 'tambahlamakirim.php';
						}
						elseif($_GET['halaman']=='hapuslamakirim')
						{
							include 'hapuslamakirim.php';
						}
						elseif($_GET['halaman']=='ubahlamakirim')
						{
							include 'ubahlamakirim.php';
						}
						
						elseif($_GET['halaman']=='tambahtujuankirim')
						{
							include 'tambahtujuankirim.php';
						}
						elseif($_GET['halaman']=='hapustujuankirim')
						{
							include 'hapustujuankirim.php';
						}
						elseif($_GET['halaman']=='ubahtujuankirim')
						{
							include 'ubahtujuankirim.php';
						}
						
						elseif($_GET['halaman']=='tambahpembayaran')
						{
							include 'tambahpembayaran.php';
						}
						elseif($_GET['halaman']=='hapuspembayaran')
						{
							include 'hapuspembayaran.php';
						}
						elseif($_GET['halaman']=='ubahpembayaran')
						{
							include 'ubahpembayaran.php';
						}
						
						elseif($_GET['halaman']=='tambahstatbayar')
						{
							include 'tambahstatbayar.php';
						}
						elseif($_GET['halaman']=='hapusstatbayar')
						{
							include 'hapusstatbayar.php';
						}
						elseif($_GET['halaman']=='ubahstatbayar')
						{
							include 'ubahstatbayar.php';
						}
						
						elseif($_GET['halaman']=='tambahstatproses')
						{
							include 'tambahstatproses.php';
						}
						elseif($_GET['halaman']=='hapusstatproses')
						{
							include 'hapusstatproses.php';
						}
						elseif($_GET['halaman']=='ubahstatproses')
						{
							include 'ubahstatproses.php';
						}
						elseif($_GET['halaman']=='penilaian')
						{
							include 'penilaian.php';
						}
						
						elseif($_GET['halaman']=="pencariancustomer")
						{
							include 'pencariancustomer.php';
						}
						elseif($_GET['halaman']=="pencarianbarang")
						{
							include 'pencarianbarang.php';
						}	
						elseif($_GET['halaman']=='pencarianjenis')
						{
							include 'pencarianjenis.php';
						}
						elseif($_GET['halaman']=='pencariankategori')
						{
							include 'pencariankategori.php';
						}
						elseif($_GET['halaman']=='pencariansatuan')
						{
							include 'pencariansatuan.php';
						}
						elseif($_GET['halaman']=='pencarianukuran')
						{
							include 'pencarianukuran.php';
						}
						
						elseif($_GET['halaman']=='pencarianpengiriman')
						{
							include 'pencarianpengiriman.php';
						}
						
						elseif($_GET['halaman']=='pencarianjasakirim')
						{
							include 'pencarianjasakirim.php';
						}
						elseif($_GET['halaman']=='pencarianlamakirim')
						{
							include 'pencarianlamakirim.php';
						}
						elseif($_GET['halaman']=='pencariantujuankirim')
						{
							include 'pencariantujuankirim.php';
						}
						elseif($_GET['halaman']=='pencarianpembayaran')
						{
							include 'pencarianpembayaran.php';
						}
						elseif($_GET['halaman']=='pencarianstatbayar')
						{
							include 'pencarianstatbayar.php';
						}
						elseif($_GET['halaman']=='pencarianstatproses')
						{
							include 'pencarianstatproses.php';
						}
						elseif($_GET['halaman']=='pencarianfaktur')
						{
							include 'pencarianfaktur.php';
						}
						elseif($_GET['halaman']=='detail')
						{
							include 'detail.php';
						}
						elseif($_GET['halaman']=='penilaian')
						{
							include 'penilaian.php';
						}
						elseif($_GET['halaman']=='bayar')
						{
							include 'bayar.php';
						}
						elseif($_GET['halaman']=='print')
						{
							include 'print.php';
						}
						elseif($_GET['halaman']=='searchstok')
						{
							include 'searchstok.php';
						}
						elseif($_GET['halaman']=='searchfaktur')
						{
							include 'searchfaktur.php';
						}
						elseif($_GET['halaman']=='rating')
						{
							include 'rating.php';
						}
						
						elseif($_GET['halaman']=='pencarianrating')
						{
							include 'pencarianrating.php';
						}
					}
					else
					{
						include 'home.php';
					}
					
					?> 
					   
					   
					  
                    </div>
                 </div>
                 
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
