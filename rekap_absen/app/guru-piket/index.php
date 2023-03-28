<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include '../admin/header.php';
    ?>
    <?php
    if (isset($_GET['data'])) {
        if ($_GET['data'] == 'list') {
            echo include 'list_jurusan.php';
        }
    }

   
    ?>
</body>

</html>