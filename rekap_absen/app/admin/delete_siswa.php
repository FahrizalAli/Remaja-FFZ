<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$nis = $_GET['nis'];
mysqli_query($koneksi, "delete from t_siswa where nis='$nis'");
header('location:index.php?data=table siswa');
