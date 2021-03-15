-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2020 at 01:59 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14960276_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`id`, `kode`, `nama`) VALUES
(1, 'jne', 'JNE'),
(2, 'pos', 'POS'),
(3, 'tiki', 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(15, 'Hijab', 'hijab'),
(17, 'Aksesoris', 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `nama_kustomer` varchar(255) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `telpon` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `status_order` varchar(255) NOT NULL DEFAULT 'Baru',
  `kota` varchar(255) NOT NULL DEFAULT '',
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `kurir` varchar(255) NOT NULL DEFAULT '',
  `total` int(11) NOT NULL DEFAULT 0,
  `resi` varchar(255) DEFAULT NULL,
  `tgl_orders` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `user_id`, `nama_kustomer`, `alamat`, `telpon`, `email`, `status_order`, `kota`, `subtotal`, `ongkir`, `kurir`, `total`, `resi`, `tgl_orders`) VALUES
(10, 6, 'wahyu', 'jakarta', '085799573533', 'sugierpl@yahoo.com', 'Dikirim', 'Indramayu', 28500, 18000, 'pos', 46500, '1567822', '2020-09-30'),
(11, 6, 'amanah', 'jl. merauke 15 papua', '085799573533', 'sugierpl@yahoo.com', 'Refund Diterima', 'Merauke', 225000, 132000, 'tiki', 357000, '12345565', '2020-09-30'),
(12, 6, 'amanah', 'tre', '085799573533', 'sugierpl@yahoo.com', 'Pending', 'Tulang Bawang Barat', 129000, 33000, 'pos', 162000, NULL, '2020-09-30'),
(14, 6, 'amanah', 'qwer', '123', 'sugierpl@yahoo.com', 'Pending', 'Bantul', 36000, 12000, 'pos', 45000, NULL, '2020-10-01'),
(15, 6, 'amanah', 'qwer', '123', 'sugierpl@yahoo.com', 'Pending', 'Bantul', 36000, 12000, 'pos', 45000, NULL, '2020-10-01'),
(16, 6, 'amanah', 'qwe', '123', 'sugierpl@yahoo.com', 'Pending', 'Bantul', 252000, 16000, 'jne', 268000, NULL, '2020-10-01'),
(17, 6, 'amanah', 'trtr', '085799573533', 'sugierpl@yahoo.com', 'Pending', 'Natuna', 28500, 41000, 'jne', 69500, NULL, '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL DEFAULT 0,
  `produk_id` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `subberat` int(11) NOT NULL DEFAULT 0,
  `subharga` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `orders_id`, `produk_id`, `harga`, `berat`, `jumlah`, `subberat`, `subharga`) VALUES
(18, 15, 45, 36000, 200, 1, 200, 36000),
(19, 16, 45, 36000, 200, 7, 1400, 252000),
(20, 17, 44, 28500, 500, 1, 500, 28500);

-- --------------------------------------------------------

--
-- Table structure for table `order_refund`
--

CREATE TABLE `order_refund` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT '',
  `alasan` text NOT NULL,
  `refund_transfer` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_refund`
--

INSERT INTO `order_refund` (`id`, `orders_id`, `foto`, `alasan`, `refund_transfer`, `status`) VALUES
(2, 11, '20200930064048refund-11.jpg', 'sobek', 'BRI 344565788', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `bank` varchar(255) NOT NULL DEFAULT '',
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `bukti` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `orders_id`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 4, 'amanah', 'BRI 344565788', 512500, '2020-09-29', '20200929235913bukti-4.jpg'),
(2, 10, 'wahyu', 'bri', 46500, '2020-09-30', '20200930061841bukti-10.jpg'),
(3, 11, 'amanah', 'BRI 344565788', 357000, '2020-09-30', '20200930063623bukti-11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL DEFAULT 0,
  `nama_produk` varchar(255) NOT NULL DEFAULT '',
  `slug_produk` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` mediumtext NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `tgl_masuk` date NOT NULL DEFAULT '0000-00-00',
  `gambar` varchar(255) NOT NULL DEFAULT '',
  `dibeli` int(11) DEFAULT NULL,
  `diskon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori_id`, `nama_produk`, `slug_produk`, `deskripsi`, `harga_beli`, `harga_produk`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`, `diskon`) VALUES
(37, 17, 'Bros Alif', 'bros-alif', 'Kuat, Anti Karat, Simple, Awet', 65000, 75000, 12, 1, '2020-02-13', '202013055225FB_IMG_1581468400182.jpg', 0, 0),
(40, 15, 'Aisyah', 'aisyah', 'Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti', 70000, 80000, 0, 200, '2020-09-27', '202027094414FB_IMG_1581467288614.jpg', 13, 10),
(42, 17, 'Bros Al', 'bros-al', 'Kuat, Anti Karat, Simple, Awet', 20000, 30000, 7, 200, '2020-09-28', '202028124438FB_IMG_1581468343737.jpg', 6, 5),
(43, 15, 'Fatimah', 'fatimah', 'Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti', 40000, 50000, 7, 200, '2020-09-30', '202030011839FB_IMG_1581467703132.jpg', 5, 10),
(44, 15, 'Aisyah', 'aisyah', 'Hijab Aisyah Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti', 20000, 30000, 32, 500, '2020-09-30', '202030065548FB_IMG_1581467687979.jpg', 3, 5),
(45, 15, 'Aisyah', 'aisyah', 'Hijab instan langsung slup, Praktis, Ga ribet, tanpa jarum, tanpa peniti', 30000, 40000, 3, 200, '2020-09-30', '202030113211FB_IMG_1581467695911.jpg', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `no_hp`, `alamat`, `level`) VALUES
(1, 'hhhh', 'hhh@gmail.com', '839787a428a626a79586f23b998d7434', '', '', 'admin'),
(6, 'amanah', 'sugierpl@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'user'),
(21, NULL, 'test@test', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `order_refund`
--
ALTER TABLE `order_refund`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_id` (`orders_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_id` (`orders_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_refund`
--
ALTER TABLE `order_refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
