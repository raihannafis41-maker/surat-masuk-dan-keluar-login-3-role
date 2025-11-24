-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2025 at 11:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_masuk_dan_keluar_punya_raihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_pegawai` int DEFAULT NULL,
  `id_surat_masuk` int DEFAULT NULL,
  `id_surat_keluar` int DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `isi_komentar` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_disposisi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `golongan` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int NOT NULL,
  `id_kategori` int DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `tujuan` varchar(150) DEFAULT NULL,
  `perihal` varchar(200) DEFAULT NULL,
  `isi_surat` text,
  `file_surat` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int NOT NULL,
  `id_kategori` int DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `pengirim` varchar(150) DEFAULT NULL,
  `perihal` varchar(200) DEFAULT NULL,
  `isi` text,
  `file_surat` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` enum('admin','pegawai') NOT NULL DEFAULT 'pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `no_hp`, `email`, `foto_user`, `role`) VALUES
(1, 'raihann', '4321', 'muhammad raihan nafis', '083878969362', 'handikz@gmail.com', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_suratmasuk` (`id_surat_masuk`),
  ADD KEY `id_suratkeluar` (`id_surat_keluar`),
  ADD KEY `fk_disposisi_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_disposisi` (`id_disposisi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`),
  ADD CONSTRAINT `disposisi_ibfk_4` FOREIGN KEY (`id_surat_keluar`) REFERENCES `surat_keluar` (`id_surat_keluar`),
  ADD CONSTRAINT `fk_disposisi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_disposisi`) REFERENCES `disposisi` (`id_disposisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
