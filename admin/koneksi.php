<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($koneksi&&$db_name){
}else{
?>
	echo'Gagal Koneksi!';
<?php
}