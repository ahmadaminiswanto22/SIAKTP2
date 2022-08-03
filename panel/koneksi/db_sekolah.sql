-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 03:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` varchar(5) NOT NULL,
  `nama_agama` varchar(15) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(5) NOT NULL,
  `nama_jenjang` varchar(5) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(15) DEFAULT NULL,
  `id_jenjang` varchar(5) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kewarganegaraan`
--

CREATE TABLE `kewarganegaraan` (
  `id_negara` varchar(5) NOT NULL,
  `nama_negara` varchar(15) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `NIS` varchar(15) NOT NULL,
  `nama_siswa` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_negara` varchar(5) DEFAULT NULL,
  `id_agama` varchar(5) DEFAULT NULL,
  `id_jurusan` varchar(5) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `hak_akses`) VALUES
(4, 'admin', '$2y$10$Tw4No89n0AzXvdhg0.KktuKWH.UjDIKG5KzAsm5F1fzz1HqXTMvYC', 'admin', 'admin@gmail.com', 'admin'),
(6, 'user', '$2y$10$FVHUxCgveQej5bx4vbbSF.TgMq76qS5xCOLyqcuKPuzSaonVYqHA.', 'Amin', 'amin@gmail.com', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kewarganegaraan`
--
ALTER TABLE `kewarganegaraan`
  ADD PRIMARY KEY (`id_negara`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_negara` (`id_negara`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agama`
--
ALTER TABLE `agama`
  ADD CONSTRAINT `agama_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`),
  ADD CONSTRAINT `jurusan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kewarganegaraan`
--
ALTER TABLE `kewarganegaraan`
  ADD CONSTRAINT `kewarganegaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_negara`) REFERENCES `kewarganegaraan` (`id_negara`),
  ADD CONSTRAINT `pendaftaran_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
