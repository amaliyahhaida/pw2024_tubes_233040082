-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 09:49 AM
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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Amaliyah', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '085862904637', 'amaliyahnurhaida@gmail.com', 'Ciwidey');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(11, 'Sirup'),
(12, 'Pil'),
(13, 'Tablet'),
(14, 'Obat Tetes'),
(15, 'Obat Oles');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(5, 14, 'Betadine', 17000, 'Obat luka', 'produk1716651647.jpg', '1', '2024-05-25 15:40:47'),
(6, 13, 'Tremenza', 23000, 'Meringankan gejala flu', 'produk1716651689.jpg', '1', '2024-05-25 15:41:29'),
(7, 11, 'Woods', 28000, 'Obat Batuk berdahak', 'produk1716651723.jpg', '1', '2024-05-25 15:42:03'),
(8, 12, 'Vermint', 22000, 'tipes, demam tinggi, migrain, sakit kepala terus menerus\r\n  ', 'produk1716799833.jpg', '1', '2024-05-25 15:46:24'),
(9, 13, 'Ponstan', 38000, 'meringankan gejala nyeri atau ngilu akibat sakit gigi', 'produk1716728291.jpg', '1', '2024-05-26 12:58:11'),
(10, 11, 'Sanmol sirup', 22000, 'meringankan rasa sakit pada keadaan sakit kepala, sakit gigi dan menurunkan demam', 'produk1716728503.jpg', '1', '2024-05-26 13:01:43'),
(11, 15, 'Benoson N Cream', 25000, ' meredakan peradangan dan alergi kulit yang disertai dengan adanya infeks', 'produk1716798114.jpg', '1', '2024-05-27 08:21:54'),
(12, 14, 'Insto Cool Eye Drop', 20000, 'obat tetes mata untuk mengatasi mata merah dan perih akibat paparan debu, asap, dan polusi', 'produk1716800003.png', '1', '2024-05-27 08:53:23'),
(13, 14, 'Rohto Dryfresh', 19000, 'mengatasi mata kering dan mencegah iritasi akibat kurangnya produksi air mata', 'produk1716802536.jpg', '1', '2024-05-27 09:35:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
