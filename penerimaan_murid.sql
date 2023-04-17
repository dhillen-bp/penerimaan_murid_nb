-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2022 at 04:23 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penerimaan_murid`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `no` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nilai_un` enum('Sangat Baik','Baik','Kurang','Sedang','Cukup') NOT NULL,
  `tes_awal` enum('Sangat Baik','Baik','Sedang','Cukup','Kurang') NOT NULL,
  `tes_akhir` enum('Sangat Baik','Baik','Sedang','Cukup','Kurang') NOT NULL,
  `keterangan` enum('Diterima','Tidak Diterima') NOT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_testing`
--

INSERT INTO `data_testing` (`no`, `nama`, `nilai_un`, `tes_awal`, `tes_akhir`, `keterangan`, `persentase`) VALUES
(6, 'Cyber', 'Sangat Baik', 'Sedang', 'Baik', 'Diterima', 82.14);

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `no` int(11) NOT NULL,
  `nilai_un` enum('Sangat Baik','Baik','Kurang','Sedang','Cukup') NOT NULL,
  `tes_awal` enum('Sangat Baik','Baik','Sedang','Cukup','Kurang') NOT NULL,
  `tes_akhir` enum('Sangat Baik','Baik','Sedang','Cukup','Kurang') NOT NULL,
  `keterangan` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`no`, `nilai_un`, `tes_awal`, `tes_akhir`, `keterangan`) VALUES
(1, 'Sangat Baik', 'Baik', 'Sedang', '1'),
(2, 'Sangat Baik', 'Sedang', 'Kurang', '0'),
(3, 'Sangat Baik', 'Cukup', 'Baik', '1'),
(4, 'Sangat Baik', 'Kurang', 'Sangat Baik', '0'),
(5, 'Sangat Baik', 'Cukup', 'Sangat Baik', '1'),
(6, 'Baik', 'Cukup', 'Sedang', '1'),
(7, 'Baik', 'Sangat Baik', 'Kurang', '0'),
(8, 'Baik', 'Cukup', 'Cukup', '1'),
(9, 'Baik', 'Sangat Baik', 'Cukup', '1'),
(10, 'Baik', 'Baik', 'Baik', '1'),
(11, 'Baik', 'Sangat Baik', 'Baik', '1'),
(12, 'Baik', 'Kurang', 'Baik', '1'),
(13, 'Cukup', 'Baik', 'Cukup', '1'),
(14, 'Cukup', 'Kurang', 'Cukup', '0'),
(15, 'Cukup', 'Sedang', 'Sangat Baik', '1'),
(16, 'Cukup', 'Sedang', 'Kurang', '0'),
(17, 'Cukup', 'Cukup', 'Kurang', '0'),
(18, 'Sedang', 'Kurang', 'Cukup', '0'),
(19, 'Sedang', 'Baik', 'Cukup', '1'),
(20, 'Sedang', 'Sedang', 'Baik', '1'),
(21, 'Kurang', 'Sedang', 'Sangat Baik', '1'),
(22, 'Kurang', 'Kurang', 'Kurang', '0'),
(23, 'Kurang', 'Sedang', 'Sedang', '0'),
(24, 'Kurang', 'Baik', 'Sedang', '0'),
(25, 'Kurang', 'Cukup', 'Baik', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
