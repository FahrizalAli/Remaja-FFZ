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
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halo, Silahkan Mengisi Data</h1>
                                    </div>

                                    <!-- form input -->
                                    <form class="user" action="input_act.php" method="POST">
                                        <input hidden type="text" value="<?php echo date('Y-m-d') ?>" id="" name="tanggal">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama" id="name" aria-describedby="emailHelp" placeholder="Nama" onkeyup="capsLockName()" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" maxlength="13" name="notelepon" id="exampleInputPassword" placeholder="No Telepon" onkeypress="return onlyNumber(event)" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="instansi" id="instansi" placeholder="Instansi" onkeyup="capsLockInstansi()" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="keperluan" id="keperluan" placeholder="Keperluan" onkeyup="capsLockKeperluan()" required>
                                        </div>
                                        <div id="id">
                                        </div>
                                        <div class="text-center" style="text-decoration: none;">
                                            <button type="submit" class="btn btn-success w-100" onclick="guid()">Selanjutnya</button>
                                            <a class="btn btn-light w-100 my-2" href="./index.php">Kembali</a>
                                        </div>
                                    </form>
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


    <script>
        // Generate ID
        let guid = () => {
            let s4 = () => {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            //return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
            let abc = s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4()
            let inputId = `<input type="hidden" value="${abc}" id="id-gen" name="id">`  
            $('#id').append(inputId)
        }

        // Only Number Function
        function onlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }

        // Auto Caps Lock Input Name
        function capsLockName() {
            let inputName = document.getElementById('name')
            inputName.value = inputName.value.toUpperCase()
        }

        // Auto Caps Lock Input Instansi
        function capsLockInstansi(){
            let inputInstansi = document.getElementById('instansi')
            inputInstansi.value = inputInstansi.value.toUpperCase()
        }

        // Auto Caps Lock Input Keperluan
        function capsLockKeperluan(){
            let inputKeperluan = document.getElementById('keperluan')
            inputKeperluan.value = inputKeperluan.value.toUpperCase()
        }
    </script>
</body>

</html>