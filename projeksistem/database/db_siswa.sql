-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 05:52 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `hasil` varchar(20) NOT NULL,
  `keputusan` varchar(20) NOT NULL,
  `alasan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_login`, `hasil`, `keputusan`, `alasan`) VALUES
(25, 8, '5', 'Di Tolak', 'Kriteria anda kurang'),
(26, 6, '2.7692307692308', 'Di Tolak', 'karna anda gila');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `nama`, `username`, `password`, `level`) VALUES
(2, 'admin', 'admin', 'admin', 'admin'),
(6, 'rozaq', 'abdul', 'rozaq', 'user'),
(7, 'Abdul Rozaq', 'abdulrozaq', 'akbar', 'user'),
(8, 'Danbo', 'danbo', 'danbo', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `soal` longtext NOT NULL,
  `kategori_soal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `soal`, `kategori_soal`) VALUES
(6, 'Apakah Anda Suka Minum ? ', 'pengetahuan '),
(7, 'APakah albert einstein ada kekasih ? ', 'Pengetuahuan'),
(8, 'Apakah Gorengan Bisa Bikin Gendut? ', 'Pengetahuan'),
(9, 'apakah anda gila ? ', 'Pengalaman'),
(10, 'Apakah Mejaneh ?', 'Ilmu Komputer'),
(11, 'Apakah Gorengan Bisa Bikin Gendut? ', 'Pengetahuan'),
(12, 'apakah anda gila ? ', 'Pengalaman'),
(13, 'Apakah Mejaneh ?', 'Ilmu Komputer'),
(14, 'Terangkan Tentang Cinta Dan Alam										  ', 'Pengetuahuan'),
(15, 'aksd										  ', 'Ilmu '),
(16, 'Kapan Pertamakali komputer ada ?										  ', 'Komputer'),
(17, 'kapan komputrr ada					  ', 'pengetahuan'),
(18, 'jhgjgjhghjg										  ', 'Ilmu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `FK_tb_hasil` (`id_login`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD CONSTRAINT `FK_tb_hasil` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
