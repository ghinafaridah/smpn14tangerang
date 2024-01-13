-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 06:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_programming_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nomor_induk_pegawai` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `pengalaman_mengajar` varchar(500) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nomor_induk_pegawai`, `nama`, `jabatan`, `alamat`, `pendidikan_terakhir`, `pengalaman_mengajar`, `created_date`, `updated_date`, `password`) VALUES
('000', '000', 'guru', '000', '000', '000', '2024-01-05 17:05:53', NULL, '000'),
('222', 'Pegawai satu virus ', 'guru', 'alamat sana sini', 'S3', '2 tahun', '2024-01-04 11:16:55', '2024-01-05 16:58:37', '27946274a201346f0322e3861909b5ff'),
('678', 'Supardi', 'guru', 'asdsa', 'asdas', '2 tahun', '2024-01-05 01:41:45', '2024-01-05 02:12:50', '64cb3885289a63813bfa02449aa4a6d5');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nomor_induk_siswa` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nomor_induk_siswa`, `nama`, `alamat`, `tahun_masuk`, `asal_sekolah`, `created_date`, `updated_date`, `password`) VALUES
(111, '111', '111', '111', '111', '2024-01-05 17:06:03', NULL, '111'),
(123, 'testa', 'test', '2020', 'sana sini', '2024-01-04 11:16:22', '2024-01-05 16:54:19', '098f6bcd4621d373cade4e832627b4f6'),
(222, 'asdas', 'asdas', '221', 'sana sini', '2024-01-05 00:51:59', NULL, '47bce5c74f589f4867dbd57e9ca9f808'),
(456, 'nama', 'asdjas', '20211', 'jsadja', '2024-01-05 01:17:15', NULL, '1a1dc91c907325c69271ddf0c944bc72'),
(777, '777', '777', '777', '777', '2024-01-05 16:55:11', NULL, 'f1c1592588411002af340cbaedd6fc33'),
(2222, 'abcdef', 'asd', '22222', 'sada', '2024-01-05 01:13:24', '2024-01-05 01:16:39', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_kesan`
--

CREATE TABLE `pesan_kesan` (
  `id_pesan_kesan` int(10) NOT NULL,
  `nomor_induk` varchar(255) DEFAULT NULL,
  `is_siswa` smallint(6) DEFAULT NULL,
  `pesan_kesan` varchar(500) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan_kesan`
--

INSERT INTO `pesan_kesan` (`id_pesan_kesan`, `nomor_induk`, `is_siswa`, `pesan_kesan`, `created_date`, `updated_date`) VALUES
(7, '123', 1, 'Pesan aku sih pesanan', '2024-01-04 11:18:08', NULL),
(8, '123', 1, 'test123', '2024-01-05 10:44:31', NULL),
(9, '123', 1, '123', '2024-01-05 10:44:47', NULL),
(10, '111', 1, 'ngetes aja', '2024-01-05 17:10:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nomor_induk_pegawai`) USING BTREE;

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nomor_induk_siswa`) USING BTREE;

--
-- Indexes for table `pesan_kesan`
--
ALTER TABLE `pesan_kesan`
  ADD PRIMARY KEY (`id_pesan_kesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan_kesan`
--
ALTER TABLE `pesan_kesan`
  MODIFY `id_pesan_kesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
