<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.css">
</head>

<body>

    <img class="wave" src="../assets/img/wave.png" alt="">
    <div class="container">
        <div class="img">
            <img src="../assets/img/bg.svg" alt="">
        </div>
        <div class="container_content">
            <form action="../add_siswa.php" method="POST">
                <img src="../assets/img/avatar.svg" alt="">
                <h2 class="main_text">ADD STUDENT</h2>
                <div class="container_input input1">
                    <div class="i">
                        <i class='bx bxs-lock-alt bx-tada-hover '></i>
                    </div>
                    <div>
                        <input type="text" placeholder="NIS" name="nis" maxlength="8" required=''>
                    </div>
                </div>
                <div class="container_input input2">
                    <div class="i">
                        <i class='bx bxs-user bx-tada-hover'></i>
                    </div>
                    <div>
                        <input type="text" placeholder="Name" name="nama" required=''>
                    </div>
                </div>
                <div class="container_input container_1">

                    <div class="i">
                        <i class='bx bxs-graduation bx-tada-hover'></i>
                    </div>
                    <select name="jurusan">
                        <option value="">Jurusan</option>
                        <option>Teknik Komputer dan Jaringan</option>
                        <option>Teknik Instalasi Tenaga Listrik</option>
                        <option>Teknik Jaringan Akses</option>
                        <option>Rekayasa Perangkat Lunak</option>
                    </select>

                </div>
                <div class="container_input container_1">

                    <div class="i">
                        <i class='bx bxs-home bx-tada-hover'></i>
                    </div>
                    <select name="kelas">
                        <option value="">Kelas</option>
                        <option>x</option>
                        <option>xi</option>
                        <option>xii</option>
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
                <a href="../table_siswa.php" class="forgot">Back to dashboard?</a>
                <button type="submit" class="btn">Add Student</button>

            </form>
        </div>
    </div>
    </div>
</body>

</html>