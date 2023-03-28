<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sekolah | Buku Tamu</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-success">

    <div class="container">

    <div class="card shadow my-5">
        <div class="card-body">
            
        <div class="row">
            <?php
            //koneksi ke database
            $koneksi    = new mysqli('localhost', 'root', '', 'db_buku_tamu');

            $id = $_GET['foto'];
            //mengambil data ke tabel biodata
            $select     = mysqli_query($koneksi, "select * from t_digital where id_tamu='$id'");

            //melakukan looping dengan while
            while ($hasil = mysqli_fetch_array($select)) {
            ?>

                <div class="col-md-6 mt-5"><img src='tandtangan/<?php echo $hasil['foto']; ?>' /></div>
                

            <?php } ?>

            

        </div>

        <div class="text-center " style="text-decoration: none;">
                        <a class="btn btn-success my-2 w-100" href="./riwayat-tamu.php">Kembali</a>
                    </div>

        </div>
    </div>

    </div>








    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>