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
    ?>
    <?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
    $data = mysqli_query($koneksi, "select * from t_siswa where jurusan='Rekayasa Perangkat Lunak'");
    ?>
    <!-- CONTAINER INPUT -->
    <div class="container1">
        <div class="container_content">
            <div class="content1">
                <img src="../assets/img/avatar.svg" alt="">
                <h2 class="main_text">12 RPL</h2>
            </div>
            <div class="content2">
                <form action="rekap_act12rpl.php" method="POST">
                    <h3 style="color:#757575 ;"><?php echo date('d M Y') ?></h3>
                    <input hidden type="text" name="tanggal" value="<?php echo date('Y-m-d') ?>">
                    <div class="container_input container_1">
                        <select class="form-select" aria-label="Default select example">
                            <option>Kelas</option>
                            <option value="xi">xii-1</option>
                            <option value="xii">xii-2</option>
                        </select>
                        <div class="i">
                            <i class='bx bxs-user bx-tada-hover'></i>
                        </div>
                        <select name="nama">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM t_siswa where jurusan='Rekayasa Perangkat Lunak' and kelas='xii' ");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option onclick=""><?php echo $data['nama'] ?></option>
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
                            <input type="text" placeholder="Rekayasa Perangkat Lunak" name="jurusan" value="Rekayasa Perangkat Lunak" disabled>
                        </div>
                    </div>
                    <div class="container_input container_1">
                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <div>
                            <input type="text" placeholder="Kelas 12" name="kelas" value="xii" disabled>
                        </div>
                    </div>
                    <div class="container_input container_1">
                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <select name="ket" required>
                            <option value="">Keterangan</option>
                            <option value="Hadir">hadir</option>
                            <option>Izin</option>
                            <option>Alfa</option>
                        </select>
                    </div>
                    <a href="../index.php?data=list" class="forgot">Back to list of class?</a>
                    <button type="submit" class="btn" onclick="guid()">Send</button>
                    <div id="id-gen">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CONTAINER INPUT -->
    <div class="container" style="padding: 2rem 2rem;">
        <div class="info_table">
            <!-- <div class="container_up">
            </div> -->
            <div class="container_down">
                <form action="rekap12rpl.php" method="get" class="form-search">
                    <div class="select_jurusan">
                        <input type="text" name="a" class="search-item" placeholder="Cari nama siswa">
                    </div>
                    <div>
                        <input type="date" name="b">
                    </div>
                    <button type="submit" class="icon-search">
                        <i class='bx bx-search-alt' type="submit"></i>
                    </button>
                    <a href="rekap12rpl.php" class="icon-search2"> <i class='bx bx-reset'></i></a>
                </form>
            </div>

        </div>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="rekap.css">
        </head>

        <body>
            <!-- TABLE REKAP -->
            <div class="table_container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Ket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $koneksi = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
                        $nomor = 1;

                        if (isset($_GET['a']) && $_GET['b']) {
                            $nama = $_GET['a'];
                            $tanggal = $_GET['b'];
                            $query = mysqli_query($koneksi, "select t_rekap.id,t_siswa.nama,t_siswa.nis,t_siswa.jurusan,t_siswa.kelas,t_rekap.tanggal,t_rekap.ket from t_siswa inner join t_rekap on t_siswa.nis = t_rekap.nis where jurusan='Rekayasa Perangkat Lunak' AND kelas='xii' AND nama LIKE '%" . $nama . "%' and tanggal='$tanggal' ");
                        } elseif (isset($_GET['a'])) {
                            $nama = $_GET['a'];
                            $query = mysqli_query($koneksi, "select t_rekap.id,t_siswa.nama,t_siswa.nis,t_siswa.jurusan,t_siswa.kelas,t_rekap.tanggal,t_rekap.ket from t_siswa inner join t_rekap on t_siswa.nis = t_rekap.nis where jurusan='Rekayasa Perangkat Lunak' AND kelas='xii' and nama LIKE '%" . $nama . "%' ");
                        } elseif (isset($_GET['b'])) {
                            $tanggal = $_GET['b'];
                            $query = mysqli_query($koneksi, "select t_rekap.id,t_siswa.nama,t_siswa.nis,t_siswa.jurusan,t_siswa.kelas,t_rekap.tanggal,t_rekap.ket from t_siswa inner join t_rekap on t_siswa.nis = t_rekap.nis where jurusan='Rekayasa Perangkat Lunak' AND kelas='xii' and and tanggal='$tanggal' ");
                        } else {
                            $query = mysqli_query($koneksi, "select t_rekap.id,t_siswa.nama,t_siswa.nis,t_siswa.jurusan,t_siswa.kelas,t_rekap.tanggal,t_rekap.ket from t_siswa inner join t_rekap on t_siswa.nis = t_rekap.nis where jurusan='Rekayasa Perangkat Lunak' AND kelas='xii' ");
                        }

                        $hitung_data = mysqli_num_rows($query);
                        if ($hitung_data > 0) {
                            while ($d = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td hidden><?php echo $d['id'] ?></td>
                                    <td><?php echo $d['tanggal'] ?></td>
                                    <td><?php echo $d['nis'] ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['jurusan']; ?> </td>
                                    <td><?php echo strtoupper($d['kelas']) ?></td>
                                    <td><?php echo $d['ket']; ?></td>
                                    <td class="d-flex justify-content-center edit">
                                        <a href="edit12rpl.php?id=<?php echo $d['id'] ?>" class="button">Edit</a>
                                        <a href="delete12rpl.php?id=<?php echo $d['id'] ?>" class="button">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan='8' class="text-center">Tidak ada data ditemukan</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </body>

        </html>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- bootstrap js  -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<script>
    let guid = () => {
        let s4 = () => {
            return Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
        }
        //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
        let abc = s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4()
        let inputId = `<input type="hidden" value="${abc}" id="id-gen" name="id">`
        $('#id-gen').append(inputId)
    }
</script>

</html>