-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 01:34 PM
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
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `judul_agenda` varchar(255) NOT NULL,
  `tanggal_agenda` date DEFAULT NULL,
  `waktu_agenda` time DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul_agenda`, `tanggal_agenda`, `waktu_agenda`, `lokasi_agenda`) VALUES
(1, 'Workshop Pemrograman', '2024-02-01', '10:00:00', 'Lab Komputer 1'),
(2, 'Seminar Teknologi', '2024-03-01', '09:00:00', 'Aula Gedung B');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `akun_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`akun_id`, `user_id`, `username`, `password`) VALUES
(1, 9, 'novaramadhann', '$2y$10$qAuyMvbiQ64QLKnHfRSshOvF.lV5R9VPmAL9OJtfnDiCmfQhdrkKm'),
(5, 13, 'novaramadhann1', '$2y$10$wh/LdHrVcCewHyJ8dt2BEeURsefMg867AJOINNO7tFHOjb2440t6S'),
(6, 14, 'novaramadhann2', '$2y$10$nA2de/9aEL5mot7AW4nE6ui3bUjbMZrFE5b23htBSETOGSLvF6p9S');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text DEFAULT NULL,
  `tanggal_publikasi` date DEFAULT NULL,
  `foto_berita` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `tanggal_publikasi`, `foto_berita`) VALUES
(1, 'Pengenalan Program Baru', 'Kami meluncurkan program baru...', '2024-01-01', 'program_baru.jpg'),
(2, 'Pendaftaran Dibuka', 'Pendaftaran program dasar telah dibuka...', '2024-01-15', 'pendaftaran.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `nilai_ujian` int(11) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_peserta`, `id_program`, `nilai_ujian`, `nilai_tugas`) VALUES
(1, 2, 1, 85, 90),
(2, 2, 2, 88, 92);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `program_yang_dipilih` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `user_id`, `nama`, `alamat`, `no_telp`, `email`, `program_yang_dipilih`, `foto`, `tgl_daftar`) VALUES
(1, 13, 'Nova Ramadhan Hardiansyah', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08234567890112', 'novaramadhan05@gmail.com', NULL, 'PhotoRoom-20241104_102551.png', '2024-11-09 09:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jadwal` text DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `materi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama_program`, `deskripsi`, `jadwal`, `biaya`, `materi`) VALUES
(1, 'Program Dasar', 'Pelatihan dasar pemrograman', 'Senin - Jumat, 08:00 - 12:00', 1000000, 'HTML, CSS, JavaScript'),
(2, 'Program Lanjut', 'Pelatihan lanjutan pemrograman', 'Senin - Jumat, 13:00 - 17:00', 2000000, 'Java, Python, SQL');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_pelatih`
--

CREATE TABLE `tenaga_pelatih` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `program_diajarkan` varchar(255) DEFAULT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenaga_pelatih`
--

INSERT INTO `tenaga_pelatih` (`id`, `user_id`, `nama`, `alamat`, `no_telp`, `email`, `foto`, `program_diajarkan`, `tgl_daftar`) VALUES
(1, 14, 'Nova Ramadhanq', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08485928592', 'novaramadhan5201@gmail.com', 'PhotoRoom-20241104_102551.png', NULL, '2024-11-09 09:39:07');

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
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `no_telp`, `email`, `foto`, `role`) VALUES
(1, 'Dewi', 'Jl. Kemerdekaan No.25', '081234567891', 'dewi@example.com', 'dewi.jpg', '1'),
(2, 'Rina', 'Jl. Sudirman No.30', '082345678902', 'rina@example.com', 'rina.jpg', '2'),
(3, 'Toni', 'Jl. Diponegoro No.35', '083456789013', 'toni@example.com', 'toni.jpg', '3'),
(9, 'Nova Ramadhan', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08198765432123', 'novaramadhan520@gmail.com', 'PhotoRoom-20241104_102551.png', '1'),
(13, 'Nova Ramadhan Hardiansyah', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08234567890112', 'novaramadhan05@gmail.com', 'PhotoRoom-20241104_102551.png', '2'),
(14, 'Nova Ramadhanq', 'Jl. Dungus Cariang No. 106/79, RT07/RW07, Kel. Dungus Cariang, Kec. Andir', '08485928592', 'novaramadhan5201@gmail.com', 'PhotoRoom-20241104_102551.png', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`akun_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tenaga_pelatih`
--
ALTER TABLE `tenaga_pelatih`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `akun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenaga_pelatih`
--
ALTER TABLE `tenaga_pelatih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tenaga_pelatih`
--
ALTER TABLE `tenaga_pelatih`
  ADD CONSTRAINT `tenaga_pelatih_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
