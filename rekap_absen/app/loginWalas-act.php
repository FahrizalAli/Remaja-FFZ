<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$login = mysqli_query($koneksi, "select*from t_walas where username='$username'and password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    $_SESSION['kelas'] = $data['kelas'];
    $_SESSION['jurusan'] = $data['jurusan'];
    $_SESSION['username'] = $username;
    header("location:walas/index.php");
}else {
    header("location:index.php?data=gagal");
}
 
