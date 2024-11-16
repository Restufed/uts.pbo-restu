-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 03:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_restustok`
--

CREATE TABLE `tb_restustok` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(225) DEFAULT NULL,
  `stok` int(12) DEFAULT NULL,
  `harga_beli` int(12) DEFAULT NULL,
  `harga_jual` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_restustok`
--

INSERT INTO `tb_restustok` (`id_barang`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`) VALUES
(2, 'sepatu tenis', 4, 200000, 300000),
(4, 'sepatu futsal', 1, 150000, 250000),
(5, 'sepatu bola', 2, 20000, 250000),
(6, 'sepatu voli', 9, 267000, 280000),
(66, 'sepatu basket', 5, 300000, 350000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_restustok`
--
ALTER TABLE `tb_restustok`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_restustok`
--
ALTER TABLE `tb_restustok`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
