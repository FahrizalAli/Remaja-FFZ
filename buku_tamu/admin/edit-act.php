<?php 

include '../koneksi.php';

$i = $_POST['id_tamu'];
$nama = $_POST['nama'];
$notel = $_POST['notelepon'];
$instansi = $_POST['instansi'];
$keperluan = $_POST['keperluan'];

mysqli_query($koneksi, "update t_tamu set nama_tamu='$nama', no_telepon='$notel', instansi='$instansi', keperluan='$keperluan' where id_tamu='$i'");

header("location:riwayat-tamu.php");

?>