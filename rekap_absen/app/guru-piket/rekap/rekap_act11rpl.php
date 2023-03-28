<?php
$k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$tanggal = $_POST['tanggal'];
$ket = $_POST['ket'];
$nama = $_POST['nama'];
$cekNIS = mysqli_query($k,"SELECT * FROM t_siswa WHERE nama='$nama'");
$d = mysqli_fetch_array($cekNIS);
$nis = $d['nis'];
$id = $_POST['id'];

mysqli_query($k, "insert into t_rekap values('$id','$nis','$tanggal','$ket')");
header('location:rekap11rpl.php');
