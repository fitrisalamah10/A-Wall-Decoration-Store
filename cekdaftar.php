<?php
   require_once("admin/koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['pass'];
   $nama = $_POST['nama_customer'];
   $alamat = $_POST['alamat'];
   $kota = $_POST['kota'];
   $nohp = $_POST['no_hp'];
   $sql = "SELECT * FROM customer WHERE username = '$username'";
   $query = $koneksi->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'><h1>Username Sudah Terdaftar! <a href='daftar.php'>Back?</a></div>";
   } else {
   if(!$username || !$pass ||!$nama ||!$alamat  ||!$kota ||!$nohp ) {
       echo "<div align='center'><h1>Masih ada data yang kosong!</h1> <a href='daftar.php'>Back?</a>";
     } else {
       $data = "INSERT INTO customer VALUES ('$username', '$pass', '$nama','$alamat','$kota','$nohp')";
       $simpan = $koneksi->query($data);
       if($simpan) {
         echo "<div align='center'><h1>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</h1></a></div>";
       } else {
         echo "<div align='center'><h1>Proses Gagal!</h1></div>";
       }
     }
   }
?>