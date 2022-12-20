-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 03:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorentfai`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `ID_Asuransi` int(11) NOT NULL,
  `Nama_Asuransi` varchar(255) NOT NULL,
  `Premi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` int(11) NOT NULL,
  `No_Rangka` varchar(50) NOT NULL,
  `No_Mesin` varchar(50) NOT NULL,
  `Plat` varchar(10) NOT NULL,
  `No_BPKB` varchar(20) NOT NULL,
  `No_STNK` varchar(20) NOT NULL,
  `Harga_sewa` int(11) NOT NULL,
  `Isi_Silinder` int(11) NOT NULL,
  `Nama_Motor` varchar(255) NOT NULL,
  `Warna_Motor` varchar(50) NOT NULL,
  `Tahun_Pembuatan` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `jumlah_gambar` int(11) DEFAULT NULL,
  `Status` int(2) NOT NULL,
  `FK_ID_ASURANSI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_Barang`, `No_Rangka`, `No_Mesin`, `Plat`, `No_BPKB`, `No_STNK`, `Harga_sewa`, `Isi_Silinder`, `Nama_Motor`, `Warna_Motor`, `Tahun_Pembuatan`, `gambar`, `jumlah_gambar`, `Status`, `FK_ID_ASURANSI`) VALUES
(15, 'saya', 'asddas', 'gelap', 'adsads', 'ads', 11, 3, 'dhana', 'hitam biar sangar', '2022-12-06', 'MxbJ6cTD', 2, 0, NULL),
(16, 'IOJDKXJEIUSODX', 'VFXOKOPRDVFX', 'L 8573 VC', 'IODFIMREOFCF', 'NJKFDJ89DFIJFK', 10000, 125, 'vario', 'merah', '2022-12-13', '0nXo57WP-2.jpg', 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_Jabatan`, `Nama_Jabatan`) VALUES
(0, 'Transaksi'),
(1, 'Gudang'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `ID_Karyawan` int(11) NOT NULL,
  `Nama_Karyawan` varchar(255) NOT NULL,
  `NomorTelepon_Karyawan` int(20) NOT NULL,
  `Username_Karyawan` varchar(255) NOT NULL,
  `Password_Karyawan` varchar(255) NOT NULL,
  `FK_ID_JABATAN` int(11) NOT NULL,
  `KTP_Karyawan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_Karyawan`, `Nama_Karyawan`, `NomorTelepon_Karyawan`, `Username_Karyawan`, `Password_Karyawan`, `FK_ID_JABATAN`, `KTP_Karyawan`) VALUES
(1, 'matthew', 7653543, 'matt', '$2a$04$s3k5jdbZLr2tWqJw/sqV3O6yiVzoLpraPYtJKE7yCwtz9IYuS.hKm', 0, NULL),
(2, 'managernya', 6543245, 'manager', '$2a$04$s3k5jdbZLr2tWqJw/sqV3O6yiVzoLpraPYtJKE7yCwtz9IYuS.hKm', 2, NULL),
(3, 'annoedo', 675434, 'annos', '$2a$04$s3k5jdbZLr2tWqJw/sqV3O6yiVzoLpraPYtJKE7yCwtz9IYuS.hKm', 1, NULL),
(4, 'maria', 98433, 'maria', '$2y$10$SwQJxaH0m7qgsnAObl88XemFFQPAb/rvxVzVZCjjNW8U3IYB6kXc2', 0, 'JCABpOW6.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `ID_Subscription` int(11) NOT NULL,
  `Nama_Subscription` varchar(255) NOT NULL,
  `Jumlah_Hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`ID_Subscription`, `Nama_Subscription`, `Jumlah_Hari`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Trans` int(11) NOT NULL,
  `FK_ID_USER` int(11) NOT NULL,
  `FK_ID_Karyawan` int(11) DEFAULT NULL,
  `FK_ID_Barang` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Tanggal_Trans` date NOT NULL,
  `Start_Date` date NOT NULL,
  `FK_ID_SUBSCRIPTION` int(11) DEFAULT NULL,
  `End_Date` date NOT NULL,
  `Bukti_Bayar` varchar(255) DEFAULT NULL,
  `Status` int(2) NOT NULL COMMENT '-1 = ditolak\r\n0 = pending\r\n1 = diterima',
  `kode_ambil` varchar(7) DEFAULT NULL,
  `sudah_diambil` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Trans`, `FK_ID_USER`, `FK_ID_Karyawan`, `FK_ID_Barang`, `Total`, `Tanggal_Trans`, `Start_Date`, `FK_ID_SUBSCRIPTION`, `End_Date`, `Bukti_Bayar`, `Status`, `kode_ambil`, `sudah_diambil`) VALUES
