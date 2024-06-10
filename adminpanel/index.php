<?php
require 'session-admin.php';
require "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="shortcut icon" href="../img/logo1.png" type="image/x-icon" />
    <title>Home</title>
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
        <h2>Halo <?php echo $_SESSION['username'];  ?></h2>
         <h3><span class="ps-2" style="color: #C71585 !important">Selamat </span> <span class="ps-2" style="color: #191970 !important"> Datang</span>.</h3>

    <div class="container mt-5">
        <i class="fa-regular fa-copyright"></i> 2024
        <a href="#" class="text-decoration-none warna1-2"><span>
        Health Care</span></a> - Apotek online paling komplit All Rights Reserved
    </div>
</div>

    <!-- Java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../fontawesome/js/all.min.js"></script>

</body>

</html>