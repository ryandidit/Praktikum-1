-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 06:23 AM
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
-- Database: `toko_kamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'dit', '$2y$10$PCoyvEiElfwFGsvB2RbG.e2CQCve4ELvZpoFLmX4aU9ooyFMTWnOe'),
(2, 'adm', '$2y$10$kv5.xSJX401gteomWC4acOw9Kti20R.75Qg514cmXxWkATuT85Mxa'),
(3, 'qwerty', '$2y$10$iGcpraj/g5DBuYQuMAJACu09PeDVcmZoGefVu7HeqnU1y6gZzLra6'),
(4, 'aaa', '$2y$10$sjB1askfBKxjRmLHUjXshOAKuMlNPuGvxyuE22BIJ9h5ZzeuGM/nK'),
(5, 'ddd', '$2y$10$mjINchEooWPjoruxSK6nJeXxdWWysbf2Wa6YUZk07hI5CiuAqrMc2');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembelian_produk`
--

CREATE TABLE `data_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pembelian_produk`
--

INSERT INTO `data_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_barang`) VALUES
(1, 2, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` char(4) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `spesifikasi` varchar(1000) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `foto_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`, `kategori`, `spesifikasi`, `harga_barang`, `foto_produk`) VALUES
(1, '104', 'Canon EOS 750D Kit', 'Camera', '12mp, 18-150mm', 6000000, '5fdb702f52d62.png'),
(2, '113', 'lensa OEM Canon Telephoto', 'Lens', '200-150mm, Canon HD Lens, Canon Mount', 1000000, 'lens100.jpg'),
(3, '101', 'Tas Kamera Compact by KEE', 'Accessories', 'slim desain and compact for daily used', 300000, 'tas100.jpg'),
(4, '121', 'Tripod 3in1 for Phone', 'Equipment', '3in1 used mode', 300000, 'tripod100.jpg'),
(11, '123', 'wqwerqwer', 'Lens', 'qwertyuio', 12345, 'lens100.jpg'),
(12, '104', 'Canon EOS 750D body', 'Camera', '12mp, 18-150mm', 5000000, 'dslr100.png'),
(16, '124', 'tripod cina', 'Equipment', 'asdfgh', 12345, '5fdb6994137f6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal`, `total_pembelian`) VALUES
(1, 2, '2020-12-18', 500000),
(3, 1, '2020-12-18', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'AlHa', '$2y$10$azmSei0G6SYPJEOHq8bq6Oitd2J7gnbpuUQ3tPltei95GfQMqjmcG', 'Habib'),
(2, 'dit', '$2y$10$vul1/xR1.73neV2ohQ7wqu3G0Iphiut8rZCpUt/PeBo/I1pIWMwV6', 'dit'),
(4, 'aaa', '$2y$10$sXdFkH0DtEYAxJme.f6Fheoc7EV4LgBWFkQx.KhoM/4GBFq.H7zEy', 'aaa'),
(5, 'asd', '$2y$10$tP5J9Xn2VehV0uRFNjnP8OlhfbomtC4Ujqp524xG916vUV9jmxvW6', 'asd'),
(7, 'adm', '$2y$10$yRIGMhjbT2q2JtlffDg3qOYxwjlTOWkW1rQOAubVrbGW51EjNbyZe', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pembelian_produk`
--
ALTER TABLE `data_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_pembelian_produk`
--
ALTER TABLE `data_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
