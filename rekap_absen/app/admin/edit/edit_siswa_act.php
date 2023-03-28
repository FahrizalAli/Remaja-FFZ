<?php
$k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];

mysqli_query($k, "update t_siswa set jurusan='$jurusan', nama='$nama', kelas='$kelas' where nis='$nis'");

header('location:../table_siswa.php');
