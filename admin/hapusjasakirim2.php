<?php
$ambil=$koneksi->query("SELECT * FROM jasa_kirim WHERE id_jasakirim='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM jasa_kirim WHERE id_jasakirim='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=jasakirim2';</script>";
?>