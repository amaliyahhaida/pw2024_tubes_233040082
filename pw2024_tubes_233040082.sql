-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 10:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040082`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'PROMO'),
(2, 'OBAT TETES'),
(3, 'OBAT SIRUP'),
(4, 'OBAT TABLET'),
(5, 'SUPLEMEN'),
(6, 'OBAT KAPSUL'),
(7, 'OBAT HERBAL'),
(8, 'ALAT KESEHATAN'),
(9, 'OBAT OLES');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` decimal(10,3) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_general_ci,
  `ketersediaan_stok` enum('habis','tersedia') COLLATE utf8mb4_general_ci DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(15, 1, 'Valtrex 500mg Tablet', '35.000', '6662ce3c1b081.jpeg', 'Valtrex merupakan obat yang digunakan untuk mengobati penyakit akibat infeksi virus seperti herpes pada pasien dengan gangguan sistem imun. Valtrex mengandung zat aktif Valaciclovir adalah suatu antivirus yang bekerja dengan menghambat polymerase DNA secara kompetitif di dalam DNA virus setelah diaktifkan dalam bentuk Acyclovir trifosfat. Bentuk aktif ini akan menghambat sintesis DNA dengan bertindak sebagai penutup jalur (Backbone) rantai DNA.', 'tersedia'),
