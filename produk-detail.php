<?php
require "koneksi.php";

$id = $_GET["id"];

// Validasi id
if (!is_numeric($id)) {
    echo "ID produk tidak valid.";
    exit;
}

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$tampil = mysqli_query($con, "SELECT p.*, k.*, k.nama as nama_kategori, p.nama as nama_brg, p.id as id_produk
    FROM produk p
    JOIN kategori k ON p.kategori_id = k.id 
    WHERE p.ketersediaan_stok = 'tersedia' AND p.id = '$id'");

// Periksa hasil query
if (mysqli_num_rows($tampil) > 0) {
    $result = mysqli_fetch_assoc($tampil);
} else {
    echo "Data tidak ditemukan.";
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="shortcut icon" href="img/logo1.png" type="image/x-icon" />
    <title>List Details</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg border-bottom border-1 border-secondary bg-body-tertiary ">
        <div class="container-fluid d-flex">
            <a class="navbar-brand ps-4 pe-4" href="#">
                <img src="img/logo1.png" alt="Bootstrap" width="50" height="50" /><span class="ps-2" style="color: #0000CD !important">Health </span> <span style="color: #008000 !important">Care</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="login-register-logout/logout.php" class="btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <?php if (isset($result)) : ?>
                    <div class="col-md-5">
                        <img src="img/<?= $result['foto']; ?>" class="w-100" alt="">
                    </div>
                    <div class="col-md-6 offset-md-1">
                        <h1><?= $result['nama_brg']; ?></h1>
                        <p class="fs-5">
                            <?= $result['detail']; ?>
                        </p>
                        <p class="fs-5">
                            <strong>Rp. <?= $result['harga']; ?></strong>
                        </p>
                        <p>
                            Status Ketersediaan : <strong><?= $result['ketersediaan_stok']; ?></strong>
                        </p>
                        <a href="https://api.whatsapp.com/send?phone=62895405660901&text=Halo%20saya%20tertarik%20dengan%20produk%20Anda" target="_blank">
                            <div class="alert alert-success" role="alert"><img src="img/wa.png" style=width:30px;>
                                Pesan Produk 
                            </div>
                        </a>
                <?php else : ?>
                    <div class="col-md-12">
                        <p>Data tidak ditemukan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php require "partials/footer.php" ?>

    <!-- Java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>