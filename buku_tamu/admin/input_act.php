<?php 

include '../koneksi.php';


$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$notel = $_POST['notelepon'];
$instansi = $_POST['instansi'];
$keperluan = $_POST['keperluan'];

mysqli_query($koneksi,"insert into t_tamu values('$id','$tanggal','$nama','$notel','$instansi','$keperluan')");

header("location:input-digital.php?id=$id");








?>