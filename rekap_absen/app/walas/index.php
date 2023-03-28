<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Berhasil

<?php 
session_start();
echo $_SESSION['kelas'].$_SESSION['jurusan']
?>
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

            if(isset($_SESSION['kelas'])){
                $jurusan = $_SESSION['jurusan'];
                $kelas = $_SESSION['kelas'];
                $query = mysqli_query($koneksi, "select t_rekap.id,t_siswa.nama,t_siswa.nis,t_siswa.jurusan,t_siswa.kelas,t_rekap.tanggal,t_rekap.ket from t_siswa inner join t_rekap on t_siswa.nis = t_rekap.nis where jurusan='$jurusan' AND kelas='$kelas'");

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
                            <a href="edit11rpl.php?id=<?php echo $d['id'] ?>" class="button">Edit</a>
                            <a href="delete11rpl.php?id=<?php echo $d['id'] ?>" class="button">Delete</a>
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