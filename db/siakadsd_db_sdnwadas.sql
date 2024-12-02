-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 06:45 AM
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
-- Database: `latci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` int(14) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama_guru`, `kontak`, `alamat`, `tanggal_dibuat`, `tanggal_diubah`, `status`) VALUES
(9, 8890, 'ajis', '081283408851', 'bekasip\r\n', '2024-11-12 20:59:23', '2024-11-30 05:41:08', NULL),
(10, 2147483647, 'ajatqq', '975', 'edco\r\n', '2024-11-12 21:01:07', '2024-11-16 10:53:09', NULL),
(87274831, 2147483647, 'ajatqq', '0867635342500', 'kkh', '2024-11-16 04:03:05', '2024-11-16 11:03:05', NULL),
(87274832, 2147483647, 'aa', '0867635342500', '\'LL\r\n\r\n', '2024-11-16 04:10:39', '2024-11-16 11:10:39', ''),
(87274833, 4736434, 'aa', '8373', 'jf', '2024-11-16 04:15:52', '2024-11-16 11:15:52', 'Aktif'),
(87274835, 42323232, 'ahya', '086763534', 'bekasip', '2024-11-16 07:09:49', '2024-11-20 14:59:01', NULL),
(87274838, 2147483647, 'ajatqq', 'hghdhqwg', 'gdsg', '2024-11-29 20:46:22', '2024-11-30 03:46:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_mapel`, `hari`, `jam_masuk`, `jam_selesai`, `guru_id`) VALUES
(1, '2hewjdwbd', 'selasa', '08:59:59', '11:00:00', 9),
(14, 'hdwq', 'senin', '08:59:59', '10:26:01', 9);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Selesai','Terjadwal','Ditunda') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `deskripsi`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Rajaban', 'ds', '2024-11-28', 'Terjadwal', '2024-11-12 19:41:45', '2024-11-12 21:31:50'),
(21, 'ff', 'ew', '2024-11-29', 'Terjadwal', '2024-11-12 19:45:05', '2024-11-12 21:31:56'),
(22, 'pembagian raport', 'harus di wakili!!', '2024-11-30', 'Terjadwal', '2024-11-12 21:24:40', '2024-11-13 19:26:21'),
(23, 'ohqwhd', 'wqd', '2024-11-21', 'Selesai', '2024-11-12 21:30:13', '2024-11-12 21:30:13'),
(24, 'ohqwhd', 'wqd', '2024-11-21', 'Selesai', '2024-11-12 21:30:14', '2024-11-12 21:30:14'),
(25, 'makan', 'nfkfn', '2024-11-14', 'Ditunda', '2024-11-12 21:31:33', '2024-11-12 21:31:33'),
(26, 'makannn', 'sda', '2024-11-14', 'Selesai', '2024-11-12 21:34:12', '2024-11-12 21:34:12'),
(27, 'ngaji bersama', 'gdf', '2024-12-06', 'Ditunda', '2024-11-13 19:49:21', '2024-11-13 19:49:21'),
(28, 'pramuka', 'apa aja', '2024-11-16', 'Terjadwal', '2024-11-14 00:00:29', '2024-11-14 00:00:50'),
(30, 'a', 'a', '2024-11-22', 'Ditunda', '2024-11-16 00:25:16', '2024-11-16 00:25:16'),
(31, 'b', 'a', '2024-11-29', 'Terjadwal', '2024-11-16 00:26:13', '2024-11-16 00:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Izin','Sakit','Alpa') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `siswa_id`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-11-14', 'Hadir', '2024-11-13 03:11:11', '2024-11-21 03:11:11'),
(2, 2, '2024-11-21', 'Izin', '2024-11-13 03:12:13', '2024-11-13 03:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `tingkat` enum('1','2','3','4','5','6') NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `id_wali_kelas` int(11) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `tingkat`, `tahun_ajaran`, `id_wali_kelas`, `tanggal_dibuat`, `tanggal_diubah`) VALUES
(1, 'kelas1', '1', '2024', 1, '2024-11-13 04:14:22', '2024-11-13 04:14:22'),
(2, 'kelas2', '2', '2024', 2, '2024-11-14 01:20:45', '2024-11-14 01:20:45'),
(3, 'kelas 3', '3', '2024', 2, '2024-11-14 01:37:39', '2024-11-14 01:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `nip` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`nip`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-11-06-123410', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1730896841, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama_prestasi` varchar(255) NOT NULL,
  `kategori` enum('Akademik','Non-akademik','Olahraga','Seni') NOT NULL,
  `tanggal` date NOT NULL,
  `penghargaan` varchar(255) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama_prestasi`, `kategori`, `tanggal`, `penghargaan`, `dokumentasi`, `created_at`, `updated_at`) VALUES
(1, 'Juara 1 Olimpiade Matematika', 'Akademik', '2023-11-15', 'Medali Emas', 'uploads/prestasi/medali_emas.jpg', '2024-11-20 16:34:15', '2024-11-20 16:34:15'),
(2, 'Juara Umum Lomba Catur', 'Non-akademik', '2023-10-20', 'Piala Bergilirl', 'uploads/prestasi/piala_catur.jpg', '2024-11-20 16:34:15', '2024-11-20 16:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `jabatan`, `kontak`, `email`, `alamat`, `tanggal_dibuat`, `tanggal_diubah`) VALUES
(1, 'ajis', 'kepala sekilah', '0856789452413', 'hahs@mail.co', 'bekasi', '2024-11-18 03:37:49', '2024-11-18 03:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nis`, `alamat`, `tanggal_lahir`, `kelas_id`) VALUES
(1, 'jaja', '121313133', 'bekasi', '2024-11-13', 1),
(2, 'rendi', '76354562262', 'pebayuran', '2018-11-15', 2),
(3, 'danih', '763545622629', 'pebayuran', '2024-11-13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswaa`
--

CREATE TABLE `siswaa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `struktur_sekolah`
--

CREATE TABLE `struktur_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_sekolah`
--

INSERT INTO `struktur_sekolah` (`id`, `nama`, `jabatan`, `kontak`, `email`, `alamat`, `parent_id`) VALUES
(1, 'ajis', 'kepala sekolah', '086763534252', 'ajis@mail.com', 'bekasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role` enum('siswa','guru','admin') DEFAULT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`, `role`, `reset_token`, `reset_expires`) VALUES
(27, 'Haris Febriyan', 'admin@gmail.com', '$2y$10$t2D.cX/MvfYydWLAnc2w3.9vGQgKIzeoqAY2bTy4.9lG.9ZJspPCm', '2024-11-12 16:31:26', '2024-11-12 17:24:50', 'admin', '837e413b146256ad7d83f30b425d8130', '2024-11-12 18:24:50'),
(28, 'SUDRAJAT', 'ajat@gmail.com', '$2y$10$JPLie.ZIMCdbTxp.ACxbX.l/sy23w9R3mO38iUWIOsIf9JqzA/eJe', '2024-11-12 16:39:30', '2024-11-12 16:39:30', 'guru', NULL, NULL),
(29, 'ahya', 'ahya12@gmail.com', '$2y$10$vnmPgG.kcv9ef2N8fcEJAOIWFxASinRWOMqBXO3m4fxkx8RD1ygE2', '2024-11-12 17:23:37', '2024-11-12 17:23:37', 'siswa', NULL, NULL),
(30, 'Haris Febriyan', 'admin2@gmail.com', '$2y$10$Ge2cRvKkfNDIdOwhkSS1BuQ.pO6D/ydDUSArqpCIH8V/kkONcXf0e', '2024-11-12 17:46:01', '2024-11-12 17:46:01', 'admin', NULL, NULL),
(31, 'haris', 'haris@gmail.com', '$2y$10$PQCnfFkzvy6rrg2Aqqxic.0DEoxE9rFWr8bNGdwStWMdf9MSai6cS', '2024-11-12 18:35:22', '2024-11-12 18:35:22', 'guru', NULL, NULL),
(32, 'Haris.gel', 'harisg@gmail.com', '$2y$10$xAP8WJdbWFOJYk0tIMnO3OPdw7I/bFRf0cyLeASRJinIyPnADctMS', '2024-11-12 18:40:43', '2024-11-12 18:40:43', 'guru', NULL, NULL),
(33, 'Saya', 'user1@gmail.com', '$2y$10$y.ptSz7ieno2mmyGYXcd1O9ClwUQ65S/094R0PUPVU62TWV6qIvsi', '2024-11-13 04:37:00', '2024-11-13 04:37:00', 'siswa', NULL, NULL),
(34, 'KAMU', 'user@gmail.com', '$2y$10$k7UoBLsvMHBGuLHLMSt16e4Mt/Y7OxmkIwQ7RSqZ4Fy3N640Xze1O', '2024-11-13 04:40:28', '2024-11-13 04:40:28', 'siswa', NULL, NULL),
(35, 'Rendi', 'rendi@gmail.com', '$2y$10$8qCy7Z3MD0Y0HzciZrBbxePt0bjNWED0gKVlKosw/GsR2hzcqY0qu', '2024-11-13 04:42:53', '2024-11-13 04:42:53', 'siswa', NULL, NULL),
(36, 'sakum', 'skm@gmail.com', '$2y$10$lHmm4AvWptn0fA.WmjRZwejsaL8Yjq94lapff3RVleewyvO.hxNEO', '2024-11-13 04:44:36', '2024-11-13 04:44:36', 'siswa', NULL, NULL),
(37, 'anih', 'anih@gmail.com', '$2y$10$85M7ZQPvkXkH1HNSz1dbhOUX2L/IkWT9..EN.jvu/e0VdrbiuOEnW', '2024-11-13 04:46:48', '2024-11-13 04:46:48', 'siswa', NULL, NULL),
(38, 'Haris Febriyan', 'jaja2@gmail.com', '$2y$10$gUoFKClvrQ.zsNn9Zm66a.320JDl90Yx10bpv2X80NVkFUppq7VL2', '2024-11-14 06:53:07', '2024-11-14 06:53:07', 'siswa', NULL, NULL),
(39, 'saman', 'saman1@gmail.com', '$2y$10$y0.H39kN6.d3yeGiw/0EAOYnQzS1d5sidJGAJ8fyL5X1Kk/UAQSqC', '2024-11-14 06:56:06', '2024-11-14 06:56:06', 'siswa', NULL, NULL),
(40, 'ani', 'ani1@gmail.com', '$2y$10$iiaMQv20MMlxiyd57u8Q4.5vUX4y32GsRfgreUyWmazXGYe43kz1y', '2024-11-14 06:57:09', '2024-11-14 06:57:09', 'guru', NULL, NULL),
(41, 'Haris', 'admin23@gmail.com', '$2y$10$a0yM1BP.PrLDJERng8xbg.l0FEJNzHf2fLkb2zzTNsvMoTL.7eqIi', '2024-11-14 06:58:37', '2024-11-14 06:58:37', 'admin', NULL, NULL),
(42, 'ganih', 'user11@gmail.com', '$2y$10$8uVtKOjNhzJS9QwPlUG7ju8eqPQD987Rl4p1SgdFnqmq0NyltC0ua', '2024-11-14 15:32:37', '2024-11-14 15:32:37', 'siswa', NULL, NULL),
(43, 'sahwa', 'guru1@gmail.com', '$2y$10$A3wlDDpHA/lbWC5927nf.OPk3qehTAC5kXtLcl9lJd7cI8rMjWrne', '2024-11-14 15:33:51', '2024-11-14 15:33:51', 'guru', NULL, NULL),
(44, 'saih', 'admin01@gmail.com', '$2y$10$LdKSZsuIW1qTJtz2fX5Ic.vQIQLJZL/kUUaLf16FAQ0RN3x5v3/Fe', '2024-11-14 15:35:22', '2024-11-14 15:35:22', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_wali_kelas` varchar(100) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `id_guru`, `nama_wali_kelas`, `kontak`, `tanggal_dibuat`, `tanggal_diubah`) VALUES
(1, 9, 'ajis', '0856789452413', '2024-11-13 04:13:48', '2024-11-13 04:13:48'),
(2, 10, 'sudrajat', '0856789452413', '2024-11-14 01:19:57', '2024-11-14 01:19:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `id_wali_kelas` (`id_wali_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `siswaa`
--
ALTER TABLE `siswaa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_sekolah`
--
ALTER TABLE `struktur_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87274840;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `nip` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswaa`
--
ALTER TABLE `siswaa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur_sekolah`
--
ALTER TABLE `struktur_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_wali_kelas`) REFERENCES `wali_kelas` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `struktur_sekolah`
--
ALTER TABLE `struktur_sekolah`
  ADD CONSTRAINT `struktur_sekolah_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `struktur_sekolah` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
