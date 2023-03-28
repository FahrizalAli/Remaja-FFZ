<?php
include '../koneksi.php';


$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($koneksi, "insert into t_user values('','$username','$password','$level')");
header('location:table_user.php');
