-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2024 at 04:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jk`, `alamat`, `email`, `username`, `password`, `foto`) VALUES
(1, 'Admin', 'L', 'Jl. Bunga No.51', 'admin@mail.com', 'admin', 'admin', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_menu`, `jumlah`, `total_harga`, `keterangan`) VALUES
(1, 1, 1, 4, 400000, ''),
(2, 1, 2, 3, 330000, ''),
(3, 1, 3, 1, 95000, ''),
(4, 1, 4, 1, 120000, ''),
(7, 3, 1, 1, 100000, ''),
(8, 3, 2, 6, 660000, ''),
(9, 3, 3, 1, 95000, ''),
(10, 4, 2, 3, 330000, ''),
(11, 4, 6, 5, 575000, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `harga`, `keterangan`, `gambar`, `status`) VALUES
(1, 'Shoyu Ramen', 'Makanan', 100000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', '', 1),
(2, 'Miso Ramen', 'Makanan', 110000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (9).jpg', 1),
(3, 'Shio Ramen', 'Makanan', 95000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (7).jpg', 1),
(4, 'Tonkotsu Ramen', 'Makanan', 120000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (4).jpg', 1),
(5, 'Tsukemen', 'Makanan', 130000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (10).jpg', 1),
(6, 'Spicy Miso Ramen', 'Makanan', 115000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (1).jpg', 1),
(7, 'Veggie Ramen', 'Makanan', 90000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (1).jpg', 1),
(8, 'Seafood Ramen', 'Makanan', 140000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (4).jpg', 1),
(9, 'Chicken Ramen', 'Makanan', 105000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (6).jpg', 1),
(10, 'Beef Ramen', 'Makanan', 125000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (2).jpg', 1),
(11, 'Curry Ramen', 'Makanan', 110000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (6).jpg', 1),
(12, 'Yasai Ramen', 'Makanan', 95000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (3).jpg', 1),
(13, 'Kimchi Ramen', 'Makanan', 100000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (9).jpg', 1),
(14, 'Garlic Tonkotsu Ramen', 'Makanan', 130000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (10).jpg', 1),
(15, 'Black Garlic Ramen', 'Makanan', 135000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (5).jpg', 1),
(16, 'Hakata Ramen', 'Makanan', 120000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (7).jpg', 1),
(17, 'Hiyashi Chuka', 'Makanan', 110000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (1).jpg', 1),
(18, 'Tan Tan Men', 'Makanan', 125000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (7).jpg', 1),
(19, 'Butter Corn Ramen', 'Makanan', 115000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (8).jpg', 1),
(20, 'Char Siu Ramen', 'Makanan', 140000, 'Nikmati kenikmatan ramen yang berpadukan dengan kaldu khas jepang yang sangat terkenal', 'ramen (7).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pesanan` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_pelanggan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `nomor_meja` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `kritik_saran` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_pesanan`, `tanggal`, `nama_pelanggan`, `no_hp`, `nomor_meja`, `total`, `keterangan`, `kritik_saran`, `status`) VALUES
(1, 'INV000001', '2024-06-12 05:41:56', 'Molestias voluptatem', '083822623170', '44', 900000, 'ditunggu ', '', 'selesai'),
(3, 'INV000002', '2024-06-12 09:01:42', 'Adiatna Sukmana', '083822623170', '69', 800000, 'Segera bos saya lapar', 'Mantap', 'selesai'),
(4, 'INV000003', '2024-06-12 09:04:49', 'Dias', '083822623170', '50', 800000, 'Segera', 'Keren', 'selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
