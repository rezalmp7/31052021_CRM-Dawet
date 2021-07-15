-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 10:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawet`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(4) NOT NULL COMMENT 'id pelanggan',
  `nama` varchar(50) NOT NULL COMMENT 'nama pelanggan',
  `username` text NOT NULL,
  `password` text NOT NULL,
  `no_telp` varchar(15) NOT NULL COMMENT 'nomor telephone pelanggan',
  `alamat` text NOT NULL COMMENT 'alamat pelanggan',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'tanggal dibuat data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `username`, `password`, `no_telp`, `alamat`, `create_at`) VALUES
(1, 'Rezal Wahyu ', 'rezal', '398cb94411a2d4bdc9c7e3058943fc6a', '087721191226', 'Ds. Angkatan Lor, Rt002, Rw002, Kec. Tambakromo, Kab. Pati', '2021-07-15 06:36:33'),
(2, 'Supri', 'supri', 'd79444495ba8886c397b418227564d3f', '08771232841', 'Ds. Cengklik, Kec. Winong, Kab. Pati', '2021-07-13 17:24:50'),
(3, 'Wisnu Panitis', 'wisnu', '67340a8acc49d521d7fdd25db913bf9d', '08821723112', 'Ds. Grobog, Kec. Godong, Kab. Grobogan', '2021-07-13 17:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(4) NOT NULL COMMENT 'ID Pesanan',
  `id_transaksi` int(4) NOT NULL COMMENT 'ID Transaksi',
  `id_produk` int(4) NOT NULL COMMENT 'ID produk',
  `qty` int(4) NOT NULL COMMENT 'jumlah produk dibeli',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'data dibuat tanggal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_transaksi`, `id_produk`, `qty`, `create_at`) VALUES
(1, 1, 1, 1, '2021-05-08 05:35:53'),
(2, 1, 3, 4, '2021-05-08 05:35:53'),
(12, 2, 1, 21, '2021-05-09 02:48:19'),
(13, 2, 3, 1, '2021-05-09 02:48:19'),
(27, 4, 1, 5, '2021-05-20 03:14:38'),
(28, 4, 3, 5, '2021-05-20 03:14:38'),
(29, 3, 1, 5, '2021-07-15 07:56:12'),
(30, 3, 3, 1, '2021-07-15 07:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(4) NOT NULL COMMENT 'ID Produk',
  `nama` varchar(50) NOT NULL COMMENT 'Nama Produk',
  `harga` int(7) NOT NULL COMMENT 'Harga Produk'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`) VALUES
(1, 'Dawet Manis', 2000),
(3, 'Dawet Kental', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(4) NOT NULL COMMENT 'ID Transaksi',
  `id_pelanggan` int(4) NOT NULL COMMENT 'ID Pelanggan',
  `harga` int(7) NOT NULL COMMENT 'Total Harga pesanan',
  `disc` int(3) NOT NULL DEFAULT 0 COMMENT 'Discount pesanan',
  `total` int(7) NOT NULL COMMENT 'Total Harga yang harus dibayar',
  `status` enum('menunggu','proses','selesai') NOT NULL COMMENT 'Status transaksi',
  `pesanan_tgl` date NOT NULL COMMENT 'Pesanan diambil',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'data dibuat tanggal',
  `proses_at` timestamp NULL DEFAULT NULL COMMENT 'pesanan di proses tanggal',
  `done_at` timestamp NULL DEFAULT NULL COMMENT 'pesanan selesai tanggal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pelanggan`, `harga`, `disc`, `total`, `status`, `pesanan_tgl`, `create_at`, `proses_at`, `done_at`) VALUES
(1, 1, 14000, 4, 13440, 'selesai', '2021-05-10', '2021-05-09 02:54:02', '2021-05-08 06:40:05', '2021-05-09 02:54:02'),
(2, 1, 45000, 4, 43200, 'selesai', '2021-05-12', '2021-05-12 06:38:57', '2021-05-09 02:48:24', '2021-05-12 06:38:57'),
(3, 1, 13000, 4, 12480, 'menunggu', '2021-05-21', '2021-07-15 07:56:12', NULL, NULL),
(4, 2, 25000, 5, 23750, 'menunggu', '2021-05-20', '2021-05-20 03:14:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL COMMENT 'ID User/Admin',
  `nama` varchar(50) NOT NULL COMMENT 'Nama User/Admin',
  `username` varchar(50) NOT NULL COMMENT 'Username User/Admin',
  `password` varchar(100) NOT NULL COMMENT 'Password User/Admin',
  `level` enum('1','2') NOT NULL COMMENT 'Level User/Admin',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Data User/Admin dibuat tanggal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `create_at`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', '2021-05-20 02:31:14'),
(3, 'Naufal', 'naufal', 'a7ef174d3ed272acd2b72913a7ef9d40', '2', '2021-05-20 02:56:48'),
(4, 'Hidayat', 'hidayat', '37f3c4ac0ecd4a50c7f7ea1bd2b017c7', '1', '2021-05-20 02:36:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'id pelanggan', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID Pesanan', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID Produk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID Transaksi', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID User/Admin', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
