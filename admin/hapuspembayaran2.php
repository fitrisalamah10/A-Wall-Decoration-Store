<?php
$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE id_bayar='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM pembayaran WHERE id_bayar='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=pembayaran2';</script>";
?>