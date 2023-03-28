<?php
$k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$id =$_POST['id'];
$tanggal = $_POST['tanggal'];
$ket = $_POST['ket'];
$nama = $_POST['nama'];
$cekNIS = mysqli_query($k,"SELECT * FROM t_siswa WHERE nama='$nama'");
$d = mysqli_fetch_array($cekNIS);
$nis = $d['nis'];


mysqli_query($k, "update t_rekap set nis='$nis', tanggal='$tanggal', ket='$ket' where id='$id'");

header('location:rekap11rpl.php');
