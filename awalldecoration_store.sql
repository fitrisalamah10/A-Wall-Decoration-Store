-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 08:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awalldecoration_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_jenis` varchar(11) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `id_satuan` varchar(11) NOT NULL,
  `id_ukuran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `photo`, `harga`, `stok`, `id_jenis`, `id_kategori`, `id_satuan`, `id_ukuran`) VALUES
('GM0111', 'Guci motif bunga ', 'gucibnga.jpg', 70000, 383, 'G', 'M01', 'S01', 'U01'),
('GM0113', 'Guci motif bunga', 'guci bunga kecil.jpg', 58000, 0, 'G', 'M01', 'S01', 'U03'),
('GM0211', 'Guci motif burung', 'guciburung.jpg', 70000, 437, 'G', 'M02', 'S01', 'U01'),
('GM0212', 'Guci motif burung', 'guci burung sedang.jpg', 68000, 0, 'G', 'M02', 'S01', 'U02'),
('LM0111', 'Lukisan motif bunga', 'lukisanbunga.jpg', 85000, 474, 'L', 'M01', 'S01', 'U01'),
('LM0211', 'Lukisan motif burung', 'lukisanbrng.jpg', 85000, 439, 'L', 'M02', 'S01', 'U01'),
('PM0111', 'Piring motif bunga', 'piringbnga.jpg', 65000, 458, 'P', 'M01', 'S01', 'U01'),
('PM0211', 'Piring motif burung', 'piringbrng.jpg', 65000, 3, 'G', 'M02', 'S01', 'U01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(11) NOT NULL,
  `pass` varchar(11) NOT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `pass`, `nama_customer`, `alamat`, `kota`, `no_hp`) VALUES
('ananda10', '1234', 'ananda azzahra', 'jl. sudirman no. 2302', 'Balikpapan', '087899582714'),
('anisa01', '123', 'Anisa Dwi', 'JL. Sudirman No.2109', 'Balikpapan', '087899541234'),
('arnada10', '1235', 'Arnada Feb', 'Jl. faqih usman no.18', 'Balipapan', '0812842099635'),
('Fitrisal12', '123', 'Fitri salamah', 'jl. faqih usman', 'Banda Aceh', '081284209663'),
('intan02', '1234', 'Intan', 'JL. Veteran No.1808', 'Banda Aceh', '089876523190'),
('karina10', '123', 'Karina', 'jl. sudirman no.1808', 'Balikpapan', '087899582714'),
('nila12', '123', 'Nila Sari', 'Jl. Mataram', 'Balikpapan', '088287781016'),
('sabrina12', '123', 'Fadilatu Sabrina', 'Jl. sudirman', 'Balikpapan', '089971627382');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `id_pengiriman` varchar(11) NOT NULL,
  `id_bayar` varchar(11) NOT NULL,
  `id_statbayar` varchar(11) NOT NULL,
  `id_statproses` varchar(11) NOT NULL,
  `penilaian_produk` varchar(500) NOT NULL,
  `bintang` varchar(10) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `tanggal_pembayaran` varchar(20) NOT NULL,
  `no_resi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `tgl_beli`, `total`, `username`, `id_pengiriman`, `id_bayar`, `id_statbayar`, `id_statproses`, `penilaian_produk`, `bintang`, `bukti_pembayaran`, `tanggal_pembayaran`, `no_resi`) VALUES
('AWDananda10666', '2021-11-16', 100000, 'ananda10', 'P1102', 'PB1', 'SB1', 'SP6', 'Bagus', '5', '20211221061734Screenshot (1).png', '2021-12-17', 'JP12365321'),
('AWDanisa01923', '2021-12-22', 190000, 'anisa01', 'P1101', 'PB1', 'SB1', 'SP7', 'sangat bagus', '5', '20211222144415cfdad57073eb448e9599981c745d6549-0003 (1).jpg', '2021-12-22', ''),
('AWDFitrisal12260', '2021-12-01', 95000, 'Fitrisal12', 'P1101', 'PB2', 'SB1', 'SP6', 'sangat bagus', '5', '20211221060017Screenshot (1).png', '2021-12-1', 'Jp12345678'),
('AWDintan02328', '2021-11-30', 100000, 'intan02', 'P1102', 'PB2', 'SB1', 'SP5', '', '', '20211221064957Screenshot (49).png', '2021-11-30', 'Jp453217686'),
('AWDintan02414', '2021-12-21', 100000, 'intan02', 'P1102', 'PB1', 'SB1', 'SP2', '', '', '20211221065213Screenshot (445).png', '2021-12-21', ''),
('AWDkarina10569', '2021-12-21', 98000, 'karina10', 'P2101', 'PB2', 'SB2', 'SP1', '', '', '', '', ''),
('AWDnila12859', '2021-12-21', 470000, 'nila12', 'P1101', 'PB2', 'SB1', 'SP8', 'kurang bagus', '5', '20211221080209Screenshot (70).png', '2021-12-21', 'JP1234579');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_kirim`
--

