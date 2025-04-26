-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 04:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spin_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `nama`
--

CREATE TABLE `nama` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama`
--

INSERT INTO `nama` (`id`, `nama`, `nim`) VALUES
(1, 'REZA FIRMANSYAH', 240121178),
(2, 'NADIA AMALIA PUTRI', 240121193),
(3, 'FAKHRUL AZMI', 240121165),
(4, 'LUTFIANA SARI', 240121182),
(5, 'FARHAN RIZKY MAULANA', 240121174),
(6, 'ANNISA RAHMAWATI', 240121188),
(7, 'BAGAS ADITYA PRATAMA', 240121169),
(8, 'MELISA DEWI ANGGRIANI', 240121184),
(9, 'DWI SAPUTRA', 240121176),
(10, 'VANIA PUTRI MAHARANI', 240121191),
(11, 'ANDIKA PRATAMA', 240121172),
(12, 'YULIA RAHMADHANI', 240121186),
(13, 'ALIF SAPUTRA', 240121167),
(14, 'CITRA MAULIDA', 240121180),
(15, 'RAFI HIDAYATULLAH', 240121170),
(16, 'SHAKILA HANUM', 240121189),
(17, 'FADILAH NUR AZIZAH', 240121179),
(18, 'GILANG MAHARDIKA', 240121177),
(19, 'SALMA NUR AULIA', 240121187),
(20, 'ILHAM FIRMANSYAH', 240121175);


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `result` varchar(100) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `spin_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nama`
--
ALTER TABLE `nama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nama`
--
ALTER TABLE `nama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
