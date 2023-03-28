<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "delete from t_user where id='$id'");
header('location:index.php?data=table-user');
