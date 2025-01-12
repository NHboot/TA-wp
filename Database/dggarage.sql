-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 07:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dggarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_alternatif`
--

CREATE TABLE `wp_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_alternatif`
--

INSERT INTO `wp_alternatif` (`id_alternatif`, `nama_alternatif`, `vektor_s`, `vektor_v`) VALUES
(1, 'Oli Fuchs 15W-40 Titan Truck Plus', 0.913526177912, 0.20941864390928),
(2, 'Oli Castrol Magnetec 10W-30', 0.93509293655988, 0.21436265258551),
(3, 'Oli Total Quartz 9000 5W-40', 0.86982444024969, 0.19940036653639),
(4, 'Oli Top 1 HP SPORT SAE 15W-40', 0.75612882153601, 0.17333654607329),
(5, 'Oli Shell Helix HX7 10W-40', 0.88762843289159, 0.20348179089553);

-- --------------------------------------------------------

--
-- Table structure for table `wp_bobot`
--

CREATE TABLE `wp_bobot` (
  `id_kriteria` int(11) NOT NULL,
  `nilai_bobot` double NOT NULL,
  `hasil_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_bobot`
--

INSERT INTO `wp_bobot` (`id_kriteria`, `nilai_bobot`, `hasil_bobot`) VALUES
(1, 15, 0.15),
(2, 20, 0.2),
(3, 30, 0.3),
(4, 20, 0.2),
(5, 15, 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `wp_kriteria`
--

CREATE TABLE `wp_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_kriteria`
--

INSERT INTO `wp_kriteria` (`id_kriteria`, `nama_kriteria`, `tipe_kriteria`) VALUES
(1, 'Harga', 'cost'),
(2, 'Brand', 'benefit'),
(3, 'Kualitas Barang', 'benefit'),
(4, 'Life Time', 'benefit'),
(5, 'Tipe', 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `wp_nilai`
--

CREATE TABLE `wp_nilai` (
  `id_nilai` int(6) NOT NULL,
  `ket_nilai` varchar(45) NOT NULL,
  `jum_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_nilai`
--

INSERT INTO `wp_nilai` (`id_nilai`, `ket_nilai`, `jum_nilai`) VALUES
(1, 'Sangat Baik', 5),
(2, 'Baik', 4),
(3, 'Cukup', 3),
(4, 'Buruk', 2),
(5, 'Sangat Buruk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_pengguna`
--

CREATE TABLE `wp_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_pengguna`
--

INSERT INTO `wp_pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Nurul', 'Nurul', 'c99b5720821a2dccf5ffeb97d903e082');

-- --------------------------------------------------------

--
-- Table structure for table `wp_rangking`
--

CREATE TABLE `wp_rangking` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `nilai_normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wp_rangking`
--

INSERT INTO `wp_rangking` (`id_alternatif`, `id_kriteria`, `nilai_rangking`, `nilai_normalisasi`) VALUES
(1, 1, 0.5, 1.1095694720678),
(1, 2, 0.4, 0.83255320740187),
(1, 3, 1, 1),
(1, 4, 0.8, 0.95635249979004),
(1, 5, 0.8, 1.0340380070342),
(2, 1, 0.7, 1.0549583015933),
(2, 2, 0.7, 0.93114991509484),
(2, 3, 0.6, 0.85791720044409),
(2, 4, 1, 1),
(2, 5, 0.5, 1.1095694720678),
(3, 1, 0.4, 1.147337005563),
(3, 2, 0.5, 0.87055056329612),
(3, 3, 0.8, 0.93524844782262),
(3, 4, 0.7, 0.93114991509484),
(3, 5, 1, 1),
(4, 1, 0.8, 1.0340380070342),
(4, 2, 0.8, 0.95635249979004),
(4, 3, 1, 1),
(4, 4, 0.2, 0.7247796636777),
(4, 5, 0.7, 1.0549583015933),
(5, 1, 0.7, 1.0549583015933),
(5, 2, 0.8, 0.95635249979004),
(5, 3, 0.7, 0.89852344179064),
(5, 4, 0.9, 0.97914836236098),
(5, 5, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_alternatif`
--
ALTER TABLE `wp_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `wp_bobot`
--
ALTER TABLE `wp_bobot`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `wp_kriteria`
--
ALTER TABLE `wp_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `wp_nilai`
--
ALTER TABLE `wp_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `wp_pengguna`
--
ALTER TABLE `wp_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `wp_rangking`
--
ALTER TABLE `wp_rangking`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_alternatif`
--
ALTER TABLE `wp_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wp_kriteria`
--
ALTER TABLE `wp_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wp_nilai`
--
ALTER TABLE `wp_nilai`
  MODIFY `id_nilai` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wp_pengguna`
--
ALTER TABLE `wp_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wp_bobot`
--
ALTER TABLE `wp_bobot`
  ADD CONSTRAINT `wp_bobot_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `wp_kriteria` (`id_kriteria`);

--
-- Constraints for table `wp_rangking`
--
ALTER TABLE `wp_rangking`
  ADD CONSTRAINT `rangking_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `wp_alternatif` (`id_alternatif`),
  ADD CONSTRAINT `rangking_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `wp_kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
