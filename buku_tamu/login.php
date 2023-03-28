<?php
session_start();
include './koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($koneksi, "select * from t_login where username='$username'");
if (mysqli_num_rows($data) === 1) {

    $row = mysqli_fetch_assoc($data);

    if (password_verify($password, $row["password"])) {
        if ($row['level'] == 'admin') {
            $_SESSION['level'] = 'admin';
            $_SESSION['username'] = $username;
            header('location:./admin/index.php');
        } elseif ($row['level'] == 'kepsek') {
            $_SESSION['level'] = 'kepsek';
            $_SESSION['username'] = $username;
            header('location:./kepsek/index.php');
        }
    }else{
        header('location:index.php?data=gagal');
    }
}
