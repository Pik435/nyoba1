-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 06:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssn`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Baju Dinas'),
(3, 'Sepatu'),
(4, 'Jam Tangan'),
(5, 'Topi'),
(7, 'Dicj'),
(8, 'OOI'),
(9, 'Baju Pria'),
(10, 'Baju Wanita'),
(11, 'Sepatu EE');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(5, 1, 'Lele 1', 10000, 'DkiDfKkEteFlKEXp29Wn.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nam nulla sint, dicta quae eius\r\n            repellendus obcaecati tempora ea ab rerum? Quasi eligendi ipsa aspernatur possimus? Dolor cumque earum fuga\r\n            nisi unde nulla repellendus ut esse. Consequatur, dolore! Possimus a eius illo nisi quis fugiat.', 'tersedia'),
(6, 3, 'huh', 100000, 'CMNvLD8p6vwj2AkGEGeM.jpg', 'WWW\r\na\r\nw\r\newdwd\r\ndw', 'tersedia'),
(7, 4, 'rrw', 210000, 'cN4lZfGJQOiSn0ZbrWHT.jpg', '342ewds\r\n\r\nykugk5', 'tersedia'),
(8, 1, 'Lele 2', 1300000, '0KU7nZT84p4nPQddlOtJ.jpg', 'eewew\r\n\r\n\r\nfs\r\nf\r\nf\r\nsf\r\n\r\nff', 'tersedia'),
(9, 3, 'DDsw23', 11500, '36zmkCcNVALJTilTBJYH.jpg', 'gg\r\ngg\r\n\r\nh\r\nh', 'tersedia'),
(11, 4, 'HJUUU', 8888888, 'B6zH2TpHGTTeS2az3ra9.jpg', 'oooo\r\n\r\nhh\r\nh\r\nhh', 'tersedia'),
(12, 3, 'SIUUU', 12000, 'k007kmaZDOkU0QN26iQV.png', 'PIJ:JPP\r\n\r\nhhhh', 'tersedia'),
(13, 1, 'Lele 3', 23000, '6Wa6mHjBFo9kKdEn1GXJ.jpg', 'fff\r\n\r\nrrr', 'tersedia'),
(14, 4, 'SDDFFE4', 34000, 'iUd2SC0hpdzE8ZDvx4Vj.jpg', 'jjjjjjjj', 'tersedia'),
(15, 5, 'ttty56', 45000, '8MFSzgfMxssURfNhSKRw.jpg', 'KKOUHH\r\n\r\ng\r\ng\r\ng\r\n\r\n\r\ng\r\ng', 'tersedia'),
(16, 1, 'SSDDDDFF', 56000, 'jXTxc3Up8ClKXF6Uuiym.jpg', 'OPOPP\r\n\r\noo\r\n\r\noo', 'tersedia'),
(17, 1, 'GGG', 67000, '5kKFW9iZfnvR390Fyltk.jpg', 'LLL', 'tersedia'),
(18, 8, 'R56y', 12000, 'IpcBhw7LtCeuQ3TsymaL.jpg', 'ui89\r\n\r\n\r\n77', 'tersedia'),
(19, 7, 'PIPIII', 90000, 'YsspIiYkvT5WbmTEBaka.jpg', 'PIPIIPP', 'tersedia'),
(20, 1, 'Lele 5', 90000, 'NZyMO2TL4WsxvmdAbM1D.jpg', 'llllllllllllllllllkkjkj', 'tersedia'),
(21, 11, 'WWWe', 4000, 'fpL5U4gw1KYvjYLPQG0O.jpg', 'DDDDDDDDDDSSS', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Sapik', '$2y$10$ioO12GrO8xndOkY5VcJOjuEC62LcawNIXM3ynTsvYj554Q4DN/2ye');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
