<?php
$ambil=$koneksi->query("SELECT * FROM faktur WHERE id_faktur='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM faktur WHERE id_faktur='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=faktur2';</script>";
?>