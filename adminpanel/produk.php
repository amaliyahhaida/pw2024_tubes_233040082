<?php
require 'session-admin.php';
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$tampil = mysqli_query($con, "SELECT p.*, k.*, k.nama as nama_kategori, p.nama as nama_brg, p.harga as harga_barang, p.id as id_produk
FROM produk p
JOIN kategori k ON p.kategori_id = k.id");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $kategori_id = htmlspecialchars($_POST['kategori_id']);
    $harga = htmlspecialchars($_POST['harga']);
    $detail = htmlspecialchars($_POST['detail']);
    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

    $target_dir = "../img/";
    $nama_file = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $nama_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_size = $_FILES["foto"]["size"];

    if ($nama == '' || $kategori_id == '' || $harga == '') {
?>
        <div class="alert alert-warning mt-3" role="alert">
            Nama, kategori_id, dan harga wajib diisi.
        </div>
        <?php
    } else {
        if ($nama_file == '') {
        ?>
            <script>
                alert('Mohon pilih file foto.');
            </script>
        <?php
        } elseif ($image_size > 1000000) {
        ?>
            <script>
                alert('Ukuran file tidak boleh lebih dari 1 MB.');
            </script>
            <?php
        } else {
            // Lakukan proses penyimpanan data ke database
            $query = "INSERT INTO produk (nama, kategori_id, harga, detail, ketersediaan_stok, foto) VALUES ('$nama', '$kategori_id', '$harga', '$detail', '$ketersediaan_stok', '$nama_file')";
            if (mysqli_query($con, $query)) {
                // Pindahkan file foto ke folder tujuan
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                header("Location: produk.php");
                exit;
            ?>
                <div class="alert alert-success mt-3" role="alert">
                    Data berhasil disimpan.
                </div>

            <?php
            } else {
            ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Terjadi kesalahan saat menyimpan data.
                </div>
<?php
            }
        }
    }
}

$jumlah = 0;

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
    <link rel="stylesheet" href="../css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="shortcut icon" href="../img/logo1.png" type="image/x-icon" />
    <title>Produk</title>
</head>
<style>
    form div {
        margin-bottom: 10px;
    }

    .print img {
        width: 50%;
        object-position: center !important;
    }

    @media print {
        .no-print {
            display: none !important;
        }

        .print img {
            height: 100%;
            width: 50%;
            object-fit: cover;
            object-position: center;
        }
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5 ">
        <nav aria-label="breadcrumb" class="no-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="text-decoration-none text-muted">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Produk
                </li>
            </ol>
        </nav>

        <!-- tambah Produk -->
        <div class="my-5 col-12 col-md-6 no-print">
            <h3>Tambah Produk</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="">-Pilih salah satu-</option>
                        <option value="1">PROMO</option>
                        <option value="2">OBAT TETES</option>
                        <option value="3">OBAT SIRUP</option>
                        <option value="4">OBAT TABLET</option>
                        <option value="5">SUPLEMEN</option>
                        <option value="6">OBAT KAPSUL</option>
                        <option value="7">OBAT HERBAL</option>
                        <option value="8">ALAT KESEHATAN</option>
                        <option value="9">OBAT OLES</option>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="tersedia">tersedia</option>
                        <option value="habis">habis</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>

        <!-- Daftar produk -->

        <div class="mt-3 print">
            <h2>Daftar Produk</h2>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="get">
                        <div class="input-group mb-3 my-3">
                            <input type="search" class="form-control" placeholder="cari produk.." name="keyword" id="keyword" autofocus autocomplete="off">
                            <button class="btn btn-primary" type="submit" name="search" id="search-button">Search</button>
                        </div>
                    </form>

                </div>
            </div>

            <button class="no-print btn btn-warning" onclick="window.print()"><i class="fa-solid fa-print"></i> Download</button>
            <div id="search-container">
                <div class="table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ketersediaan Stock</th>
                                <th class="no-print">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tampil as $t) :
                                $jumlah++;
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><img src="../img/<?= $t['foto']; ?>" alt="" class="foto-print"></td>
                                    <td><?php echo $t['nama_brg'] ?></td>
                                    <td><?php echo $t['nama_kategori'] ?></td>
                                    <td><?php echo $t['harga_barang'] ?></td>
                                    <td class="<?php echo ($t['ketersediaan_stok'] == 'tersedia') ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $t['ketersediaan_stok']; ?>
                                    </td>
                                    <td class="no-print"><a href="produk-detail.php?id=<?= $t["id_produk"] ?>"><i class="fa-solid fa-gears"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
    <script src="../js/script.js"></script>
</body>

</html>