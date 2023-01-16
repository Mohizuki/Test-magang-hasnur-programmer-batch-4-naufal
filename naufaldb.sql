-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 03:32 AM
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
-- Database: `setyongr`
--

-- --------------------------------------------------------

--
-- Table structure for table `datadetail`
--

CREATE TABLE `datadetail` (
  `nim` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datadetail`
--

INSERT INTO `datadetail` (`nim`, `alamat`) VALUES
('2010817210011', 'Jl. Pancasila, Pantai Hambawang Barat, RT 10 RW 01'),
('2010817210211', 'Sungai lulut, Apotek Sopia.');

-- --------------------------------------------------------

--
-- Table structure for table `datamaha`
--

CREATE TABLE `datamaha` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prodi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` varchar(11) CHARACTER SET utf8 NOT NULL,
  `tahun_angkatan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datamaha`
--

INSERT INTO `datamaha` (`id`, `nim`, `nama`, `prodi`, `semester`, `kelas`, `tahun_angkatan`) VALUES
(1, '2010817210011', 'Muhammad Naufal Furqan', 'Teknologi Informasi', 6, 'A', 2020),
(2, '2010817210211', 'Muhammad Fadillah Hasan', 'Teknologi Informasi', 6, 'B', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`id`, `nama`, `username`, `password`) VALUES
(7, 'Naufal', 'crunchii', '$2y$10$5dH4fvDP78eqpGI/d1Tvsem9RBXbCGSuscsez7qhGkSCb.HBdvk5u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datadetail`
--
ALTER TABLE `datadetail`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `datamaha`
--
ALTER TABLE `datamaha`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datamaha`
--
ALTER TABLE `datamaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datamaha`
--
ALTER TABLE `datamaha`
  ADD CONSTRAINT `datamaha_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `datadetail` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
