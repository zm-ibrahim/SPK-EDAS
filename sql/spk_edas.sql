-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_edas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode`, `nama`, `deskripsi`) VALUES
(8, 'S1', 'SMPN 23 Pekanbaru', ''),
(9, 'S2', 'SMPN 6 Pekanbaru', ''),
(10, 'S3', 'SMPN 34 Pekanbaru', ''),
(11, 'S4', 'SMPN 27 Pekanbaru', ''),
(12, 'S5', 'SMPIT Imam An Nawawi', ''),
(13, 'S6', 'SMP Kartika', ''),
(14, 'S7', 'SMPN 8 Pekanbaru', ''),
(15, 'S8', 'SMPN Babussalam', ''),
(16, 'S9', 'SMPN 37 Pekanbaru', '');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_pengguna`
--

CREATE TABLE `informasi_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_pengguna`
--

INSERT INTO `informasi_pengguna` (`id`, `username`, `email`, `password`) VALUES
(-477762032, 'user', 'user@gmail.com', '$2y$10$XAXEEdnKv2f4S8yyXzhDrOmLSgH/laQuucNxSoelfVjml/kL4zDYO');

-- --------------------------------------------------------

--
-- Table structure for table `jarak_solusi_rata_rata`
--

CREATE TABLE `jarak_solusi_rata_rata` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `jarak` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `bobot`, `deskripsi`, `jenis`) VALUES
(13, 'K1', 'Koleksi', '0.20', '', 'Cost'),
(14, 'K2', 'Sarana dan Prasarana Perpustakaan', '0.15', '', 'Benefit'),
(15, 'K3', 'Pelayanan Perpustakaan', '0.25', '', 'Benefit'),
(16, 'K4', 'Tenaga Perpustakaan', '0.20', '', 'Benefit'),
(17, 'K5', 'Penyelenggaraan dan Pengelolaan Perpustakaan', '0.15', '', 'Benefit'),
(18, 'K6', 'Penguat', '0.05', '', 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `matriks_evaluasi`
--

CREATE TABLE `matriks_evaluasi` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matriks_evaluasi`
--

INSERT INTO `matriks_evaluasi` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(28, 8, 13, '95.00'),
(29, 9, 13, '98.00'),
(30, 10, 13, '97.00'),
(31, 11, 13, '99.00'),
(32, 12, 13, '99.00'),
(33, 13, 13, '97.00'),
(34, 14, 13, '99.00'),
(35, 15, 13, '72.00'),
(36, 16, 13, '74.00'),
(37, 8, 14, '120.00'),
(38, 9, 14, '128.00'),
(39, 10, 14, '123.00'),
(40, 11, 14, '135.00'),
(41, 12, 14, '130.00'),
(42, 13, 14, '132.00'),
(43, 14, 14, '127.00'),
(44, 15, 14, '97.00'),
(45, 16, 14, '116.00'),
(46, 8, 15, '63.00'),
(47, 9, 15, '67.00'),
(48, 10, 15, '65.00'),
(49, 11, 15, '67.00'),
(50, 12, 15, '62.00'),
(51, 13, 15, '60.00'),
(52, 14, 15, '63.00'),
(53, 15, 15, '45.00'),
(54, 16, 15, '47.00'),
(55, 8, 16, '45.00'),
(56, 9, 16, '41.00'),
(57, 10, 16, '39.00'),
(58, 11, 16, '43.00'),
(59, 12, 16, '42.00'),
(60, 13, 16, '40.00'),
(61, 14, 16, '40.00'),
(62, 15, 16, '25.00'),
(63, 16, 16, '23.00'),
(64, 8, 17, '43.00'),
(65, 9, 17, '40.00'),
(66, 10, 17, '45.00'),
(67, 11, 17, '45.00'),
(68, 12, 17, '44.00'),
(69, 13, 17, '43.00'),
(70, 14, 17, '44.00'),
(71, 15, 17, '37.00'),
(72, 16, 17, '34.00'),
(73, 8, 18, '23.00'),
(74, 9, 18, '23.00'),
(75, 10, 18, '25.00'),
(76, 11, 18, '24.00'),
(77, 12, 18, '23.00'),
(78, 13, 18, '23.00'),
(79, 14, 18, '22.00'),
(80, 15, 18, '14.00'),
(81, 16, 18, '16.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nsp_nsn`
-- (See below for the actual view)
--
CREATE TABLE `nsp_nsn` (
`id_alternatif` int(11)
,`kode_alternatif` varchar(100)
,`sp` decimal(39,8)
,`sn` decimal(39,8)
,`max_sp` decimal(39,8)
,`nsp` decimal(51,12)
,`max_sn` decimal(39,8)
,`nsn` decimal(52,12)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pda_nda`
-- (See below for the actual view)
--
CREATE TABLE `pda_nda` (
`id_alternatif` int(11)
,`id_kriteria` int(11)
,`jenis` varchar(10)
,`kode_alternatif` varchar(100)
,`kode_kriteria` varchar(100)
,`nilai_alternatif` decimal(5,2)
,`nilai_rata_rata` decimal(5,2)
,`pda` decimal(12,6)
,`nda` decimal(12,6)
);

-- --------------------------------------------------------

--
-- Table structure for table `peringkat`
--

CREATE TABLE `peringkat` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `peringkat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `solusi_rata_rata`
--

CREATE TABLE `solusi_rata_rata` (
  `id` int(11) NOT NULL,
  `nilai_rata_rata` decimal(5,2) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solusi_rata_rata`
--

INSERT INTO `solusi_rata_rata` (`id`, `nilai_rata_rata`, `id_kriteria`) VALUES
(120, '92.22', 13),
(121, '123.11', 14),
(122, '59.89', 15),
(123, '37.56', 16),
(124, '41.67', 17),
(125, '21.44', 18);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sp_sn`
-- (See below for the actual view)
--
CREATE TABLE `sp_sn` (
`id_alternatif` int(11)
,`kode_alternatif` varchar(100)
,`sp` decimal(39,8)
,`sn` decimal(39,8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_as`
-- (See below for the actual view)
--
CREATE TABLE `view_as` (
`id_alternatif` int(11)
,`kode_alternatif` varchar(100)
,`nilai_AS` decimal(57,16)
);

-- --------------------------------------------------------

--
-- Structure for view `nsp_nsn`
--
DROP TABLE IF EXISTS `nsp_nsn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nsp_nsn`  AS SELECT `sp_sn`.`id_alternatif` AS `id_alternatif`, `sp_sn`.`kode_alternatif` AS `kode_alternatif`, `sp_sn`.`sp` AS `sp`, `sp_sn`.`sn` AS `sn`, max(`sp_sn`.`sp`)  () AS `over` FROM `sp_sn` ;

-- --------------------------------------------------------

--
-- Structure for view `pda_nda`
--
DROP TABLE IF EXISTS `pda_nda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pda_nda`  AS SELECT `me`.`id_alternatif` AS `id_alternatif`, `me`.`id_kriteria` AS `id_kriteria`, `k`.`jenis` AS `jenis`, `a`.`kode` AS `kode_alternatif`, `k`.`kode` AS `kode_kriteria`, `me`.`nilai` AS `nilai_alternatif`, `av`.`nilai_rata_rata` AS `nilai_rata_rata`, CASE WHEN `k`.`jenis` = 'Benefit' THEN greatest(0,(`me`.`nilai` - `av`.`nilai_rata_rata`) / `av`.`nilai_rata_rata`) ELSE greatest(0,(`av`.`nilai_rata_rata` - `me`.`nilai`) / `av`.`nilai_rata_rata`) END AS `pda`, CASE WHEN `k`.`jenis` = 'Benefit' THEN greatest(0,(`av`.`nilai_rata_rata` - `me`.`nilai`) / `av`.`nilai_rata_rata`) ELSE greatest(0,(`me`.`nilai` - `av`.`nilai_rata_rata`) / `av`.`nilai_rata_rata`) END AS `nda` FROM (((`matriks_evaluasi` `me` join `alternatif` `a` on(`me`.`id_alternatif` = `a`.`id`)) join `kriteria` `k` on(`me`.`id_kriteria` = `k`.`id`)) join `solusi_rata_rata` `av` on(`me`.`id_kriteria` = `av`.`id_kriteria`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sp_sn`
--
DROP TABLE IF EXISTS `sp_sn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_sn`  AS SELECT `pda_nda`.`id_alternatif` AS `id_alternatif`, `pda_nda`.`kode_alternatif` AS `kode_alternatif`, sum(`pda_nda`.`pda` * `k`.`bobot`) AS `sp`, sum(`pda_nda`.`nda` * `k`.`bobot`) AS `sn` FROM ((select `pda_nda`.`id_alternatif` AS `id_alternatif`,`pda_nda`.`id_kriteria` AS `id_kriteria`,`pda_nda`.`jenis` AS `jenis`,`pda_nda`.`kode_alternatif` AS `kode_alternatif`,`pda_nda`.`kode_kriteria` AS `kode_kriteria`,`pda_nda`.`nilai_alternatif` AS `nilai_alternatif`,`pda_nda`.`nilai_rata_rata` AS `nilai_rata_rata`,`pda_nda`.`pda` AS `pda`,`pda_nda`.`nda` AS `nda` from `pda_nda`) `pda_nda` join `kriteria` `k` on(`pda_nda`.`id_kriteria` = `k`.`id`)) GROUP BY `pda_nda`.`id_alternatif` ;

-- --------------------------------------------------------

--
-- Structure for view `view_as`
--
DROP TABLE IF EXISTS `view_as`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_as`  AS SELECT `nsp_nsn`.`id_alternatif` AS `id_alternatif`, `nsp_nsn`.`kode_alternatif` AS `kode_alternatif`, (`nsp_nsn`.`nsp` + `nsp_nsn`.`nsn`) / 2 AS `nilai_AS` FROM (select `nsp_nsn`.`id_alternatif` AS `id_alternatif`,`nsp_nsn`.`kode_alternatif` AS `kode_alternatif`,`nsp_nsn`.`sp` AS `sp`,`nsp_nsn`.`sn` AS `sn`,`nsp_nsn`.`max_sp` AS `max_sp`,`nsp_nsn`.`nsp` AS `nsp`,`nsp_nsn`.`max_sn` AS `max_sn`,`nsp_nsn`.`nsn` AS `nsn` from `nsp_nsn`) AS `nsp_nsn` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatif_un` (`kode`);

--
-- Indexes for table `informasi_pengguna`
--
ALTER TABLE `informasi_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jarak_solusi_rata_rata`
--
ALTER TABLE `jarak_solusi_rata_rata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_un` (`kode`);

--
-- Indexes for table `matriks_evaluasi`
--
ALTER TABLE `matriks_evaluasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matriks_evaluasi_alternatif` (`id_alternatif`),
  ADD KEY `fk_matriks_evaluasi_kriteria` (`id_kriteria`);

--
-- Indexes for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `solusi_rata_rata`
--
ALTER TABLE `solusi_rata_rata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solusi_rata_rata_un` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jarak_solusi_rata_rata`
--
ALTER TABLE `jarak_solusi_rata_rata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `matriks_evaluasi`
--
ALTER TABLE `matriks_evaluasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solusi_rata_rata`
--
ALTER TABLE `solusi_rata_rata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jarak_solusi_rata_rata`
--
ALTER TABLE `jarak_solusi_rata_rata`
  ADD CONSTRAINT `jarak_solusi_rata_rata_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`);

--
-- Constraints for table `matriks_evaluasi`
--
ALTER TABLE `matriks_evaluasi`
  ADD CONSTRAINT `fk_matriks_evaluasi_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_matriks_evaluasi_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matriks_evaluasi_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`),
  ADD CONSTRAINT `matriks_evaluasi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`);

--
-- Constraints for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD CONSTRAINT `peringkat_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`);

--
-- Constraints for table `solusi_rata_rata`
--
ALTER TABLE `solusi_rata_rata`
  ADD CONSTRAINT `solusi_rata_rata_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
