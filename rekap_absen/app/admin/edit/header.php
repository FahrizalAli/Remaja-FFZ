<!tDOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">
    <?php
    if (isset($_SESSION['level']) == "wali kelas" || "guru piket") {
      echo '<link rel="stylesheet" href="../admin/style.css">
     <link rel="stylesheet" href="../admin/assets/boxicons/css/boxicons.css">';
    }
    ?>
    <!-- BOXICONS -->
    <link rel="stylesheet" href="./assets/boxicons/css/boxicons.css">
    <title>Influx</title>
  </head>

  <body>
    <?php
    session_start();
    if ($_SESSION['level'] == '') {
      header("location:../index.php?data=belum_login");
    }
    ?>
    <div class="container_alert" id="con">
      <div class="alert">
        <p>Hello <?php echo strtoupper($_SESSION['username']); ?>
          you have logged in as <?php $search = ["admin", "gr-piket", "walas"];
                                $replace = ["admin", "guru piket", "wali kelas"];
                                $newWord = str_replace($search, $replace, $_SESSION['level']);
                                echo ucfirst($newWord)
                                ?>
        </p>
        <i class='bx bx-x' style='color:#fff' onclick="remove()"></i>
      </div>
    </div>
    <header id="header">
      <div class="container_header">
        <div class="main_content">
          <div class="bulat"></div>
          <!-- <i class="bx bxs-bolt-circle"></i> -->
          <h1>SMKN7</h1>
        </div>
        <div class="navlink">
          <ul>
            <?php
            if (isset($_SESSION['level'])) {
              if ($_SESSION['level'] == 'admin') {
                echo ' <li class="nav-item garis"><a href="../table_user.php">User Table</a></li>
                <li class="nav-item garis"><a href="../table_siswa.php">Student Table</a></li>
                <li class="nav-item garis">Help</li>';
              } else if ($_SESSION['level'] == 'wali kelas') {
                echo '<li class="nav-item garis">Absensi Kelas</li>';
              } else if ($_SESSION['level'] == 'guru piket') {
                echo ' <li class="nav-item garis"><a href="index.php?data=list">Rekap Absensi</a></li>
                <li class="nav-item garis"><a href="./rekap/cekabsen.php?jurusan=Rekayasa Perangkat Lunak">Cek Absensi</a></li> ';
              } else {
                header('location:..index.php?data=belum_login');
              }
            }
            ?>
            <ul>

            </ul>
          </ul>
        </div>
        <div class="sidemenu">
          <?php
          if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] == 'admin') {
              echo '<a class=\'out\' href="../admin/add/index.php">Message</a>';
            } elseif ($_SESSION['level'] == 'wali kelas' || 'guru piket') {
              echo '<a class=\'out\' href="">Bantuan?</a>';
            }
          }
          ?>
          <a href="../logout.php" class="button" onclick="return confirm('Are you sure want to Logout?')">Logout</a>
          <i class="bx bxs-widget"></i>
        </div>
      </div>
    </header>
    <!-- LORDICON -->
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    <?php
    if (isset($_SESSION['level']) == 'wali kelas' || 'guru piket') {
      echo '<script src="../admin/script.js"></script>';
    }
    ?>
    <!-- JAVA SCRIPT -->
    <script src="script.js"></script>
  </body>

  </html>