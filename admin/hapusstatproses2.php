<?php
$ambil=$koneksi->query("SELECT * FROM status_proses WHERE id_statproses='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM status_proses WHERE id_statproses='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=statusproses2';</script>";
?>