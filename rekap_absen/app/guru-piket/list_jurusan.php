<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="list.css">
    <title>Document</title>
</head>

<body>
    <div class="container-utama">
        <div class="container-header text-center">
            <strong class="heading">Daftar</strong>
            <h1>JURUSAN SMK NEGERI 7 BATAM</h1>
        </div>
        <!-- RPL -->
        <div class="jurusan-list">
            <h2><b>Rekayasa Perangkat Lunak</b></h2>
            <div class="container-list">
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 10</b></p>
                            <p class="price"><span>40</span><span>siswa</span></p>
                            <p><b>Rekayasa Perangkat Lunak</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="./rekap/rekap10rpl.php?tanggal=<?php echo date('d M Y') ?>">Absen</a>

                        </div>
                    </div>
                </div>
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 11</b></p>
                            <p class="price"><span>
                                    <?php
                                    $k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
                                    $query = mysqli_query($k, "SELECT * FROM t_siswa where jurusan='Rekayasa Perangkat Lunak' and kelas='xi' ");
                                    $jumlah = mysqli_num_rows($query);
                                    echo $jumlah

                                    ?>  


                                </span><span>siswa</span></p>
                            <p><b>Rekayasa Perangkat Lunak</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="./rekap/rekap11rpl.php">Absen</a>

                        </div>
                    </div>
                </div>
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 12</b></p>
                            <p class="price"><span>
                                    <?php
                                    $k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
                                    $query = mysqli_query($k, "SELECT * FROM t_siswa where jurusan='Rekayasa Perangkat Lunak' and kelas='xii' ");
                                    $jumlah = mysqli_num_rows($query);
                                    echo $jumlah

                                    ?>

                                </span><span>siswa</span></p>
                            <p><b>Rekayasa Perangkat Lunak</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="./rekap/rekap12rpl.php">Absen</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RPL -->
        <!-- TKJ -->
        <div class="jurusan-list">
            <h2><b>Teknik Komputer dan Jaringan</b></h2>
            <div class="container-list">
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 10</b></p>
                            <p class="price"><span>47</span><span>siswa</span></p>
                            <p><b>Teknik Komputer dan Jaringan</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="">Absen</a>

                        </div>
                    </div>
                </div>
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 11</b></p>
                            <p class="price"><span>38</span><span>siswa</span></p>
                            <p><b>Teknik Komputer dan Jaringan</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="">Absen</a>

                        </div>
                    </div>
                </div>
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 12</b></p>
                            <p class="price"><span>43</span><span>siswa</span></p>
                            <p><b>Teknik Komputer dan Jaringan</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="">Absen</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TKJ -->
        <div class="jurusan-list">
            <h2><b>Teknik Instalasi Tenaga Listrik</b></h2>
            <div class="container-list">
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 10</b></p>
                            <p class="price"><span>47</span><span>siswa</span></p>
                            <p><b>Teknik Instalasi Tenaga Listrik</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="">Absen</a>

                        </div>
                    </div>
                </div>
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 11</b></p>
                            <p class="price"><span>40</span><span>siswa</span></p>
                            <p><b>Teknik Instalasi Tenaga Listrik</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="">Absen</a>

                        </div>
                    </div>
                </div>
                <div class="container ">
                    <div class="monthly">
                        <div class="monthly-1">
                            <p><b>Kelas 12</b></p>
                            <p class="price"><span>45</span><span>siswa</span></p>
                            <p><b>Teknik Instalasi Tenaga Listrik</b></p>
                        </div>
                        <div class="monthly-2">
                            <a href="">Absen</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>