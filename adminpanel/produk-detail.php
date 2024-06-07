<?php
require 'session-admin.php';
require "../koneksi.php";

// ambil data di URL
$id = $_GET["id"];

// query data barang berdasarkan id
$query = "SELECT p.*, k.*, k.nama as nama_kategori, p.nama as nama_brg, p.harga as harga_barang, p.id as id_produk
FROM produk p
JOIN kategori k ON p.kategori_id = k.id WHERE p.id = $id";
$result = mysqli_query($con, $query);

// cek apakah data barang ditemukan
if (mysqli_num_rows($result) > 0) {
    $tampil = mysqli_fetch_assoc($result);
} else {
    die("Data tidak ditemukan.");
}

// query untuk mengambil semua kategori
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// cek apakah tombol submit sudah ditekan atau tombol hapus
if (isset($_POST["submit"])) {
    // ambil data dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kategori_id = $_POST["kategori_id"];
    $harga = $_POST["harga"];
    $detail = $_POST["detail"];
    $ketersediaan_stok = $_POST["ketersediaan_stok"];

    // periksa apakah ada file gambar yang diunggah
    if ($_FILES["foto"]["error"] === 4) {
        // jika tidak ada gambar yang diunggah, gunakan gambar yang sudah ada
        $foto = $tampil["foto"];
    } else {
        // jika ada gambar yang diunggah, upload gambar baru
        $foto = uploadImage();
        if (!$foto) {
            // jika upload gambar gagal, tampilkan pesan error
            echo "
                <script>
                    alert('Upload gambar gagal!');
                    document.location.href = 'produk-detail.php';
                </script>
            ";
            exit;
        }
    }

    // query update data barang
    $queryUpdate = "UPDATE produk SET
        kategori_id = '$kategori_id',
        nama = '$nama',
        harga = '$harga',
        foto = '$foto',
        detail = '$detail',
        ketersediaan_stok = '$ketersediaan_stok'
        WHERE id = $id";

    // cek apakah data berhasil diubah atau tidak
    if (mysqli_query($con, $queryUpdate)) {
        echo "
           <script> 
            alert('Data berhasil diubah!');
            document.location.href = 'produk.php';
           </script>
        ";
    } else {
        echo "
           <script>
            alert('Data gagal diubah!');
            document.location.href = 'produk-detail.php';
           </script>
        ";
    }
} elseif (isset($_POST["delete"])) {
    // query untuk menghapus data barang
    $queryDelete = "DELETE FROM produk WHERE id = $id";

    // cek apakah data berhasil dihapus atau tidak
    if (mysqli_query($con, $queryDelete)) {
        echo "
           <script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'produk.php';
           </script>
        ";
    } else {
        echo "
           <script>
            alert('Data gagal dihapus!');
            document.location.href = 'produk-detail.php';
           </script>
        ";
    }
}

// Fungsi untuk upload gambar
function uploadImage()
{
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tmpName = $_FILES["foto"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu!');
                document.location.href = 'produk-detail.php';
            </script>
        ";
        exit;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Format gambar tidak valid! Hanya menerima format JPG, JPEG, dan PNG.');
                document.location.href = 'produk-detail.php';
            </script>
        ";
        exit;
    }

    // cek jika ukuran file terlalu besar (maksimal 2MB)
    if ($ukuranFile > 2097152) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar! Maksimal 2MB.');
                document.location.href = 'produk-detail.php';
            </script>
        ";
        exit;
    }

    // generate nama baru untuk gambar
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // pindahkan gambar ke folder yang ditentukan
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
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
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="shortcut icon" href="../img/logo1.png" type="image/x-icon">
    <title>Produk</title>
</head>

<body>
    <?php require "navbar.php" ?>
    <div class="container-fluid">
        <div class="my-5 col-12 col-md-6 container">

            <h3>Edit Produk</h3>

            <div class="py-5">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= $tampil['id_produk']; ?>">

                    <div class="d-flex flex-column">
                        <img class="img-preview w-25" src="../img/<?= $tampil["foto"]; ?>" alt="Preview" id="preview" class="preview-image" />
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" onchange="previewImage(event)" class="form-control">
                    </div>
                    <div class="py-3">
                        <div>
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?= $tampil['nama_brg']; ?>" autocomplete="off" required>
                        </div>

                        <div class="py-3">
                            <label for="kategori_id">Kategori</label>
                            <input type="text" name="kategori_id" id="kategori_id" class="form-control py-3" value="<?= $tampil['nama_kategori']; ?>">
                            <select name="kategori_id" id="kategori_id" class="form-control" required>
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
                        <div class="py-3">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" value="<?= $tampil['harga']; ?>" required>
                        </div>
                        <div>
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" class="form-control" cols="20" rows="6"><?= $tampil['detail']; ?></textarea>
                        </div>
                        <div class="py-3">
                            <label for="ketersediaan_stok">Ketersediaan Stok</label>
                            <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                <option value="tersedia" <?php if ($tampil['ketersediaan_stok'] == 'tersedia') echo 'selected'; ?>>Tersedia</option>
                                <option value="habis" <?php if ($tampil['ketersediaan_stok'] == 'habis') echo 'selected'; ?>>Habis</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        <button type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Yakin Mau dihapus ?');">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- java -->
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block'; // Tampilkan gambar pratinjau
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function changeKategori() {
            var select = document.getElementById("kategoriSelect");
            var input = document.getElementById("kategoriInput");
            var selectedValue = select.value;
            input.value = selectedValue;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>