<?php
require "partials/session-user.php";
require "koneksi.php";
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$tampil = mysqli_query($con, "SELECT p.*, k.*, k.nama AS nama_kategori, p.nama AS nama_brg, p.id AS id_produk
                              FROM produk p
                              JOIN kategori k ON p.kategori_id = k.id
                              WHERE ketersediaan_stok = 'tersedia' ORDER BY p. `harga` DESC");

$data_produk = [];
while ($row = mysqli_fetch_assoc($tampil)) {
    $data_produk[] = $row;
}
$data_kategori = [];
while ($row = mysqli_fetch_assoc($queryKategori)) {
    $data_kategori[] = $row;
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
    <title>Health Care</title>
</head>

<body>
    <?php require "partials/navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center" id="home">
        <div class="container text-center text-light">
            <h1>Melengkapi Solusi Kesehatan Anda</h1>
            <h3>Mau Cari Apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Produk" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna1 telusuri ">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- kategori -->
    <div class="section" id="isi2">
        <div id="portofolio">
            <div class="container text-center mt-5">
                <h1 class="sub-title">Kategori Terlaris</h1>
                <div class="items-list">
                    <div class="items" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                        <img src="img/foto1.jpeg" />
                        <div class="layer1">
                            <a href="produk.php?kategori=ALAT KESEHATAN" class="btn warna1 telusuri " type="submit">ALAT KESEHATAN</a>
                        </div>
                    </div>
                    <div class="items " data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                        <img src="img/foto2.jpeg" />
                        <div class="layer1">
                            <a href="produk.php?kategori=SUPLEMEN" class="btn warna1 telusuri  " type="submit">SUPLEMEN</a>
                        </div>
                    </div>
                    <div class="items" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                        <img src="img/foto3.jpeg" />
                        <div class="layer1">
                            <a href="produk.php?kategori=PROMO" class="btn warna1 telusuri " type="submit">PROMO</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid  py-5 tentang" id="tentang">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-7 mt-5">Health Care adalah sebuah situs web jual obat yang didedikasikan untuk menyediakan akses mudah dan aman bagi pengguna yang ingin membeli obat-obatan secara online. Dengan fokus pada kesehatan dan kesejahteraan, Health Care menawarkan berbagai macam obat-obatan dari berbagai kategori, mulai dari obat resep hingga obat bebas yang umum digunakan.
                <br>
                Web Health Care memiliki antarmuka yang sederhana dan mudah digunakan, memungkinkan pengguna untuk dengan cepat mencari dan menemukan produk yang mereka butuhkan. Di dalam situs, pengguna dapat menemukan deskripsi lengkap tentang setiap obat.
            </p>
        </div>
    </div>


    <!-- produk -->
    <div class="container-fluid py-5" id="produk">
        <div class="container text-center ">
            <h3>Produk</h3>
            <div class="row mt-5">
                <?php foreach ($data_produk as $t) : ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="img/<?= $t['foto'] ?>" alt="" class="card-img-top" />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mt-3"><?= $t['nama_brg'] ?></h4>
                                <p style="color:red;"><?= $t['nama_kategori']; ?></p>
                                <p class="card-text text-truncate " style="font-size: 15px ;"><?= $t['detail'] ?></p>
                                <div class="card-fasilitas py-3">
                                    <h4>Rp. <?= $t['harga'] ?>/-</h4>
                                    <div class="py-3">
                                        <a href="produk-detail.php?id=<?= $t['id_produk']; ?>" class="btn warna1 text-white telusuri">Lihat Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="btn btn-primary m-3" href="produk.php" style="color: white;">See More</a>
        </div>
    </div>

    <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Lokasi Kami</h2>
        <!-- Map container -->
        <div class="map-container">
            <div class="mapBg"></div>
                <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3959.1920588598214!2d107.46252847483713!3d-7.103726992899625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDYnMTMuNCJTIDEwN8KwMjcnNTQuNCJF!5e0!3m2!1sen!2sid!4v1717645644472!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
      </div>
      <div class="col-md-6">
        <h2>Kontak</h2>
        <!-- Contact Form -->
        <form action="process_form.php" method="post">
          <div class="form-group">
            <label for="name">Nama :</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="message">Pesan :</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>
>
    </div>

    <!-- footer -->
    <?php require "partials/footer.php" ?>

    <!-- Java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="fontawesome/js/all.min.js"></script>
   
</body>
</html>