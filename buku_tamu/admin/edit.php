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

<body class="bg-gradient-success">
  <?php
  session_start();
  if ($_SESSION['level'] == '') {
    header('location:../index.php?data=belum_login');
  }
  ?>
  <?php
  include '../koneksi.php';
  ?>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halo, Sapa dari saya</h1>
                  </div>

                  <!-- form input -->
                  <?php
                  $id = $_GET['id'];
                  $data = mysqli_query($koneksi, "select * from t_tamu where id_tamu='$id'");
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <form class="user" action="edit-act.php" method="POST">

                      <div class="form-group">
                        <input type="hidden" name="id_tamu" value="<?= $d['id_tamu'] ?>">
                        <input type="text" class="form-control form-control-user" name="nama" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama" value="<?= $d['nama_tamu'] ?>">
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control form-control-user" name="notelepon" id="exampleInputPassword" placeholder="No Telepon" value="<?= $d['no_telepon'] ?>">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="instansi" id="exampleInputPassword" placeholder="Instansi" value="<?= $d['instansi'] ?>">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="keperluan" id="exampleInputPassword" placeholder="Keperluan" value="<?= $d['keperluan'] ?>">
                      </div>
                      <button type="submit" class="btn btn-success btn-user btn-block" onclick="return confirm('Berhasil di Ubah')">
                        Ubah
                      </button>
                      <div class="text-center" style="text-decoration: none;">
                        <a class="btn btn-light w-100 my-2" href="./riwayat-tamu.php">Kembali</a>
                      </div>

                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
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