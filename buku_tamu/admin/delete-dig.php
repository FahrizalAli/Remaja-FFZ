<?php
include '../koneksi.php';
$i = $_GET ['id'];
mysqli_query($koneksi,"delete from t_digital where id_tamu='$i'");
header("location:riwayat-tamu.php");
?>