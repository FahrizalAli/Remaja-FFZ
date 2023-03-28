<?php
include '../koneksi.php';


$nis = $_POST['nis'];
$jurusan = $_POST['jurusan'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];

mysqli_query($koneksi, "insert into t_siswa values('$nis','$nama','$jurusan','$kelas')");
header('location:table_siswa.php');
