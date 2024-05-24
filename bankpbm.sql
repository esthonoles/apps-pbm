-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2024 at 11:42 AM
-- Server version: 8.0.36-2ubuntu3
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankpbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int NOT NULL,
  `ktp` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dated_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `ktp`, `nama`, `tgl_lahir`, `no_hp`, `dated_created`) VALUES
(3, '3525171209940006', 'jhon d roger', '1992-12-09', '089387639823', 1714737406),
(4, '00092321299', 'rose de pink', '2001-05-01', '089198239292', 1714738411),
(5, '3525170101990006', 'abd wahid', '1999-01-01', '085232292844', 1714738788),
(7, '3525171209940001', 'sihu oke', '2005-05-04', '0892390000000', 1714827302),
(8, '0987783', 'Haidar', '2024-05-02', '0987029938', 1714827494),
(9, '0989890923123', 'ivana', '2024-05-10', '0899023902313', 1715608050);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sampah`
--

CREATE TABLE `tbl_sampah` (
  `id` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sampah`
--

INSERT INTO `tbl_sampah` (`id`, `nama`, `harga`) VALUES
(21, 'Kertas', 200),
(22, 'Koran', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int NOT NULL,
  `kode_transaksi` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_nasabah` int NOT NULL,
  `id_sampah` int NOT NULL,
  `debit` int NOT NULL,
  `kredit` int NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `kode_transaksi`, `tgl_transaksi`, `id_nasabah`, `id_sampah`, `debit`, `kredit`, `berat`) VALUES
(4, 'PBM-D/14/05/001', '2024-05-08', 2, 3, 0, 0, 10),
(5, 'PBM-D/14/05/002', '2024-05-14', 1, 1, 0, 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `nama`, `email`, `password`, `date_created`) VALUES
(2, 1, 'abdwahid', 'admin@mail.com', '$2y$10$IEQkp7VKVDQVhMPTpBk5Fe6laXuZnASxq9SQI0p.OS/xh8EnKPHPK', 1711675952),
(3, 2, 'dian agustina', 'staff@mail.com', '$2y$10$NEg.euZX1HoG0l5nfXzsweshAxRMyaEHr.Z9/pVWv50sAgeWkVpxG', 1711676182);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sampah`
--
ALTER TABLE `tbl_sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nasabah` (`id_nasabah`),
  ADD UNIQUE KEY `id_sampah` (`id_sampah`),
  ADD UNIQUE KEY `id_nasabah_4` (`id_nasabah`),
  ADD KEY `id_sampah_2` (`id_sampah`),
  ADD KEY `id_nasabah_2` (`id_nasabah`),
  ADD KEY `id_nasabah_3` (`id_nasabah`,`id_sampah`),
  ADD KEY `id_nasabah_5` (`id_nasabah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sampah`
--
ALTER TABLE `tbl_sampah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
