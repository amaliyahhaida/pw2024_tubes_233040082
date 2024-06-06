<?php
require "../koneksi.php";

$keyword = $_GET['keyword'];

$queryProduk = mysqli_query($con, "SELECT p.*, k.*, k.nama as nama_kategori, p.nama as nama_brg, p.id as id_produk
FROM produk p
JOIN kategori k ON p.kategori_id = k.id WHERE p.nama LIKE '%$keyword%'OR k.nama LIKE '%$keyword%'");
$jumlah = 0;

?>

<?php if (mysqli_num_rows($queryProduk) > 0) : ?>
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
                foreach ($queryProduk as $t) :
                    $jumlah++;
                ?>
                    <tr>
                        <td><?php echo $jumlah; ?></td>
                        <td><img src="../img/<?= $t['foto']; ?>" alt="" class="foto-print"></td>
                        <td><?php echo $t['nama_brg'] ?></td>
                        <td><?php echo $t['nama_kategori'] ?></td>
                        <td><?php echo $t['harga'] ?></td>
                        <td class="<?php echo ($t['ketersediaan_stok'] == 'tersedia') ? 'text-success' : 'text-danger'; ?>">
                            <?php echo $t['ketersediaan_stok']; ?>
                        </td>
                        <td class="no-print"><a href="produk-detail.php?id=<?= $t["id_produk"] ?>"><i class="fa-solid fa-gears"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- jika tidak ada -->
<?php else : ?>
    <div class="row">
        <div class="col-md-6 py-3">
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
        </div>
    </div>
<?php endif ?>

