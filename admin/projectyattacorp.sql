-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 07:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectyattacorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(15) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `pass_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `pass_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `kd_bank` int(11) NOT NULL,
  `nm_bank` varchar(255) NOT NULL,
  `no_rek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kode_pos` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_customer_pelayanan`
--

CREATE TABLE `detil_customer_pelayanan` (
  `cust_id` int(11) NOT NULL,
  `no_pemesanan` int(11) NOT NULL,
  `kd_pelayanan` int(11) NOT NULL,
  `detil_pelayanan` varchar(255) NOT NULL,
  `tgl_pelayanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_produk_jenis`
--

CREATE TABLE `detil_produk_jenis` (
  `kd_jenis` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `stok_jenis` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_produk_pemesanan`
--

CREATE TABLE `detil_produk_pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_pemesanan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_produk_spesifikasi`
--

CREATE TABLE `detil_produk_spesifikasi` (
  `id_produk` int(11) NOT NULL,
  `kd_spesifikasi` int(11) NOT NULL,
  `qty` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_produk_warna`
--

CREATE TABLE `detil_produk_warna` (
  `id_produk` int(11) NOT NULL,
  `kd_warna` int(11) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `kd_jenis` int(15) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `kd_kurir` int(11) NOT NULL,
  `nm_kurir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `kd_mtd_bayar` int(11) NOT NULL,
  `jns_mtd_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `kd_pelayanan` int(11) NOT NULL,
  `jenis_pelayanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `kd_kurir` int(11) NOT NULL,
  `kd_bank` int(11) NOT NULL,
  `kd_mtd_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nm_produk` varchar(255) NOT NULL,
  `kd_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi`
--

CREATE TABLE `spesifikasi` (
  `kd_spesifikasi` int(11) NOT NULL,
  `jns_spesifikasi` varchar(255) NOT NULL,
  `tinggi` int(50) NOT NULL,
  `lebar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `kd_warna` int(11) NOT NULL,
  `nm_warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `detil_customer_pelayanan`
--
ALTER TABLE `detil_customer_pelayanan`
  ADD PRIMARY KEY (`cust_id`,`no_pemesanan`,`kd_pelayanan`),
  ADD UNIQUE KEY `cust_id` (`cust_id`),
  ADD UNIQUE KEY `no_pemesanan` (`no_pemesanan`),
  ADD UNIQUE KEY `kd_pelayanan` (`kd_pelayanan`);

--
-- Indexes for table `detil_produk_jenis`
--
ALTER TABLE `detil_produk_jenis`
  ADD PRIMARY KEY (`kd_jenis`,`id_produk`),
  ADD UNIQUE KEY `kd_jenis` (`kd_jenis`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detil_produk_pemesanan`
--
ALTER TABLE `detil_produk_pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`,`id_produk`),
  ADD UNIQUE KEY `no_pemesanan` (`no_pemesanan`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detil_produk_spesifikasi`
--
ALTER TABLE `detil_produk_spesifikasi`
  ADD PRIMARY KEY (`id_produk`,`kd_spesifikasi`),
  ADD UNIQUE KEY `id_produk` (`id_produk`),
  ADD UNIQUE KEY `kd_spesifikasi` (`kd_spesifikasi`);

--
-- Indexes for table `detil_produk_warna`
--
ALTER TABLE `detil_produk_warna`
  ADD PRIMARY KEY (`id_produk`,`kd_warna`),
  ADD UNIQUE KEY `id_produk` (`id_produk`),
  ADD UNIQUE KEY `kd_warna` (`kd_warna`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kd_kurir`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`kd_mtd_bayar`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`kd_pelayanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`),
  ADD UNIQUE KEY `kd_kurir` (`kd_kurir`),
  ADD UNIQUE KEY `kd_bank` (`kd_bank`),
  ADD UNIQUE KEY `kd_mtd_bayar` (`kd_mtd_bayar`) USING BTREE;

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  ADD PRIMARY KEY (`kd_spesifikasi`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`kd_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `kd_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `kd_jenis` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kd_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kd_kurir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `kd_mtd_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `kd_pelayanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  MODIFY `kd_spesifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `kd_warna` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_customer_pelayanan`
--
ALTER TABLE `detil_customer_pelayanan`
  ADD CONSTRAINT `detil_customer_pelayanan_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detil_customer_pelayanan_ibfk_2` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detil_customer_pelayanan_ibfk_3` FOREIGN KEY (`kd_pelayanan`) REFERENCES `pelayanan` (`kd_pelayanan`) ON DELETE CASCADE;

--
-- Constraints for table `detil_produk_jenis`
--
ALTER TABLE `detil_produk_jenis`
  ADD CONSTRAINT `detil_produk_jenis_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `detil_produk_jenis_ibfk_2` FOREIGN KEY (`kd_jenis`) REFERENCES `jenis` (`kd_jenis`) ON DELETE CASCADE;

--
-- Constraints for table `detil_produk_pemesanan`
--
ALTER TABLE `detil_produk_pemesanan`
  ADD CONSTRAINT `detil_produk_pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `detil_produk_pemesanan_ibfk_2` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE;

--
-- Constraints for table `detil_produk_spesifikasi`
--
ALTER TABLE `detil_produk_spesifikasi`
  ADD CONSTRAINT `detil_produk_spesifikasi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `detil_produk_spesifikasi_ibfk_2` FOREIGN KEY (`kd_spesifikasi`) REFERENCES `spesifikasi` (`kd_spesifikasi`) ON DELETE CASCADE;

--
-- Constraints for table `detil_produk_warna`
--
ALTER TABLE `detil_produk_warna`
  ADD CONSTRAINT `detil_produk_warna_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `detil_produk_warna_ibfk_2` FOREIGN KEY (`kd_warna`) REFERENCES `warna` (`kd_warna`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`kd_kurir`) REFERENCES `kurir` (`kd_kurir`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`kd_bank`) REFERENCES `bank` (`kd_bank`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`kd_mtd_bayar`) REFERENCES `metode_bayar` (`kd_mtd_bayar`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
