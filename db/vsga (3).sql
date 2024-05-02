-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 10:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET T=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `nomor_identitas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_paket` varchar(50) DEFAULT NULL,
  `jumlah_penginap` smallint DEFAULT NULL,
  `lama_menginap` smallint DEFAULT NULL,
  `transportasi` tinyint(1) DEFAULT '0',
  `konsumsi` tinyint(1) DEFAULT '0',
  `diskon` int NOT NULL,
  `total_biaya` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `nama`, `gender`, `nomor_identitas`, `tanggal`, `jenis_paket`, `jumlah_penginap`, `lama_menginap`, `transportasi`, `konsumsi`, `diskon`, `total_biaya`) VALUES
(62, 1, 'Dimas fajar edit', 'Laki-laki', '3419974585858883', '2024-05-09', 'Delux', 1, 5, 1, 1, 10, 1935000.00),
(63, 6, 'Doni Salmanan', 'Laki-laki', '7866250000372080', '2024-05-13', 'Family', 4, 2, 0, 1, 0, 4640000.00),
(64, 1, 'Sofia', 'Perempuan', '3510082737374449', '2024-05-02', 'Standar', 1, 1, 0, 0, 0, 500000.00),
 'Family', 2, 7, 0, 1, 10, 2808000.00),
(66, 1, 'Aldo ', 'Laki-laki', '3510083775758883', '2024-05-06', 'Delux', 1, 4, 1, 1, 10, 1683000.00),
(67, 7, 'seftie', 'Laki-laki', '1212222222222222', '2024-05-02', 'Family', 1, 4, 0, 1, 10, 1188000.00),
(68, 7, 'seftie 2', 'Laki-laki', '1111111111111111', '2024-05-22', 'Family', 2, 1, 0, 1, 0, 2160000.00),
(69, 1, 'test l', 'Laki-laki', '1212121221212112', '2024-05-02', 'Delux', 1, 4, 0, 1, 10, 963000.00),
(70, 5, 'user', 'Laki-laki', '6363636363636363', '2024-05-02', 'Delux', 1, 7, 0, 1, 10, 1179000.00),
(71, 8, 'dimass', 'Laki-laki', '4545454545454545', '2024-05-02', 'Delux', 1, 5, 1, 0, 10, 1575000.00),
(72, 5, 'user', 'Laki-laki', '1111111111111111', '2024-05-02', 'Standar', 1, 4, 0, 1, 0, 77000000.00),
(73, 5, 'user test', 'Laki-laki', '2222222222222222', '2024-05-02', 'Standar', 1, 1, 0, 0, 0, 50000000.00),
(74, 5, 'user test 2', 'Laki-laki', '0000.00),
(75, 1, 'Mas Admin', 'Laki-laki', '1231231231231231', '2024-05-02', 'Standar', 1, 4, 1, 0, 10, 1250000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `level` enum('1','2') NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
<<<<<<< HEAD
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
>>>>>>> 975c389b56f1010a1767de0deb98fad2602cd225

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `email`, `password`) VALUES
(1, '1', 'Mas Admin', 'admin@gmail.com', 'admin'),
(5, '2', 'user', 'user@gmail.com', 'user'),
(6, '2', 'Doni Salmanan', 'doni@gmail.com', 'doni'),
(7, '2', 'seftie', 'test@gmail.com', '123'),
(8, '2', 'dimass', 'dimaas@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
