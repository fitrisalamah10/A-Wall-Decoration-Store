<?php
$ambil=$koneksi->query("SELECT * FROM user WHERE username='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM user WHERE username='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=user';</script>";
?>