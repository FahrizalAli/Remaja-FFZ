<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_buku_tamu');


//mendefinisikan folder
define('UPLOAD_DIR', 'signature/'); {
    $data_uri = $_POST['tanda'];
    $sig       = $_POST['ttd'];

    $encoded_image = explode(",", $data_uri)[1];
    $decoded_image = base64_decode($encoded_image);

    $file2      = uniqid() . '.png';

    file_put_contents(UPLOAD_DIR . $file2, $decoded_image);
};

define('UPLOAD_DIR2', 'gambar/'); {
    //menangkap variabel
    $img        = $_POST['image'];

    $img        = str_replace('data:image/jpeg;base64,', '', $img);
    $img        = str_replace(' ', '+', $img);

    //resource gambar diubah dari encode
    $data       = base64_decode($img);
    //menamai file, file dinamai secara random dengan unik
    $file       = uniqid() . '.png';

    //memindahkan file ke folder upload
    file_put_contents(UPLOAD_DIR2 . $file, $data);
} ;
//koneksi ke database
$id = $_POST['id'];


//memasukkan data ke dalam tabel biodata
mysqli_query($koneksi, "insert into t_digital set id_tamu='$id', foto='$file', ttd='$file2'");

header("location:input-tamu.php");

?>