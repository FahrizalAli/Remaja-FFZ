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
   include 'header.php';
    $k = mysqli_connect('localhost', 'root', '', 'data_rekapabsen');
    $id = $_GET['id'];
    $data = mysqli_query($k, "select * from t_user where id='$id'");
    while ($d = mysqli_fetch_array($data)) {

    ?>
        <div class="container">

            <div class="container_content">
                <form action="edit_user_act.php" method="POST">
                    <img src="../assets/img/avatar.svg" alt="">
                    <h2 class="main_text">EDIT USER <?php echo $d['id'] ?></h2>
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <div class="container_input input1">
                        <div class="i">
                            <i class='bx bxs-user bx-tada-hover'></i>
                        </div>
                        <div>
                            <input type="text" placeholder="Username" name="username" value="<?php echo $d['username'] ?>">
                        </div>
                    </div>
                    <div class="container_input input2">
                        <div class="i">
                            <i class='bx bxs-lock-alt bx-tada-hover '></i>
                        </div>
                        <div>
                            <input type="password" placeholder="Password" name="password" >
                        </div>
                    </div>
                    <div class="container_input container_1">
                        <div class="i">
                            <i class='bx bxs-label'></i>
                        </div>
                        <select name="level" id="" value="<?php echo $d['level'] ?>">
                            <option value="">Level</option>
                            <option>admin</option>
                            <option>walas</option>
                            <option>gr-piket</option>
                        </select>
                    </div>
                    <a href="../table_user.php" class="forgot">Back to Table?</a>
                    <button type="submit" class="btn">Update User</button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>