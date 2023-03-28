<?php
$k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];
$ket = $_POST['ket'];

mysqli_query($k, "insert into t_rekap values('','$tanggal','$nama','$jurusan','$kelas','$ket')");
header('location:rekap10rpl.php');