CREATE TABLE `jasa_kirim` (
  `id_jasakirim` varchar(11) NOT NULL,
  `nama_jasakirim` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa_kirim`
--

INSERT INTO `jasa_kirim` (`id_jasakirim`, `nama_jasakirim`) VALUES
('JS01', 'Jnt'),
('JS02', 'Jne'),
('JS03', 'Sicepat'),
('JS04', 'Antareja');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(11) NOT NULL,
  `nama_jenis` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`) VALUES
('G', 'Guci'),
('L', 'Lukisan'),
('P', 'Piring');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
('M01', 'Motif bunga'),
('M02', 'Motif burung');

-- --------------------------------------------------------

--
-- Table structure for table `lama_kirim`
--

CREATE TABLE `lama_kirim` (
  `id_lamakirim` varchar(11) NOT NULL,
  `nama_lamakirim` varchar(20) NOT NULL,
  `ket_lamakirim` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lama_kirim`
--

INSERT INTO `lama_kirim` (`id_lamakirim`, `nama_lamakirim`, `ket_lamakirim`) VALUES
('LK01', 'Sameday', '1 hari'),
('LK02', 'Regular', '2-3 hari');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` varchar(11) NOT NULL,
  `nama_bayar` varchar(20) NOT NULL,
  `ket_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `nama_bayar`, `ket_bayar`) VALUES
('PB1', 'Bank BNI', '005634778531'),
('PB2', 'Bank BRI', '026234446530');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` varchar(11) NOT NULL,
  `id_jasakirim` varchar(11) NOT NULL,
  `id_lamakirim` varchar(11) NOT NULL,
  `id_tujuan` varchar(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_jasakirim`, `id_lamakirim`, `id_tujuan`, `tarif`) VALUES
('P1101', 'JS01', 'LK01', 'K01', 25000),
('P1102', 'JS01', 'LK01', 'K02', 30000),
('P1201', 'JS01', 'LK02', 'K01', 22000),
('P1202', 'JS01', 'LK02', 'K02', 27000),
('P2101', 'JS02', 'LK01', 'K01', 28000),
('P2102', 'JS02', 'LK01', 'K02', 33000),
('P2201', 'JS02', 'LK02', 'K01', 25000),
('P2202', 'JS02', 'LK02', 'K02', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id_satuan` varchar(11) NOT NULL,
  `ket_satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_satuan`, `ket_satuan`) VALUES
('S01', 'pcs'),
('S04', 'lusin');

-- --------------------------------------------------------

--
-- Table structure for table `status_bayar`
--

CREATE TABLE `status_bayar` (
  `id_statbayar` varchar(11) NOT NULL,
  `ket_statbayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_bayar`
--

INSERT INTO `status_bayar` (`id_statbayar`, `ket_statbayar`) VALUES
('SB1', 'Sudah Kirim Pembayaran'),
('SB2', 'Belum Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `status_proses`
--

CREATE TABLE `status_proses` (
  `id_statproses` varchar(11) NOT NULL,
  `ket_statproses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_proses`
--

INSERT INTO `status_proses` (`id_statproses`, `ket_statproses`) VALUES
('SP1', 'Menunggu Pembayaran'),
('SP2', 'Barang Dikemas'),
('SP3', 'Barang Dikirim'),
('SP4', 'Batal'),
('SP5', 'Barang Diterima'),
('SP6', 'Selesai'),
('SP7', 'Retur Barang'),
('SP8', 'Retur Barang Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_faktur` varchar(20) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_faktur`, `id_barang`, `qty`) VALUES
('AWDananda10666', 'GM0211', 1),
('AWDFitrisal12260', 'GM0111', 1),
('AWDintan02328', 'GM0111', 1),
('AWDintan02414', 'GM0111', 1),
('AWDkarina10569', 'GM0211', 1),
('AWDnila12859', 'GM0111', 4),
('AWDnila12859', 'PM0111', 1),
('AWDanisa01923', 'GM0111', 1),
('AWDanisa01923', 'GM0211', 1);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `stok_update` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
UPDATE barang set stok=stok-NEW.qty where id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_kirim`
--

CREATE TABLE `tujuan_kirim` (
  `id_tujuan` varchar(11) NOT NULL,
  `nama_tujuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tujuan_kirim`
--

INSERT INTO `tujuan_kirim` (`id_tujuan`, `nama_tujuan`) VALUES
('K01', 'Balikpapan'),
('K02', 'Banda Aceh'),
('K03', 'palembang');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` varchar(11) NOT NULL,
  `ket_ukuran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `ket_ukuran`) VALUES
('U01', 'Besar'),
('U02', 'Sedang'),
('U03', 'kecil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('audy', '123', 'Admin'),
('fitri', '1234', 'Admin'),
('salamah', '12345', 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`,`id_kategori`,`id_satuan`,`id_ukuran`),
  ADD KEY `barang_ibfk_1` (`id_kategori`),
  ADD KEY `barang_ibfk_3` (`id_satuan`),
  ADD KEY `barang_ibfk_4` (`id_ukuran`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `username` (`username`),
  ADD KEY `faktur_ibfk_1` (`id_statproses`),
  ADD KEY `faktur_ibfk_2` (`id_bayar`),
  ADD KEY `faktur_ibfk_3` (`id_statbayar`),
  ADD KEY `faktur_ibfk_5` (`id_pengiriman`);

--
-- Indexes for table `jasa_kirim`
--
ALTER TABLE `jasa_kirim`
  ADD PRIMARY KEY (`id_jasakirim`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lama_kirim`
--
ALTER TABLE `lama_kirim`
  ADD PRIMARY KEY (`id_lamakirim`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_jasakirim` (`id_jasakirim`,`id_lamakirim`,`id_tujuan`),
  ADD KEY `pengiriman_ibfk_1` (`id_lamakirim`),
  ADD KEY `pengiriman_ibfk_3` (`id_tujuan`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `status_bayar`
--
ALTER TABLE `status_bayar`
  ADD PRIMARY KEY (`id_statbayar`);

--
-- Indexes for table `status_proses`
--
ALTER TABLE `status_proses`
  ADD PRIMARY KEY (`id_statproses`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_faktur` (`id_faktur`),
  ADD KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `tujuan_kirim`
--
ALTER TABLE `tujuan_kirim`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_barang` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_4` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_statproses`) REFERENCES `status_proses` (`id_statproses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_2` FOREIGN KEY (`id_bayar`) REFERENCES `pembayaran` (`id_bayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_3` FOREIGN KEY (`id_statbayar`) REFERENCES `status_bayar` (`id_statbayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_4` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_ibfk_5` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_lamakirim`) REFERENCES `lama_kirim` (`id_lamakirim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_jasakirim`) REFERENCES `jasa_kirim` (`id_jasakirim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan_kirim` (`id_tujuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
