-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2019 at 06:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toserba`
--

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `produk_id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `date_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`produk_id`, `kategori`, `nama`, `harga`, `gambar`, `deskripsi`, `date_create`) VALUES
(1, '', 'apel', 1111, 'singkong.png', 'apel', '0000-00-00'),
(2, '', 'jeruk', 100000, 'singkong.png', 'ini jeruk segar', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','penjual','user') NOT NULL DEFAULT 'administrator',
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `nama_lengkap`, `alamat`, `notelp`, `active`, `last_login`) VALUES
(1, 'alwi', '$2y$10$msjK0HDeOOHMyOJXM7jY6Oc09YuslmGZV18BekjJ2i1acDQ6PPq/C', 'administrator', '', '', '', '1', '2019-07-06 05:04:11'),
(2, 'hagane', '$2y$10$FC//MU0b4mBzrpU5YqRo6e3zkWGhvWfltnQ/2r.MH88YqFhDSMSsO', 'penjual', 'hagane', 'sidoarjo', '123456', '1', '2019-07-06 04:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
