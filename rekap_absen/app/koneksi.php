<?php

$koneksi =mysqli_connect('localhost','root','','data_rekapabsen');

if(mysqli_connect_errno()){
    echo'Koneksi Database Gagal:'.mysqli_connect_error();
}

?>