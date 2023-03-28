<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$id = $_GET['id'];
mysqli_query($koneksi, "delete from t_rekap where id='$id'");
header('location:rekap10rpl.php');
