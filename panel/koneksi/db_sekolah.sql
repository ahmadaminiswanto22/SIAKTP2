-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 07:13 AM
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
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('A07', 'Protestan', '2023-08-07', 'Wawan', '0000-00-00', '', 2),
('A1', 'Islam', '2022-12-12', 'Ahmad', NULL, NULL, 1),
('A2', 'Katholik', '2022-12-12', 'Ahmad', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(5) NOT NULL,
  `nama_jenjang` varchar(5) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `tgl_input`, `user_input`, `tgl_update`, `user_update`) VALUES
('JN01', 'X', '2022-12-12', 'Ahmad', NULL, NULL),
('JN02', 'XI', '2022-12-12', 'Ahmad', NULL, NULL),
('JN03', 'XII', '2022-12-12', 'Ahmad', NULL, NULL);

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
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_jenjang`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('JU01', 'RPL', 'JN01', '2022-12-12', 'Ahmad', NULL, NULL, 1),
('JU02', 'MM', 'JN01', '2022-12-12', 'Ahmad', NULL, NULL, 1),
('JU03', 'AKL', 'JN01', '2022-12-12', 'Ahmad', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kewarganegaraan`
--

CREATE TABLE `kewarganegaraan` (
  `id_negara` varchar(5) NOT NULL,
  `nama_negara` varchar(15) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kewarganegaraan`
--

INSERT INTO `kewarganegaraan` (`id_negara`, `nama_negara`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('N1', 'Indonesia', '2022-12-12', 'Ahmad', NULL, NULL, 1),
('N2', 'Malysia', '2022-12-12', 'Ahmad', NULL, NULL, 1);

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
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`NIS`, `nama_siswa`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `status`, `id_negara`, `id_agama`, `id_jurusan`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('1231313', 'Maruf', 'afaf', 'Laki-laki', 'afaf', '2023-02-17', 'Baru', 'N1', 'A1', 'JU01', '2023-02-17', 'afaf', '0000-00-00', '', 2),
('3232', 'Delina', 'afaf', 'Perempuan', 'Cilacap', '2023-02-17', 'Baru', 'N1', 'A2', 'JU02', '2023-02-17', 'Jeki', '0000-00-00', '', 3);

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
(1, 'ahmad', '$2y$10$CeE9uQkA3fzTnFaDOvVAP.qBKNLZ9XO8aXG..FrAb0UfDb67RF0y6', 'Ahmad Amin', 'ahmadamin@gmail.com', 'admin'),
(2, 'admin', '$2y$10$Mhcm0Q0f0fguNLY8DtS0z.5nqy0XgKcLGM8CQ.gnimn6FD8L5DEaa', 'admin', 'admin@gmail.com', 'admin'),
(3, 'gois', '$2y$10$SqWff9rZOc7GfJVLx1WFGOvJOEm8luccu1j4QjfUQKYV.es1u9cf.', 'Gois', 'gois@gmail.com', 'operator'),
(4, 'goisop', '$2y$10$qhJi53xaEGuBIBCQtVnt..JRGmCN/7zX7McdYRng/y6t86.93oCz.', 'Gois Operator', 'gois@gmail.com', 'operator');

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_negara`) REFERENCES `kewarganegaraan` (`id_negara`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
