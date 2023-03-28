<?php
$k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');

$id = $_POST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($k, "update t_user set username='$username', password='$password', level='$level' where id='$id'");

header('location:../table_user.php');
