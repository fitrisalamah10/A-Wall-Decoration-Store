<?php
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $level = $_POST['level'];
   $sql = "SELECT * FROM user WHERE username = '$username'";
   $query = $koneksi->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'><h1>Username Sudah Terdaftar! <a href='daftarakun.php'>Back?</a></div>";
   } else {
     if(!$username || !$pass || !$level) {
       echo "<div align='center'><h1>Masih ada data yang kosong!</h1> <a href='daftarakun.php'>Back?</a>";
     } else {
       $data = "INSERT INTO user VALUES ('$username', '$pass','$level')";
       $simpan = $koneksi->query($data);
       if($simpan) {
         echo "<div align='center'><h1>Pendaftaran Sukses, Silahkan <a href='loginakun.php'>Login</h1></a></div>";
       } else {
         echo "<div align='center'><h1>Proses Gagal!</h1></div>";
       }
     }
   }
?>