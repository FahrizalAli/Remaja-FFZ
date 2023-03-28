<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sekolah | Buku Tamu</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css">

</head>

<body id="page-top">
  <?php
  session_start();
  if ($_SESSION['level'] != 'kepsek') {
    header('location:../index.php?data=belum_login');
  }
  ?>
  <?php
  include '../koneksi.php';
  ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion side-nav" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../img/rpl-ok.png" alt="" style="width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 12px;">SMKN 7 Batam</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active mb-2">
        <a class="nav-link" href="index.php">
          <i class="fa fa-bullhorn"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="riwayat-tamu.php">
          <i class="fa fa-user-circle"></i>
          <span>Riwayat</span></a>
      </li>

      <!-- Heading -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <div class="copyright text-center text-white my-auto copy-betul">
        <span>Copyright &copy; 4ever 2022</span>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>




            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">List Buku Tamu</h1>

          <!-- <div class="d-flex justify-content-end my-2">
            <input class="form-control col-2 d-flex text-end" type="text" id="search" name="search" placeholder="Search" aria-label="Search">
          </div> -->




          <!-- <form action="riwayat-tamu.php" method="GET">
            <div class="row mb-3">
              <div class="col-sm-3">
                <input class="form-control d-flex text-center" type="text" id="search" name="search" placeholder="Cari Nama/Instansi" aria-label="search">
              </div>
              <div class="col-sm-3">
                <input class="form-control d-flex text-center" type="date" id="caritanggal" name="caritanggal" aria-label="caritanggal">
              </div>
              <button class="btn btn-outline-success">Cari</button>
            </div>
          </form> -->



          <form action="riwayat-tamu.php" method="GET">
            <div class="row mb-3">
              <div class="col-sm-3">
                <input class="form-control d-flex text-center" type="text" id="search" name="satu" placeholder="Cari Nama/Instansi" aria-label="search" onkeyup="caps1()">
              </div>
              <div class="col-sm-3 d-flex">
                <p>Dari</p><input class="form-control d-flex text-center" type="date" id="caritanggal" name="dua" aria-label="caritanggal">
              </div>
              <div class="col-sm-3 d-flex">
                <p>Sampai</p><input class="form-control d-flex text-center" type="date" id="caritanggal" name="tiga" aria-label="caritanggal">
              </div>
              <button class="btn btn-success mx-1">Cari</button>
              <a href="riwayat-tamu.php" class="btn btn-outline-success">Reset</a>
            </div>
          </form>
          <!-- <div class="select_tanggal"><input type="text" id="search" name="search"></div> -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between">
            <p>List Buku Tamu yang Telah Terinput</p>
          </div> -->
          <!-- DataTales Example -->
          <div id="hasil">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <div class="overflow-table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead class="position-stc">
                        <tr>
                          <th>Tanggal</th>
                          <th>Nama</th>
                          <th>No Telepon</th>
                          <th>Instansi</th>
                          <th>Keperluan</th>
                          <th>Foto | Tanda Tangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        include '../koneksi.php';
                        // $keyword = "";

                        if (isset($_GET['satu']) && $_GET['dua'] && $_GET['tiga']) {
                          $name = $_GET['satu'];
                          $tanggalAwal = $_GET['dua'];
                          $tanggalAhir = $_GET['tiga'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $name . "%' and tanggal between '$tanggalAwal' AND '$tanggalAhir'  or instansi like '%" . $name . "%' and tanggal between '$tanggalAwal' AND '$tanggalAhir' ");
                        } elseif (isset($_GET['satu']) && $_GET['dua'] == "" && $_GET['tiga'] == "") {
                          $name = $_GET['satu'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $name . "%' or instansi like '%" . $name . "%' ");
                        } elseif (isset($_GET['dua']) && $_GET['tiga'] && $_GET['satu'] == "") {
                          $tanggalAwal = $_GET['dua'];
                          $tanggalAhir = $_GET['tiga'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal between '$tanggalAwal' and '$tanggalAhir'  ");
                        } elseif (isset($_GET['satu']) && $_GET['dua'] && $_GET['tiga'] == "") {
                          $name = $_GET['satu'];
                          $tanggalAwal = $_GET['dua'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $name . "%' and tanggal='$tanggalAwal' or instansi like '%" . $name . "%' and tanggal='$tanggalAwal' ");
                        } elseif (isset($_GET['satu']) && $_GET['tiga'] && $_GET['dua'] == "") {
                          $name = $_GET['satu'];
                          $tanggalAhir = $_GET['tiga'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $name . "%' and tanggal='$tanggalAhir' or instansi like '%" . $name . "%' and tanggal='$tanggalAhir'  ");
                        } elseif (isset($_GET['dua']) && $_GET['satu'] == "" && $_GET['tiga'] == "") {
                          $tanggalAwal = $_GET['dua'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal='$tanggalAwal' ");
                        } elseif (isset($_GET['tiga']) && $_GET['satu'] == "" && $_GET['dua'] == "") {
                          $tanggalAhir = $_GET['tiga'];
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal='$tanggalAhir' ");
                        } else {
                          $query = mysqli_query($koneksi, "SELECT * FROM t_tamu ");
                        }
                        $hitung = mysqli_num_rows($query);
                        while ($d = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <td hidden><?= $d['id_tamu']; ?></td>
                            <td><?= $d['tanggal']; ?></td>
                            <td><?= $d['nama_tamu']; ?></td>
                            <td><?= $d['no_telepon']; ?></td>
                            <td><?= $d['instansi'] ?></td>
                            <td><?= $d['keperluan'] ?></td>
                            <td>
                              <a href="show-img.php?foto=<?= $d['id_tamu'] ?>" class="d-none d-sm-inline-block w-100 btn btn-sm btn-success shadow-sm"><i class="fa fa-eye mr-2 text-white"></i>Lihat</a>
                            </td>
                          </tr>
                          </td>
                          </tr>
                        <?php
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

        

        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../js/sb-admin-2.js"></script>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
  

  <script type="text/javascript">
     let guid = () => {
      let s4 = () => {
        return Math.floor((1 + Math.random()) * 0x10000)
          .toString(16)
          .substring(1);
      }
      //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
      let abc = s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4()
      let inputId = `<input type="hidden" value="${abc}" id="id-gen" name="id">`
      $('#password').append(inputId)
    }

    function caps1(){
      let inputSearch = document.getElementById('search')
      inputSearch.value = inputSearch.value.toUpperCase()
    }
  </script>
</body>

</html>