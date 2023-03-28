<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rekap.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.css">

    <title>Document</title>
</head>

<body>
    <?php 
    include 'headerrekap.php'
    ?>
    <?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
    $data = mysqli_query($koneksi, "select * from t_siswa where jurusan='Rekayasa Perangkat Lunak'");
    ?>
    <div class="container1">
        <div class="container_content">
            <div class="content1">
                <img src="../assets/img/avatar.svg" alt="">
                <h2 class="main_text">Kelas 10 RPL</h2>
            </div>
            <div class="content2">
                <form action="rekap_act10rpl.php" method="POST">
                    <h3 style="color:#757575 ;"><?php echo date('d M Y') ?></h3>
                    <input hidden type="text" name="tanggal" value="<?php echo date('d M Y') ?>">
                    <!-- <div class="container_input input1">
                       
                        <div class="i">

                            <i class='bx bxs-lock-alt bx-tada-hover '></i>
                        </div>
                        <div>
                            <input type="text" placeholder="NIS" name="nis" maxlength="8" value="">
                        </div>
                    </div> -->
                    <div class="container_input container_1">
                        <div class="i">
                            <i class='bx bxs-user bx-tada-hover'></i>
                        </div>


                        <select name="nama">
                            <?php
                            $query    = mysqli_query($koneksi, "SELECT * FROM t_siswa where jurusan='Rekayasa Perangkat Lunak' and kelas='x' ");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                                          
                                <option><?php echo $data['nis'] ?>: <?php echo $data['nama'] ?></option>
                            <?php
                            }
                            ?>
                        </select>





                    </div>
                    <div class="container_input container_1">

                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <div>
                            <input type="text" value="Rekayasa Perangkat Lunak" disabled>
                            <input type="text" name="jurusan" value="Rekayasa Perangkat Lunak" hidden> 
                        </div>

                    </div>
                    <div class="container_input container_1">

                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <div>
                            <input type="text" value="X" disabled>
                            <input hidden type="text" placeholder="Kelas 10" name="kelas" value="x" >

                        </div>
                    </div>
                    <div class="container_input container_1">

                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <select name="ket" required>
                            <option value="">Keterangan</option>
                            <option>Sakit</option>
                            <option>Izin</option>
                            <option>Alfa</option>
                        </select>
                    </div>
                    <!-- <div class="container_checkbox">
                    <div class="checkbox1">
                        <label class="radio"> <input type="radio" name="level" value="admin">Admin</label>
                    </div>
                    <div class="checkbox2">
                        <label class="radio">
                            <input type="radio" name="level" value="walas">
                            Wali Kelas
                        </label>
                    </div>
                    <div class="checkbox3">
                        <label class="radio">
                            <input type="radio" name="level" value="gr-piket">
                            Guru Piket
                        </label>
                    </div>
                </div> -->
                    <a href="../index.php?data=list" class="forgot">Back to list of class?</a>
                    <button type="submit" class="btn">Send</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container2">
        <div class="info_table">
            <div class="container_up">

                <h3 style="color: #757575;">
                    <?php
                    $login = mysqli_query($koneksi, "select * from t_rekap where jurusan='Rekayasa Perangkat Lunak' and kelas='x'");
                    $d = mysqli_fetch_array($login);

                    echo $d['tanggal']
                    ?>

                </h3>
            </div>
            <div class="container_down">
                <!-- <form action="import-excel.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="namafile">
                    <button type="submit" name="upload" value="upload" class="button">Import</button>

                </form> -->

                <p>Total <?php $data = mysqli_query($koneksi, "select * from t_rekap where jurusan='Rekayasa Perangkat Lunak' and kelas='x'");
                            $jumlah = mysqli_num_rows($data);
                            echo $jumlah;
                            ?> students</p>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $login = mysqli_query($koneksi, "select * from t_rekap where jurusan='Rekayasa Perangkat Lunak' and kelas='x'");
                    $nomor = 1;
                    while ($d = mysqli_fetch_array($login)) {
                    ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td hidden><?php echo $d['id'] ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['jurusan']; ?> </td>
                            <td><?php echo strtoupper($d['kelas']) ?></td>
                            <td><?php echo $d['ket']; ?></td>
                            <td class="d-flex justify-content-center edit">
                                <a href="index.php" class="button">Edit</a>
                                <a href="delete10rpl.php?id=<?php echo $d['id'] ?>" class="button">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>

    <?php
    // }
    ?>



</body>

</html>