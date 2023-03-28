<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_buku_tamu');

define('UPLOAD_DIR', 'tandtangan/');

$data_uri = $_POST['foto'];

$encoded_image = explode(",", $data_uri)[1];
$decoded_image = base64_decode($encoded_image);

$file2      = uniqid() . '.png';

file_put_contents(UPLOAD_DIR . $file2, $decoded_image);


$id_min = $_POST['id'];
//memasukkan data ke dalam tabel biodata
mysqli_query($koneksi, "insert into t_ttd set id_ttdmin='$id_min', adminttd='$file2'");

?>