(17, 8, 'Termometer Digital Multifungsi Beurer FT 65', '800.000', '6662d0635fe3c.jpg', 'Beurer FT65 adalah alat ukur suhu yang mempunyai beberapa keunggulan : 1. Hasil pengukuran suhu badan yang akurat melalui telinga ataupun dahi (kontak) 2. Hasil pengukuran yang cepat, hanya 1 detik 3. Dapat juga digunakan untuk mengukur suhu permukaan benda dan cairan. 4. Teknologi Infrared 5. Layar tampilan juga menunjukkan waktu dan tanggal 6. Menyimpan 10 hasil pengukuran terakhir 7. Alarm visual suhu > 38⁰ C 8. Layar tampilan yang besar sehingga mempermudah pembacaan hasil pengukuran 9. Bentuk yang nyaman, cocok untuk seluruh anggota keluarga 10. Otomatis off jika tidak dipergunakan beberapa saat 11. Hasil pengukuran bisa ditampilkan dalam pilihan ⁰C ataupun ⁰F', 'tersedia'),
(19, 1, 'Bisolvon 8 mg 10 Tablet', '35.000', '6662d085616d9.jpg', 'Bisolvon merupakan obat yang digunakan untuk mengurangi dan mengencerkan dahak pada saluran pernapasan. Bisolvon mengandung zat aktif Bromhexin HCl yang bekerja sebagai iritan pada saluran pernafasan di mana saat batuk, volume mukus ditingkatkan pada saluran napas serta menurunkan viskositasnya (menjadi lebih encer) sehingga dahak/lendir lebih mudah dikeluarkan dari saluran pernapasan. Fungsi Bromhexin HCl adalah ekspektoran yang dapat mengencerkan dahak atau lendir pada saluran pernafasan sehingga lebih mudah dikeluarkan bersamaan dengan batuk.', 'habis'),
(23, 3, 'Woods Att Sirup 60ml (per Botol)', '25.000', '6662d095d1809.jpg', 'Woods Antitusive merupakan obat yang digunakan untuk meringankan rasa batuk tidak berdahak yang disebabkan oleh alergi pada saluran pernapasan bagian atas.\r\n', 'tersedia'),
(24, 4, 'Ponstan 500 mg 10 Tablet', '40.000', '6662d0a5ee90c.jpeg', 'Ponstan adalah obat yang mengandung Asam Mefenamat digunakan sebagai pereda nyeri, dismenore, nyeri ringan khususnya ketika pasien juga mengalami peradangan, dan mengurangi gangguan inflamasi (peradangan) secara umum. Asam Mefenamat termasuk dalam golongan Nonsteroidal Anti-Inflammatory Drug (NSAID) yang memiliki mekanisme kerja dalam mengatasi nyeri sebagai berikut: Menghambat kerja dari enzim siklooksigenasi (COX) dimana enzim ini berfungsi dalam membantu pembentukan prostaglandin saat terjadinya luka dan menyebabkan rasa sakit serta peradangan. Ketika kerja enzim COX terhalangi, maka produksi prostaglandin lebih sedikit, sehingga rasa sakit dan peradangan akan berkurang.', 'tersedia'),
(25, 1, 'Mecobalamin Novell 500mcg Kapsul', '12.000', '6662d0b955cb1.jpg', 'MECOBALAMIN 500 MCG KAPSUL adalah obat generik yang merupakan satu bentuk kimiawi-nya berupa co-enzyme dari B12. Obat ini digunakan untuk mengobati neuropati perifer (saraf tepi) dan anemia megaloblastik yang disebabkan oleh defisiensi vitamin B12. Dalam penggunaan obat ini HARUS SESUAI DENGAN PETUNJUK DOKTER.', 'tersedia'),
(26, 9, 'Benoson N Cream 5 g', '25.000', '6662d0ca9a548.jpg', 'BENOSON N CREAM adalah obat oles yang mengandung Betamethasone 0.1% dan Neomycin sulfate 0.5%. Obat ini digunakan untuk meredakan peradangan dan alergi kulit yang disertai dengan adanya infeksi. Obat ini digunakan dengan cara mengoleskan obat pada wilayah yang infeksi sebanyak 2-3 kali per hari.', 'habis'),
(27, 8, 'Tensimeter Digital Omron HEM-7120', '450.000', '6662d138278ef.jpg', 'Tensimeter atau sfigmomanometer merupakan alat yang digunakan untuk mengukur tekanan darah. Alat yang selalu ada di ruang praktek dokter ini bisa digunakan di rumah, terutama jika Anda perlu melakukan pemeriksaan tekanan darah rutin. Dengan adanya tensimeter di rumah, pasien tidak perlu bolak-balik mengantre di rumah sakit atau tempat praktek dokter untuk memeriksakan tekanan darahnya.', 'tersedia'),
(28, 2, 'Rohto Dry Fresh 7 ml', '20.000', '6662d8e794aeb.jpg', 'Rohto Dry Fresh 7 ml adalah obat tetes mata yang mengandung Hypromellose 0,3 %, merupakan obat tetes mata yang dapat digunakan untuk mengatasi mata kering, meringankan iritasi mata serta sebagai pelumas mata.', 'tersedia'),
(29, 5, 'Enervon-C Multivitamin', '90.000', '6662d8f6ce9d1.jpg', 'Membantu menjaga daya tahan tubuh. Diperlukan untuk tubuh yang kekurangan vitamin, supaya daya tahan tubuh tetap terjaga serta membantu memulihkan kondisi setelah sakit.', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(6, 'admin', 'admin', 'admin', '$2y$10$zgVcdAIH5opPZIOfdHzzOOvvvDYXaL27EiQss06BQ/e9FqY5I5nyu', 'admin'),
(8, 'ama', 'liyah', 'amaaa', '$2y$10$UL8cFYENR7LrMPyQSabVxuH5l4J20a6GHqBzs3k9t.gJ0xCJd.666', 'user'),
(9, 'hydan', 'ali', 'ali', '$2y$10$ELrMxk8SEzeoUzFjwJbEw.TTCl6E/2sabmzwgxuuNtrZIeHQPY3.q', 'user'),
(11, 'maelani', 'ningrum', 'mae', '$2y$10$M6Msy7fyz0aOm2FeD61Dgel7BDZnQ3UKNz0rP/k43z41zak6oqJgS', 'user'),
(12, 'kylian', 'mbappe', 'kylian', '$2y$10$WZC6n3QwyKSzMCzd0Juz.uWp50nD3CrIu/W.DlYo7.cGdA6VYV6cC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
