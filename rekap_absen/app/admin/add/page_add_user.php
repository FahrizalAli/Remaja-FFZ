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
            <form action="../add_user.php" method="POST">
                <img src="../assets/img/avatar.svg" alt="">
                <h2>Register</h2>
                <div class="container_input">
                    <div class="i">
                        <i class='bx bxs-user bx-tada-hover'></i>
                    </div>
                    <div>
                        <input type="text" placeholder="Username" name="username" required=''>
                    </div>
                </div>
                <div class="container_input input2">
                    <div class="i">
                        <i class='bx bxs-lock-alt bx-tada-hover '></i>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password" required=''>
                    </div>
                </div>
                <div class="container_input container_1">
                    <div class="i">
                        <i class='bx bxs-label bx-tada-hover'></i>
                    </div>

                    <select name="level">
                        <option value="">Level</option>
                        <option>admin</option>
                        <option>walas</option>
                        <option>gr-piket</option>

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
                <a href="../table_user.php" class="forgot">Back to dashboard?</a>
                <button type="submit" class="btn">Register</button>


            </form>
        </div>
    </div>
    </div>
</body>

</html>