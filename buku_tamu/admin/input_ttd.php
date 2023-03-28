<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sekolah | Buku Tamu</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">
    <div class="container">


        <!-- input foto -->
        <div class="row d-flex justify-content-center my-5">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">Silahkan Tanda Tangan Admin</h1>
                        </div>
                        <table hidden class="table table-bordered  justify-content-md-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Instansi</th>
                                    <th>Keperluan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                if (isset($_POST['search']) && $_POST['date1'] && $_POST['date2']) {
                                    $nama = $_POST['search'];
                                    $tanggal1 = $_POST['date1'];
                                    $tanggal2 = $_POST['date2'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' and tanggal between '$tanggal1' AND '$tanggal2'  or instansi like '%" . $nama . "%' and tanggal between '$tanggal1' AND '$tanggal2' ");
                                } elseif (isset($_POST['search']) && $_POST['date1'] == "" && $_POST['date2'] == "") {
                                    $nama = $_POST['search'];
                                    $tanggal1 = "";
                                    $tanggal2 = "";
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' or instansi like '%" . $nama . "%' ");
                                }elseif ($_POST['search'] && $_POST['date1'] && $_POST['date2'] == "") {
                                    $nama = $_POST['search'];
                                    $tanggal1 = $_POST['date1'];
                                    $tanggal2 = "";
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' and tanggal='$tanggal1' or instansi like '%" . $nama . "%' and tanggal='$tanggal1'");
                                  } elseif ($_POST['search'] && $_POST['date2'] && $_POST['date1'] == "") {
                                    $nama = $_POST['search'];
                                    $tanggal1 = "";
                                    $tanggal2 = $_POST['date2'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where nama_tamu like '%" . $nama . "%' and tanggal='$tanggal2' or instansi like '%" . $nama . "%' and tanggal='$tanggal2'");
                                  } elseif ($_POST['date1'] && $_POST['date2'] && $_POST['search'] == "") {
                                    $nama = "";
                                    $tanggal1 = $_POST['date1'];
                                    $tanggal2 = $_POST['date2'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal BETWEEN '$tanggal1' and '$tanggal2'");
                                  } elseif ($_POST['date1'] && $_POST['search'] == "" && $_POST['date2'] == "") {
                                    $nama = "";
                                    $tanggal1 = $_POST['date1'];
                                    $tanggal2 = "";
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal='$tanggal1'");
                                  } elseif ($_POST['date2'] && $_POST['search'] == "" && $_POST['date1'] == "") {
                                    $nama = "";
                                    $tanggal1 = "";
                                    $tanggal2 = $_POST['date2'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu where tanggal='$tanggal2'");
                                  } elseif ($_POST['search'] == "" && $_POST['date1'] == "" && $_POST['date2'] == "") {
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_tamu");
                                  }
                                $no = 1;
                                while ($d = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td hidden><?php echo $d['id_tamu']; ?></td>
                                        <td><?php echo $d['tanggal']; ?></td>
                                        <td><?php echo $d['nama_tamu']; ?></td>
                                        <td><?php echo $d['no_telepon']; ?></td>
                                        <td><?php echo $d['instansi'] ?></td>
                                        <td><?php echo $d['keperluan'] ?></td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- canvas tanda tangan  -->
                        <canvas id="signature-pad" class="signature-pad w-100 border rounded"></canvas>
                        <div class="my-2 " style="float: right;">
                            <!-- tombol ganti warna  -->
                            <button type="button" class="btn btn-success" id="change-color">
                                Change Color
                            </button>

                            <!-- tombol undo  -->
                            <button type="button" class="btn btn-dark" id="undo">
                                <span class="fas fa-undo"></span>
                                Undo
                            </button>

                            <!-- tombol hapus tanda tangan  -->
                            <button type="button" class="btn btn-danger" id="clear">
                                <span class="fas fa-eraser"></span>
                                Clear
                            </button>
                        </div>
                        <form class="my-2 " id="form" action="print.php" method="POST">
                            <input hidden type="text" name="search" value="<?php echo $nama ?>">
                            <input hidden type="date" name="date1" value="<?php echo $tanggal1 ?>">
                            <input hidden type="date" name="date2" value="<?php echo $tanggal2 ?>">
                            <input hidden type="text" id="id" name="id" value="<?php 
                                $id = $_POST['id'];
                            echo $id ?>">
                            <button type="submit" id="btn-submit" class="btn btn-success btn-user btn-block tombol-simpan mx-auto mt-5 col-10" onclick="return confirm('Berhasil')">
                                Selamat Datang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script>
        // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
        document.addEventListener('DOMContentLoaded', function() {
            resizeCanvas();
        })

        //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }


        var canvas = document.getElementById('signature-pad');

        //warna dasar signaturepad
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
        });

        //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
        document.getElementById('clear').addEventListener('click', function() {
            signaturePad.clear();
        });

        //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
        document.getElementById('undo').addEventListener('click', function() {
            var data = signaturePad.toData();
            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
            }
        });

        //saat tombol change color diklik maka akan merubah warna pena
        document.getElementById('change-color').addEventListener('click', function() {

            //jika warna pena biru maka buat menjadi hitam dan sebaliknya
            if (signaturePad.penColor == "rgba(0, 0, 255, 1)") {

                signaturePad.penColor = "rgba(0, 0, 0, 1)";
            } else {
                signaturePad.penColor = "rgba(0, 0, 255, 1)";
            }
        })

        //fungsi untuk menyimpan tanda tangan dengan metode ajax
        $(document).on('click', '#btn-submit', function() {
            var signature = signaturePad.toDataURL();

            var signature = signaturePad.toDataURL();
            // membuat variabel image
            var image = '';

            var id = $('#id').val()
            //mengambil data uername dari form di atas dengan id name
            var name = $('#name').val();


            //mengambil data email dari form di atas dengan id email
            var email = $('#email').val();

            $.ajax({
                url: "action-ttd.php",
                data: {
                    id: id,
                    foto: signature,
                },
                method: "POST",
                success: function() {
                    update()
                }

            })
        })

        function update() {
            $.ajax({
                url: 'print.php',
                type: 'get',
                success: function(data) {
                    $('#data').html(data);
                }
            });
        }
    </script>
</body>

</html>