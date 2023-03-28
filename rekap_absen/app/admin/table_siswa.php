<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>Document</title>
</head>

<body>
    <?php
    include '../koneksi.php';
    include 'header.php';
    ?>
    <div class="container">
        <div class="info_table">
            <div class="container_up">
                <h2>Student Table</h2>
                <div class="add">
                    <a href="./add/page_add_siswa.php" class="adduser"><i class='bx bx-plus-medical bx-tada-hover' style='color:#ffffff'></i>
                        <p class="tambah-text">Add Student</p>
                    </a>
                </div>
            </div>
            <div class="container_down">
                <form action="table_siswa.php" method="get" class="form-search">
                    <div class="select_jurusan">
                        <input type="text" name="a" class="search-item" placeholder="Cari nama siswa/NIS">
                    </div>
                    <div class="pilih_jurusan">
                        <select name="b" class="select-search">
                            <option value="">Jurusan</option>
                            <option value="Teknik Komputer dan Jaringan">TKJ</option>
                            <option value="Teknik Instalasi Tenaga Listrik">TITL</option>
                            <option value="Teknik Jaringan Akses">TJA</option>
                            <option value="Rekayasa Perangkat Lunak">RPL</option>
                        </select>
                    </div>
                    <div>
                    <select name="c" class="select-search">
                            <option value="">Kelas</option>
                            <option value="x">10</option>
                            <option value="xi">11</option>
                            <option value="xii">12</option>
                        </select>
                    </div>
                    <button type="submit" class="icon-search">
                        <i class='bx bx-search-alt' type="submit"></i>
                    </button>
                    <a href="table_siswa.php" class="icon-search2"> <i class='bx bx-reset'></i></a>              

                </form>
            </div>
        </div>
        <div class="table_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Jurusan</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    include '../koneksi.php';

                    if(isset($_GET['a']) && $_GET['b'] && $_GET['c']){
                        $nama = $_GET['a'];
                        $jurusan = $_GET['b'];
                        $kelas = $_GET['c'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE nama LIKE '%" . $nama . "%' AND jurusan='$jurusan' AND kelas='$kelas' OR nis LIKE '%" . $nama . "%' AND jurusan='$jurusan' AND kelas='$kelas'");
                    }elseif(isset($_GET['a']) && $_GET['b']){
                        $nama = $_GET['a'];
                        $jurusan = $_GET['b'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE nama LIKE '%" . $nama . "%' and jurusan='$jurusan' OR nis LIKE '%" . $nama . "%' AND jurusan='$jurusan'");
                    }elseif(isset($_GET['a']) && $_GET['c']){
                        $nama = $_GET['a'];
                        $kelas = $_GET['c'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE nama LIKE '%" . $nama . "%' AND kelas='$kelas' OR nis LIKE '%" . $nama . "%' AND kelas='$kelas'");
                    }elseif(isset($_GET['b']) && $_GET['c']){
                        $jurusan = $_GET['b'];
                        $kelas = $_GET['c'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE jurusan='$jurusan' AND kelas='$kelas'");
                    }elseif(isset($_GET['a'])){
                        $nama = $_GET['a'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE nama LIKE '%".$nama."%' or nis LIKE '%" . $nama . "%'");
                    }elseif(isset($_GET['b'])){
                        $jurusan = $_GET['b'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE jurusan='$jurusan'");
                    }elseif(isset($_GET['c'])){
                        $kelas = $_GET['c'];
                        $query = mysqli_query($koneksi,"SELECT * FROM t_siswa WHERE kelas='$kelas'");
                    }else{
                        $query =mysqli_query($koneksi,"SELECT * FROM t_siswa");
                    }
                    $hitung_data = mysqli_num_rows($query);
                    if ($hitung_data > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td><?php echo $data['nis']; ?></td>
                                <td><?php echo $data['jurusan']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo strtoupper($data['kelas']) ?></td>
                                <td class="d-flex justify-content-center edit">
                                    <a href="./edit/edit_siswa.php?nis=<?php echo $data['nis']; ?>" class="button">Edit</a>
                                    <a href="delete_siswa.php?nis=<?php echo $data['nis']; ?>" class="button" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan='6' class="text-center">Tidak ada data ditemukan</td>
                        </tr>
                    <?php } ?>


                </tbody>

            </table>

        </div>

    </div>
</body>

</html>