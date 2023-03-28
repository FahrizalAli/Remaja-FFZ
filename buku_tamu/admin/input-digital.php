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
                            <h1 class="h4 text-gray-900 mb-2">Silahkan Berhadap Di Depan Kamera</h1>
                        </div>
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
                        <form class="my-2 " id="form">
                            <!-- kamera webcam akan ditampilkan di dalam id="my_camera" -->
                            <div class="mx-auto my-4" id="my_camera"></div>
                            <input hidden type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>">
                            <button type="submit" id="btn-submit" class="btn btn-success btn-user btn-block tombol-simpan mx-auto mt-5 col-10" onclick="return confirm('Berhasil')">
                                Selamat Datang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- bootstrap js  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- webcamjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script language="JavaScript">
        // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        //menampilkan webcam di dalam file html dengan id my_camera
        Webcam.attach('#my_camera');
    </script>

    <script type="text/javascript">
        // saat dokumen selesai dibuat jalankan fungsi update
        $(document).ready(function() {
            update();
        });

        // jalankan aksi saat tombol register disubmit
        $("#btn-submit").click(function() {
            event.preventDefault();

            var signature = signaturePad.toDataURL();
            // membuat variabel image
            var image = '';

            var id = $('#id').val()
            //mengambil data uername dari form di atas dengan id name
            var name = $('#name').val();


            //mengambil data email dari form di atas dengan id email
            var email = $('#email').val();

            //memasukkan data gambar ke dalam variabel image
            Webcam.snap(function(data_uri) {
                image = data_uri;
            });

            //mengirimkan data ke file action.php dengan teknik ajax
            $.ajax({
                url: 'action-dig.php',
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    email: email,
                    image: image,
                    tanda: signature,
                },
                method: "POST",
                success: function() {
                    location.href = "input-tamu.php";
                    alert('input data berhasil');
                    // menjalankan fungsi update setelah kirim data selesai dilakukan 
                    update(), updatePrint()
                }
            })

        });


        //fungsi update untuk menampilkan data
        function update() {
            $.ajax({
                url: 'data.php',
                type: 'get',
                success: function(data) {
                    $('#data').html(data);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            resizeCanvas();
        })

        function updatePrint() {
            $.ajax({
                url: 'print.php',
                type: 'get',
                success: function(data) {
                    $('#data').html(data);
                }
            });
        }

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
    </script>
</body>

</html>