<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <h2>Table User</h2>
                <div class="add">
                    <a href="./add/page_add_user.php" class="adduser"><i class='bx bx-plus-medical bx-tada-hover' style='color:#ffffff'></i>
                        <p class="tambah-text">Add user</p>
                    </a>
                </div>
            </div>
            <div class="container_down">
                <form action="table_user.php" method="get" class="form-search">
                    <div class="select_jurusan">
                        <input type="text" name="cari" class="search-item" placeholder="Cari username/level disini...">
                    </div>
                    <button type="submit" class="icon-search">
                        <i class='bx bx-search-alt' type="submit"></i>
                    </button>
                    <a href="table_user.php" class="icon-search2"> <i class='bx bx-reset'></i></a>              
                </form>
            </div>
        </div>
        <div class="table_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $data = mysqli_query($koneksi, "select * from t_user where username or level LIKE '%" . $cari . "%' ");
                    } else {
                        $data = mysqli_query($koneksi, "select * from t_user");
                    }
                    $nomor = 1;
                    $hitung_data = mysqli_num_rows($data);
                    if ($hitung_data > 0) {
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td hidden><?php echo $d['id']; ?></td>
                                <td><?php echo $d['username']; ?> </td>

                                <td><?php
                                    $search = ["admin", "walas", "gr-piket"];
                                    $replace = ["admin", "wali kelas", "guru piket"];
                                    $newlevel = str_replace($search, $replace, $d['level']);
                                    echo ucfirst($newlevel)
                                    ?>
                                </td>

                                
                                <td class="d-flex justify-content-center edit">
                                    <a href="./edit/edit_?id=<?php echo $d['id']; ?>" class="button">Edit</a>
                                    <a href="delete_user.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="button">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan='4' class="text-center">Tidak ada data ditemukan</td>
                        </tr>
                    <?php }   ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>