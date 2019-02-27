-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 08:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `noisbn` int(11) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jenis_buku` enum('Novel','Pelajaran','Komputer','') NOT NULL,
  `stok` varchar(15) NOT NULL,
  `harga_pokok` varchar(15) NOT NULL,
  `harga_jual` varchar(15) NOT NULL,
  `ppn` varchar(15) NOT NULL,
  `diskon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `jenis_buku`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
('BK-001', 'Cinta Segitiga', 913, 'Deden Muhamad Furqon', 'Furqon Creative', 2008, 'Novel', '8', '50000', '45000', '5', '15'),
('BK-002', 'algoritma Itu Mudah', 1927, 'Deden Muhamad Furqon', 'Furqon Creative', 2017, 'Komputer', '10', '37000', '31820', '5', '19'),
('BK-003', 'Web Dinamis', 193712, 'Deden Muhamad Furqon', 'Furqon Creative', 2017, 'Komputer', '2', '35000', '32900', '8', '14'),
('BK-004', 'Matemaetika Kelas XII', 92010931, 'Deden Muhamad Furqon', 'Erlangga', 2017, 'Pelajaran', '5', '63000', '59850', '5', '10'),
('BK-005', 'Kabayan', 129081, 'Deden Muhamad Furqon', 'Furqon Creative', 2017, 'Novel', '13', '50000', '52500', '10', '5'),
('BK-006', 'Web Statis', 98621, 'Deden Muhamad Furqon', 'Furqon Creative', 2017, 'Komputer', '5', '50000', '47500', '5', '10'),
('BK-007', 'Bahasa Indonesia', 2147483647, 'Sutisna, S.Pd', 'Erlangga', 2007, 'Pelajaran', '25', '25000', '22500', '5', '15');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` varchar(11) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
('DSB-001', 'Mamur Mulyawan', 'Sukatali - Situraja', '911'),
('DSB-002', 'mamur', 'Sukatali - Situraja', '911');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hargajual`
--
CREATE TABLE `hargajual` (
`id_buku` varchar(11)
,`judul` varchar(100)
,`noisbn` int(11)
,`penulis` varchar(100)
,`penerbit` varchar(100)
,`tahun` year(4)
,`jenis_buku` enum('Novel','Pelajaran','Komputer','')
,`stok` varchar(15)
,`harga_pokok` varchar(15)
,`harga_jual` double
);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` enum('kasir','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
('KSR-001', 'DEDEN MUHAMAD FURQON', 'Karamat - Cigintung - Cisitu - Sumedang', '0815xxxxxxx', 'Single', 'M_furqon27', 'smknsitur4j473', 'admin'),
('KSR-002', 'Arjuna', 'Konoha', '911', 'magang', 'Arjuna', 'arjuna', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` varchar(11) NOT NULL,
  `id_distributor` varchar(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
('PSK-001', 'DSB-001', 'BK-001', '10', '2017-02-11'),
('PSK-002', 'DBS-001', 'BK-001', '5', '2017-02-11'),
('PSK-003', 'DSB-001', 'BK-002', '8', '2017-02-11'),
('PSK-004', 'DSB-001', 'BK-003', '5', '2017-02-13'),
('PSK-005', 'DSB-001', 'BK-002', '10', '2017-02-16'),
('PSK-006', 'DSB-001', 'BK-003', '8', '2017-02-16'),
('PSK-007', 'DSB-002', 'BK-003', '9', '2017-02-17');

--
-- Triggers `pasok`
--
DELIMITER $$
CREATE TRIGGER `pemasok` AFTER INSERT ON `pasok` FOR EACH ROW update buku set stok=stok+new.jumlah where id_buku=new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `id_kasir` varchar(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `jumlah`, `total`, `tanggal`) VALUES
('PNJ-001', 'BK-002', 'KSR-002', '3', '95460', '2016-02-17'),
('PNJ-002', 'BK-003', 'KSR-002', '1', '32900', '2016-02-17'),
('PNJ-002', 'BK-001', 'KSR-002', '2', '90000', '2016-02-17'),
('PNJ-003', 'BK-003', 'KSR-002', '2', '65800', '2016-02-17'),
('PNJ-003', 'BK-003', 'KSR-002', '3', '98700', '2016-02-17'),
('PNJ-004', 'BK-003', 'KSR-002', '1', '32900', '2017-02-16'),
('PNJ-005', 'BK-005', 'KSR-002', '2', '105000', '2017-02-16'),
('PNJ-006', 'BK-004', 'KSR-002', '6', '359100', '2017-02-16'),
('PNJ-006', 'BK-003', 'KSR-002', '2', '65800', '2017-02-16'),
('PNJ-007', 'BK-001', 'KSR-002', '2', '90000', '2017-02-16'),
('PNJ-008', 'BK-002', 'KSR-002', '1', '31820', '2017-02-16'),
('PNJ-008', 'BK-001', 'KSR-002', '1', '45000', '2017-02-16'),
('PNJ-008', 'BK-003', 'KSR-002', '1', '32900', '2017-02-16'),
('PNJ-008', 'BK-004', 'KSR-002', '2', '119700', '2017-02-16'),
('PNJ-008', 'BK-003', 'KSR-002', '1', '32900', '2017-02-16'),
('PNJ-008', 'BK-002', 'KSR-002', '1', '31820', '2017-02-16'),
('PNJ-009', 'BK-003', 'KSR-002', '1', '32900', '2017-02-16'),
('PNJ-009', 'BK-003', 'KSR-002', '1', '0', '2017-02-16'),
('PNJ-010', 'BK-001', 'KSR-002', '1', '45000', '2017-02-16'),
('PNJ-011', 'BK-003', 'KSR-002', '2', '65800', '2017-02-17'),
('PNJ-012', 'BK-003', 'KSR-003', '2', '65800', '2017-02-17'),
('PNJ-012', 'BK-004', 'KSR-003', '1', '59850', '2017-02-17');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `stok` AFTER INSERT ON `penjualan` FOR EACH ROW update buku set stok=stok-new.jumlah where id_buku=new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `total`
--
CREATE TABLE `total` (
`id_penjualan` varchar(11)
,`id_buku` varchar(11)
,`judul` varchar(100)
,`harga_jual` double
,`jumlah` varchar(20)
,`total` double
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Structure for view `hargajual`
--
DROP TABLE IF EXISTS `hargajual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hargajual`  AS  (select `buku`.`id_buku` AS `id_buku`,`buku`.`judul` AS `judul`,`buku`.`noisbn` AS `noisbn`,`buku`.`penulis` AS `penulis`,`buku`.`penerbit` AS `penerbit`,`buku`.`tahun` AS `tahun`,`buku`.`jenis_buku` AS `jenis_buku`,`buku`.`stok` AS `stok`,`buku`.`harga_pokok` AS `harga_pokok`,((`buku`.`harga_pokok` + ((`buku`.`harga_pokok` * `buku`.`ppn`) / 100)) - ((`buku`.`harga_pokok` * `buku`.`diskon`) / 100)) AS `harga_jual` from `buku`) ;

-- --------------------------------------------------------

--
-- Structure for view `total`
--
DROP TABLE IF EXISTS `total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total`  AS  (select `penjualan`.`id_penjualan` AS `id_penjualan`,`hargajual`.`id_buku` AS `id_buku`,`hargajual`.`judul` AS `judul`,`hargajual`.`harga_jual` AS `harga_jual`,`penjualan`.`jumlah` AS `jumlah`,(`hargajual`.`harga_jual` * `penjualan`.`jumlah`) AS `total`,`penjualan`.`tanggal` AS `tanggal` from (`hargajual` join `penjualan`) where (`hargajual`.`id_buku` = `penjualan`.`id_buku`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_buku_2` (`id_buku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
