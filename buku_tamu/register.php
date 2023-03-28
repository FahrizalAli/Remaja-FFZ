<?php 
include './koneksi.php';

$u =$_POST['username'];
$p =$_POST['password']; 
$l =$_POST['level'];

$p = password_hash($p, PASSWORD_DEFAULT);

mysqli_query($koneksi,"insert into t_login values ('','$u','$p','$l')"); 
   
header("location:index.php");
?>