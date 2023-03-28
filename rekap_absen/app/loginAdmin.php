<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLECSS -->
    <link rel="stylesheet" href="style.css">
    <!-- BOXICON -->
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.css">
    <title>Influx</title>
</head>

<body>
    <img class="wave" src="../assets/img/wave.png" alt="">
    <div class="container">
        <div class="img">
            <img src="../assets/img/bg.svg" alt="">
        </div>
        <div class="container_content">
            <form action="loginAdmin-act.php" method="POST">
                <img src="../assets/img/avatar.svg" alt="">
                <h2 class="main_text">Login</h2>
                <div class="container_input">
                    <div class="i">
                        <i class='bx bxs-user bx-tada-hover'></i>
                    </div>
                    <div>
                        <input type="text" placeholder="Username" name="username" aria-required="true">
                    </div>
                </div>
                <div class="container_input input2">
                    <div class="i">
                        <i class='bx bxs-lock-alt bx-tada-hover '></i>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password" aria-required="true">
                    </div>
                </div>
                <a href="" class="forgot">Forgot password?</a>
                <button class="btn">Login</button>
                <?php
                if (isset($_GET['data'])) {
                    if ($_GET['data'] == "gagal") {
                        echo "<div class='alert alert-danger'>Wrong username or password!
                            </div>";
                    } else if ($_GET['data'] == "logout") {
                        echo "<div class='alert alert-info'>Successfully logged out
                        </div>";
                    } else if ($_GET['data'] == "belum_login") {
                        echo "<div class='alert alert-danger'>Please login
                        </div>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
    </div>


    <script src="script.js"></script>
</body>

</html>