<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <?php
    include '../header.php';
    $k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
    $nis = $_GET['nis'];
    $data = mysqli_query($k, "select * from t_siswa where nis='$nis'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <div class="container">
            <div class="container_content">
                <form action="edit_siswa_act.php" method="POST">
                    <img src="../assets/img/avatar.svg" alt="">
                    <h2 class="main_text">EDIT STUDENT</h2>
                    <input type="hidden" name="nis" value="<?php echo $d['nis'] ?>">
                    <p>NIS: <?php echo $d['nis'] ?></p>
                    <div class="container_input input2">
                        <div class="i">
                            <i class='bx bxs-user bx-tada-hover'></i>
                        </div>
                        <div>
                            <input type="text" placeholder="Name" name="nama" value="<?php echo $d['nama'] ?>">
                        </div>
                    </div>
                    <div class="container_input container_1">

                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <select name="jurusan" value="<?php echo $d['jurusan'] ?>">
                            <option value="">Jurusan</option>
                            <option>Teknik Komputer dan Jaringan</option>
                            <option>Teknik Instalasi Tenaga Listrik</option>
                            <option>Teknik Jaringan Akses</option>
                            <option>Rekayasa Perangkat Lunak</option>
                        </select>
                    </div>
                    <div class="container_input container_1">

                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <select name="kelas" value="<?php echo $d['kelas'] ?>">
                            <option value="">Kelas</option>
                            <option>x</option>
                            <option>xi</option>
                            <option>xii</option>
                        </select>
                    </div>
                    <a href="../table_siswa.php" class="forgot">Back to Table?</a>
                    <button type="submit" class="btn">Update Student</button>
                </form>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
</body>

</html>