(5, 4, 1, 15, 11, '2022-12-07', '2022-12-07', NULL, '2022-12-08', NULL, 2, NULL, 0),
(6, 4, NULL, 15, 132, '2022-12-15', '2022-12-15', NULL, '2022-12-27', NULL, 2, NULL, 0),
(7, 4, 4, 16, 30000, '2022-12-16', '2022-12-16', NULL, '2022-12-19', NULL, 2, NULL, 0),
(8, 4, 1, 16, 120000, '2022-12-18', '2022-12-18', NULL, '2022-12-30', NULL, 2, NULL, 0),
(9, 4, 1, 15, 132, '2022-12-20', '2022-12-20', NULL, '2023-01-01', NULL, 2, 'nESA7Jt', 1),
(10, 4, 1, 16, 10000, '2022-12-20', '2022-12-20', NULL, '2022-12-21', NULL, -1, NULL, 0),
(11, 4, 1, 15, 11, '2022-12-20', '2022-12-20', NULL, '2022-12-21', NULL, 1, 'akRV7xv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` int(2) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `KTP_User` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `fullname`, `NIK`, `Telepon`, `Username`, `Email`, `Password`, `Status`, `gender`, `KTP_User`) VALUES
(3, 'ini user testing', '7471053112010003', '081342025314', 'test123', 'test@gmail.com', '$2y$10$gvzxZ7VHfpHCvfo9UQ.Zh.goL1QSH7YFFAeKSlaYxRVVrx006.aga', 0, 'L', NULL),
(4, 'ini user testing 2', NULL, '081342025314', 'test1', 'test@gmail.com', '$2y$10$DsD8fNhNSKRu4eeAEVuzxO506umFNjSmKYMMeKjAk.Lw9plwuNrW2', 0, 'L', NULL),
(5, 'a', '12312312312', '132312', 'a', 'sfdsfsd@fsaaf', '$2y$10$5eQdGey1G8o368gB9HGSoeH5ekWVmSqV1c405nqELgx.WHjp5teXy', 0, 'L', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`ID_Asuransi`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`),
  ADD KEY `FK_ID_ASURANSI` (`FK_ID_ASURANSI`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_Jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_Karyawan`),
  ADD KEY `FK_ID_JABATAN` (`FK_ID_JABATAN`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`ID_Subscription`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Trans`),
  ADD KEY `FK_ID_User` (`FK_ID_USER`),
  ADD KEY `FK_ID_KARYAWAN` (`FK_ID_Karyawan`),
  ADD KEY `FK_ID_Barang` (`FK_ID_Barang`),
  ADD KEY `FK_ID_SUBSCRIPTION` (`FK_ID_SUBSCRIPTION`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `ID_Asuransi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_Karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `ID_Subscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_ID_ASURANSI` FOREIGN KEY (`FK_ID_ASURANSI`) REFERENCES `asuransi` (`ID_Asuransi`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_ID_JABATAN` FOREIGN KEY (`FK_ID_JABATAN`) REFERENCES `jabatan` (`ID_Jabatan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_ID_Barang` FOREIGN KEY (`FK_ID_Barang`) REFERENCES `barang` (`ID_Barang`),
  ADD CONSTRAINT `FK_ID_KARYAWAN` FOREIGN KEY (`FK_ID_Karyawan`) REFERENCES `karyawan` (`ID_Karyawan`),
  ADD CONSTRAINT `FK_ID_SUBSCRIPTION` FOREIGN KEY (`FK_ID_SUBSCRIPTION`) REFERENCES `subscription` (`ID_Subscription`),
  ADD CONSTRAINT `FK_ID_User` FOREIGN KEY (`FK_ID_USER`) REFERENCES `user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
