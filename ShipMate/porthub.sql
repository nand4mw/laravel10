-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2023 at 03:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_tangkap`
--

CREATE TABLE `alat_tangkap` (
  `id_alat_tangkap` int NOT NULL,
  `nama_alat_tangkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alat_tangkap`
--

INSERT INTO `alat_tangkap` (`id_alat_tangkap`, `nama_alat_tangkap`) VALUES
(1, 'Jaring'),
(2, 'Tombak'),
(3, 'Sangkali'),
(4, 'Crossbow'),
(6, 'Tangan Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `dpi`
--

CREATE TABLE `dpi` (
  `id_dpi` int NOT NULL,
  `nama_dpi` varchar(255) NOT NULL,
  `luas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dpi`
--

INSERT INTO `dpi` (`id_dpi`, `nama_dpi`, `luas`) VALUES
(1, 'Kalianget', 765),
(2, 'Pasongsongan', 372),
(3, 'Gersik Putih', 575),
(4, 'Dasuk', 763),
(6, 'Simpang Lima', 120);

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` int NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `id_pemilik` int NOT NULL,
  `id_dpi` int NOT NULL,
  `id_alat_tangkap` int NOT NULL,
  `foto_kapal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nama_kapal`, `id_pemilik`, `id_dpi`, `id_alat_tangkap`, `foto_kapal`) VALUES
(1, 'Torpedo I', 3, 1, 3, '641a66b56bb48.jpg'),
(4, 'Xierra IV', 1, 3, 3, '641ae254bc798.jpg'),
(5, 'Ridho Ilahi', 6, 4, 4, '641ae42e519f7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `alamat`, `no_hp`) VALUES
(1, 'Sarno', 'Pandian', '08123139871'),
(3, 'Herman Julianto', 'Kolor', '087129381273'),
(4, 'Ji Bakri', 'Pantura', '0872391234'),
(5, 'Ji Saom', 'Gedungan', '081872633456'),
(6, 'Ji Mastura', 'Tanair', '087651231249');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `foto_profile`) VALUES
(1, 'muhammadalief', 'aliefmuhammad1908@gmail.com', '$2y$10$a5LcyTx13VNttVDoZU6UQecP24uN73eH31cYth4i6Ez47UWADXevm', '64168d2ab5e4c.webp'),
(2, 'Yigit Khozan', 'yigitkhozan1908@gmail.com', '$2y$10$syJ.uyXLinM0vIyzl5WPQuqEkUHvSdYDfIT3obvzQM2wiRP7rSyVi', '6419a599667e2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_tangkap`
--
ALTER TABLE `alat_tangkap`
  ADD PRIMARY KEY (`id_alat_tangkap`);

--
-- Indexes for table `dpi`
--
ALTER TABLE `dpi`
  ADD PRIMARY KEY (`id_dpi`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_dpi` (`id_dpi`),
  ADD KEY `id_alat_tangkap` (`id_alat_tangkap`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_tangkap`
--
ALTER TABLE `alat_tangkap`
  MODIFY `id_alat_tangkap` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dpi`
--
ALTER TABLE `dpi`
  MODIFY `id_dpi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kapal`
--
ALTER TABLE `kapal`
  ADD CONSTRAINT `kapal_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kapal_ibfk_2` FOREIGN KEY (`id_dpi`) REFERENCES `dpi` (`id_dpi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kapal_ibfk_3` FOREIGN KEY (`id_alat_tangkap`) REFERENCES `alat_tangkap` (`id_alat_tangkap`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
