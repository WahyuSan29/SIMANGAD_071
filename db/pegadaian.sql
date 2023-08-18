-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 12:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegadaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `pass`) VALUES
(1, 'Wahyu', 'wahyu123', '123'),
(4, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `warna` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nik`, `nama_barang`, `merk`, `tahun`, `warna`) VALUES
(61, 2, '6202052907000001', 'Handphone', 'Oppo', '2022', 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `besar_pinjaman`
--

CREATE TABLE `besar_pinjaman` (
  `id_bsr_pinjaman` int(11) NOT NULL,
  `golongan` varchar(3) NOT NULL,
  `minimal` float NOT NULL,
  `maksimal` float NOT NULL,
  `tarif_ujroh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `besar_pinjaman`
--

INSERT INTO `besar_pinjaman` (`id_bsr_pinjaman`, `golongan`, `minimal`, `maksimal`, `tarif_ujroh`) VALUES
(1, 'A', 50000, 499999, 1),
(2, 'B1', 500000, 999999, 1.5),
(3, 'B2', 1000000, 2499990, 2),
(4, 'B3', 2500000, 5999990, 2),
(5, 'C', 5000000, 19999900, 2.5),
(8, 'D', 20000000, 100000000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL,
  `persen_taksiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`, `persen_taksiran`) VALUES
(1, 'Emas', 90),
(2, 'Handphone', 70),
(8, 'Laptop', 75),
(11, 'TV', 65);

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `kd_loker` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `kd_loker`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `nik` varchar(16) NOT NULL,
  `nama_nasabah` varchar(30) NOT NULL,
  `alamat_nasabah` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(9) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nama_keluarga` varchar(30) NOT NULL,
  `alamat_keluarga` varchar(30) NOT NULL,
  `no_hp_keluarga` varchar(13) NOT NULL,
  `tgl_register` date NOT NULL,
  `ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`nik`, `nama_nasabah`, `alamat_nasabah`, `tgl_lahir`, `jk`, `pekerjaan`, `no_hp`, `nama_keluarga`, `alamat_keluarga`, `no_hp_keluarga`, `tgl_register`, `ktp`) VALUES
('6202052901008003', 'Icha', 'Jl. Muchran Ali', '1993-08-19', 'Perempuan', 'Swasta', '087819201105', 'Heru', 'Jl. Suprapto', '087819201100', '2023-07-06', '5120x2880-dark-blue-solid-color-background.jpg'),
('6202052907000001', 'Wahyu', 'Jl. Muchran Ali', '2000-08-05', 'Laki-laki', 'Swasta', '087819201105', 'Heru', 'Jl. Suprapto', '087819201101', '2023-07-06', '1153681.png'),
('6202052907000002', 'Yussan', 'Jl. Kembali', '1996-06-06', 'Perempuan', 'Swasta', '087819201102', 'Heru', 'Jl. Suprapto', '087819201102', '2023-07-06', '5120x2880-dark-blue-solid-color-background.jpg'),
('6202062908000001', 'Bunga', 'Jl. Kembali', '1996-05-20', 'Perempuan', 'Swasta', '087819201105', 'Heru', 'Jl. Suprapto', '087819201106', '2023-07-05', '5120x2880-dark-blue-solid-color-background.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `nik_pengelola` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`nik_pengelola`, `nama`, `alamat`) VALUES
('6202051511720003', 'Budi Sulistiono, S.Pd', 'Jalan Bukit Raya V No.25'),
('6202052907000009', 'Palui', 'Jl. Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `penggadaian`
--

CREATE TABLE `penggadaian` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nik_pengelola` varchar(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_taksir` float NOT NULL,
  `harga_sewa` float NOT NULL,
  `tgl_gadai` date NOT NULL,
  `lama_gadai` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `id_loker` int(11) NOT NULL,
  `trx_gambar` varchar(50) NOT NULL,
  `trx_akad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggadaian`
--

INSERT INTO `penggadaian` (`id_surat`, `no_surat`, `nik`, `nik_pengelola`, `id_barang`, `harga_taksir`, `harga_sewa`, `tgl_gadai`, `lama_gadai`, `keterangan`, `id_loker`, `trx_gambar`, `trx_akad`) VALUES
(1, '1/BMT071/SPG/VII/2023', '6202052907000001', '6202051511720003', 61, 1400000, 84000, '2023-07-05', 1, 'Lunas', 1, '1153681.png', 'Surat Akad.pdf'),
(2, '2/BMT071/SPG/VII/2023', '6202052907000001', '6202051511720003', 61, 1400000, 84000, '2023-07-06', 1, 'Belum Lunas', 1, '5120x2880-dark-blue-solid-color-background.jpg', 'Surat Akad.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `besar_pinjaman`
--
ALTER TABLE `besar_pinjaman`
  ADD PRIMARY KEY (`id_bsr_pinjaman`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`nik_pengelola`);

--
-- Indexes for table `penggadaian`
--
ALTER TABLE `penggadaian`
  ADD PRIMARY KEY (`id_surat`),
  ADD UNIQUE KEY `no_surat` (`no_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `besar_pinjaman`
--
ALTER TABLE `besar_pinjaman`
  MODIFY `id_bsr_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
