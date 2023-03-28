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
    include 'headerrekap.php';
    $koneksi = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
    $apalah = $_GET['id'];
    $data1 = mysqli_query($koneksi, "select * from t_rekap where id='$apalah'");
    while($d = mysqli_fetch_array($data1)) {
    ?>
        <div class="container1">
            <div class="container_content">
                <div class="content1">
                    <img src="../assets/img/avatar.svg" alt="">
                    <h2 class="main_text">12 RPL</h2>
                </div>
                <div class="content2">
                    <form action="edit_act11rpl.php" method="POST">
                        <input type="text" hidden value="<?php $idEdit = $_GET['id']; echo  $idEdit ?>" name="id">
                        <input type="text" hidden value="<?php echo $d['nis'] ?>" name="nis">
                        <h3 style="color:#757575 ;"><?php echo $d['nis']?> : <?php 
                        $nisNama = $_GET['id'];
                        $queryNama = mysqli_query($koneksi,"select t_siswa.nis,t_siswa.nama,t_rekap.nis from t_siswa inner join t_rekap on t_siswa.nis = t_rekap.nis where id='$nisNama'");
                        $dNama = mysqli_fetch_array($queryNama);
                        echo $dNama['nama']
                        ?></h3>
                        <input hidden type="text" name="tanggal" value="<?php echo date('d M Y') ?>">
                        <div class="container_input container_1">
                            <div class="i">
                                <i class='bx bxs-user bx-tada-hover'></i>
                            </div>
                            <select name="nama" id="">
                                <?php
                                $query    = mysqli_query($koneksi, "SELECT * FROM t_siswa where jurusan='Rekayasa Perangkat Lunak' and kelas='xi' ");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option><?php echo $data['nama'] ?></option>

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
                                <input type="text" placeholder="Rekayasa Perangkat Lunak" name="jurusan" value="Rekayasa Perangkat Lunak">
                            </div>

                        </div>
                        <div class="container_input container_1">

                            <div class="i">
                                <i class='bx bxs-label'></i>
                            </div>
                            <div>
                                <input type="text" placeholder="Kelas 10" name="kelas" value="xii">
                            </div>
                        </div>
                        <div class="container_input container_1">

                            <div class="i">
                                <i class='bx bxs-label'></i>
                            </div>
                            <select name="ket" required value="<?php $d['ket'] ?>">
                                <option value="">Keterangan</option>
                                <option>Sakit</option>
                                <option>Izin</option>
                                <option>Alfa</option>
                            </select>
                        </div>
                        <a href="../index.php?data=list" class="forgot">Back to list of class?</a>
                        <button type="submit" class="btn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>