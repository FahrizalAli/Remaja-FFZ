<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cek.css">
    <title>Document</title>
</head>

<body>
   <?php 
   include 'headerrekap.php'
   ?>
    <div class="container">
        <div class="info_table">

            <div class="container_down_select">
                <!-- <form action="import-excel.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="namafile">
                    <button type="submit" name="upload" value="upload" class="button">Import</button>

                </form> -->
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET" class="filter">
                    <p>Select list:</p>
                    <div class="select_jurusan">
                        <select name="jurusan" style="width:100%;">
                            <?php
                            $koneksi = mysqli_connect('localhost','root','','data_rekapabsen');
                            //query menampilkan nama unit kerja ke dalam combobox
                            $query    = mysqli_query($koneksi, "SELECT * FROM t_rekap GROUP BY jurusan ORDER BY jurusan ");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $data['jurusan']; ?>"><?php echo $data['jurusan']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" value="Find" class="find">
                </form>

            </div>
            <div class="container_up">

                <div class="back-table">
                    <p class="back"> <?php
                    $login = mysqli_query($koneksi, "select * from t_rekap where jurusan='Rekayasa Perangkat Lunak' and kelas='x'");
                    $d = mysqli_fetch_array($login);

                    echo $d['tanggal']
                    ?></p>
                </div>
            </div>
        </div>
        <div class="table_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Ket</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['jurusan'])) {
                        $jurusan = trim($_GET['jurusan']);
                        $koneksi = mysqli_connect('localhost','root','','data_rekapabsen');

                        //menampilkan pegawai berdasarkan unit kerja yang dipilih pada combobox
                        $tamPeg = mysqli_query($koneksi, "SELECT * FROM t_rekap WHERE jurusan='$jurusan' ORDER BY kelas DESC");

                        $no = 0;
                        while ($d = mysqli_fetch_array($tamPeg)) {
                            $no++;
                    ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td hidden><?php  echo $d['id'] ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['jurusan']; ?> </td>
                                <td><?php echo $d['kelas']; ?></td>
                                <td><?php echo $d['ket']; ?></td>
                               
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>

        </div>

    </div>
</body>

</html>