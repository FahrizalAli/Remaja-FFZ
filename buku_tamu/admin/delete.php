<?php
include '../koneksi.php';
$i = $_GET ['id'];
mysqli_query($koneksi,"delete from t_tamu where id_tamu='$i'");
header("location:delete-dig.php?id=$i");
?>