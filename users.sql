-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 03:04 AM
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
-- Database: `db_lembaga_pelatihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('1','2','3') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `no_telp`, `email`, `foto`, `role`, `password`) VALUES
(1, 'Dewi', 'Jl. Kemerdekaan No.25', '081234567891', 'dewi@example.com', 'dewi.jpg', '1', ''),
(2, 'Rina', 'Jl. Sudirman No.30', '082345678902', 'rina@example.com', 'rina.jpg', '2', ''),
(3, 'Toni', 'Jl. Diponegoro No.35', '083456789013', 'toni@example.com', 'toni.jpg', '3', ''),
(7, 'Nova Ramadhan', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08485928592', 'novaramadhan520@gmail.com', 'aw.png', '1', '$2y$10$muGT122jphw90ubkQnagSOqDVd58Nl0Mg7EvaCgoAsWJnRKLR.bUq'),
(8, 'Nova Ramadhan Hardiansyah', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08234567890112', 'caceh88311@calunia.com', 'PhotoRoom-20241104_102551.png', '1', '$2y$10$52oWnEJei5NsU2PQ9sossu1aneRwiR6btdDIM8x9lPA12G8Uz/zqG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
