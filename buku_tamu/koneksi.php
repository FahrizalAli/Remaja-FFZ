<?php
//nama host,Uasername,password dan nama database
$koneksi = mysqli_connect("localhost","root","","db_buku_tamu");
//Periksa Koneksi
if (mysqli_connect_errno()){
            echo "Koneksi database gagal:" .mysqli_connect_error();
}

?>