<?php
require 'session-admin.php';
require "../koneksi.php";

$queryKategori = mysqli_query($con, " SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);


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
    <title>Kategori</title>
</head>
<style>

</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="text-decoration-none text-muted">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kategori
                </li>
            </ol>
        </nav>

        <!-- tambah kategori -->
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>
            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="Input nama kategori" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_kategori'])) {
                $kategori = htmlspecialchars($_POST['kategori']);

                $queryExits = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori' ");
                $jumlahDataKategoriBaru = mysqli_num_rows($queryExits);

                if ($jumlahDataKategoriBaru > 0) {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori sudah ada
                    </div>
                    <?php
                } else {
                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");

                    if ($querySimpan) {
                    ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil Tersimpan
                        </div>
                        <!-- Refresf page -->
                        <meta http-equiv="refresh" content="2; url=kategori.php" />
                        <!-- end -->
            <?php

                    } else {
                        echo mysqli_error($con);
                    }
                }
            }

            ?>
        </div>


        <!-- Daftar kategori -->
        <div class="mt-3">
            <h2>Daftar Kategori</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahKategori == 0) {
                        ?>
                            <tr>
                                <td colspan="3" class="text-center">Data Kategori tidak tersedia</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($queryKategori)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><a href="kategori-detail.php?a=<?php echo $data['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-magnifying-glass-plus"></i></a></td>
                                </tr>
                        <?php
                                $jumlah++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-3">
        <i class="fa-regular fa-copyright"></i> 2024
        <a href="#" class="text-decoration-none warna1-2"><span>
        Health Care</span></a> - Apotek online paling komplit All Rights Reserved
    </div>
</div>

    <!-- java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>