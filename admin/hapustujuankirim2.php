<?php
$ambil=$koneksi->query("SELECT * FROM tujuan_kirim WHERE id_tujuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM tujuan_kirim WHERE id_tujuan='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=tujuankirim2';</script>";
?>