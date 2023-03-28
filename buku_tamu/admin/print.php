<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Buku Tamu</title>
  <link rel="stylesheet" href="style.css">
  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
 
  <width="100" height="75">
  <table class="kop-surat" style="width: 100%; color: black;">
            <tr>
                <td><img style="width: 120px; margin-left: 45px;"  src="../img/pemko.png" alt=""></td>
                <td>
                    <h2 class="text-center ">PEMERINTAHAN PROVINSI KEPULAUAN RIAU</h2>
                    <h2 class="text-center">DINAS PENDIDIKAN</h2>
                    <h2 class="text-center">SMK NEGERI 7 BATAM</h2>
                    <h4 class="text-center">PERUM SEKAWAN PEMKO</h4>
                    <h4 class="text-center">KELURAHAN BELIAN KECAMATAN BATAM KOTA – KOTA BATAM </h4>
                    <h4 class="text-center">NPSN 69774885 NSS 401316012001</h4>
                    <h4 class="text-center">Telp. (0778) 4805790 Web : smknegeri7batam.sch.id, Email : smknegeri7batam@gmail.com</h4>  
                 </td>              
            </tr>
           </table>
           <hr  style="border-bottom: 5px solid #000; max-width: 100vw;">
           <h5 class="text-right" style="font-size: 16px; color: #000;">Kode Pos: 29464</h5>
            
    <hr>
    <width="100" height="75">
      </hr>
      <table class="table table-bordered  justify-content-md-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Instansi</th>
            <th>Keperluan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_POST['search']) && $_POST['date1'] && $_POST['date2']) {
            $nama = $_POST['search'];
            $tanggal1 = $_POST['date1'];
            $tanggal2 = $_POST['date2'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' and tanggal between '$tanggal1' AND '$tanggal2'  or instansi like '%" . $nama . "%' and tanggal between '$tanggal1' AND '$tanggal2' ");
          } elseif ($_POST['search'] && $_POST['date1'] == "" && $_POST['date2'] == "") {
            $nama = $_POST['search'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' or instansi like '%" . $nama . "%' ");
          } elseif ($_POST['search'] && $_POST['date1'] && $_POST['date2'] == "") {
            $nama = $_POST['search'];
            $tanggal1 = $_POST['date1'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' and tanggal='$tanggal1' or instansi like '%" . $nama . "%' and tanggal='$tanggal1'");
          } elseif ($_POST['search'] && $_POST['date2'] && $_POST['date1'] == "") {
            $nama = $_POST['search'];
            $tanggal2 = $_POST['date2'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' and tanggal='$tanggal2' or instansi like '%" . $nama . "%' and tanggal='$tanggal2'");
          } elseif ($_POST['date1'] && $_POST['date2'] && $_POST['search'] == "") {
            $tanggal1 = $_POST['date1'];
            $tanggal2 = $_POST['date2'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal BETWEEN '$tanggal1' and '$tanggal2'");
          } elseif ($_POST['date1'] && $_POST['search'] == "" && $_POST['date2'] == "") {
            $tanggal1 = $_POST['date1'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal='$tanggal1'");
          } elseif ($_POST['date2'] && $_POST['search'] == "" && $_POST['date1'] == "") {
            $tanggal2 = $_POST['date2'];
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal='$tanggal2'");
          } elseif ($_POST['search'] == "" && $_POST['date1'] == "" && $_POST['date2'] == "") {
            $query = mysqli_query($koneksi, "SELECT * FROM t_tamu");
          }
          $no = 1;
          while ($d = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td hidden><?php echo $d['id_tamu']; ?></td>
              <td><?php echo $d['tanggal']; ?></td>
              <td><?php echo $d['nama_tamu']; ?></td>
              <td><?php echo $d['no_telepon']; ?></td>
              <td><?php echo $d['instansi'] ?></td>
              <td><?php echo $d['keperluan'] ?></td>
            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="ttd">
      <div class="kiri">
          <h2>Batam,<?php echo date(' d F Y') ?></h2>
          <div class="kosong">
            <div>
              <?php
              //koneksi ke database
              $koneksi    = new mysqli('localhost', 'root', '', 'db_buku_tamu');

              $id = $_POST['id'];
              //mengambil data ke tabel biodata
              $select     = mysqli_query($koneksi, "select * from t_ttd where id_ttdmin='$id'");

              //melakukan looping dengan while
              while ($hasil = mysqli_fetch_array($select)) {
              ?>

                <div style="margin-left: -140px;"><img style="margin-top: -30px;" src='tandtangan/<?php echo $hasil['adminttd']; ?>' /></div>


              <?php } ?>

            </div>
          </div>
          <h2 class="namaKepsek">SISRAYANTI, M.Pd.</h2>
          <h5>NIP. 197205021999032006</h5>
        </div>


        <div class="kanan">
          <h2>Batam,<?php echo date(' d F Y') ?></h2>
          <div class="kosong">
            <div style="width: 40px; height: 40px;">
              <?php
              //koneksi ke database
              $koneksi    = new mysqli('localhost', 'root', '', 'db_buku_tamu');

              $id = $_POST['id'];
              //mengambil data ke tabel biodata
              $select     = mysqli_query($koneksi, "select * from t_ttd where id_ttdmin='$id'");

              //melakukan looping dengan while
              while ($hasil = mysqli_fetch_array($select)) {
              ?>

              


              <?php } ?>

            </div>
          </div>
          <h2 class="namaKepsek">SISRAYANTI, M.Pd.</h2>
          <h5>NIP. 197205021999032006</h5>
        </div>
      </div>


      <script>
        window.print();
      </script>
</body>

</html>