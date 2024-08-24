<?php
$koneksi=new mysqli("localhost","root","","awalldecoration_store");


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A Wall Decoration Store : Super Admin</title>
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
                
                    <li ><a href="index2.php" ><i class="fa fa-desktop "></i>Dashboard </a></li>
                    <li><a href="index2.php?halaman=customer2"><i class="fa fa-user "></i>Customer </a></li>
					<li><a href="index2.php?halaman=barang2"><i class="fa fa-archive "></i>Barang</a></li>
					<li><a href="index2.php?halaman=jenis2"><i class="fa fa-inbox "></i>Jenis Barang </a></li>
                    <li><a href="index2.php?halaman=kategori2"><i class="fa fa-list "></i>Kategori Barang</a></li>
                    <li><a href="index2.php?halaman=satuan2"><i class="fa fa-table "></i>Satuan Barang</a></li>
					<li><a href="index2.php?halaman=ukuran2"><i class="fa fa-qrcode"></i>Ukuran Barang </a></li>
					
					<li><a href="index2.php?halaman=faktur2"><i class="fa fa-file "></i>Faktur</a></li>
					<li><a href="index2.php?halaman=pengiriman2"><i class="fa fa-plane "></i>Pengiriman Barang </a></li>
					
                    <li><a href="index2.php?halaman=jasakirim2"><i class="fa fa-truck "></i>Jasa Pengiriman</a></li>
					<li><a href="index2.php?halaman=lamakirim2"><i class="fa fa-history "></i>Durasi Pengiriman </a></li>
					<li><a href="index2.php?halaman=tujuankirim2"><i class="fa fa-globe "></i>Tujuan Pengiriman</a></li>
                    <li><a href="index2.php?halaman=pembayaran2"><i class="fa fa-money "></i>Pembayaran</a></li>
                    <li><a href="index2.php?halaman=statusbayar2"><i class="fa fa-print "></i>Status Pembayaran</a></li>
					<li><a href="index2.php?halaman=statusproses2"><i class="fa fa-bolt "></i>Status Proses</a></li>
                    
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
						if($_GET['halaman']=="barang2")
						{
							include 'barang2.php';
						}
						elseif($_GET['halaman']=="laporan2")
						{
							include 'laporanpenjualan2.php';
						}
						elseif($_GET['halaman']=="cetak2")
						{
							include 'cetak2.php';
						}
						elseif($_GET['halaman']=="customer2")
						{
							include 'customer2.php';
						}	
						elseif($_GET['halaman']=='jenis2')
						{
							include 'jenis2.php';
						}
						elseif($_GET['halaman']=='kategori2')
						{
							include 'kategori2.php';
						}
						elseif($_GET['halaman']=='satuan2')
						{
							include 'satuan2.php';
						}
						elseif($_GET['halaman']=='ukuran2')
						{
							include 'ukuran2.php';
						}
						
						elseif($_GET['halaman']=='faktur2')
						{
							include 'faktur2.php';
						}
						elseif($_GET['halaman']=='pengiriman2')
						{
							include 'pengiriman2.php';
						}
						
						elseif($_GET['halaman']=='jasakirim2')
						{
							include 'jasakirim2.php';
						}
						elseif($_GET['halaman']=='lamakirim2')
						{
							include 'lamakirim2.php';
						}
						elseif($_GET['halaman']=='tujuankirim2')
						{
							include 'tujuankirim2.php';
						}
						elseif($_GET['halaman']=='pembayaran2')
						{
							include 'pembayaran2.php';
						}
						elseif($_GET['halaman']=='statusbayar2')
						{
							include 'statusbayar2.php';
						}
						elseif($_GET['halaman']=='statusproses2')
						{
							include 'statusproses2.php';
						}
						elseif($_GET['halaman']=='user')
						{
							include 'user.php';
						}
					
						elseif($_GET['halaman']=='hapususer')
						{
							include 'hapususer.php';
						}
						elseif($_GET['halaman']=='tambahuser')
						{
							include 'tambahuser.php';
						}
						elseif($_GET['halaman']=='ubahuser')
						{
							include 'ubahuser.php';
						}
					
						elseif($_GET['halaman']=='tambahcustomer2')
						{
							include 'tambahcustomer2.php';
						}
						elseif($_GET['halaman']=='hapuscustomer2')
						{
							include 'hapuscustomer2.php';
						}
						elseif($_GET['halaman']=='ubahcustomer2')
						{
							include 'ubahcustomer2.php';
						}
					
						elseif($_GET['halaman']=='tambahbarang2')
						{
							include 'tambahbarang2.php';
						}
						elseif($_GET['halaman']=='hapusbarang2')
						{
							include 'hapusbarang2.php';
						}
						elseif($_GET['halaman']=='ubahbarang2')
						{
							include 'ubahbarang2.php';
						}

						elseif($_GET['halaman']=='tambahjenis2')
						{
							include 'tambahjenis2.php';
						}
						elseif($_GET['halaman']=='hapusjenis2')
						{
							include 'hapusjenis2.php';
						}
						elseif($_GET['halaman']=='ubahjenis2')
						{
							include 'ubahjenis2.php';
						}
						
						elseif($_GET['halaman']=='tambahkategori2')
						{
							include 'tambahkategori2.php';
						}
						elseif($_GET['halaman']=='hapuskategori2')
						{
							include 'hapuskategori2.php';
						}
						elseif($_GET['halaman']=='ubahkategori2')
						{
							include 'ubahkategori2.php';
						}
					
						elseif($_GET['halaman']=='hapusfaktur2')
						{
							include 'hapusfaktur2.php';
						}
						elseif($_GET['halaman']=='ubahfaktur2')
						{
							include 'ubahfaktur2.php';
						}
					
						elseif($_GET['halaman']=='tambahsatuan2')
						{
							include 'tambahsatuan2.php';
						}
						elseif($_GET['halaman']=='hapussatuan2')
						{
							include 'hapussatuan2.php';
						}
						elseif($_GET['halaman']=='ubahsatuan2')
						{
							include 'ubahsatuan2.php';
						}
						
						elseif($_GET['halaman']=='tambahukuran2')
						{
							include 'tambahukuran2.php';
						}
						elseif($_GET['halaman']=='hapusukuran2')
						{
							include 'hapusukuran2.php';
						}
						elseif($_GET['halaman']=='ubahukuran2')
						{
							include 'ubahukuran2.php';
						}
						
						elseif($_GET['halaman']=='tambahkategori2')
						{
							include 'tambahkategori2.php';
						}
						elseif($_GET['halaman']=='hapuskategori2')
						{
							include 'hapuskategori2.php';
						}
						elseif($_GET['halaman']=='ubahkategori2')
						{
							include 'ubahkatefori2.php';
						}
						
						elseif($_GET['halaman']=='tambahpengiriman2')
						{
							include 'tambahpengiriman2.php';
						}
						elseif($_GET['halaman']=='hapuspengiriman2')
						{
							include 'hapuspengiriman2.php';
						}
						elseif($_GET['halaman']=='ubahpengiriman2')
						{
							include 'ubahpengiriman2.php';
						}
						
						elseif($_GET['halaman']=='tambahjasakirim2')
						{
							include 'tambahjasakirim2.php';
						}
						elseif($_GET['halaman']=='hapusjasakirim2')
						{
							include 'hapusjasakirim2.php';
						}
						elseif($_GET['halaman']=='ubahjasakirim2')
						{
							include 'ubahjasakirim2.php';
						}
						
						elseif($_GET['halaman']=='tambahlamakirim2')
						{
							include 'tambahlamakirim2.php';
						}
						elseif($_GET['halaman']=='hapuslamakirim2')
						{
							include 'hapuslamakirim2.php';
						}
						elseif($_GET['halaman']=='ubahlamakirim2')
						{
							include 'ubahlamakirim2.php';
						}
						
						elseif($_GET['halaman']=='tambahtujuankirim2')
						{
							include 'tambahtujuankirim2.php';
						}
						elseif($_GET['halaman']=='hapustujuankirim2')
						{
							include 'hapustujuankirim2.php';
						}
						elseif($_GET['halaman']=='ubahtujuankirim2')
						{
							include 'ubahtujuankirim2.php';
						}
						
						elseif($_GET['halaman']=='tambahpembayaran2')
						{
							include 'tambahpembayaran2.php';
						}
						elseif($_GET['halaman']=='hapuspembayaran2')
						{
							include 'hapuspembayaran2.php';
						}
						elseif($_GET['halaman']=='ubahpembayaran2')
						{
							include 'ubahpembayaran2.php';
						}
						
						elseif($_GET['halaman']=='tambahstatbayar2')
						{
							include 'tambahstatbayar2.php';
						}
						elseif($_GET['halaman']=='hapusstatbayar2')
						{
							include 'hapusstatbayar2.php';
						}
						elseif($_GET['halaman']=='ubahstatbayar2')
						{
							include 'ubahstatbayar2.php';
						}
						
						elseif($_GET['halaman']=='tambahstatproses2')
						{
							include 'tambahstatproses2.php';
						}
						elseif($_GET['halaman']=='hapusstatproses2')
						{
							include 'hapusstatproses2.php';
						}
						elseif($_GET['halaman']=='ubahstatproses2')
						{
							include 'ubahstatproses2.php';
						}
						elseif($_GET['halaman']=='penilaian2')
						{
							include 'penilaian2.php';
						}
						
						elseif($_GET['halaman']=="pencariancustomer2")
						{
							include 'pencariancustomer2.php';
						}
						elseif($_GET['halaman']=="pencarianbarang2")
						{
							include 'pencarianbarang2.php';
						}	
						elseif($_GET['halaman']=='pencarianjenis2')
						{
							include 'pencarianjenis2.php';
						}
						elseif($_GET['halaman']=='pencariankategori2')
						{
							include 'pencariankategori2.php';
						}
						elseif($_GET['halaman']=='pencariansatuan2')
						{
							include 'pencariansatuan2.php';
						}
						elseif($_GET['halaman']=='pencarianukuran2')
						{
							include 'pencarianukuran2.php';
						}
						
						elseif($_GET['halaman']=='pencarianpengiriman2')
						{
							include 'pencarianpengiriman2.php';
						}
						
						elseif($_GET['halaman']=='pencarianjasakirim2')
						{
							include 'pencarianjasakirim2.php';
						}
						elseif($_GET['halaman']=='pencarianlamakirim2')
						{
							include 'pencarianlamakirim2.php';
						}
						elseif($_GET['halaman']=='pencariantujuankirim2')
						{
							include 'pencariantujuankirim2.php';
						}
						elseif($_GET['halaman']=='pencarianpembayaran2')
						{
							include 'pencarianpembayaran2.php';
						}
						elseif($_GET['halaman']=='pencarianstatbayar2')
						{
							include 'pencarianstatbayar2.php';
						}
						elseif($_GET['halaman']=='pencarianstatproses2')
						{
							include 'pencarianstatproses2.php';
						}
						elseif($_GET['halaman']=='pencarianfaktur2')
						{
							include 'pencarianfaktur2.php';
						}
						elseif($_GET['halaman']=='detail2')
						{
							include 'detail2.php';
						}
						elseif($_GET['halaman']=='penilaian2')
						{
							include 'penilaian2.php';
						}
						
						
						elseif($_GET['halaman']=='bayar2')
						{
							include 'bayar2.php';
						}
						elseif($_GET['halaman']=="caristok2")
						{
							include 'caristok2.php';
						}
						elseif($_GET['halaman']=="pencarianstok2")
						{
							include 'pencarianstok2.php';
						}
						
						elseif($_GET['halaman']=='searchstok2')
						{
							include 'searchstok2.php';
						}
						elseif($_GET['halaman']=='searchfaktur2')
						{
							include 'searchfaktur2.php';
						}
						elseif($_GET['halaman']=='rating2')
						{
							include 'rating2.php';
						}
						
						elseif($_GET['halaman']=='pencarianrating2')
						{
							include 'pencarianrating2.php';
						}
					}
					else
					{
						include 'home2.php';
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
