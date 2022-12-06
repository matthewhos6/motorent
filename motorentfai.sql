-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2022 pada 17.50
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
CREATE DATABASE IF NOT EXISTS `motorentfai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `motorentfai`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `asuransi`
--

CREATE TABLE `asuransi` (
  `ID_Asuransi` int(11) NOT NULL,
  `Nama_Asuransi` varchar(255) NOT NULL,
  `Premi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
  `Status` int(2) NOT NULL,
  `FK_ID_ASURANSI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_Barang`, `No_Rangka`, `No_Mesin`, `Plat`, `No_BPKB`, `No_STNK`, `Harga_sewa`, `Isi_Silinder`, `Nama_Motor`, `Warna_Motor`, `Tahun_Pembuatan`, `gambar`, `Status`, `FK_ID_ASURANSI`) VALUES
(1, 'b234212s', 'sd3425f3', 'l54f', 'f324rs3', 'fgert4t', 10000, 125, 'sekupi', 'hihitam', '2019-09-11', 'OyoOpi5z.jpg', 1, NULL),
(3, 'kujyhtgre343t5ytg', 'thgtfu76y', 'd 032 l', '3435467876564', '56546575', 200000, 160, 'vario', 'warna warni', '2021-04-14', '8vgfJ7dV.jpg', 1, NULL),
(4, 'adawsrey', 'rw4t65yref', 'JA2123', 'THDGSER', 'MUHYERG', 56000, 123, 'UNYU', 'UNGU', '2022-11-15', NULL, 0, NULL),
(5, 'sadas', 'sa', 'DD 012 l', 'a', '123', 10000, 200, 'apple', 'hitem', '2022-11-29', 'WHQpgyBP.jpg', 1, NULL),
(6, 'ASDWQE', 'SCDAWQ', 'TESD2', 'XCZSDSAW', 'NYHGFGTDRGT', 10000, 200, 'kucing', 'warna warni', '2022-11-25', 'jxeMGMFK.jpg', 1, NULL),
(7, 'ydtrsetwrqewerey', 'rw4t65yref', 'JA2123', 'THDGSER', 'MUHYERG', 56000, 123, 'UNYU', 'UNGU', '2022-11-15', NULL, 1, NULL),
(8, 'YRTFSAER', '3REGR43WEF', 'KO 4322', 'GFHFTRE3', 'IUYT4SD', 23000, 500, 'MASYA', 'MERAH', '2022-11-06', NULL, 1, NULL),
(9, 'ASDWQE', 'SCDAWQ', 'TESD2', 'XCZSDSAW', 'NYHGFGTDRGT', 10000, 200, 'kucing', 'warna warni', '2022-11-25', 'oV0xUDLd.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_Jabatan`, `Nama_Jabatan`) VALUES
(0, 'Transaksi'),
(1, 'Gudang'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`ID_Karyawan`, `Nama_Karyawan`, `NomorTelepon_Karyawan`, `Username_Karyawan`, `Password_Karyawan`, `FK_ID_JABATAN`, `KTP_Karyawan`) VALUES
(1, 'matthew', 7653543, 'matt', 'matts', 0, NULL),
(2, 'managernya', 6543245, 'manager', 'managers', 2, NULL),
(3, 'annoedo', 675434, 'annos', 'annos', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscription`
--

CREATE TABLE `subscription` (
  `ID_Subscription` int(11) NOT NULL,
  `Nama_Subscription` varchar(255) NOT NULL,
  `Jumlah_Hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscription`
--

INSERT INTO `subscription` (`ID_Subscription`, `Nama_Subscription`, `Jumlah_Hari`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
  `Status` int(2) NOT NULL COMMENT '-1 = ditolak\r\n0 = pending\r\n1 = diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_Trans`, `FK_ID_USER`, `FK_ID_Karyawan`, `FK_ID_Barang`, `Total`, `Tanggal_Trans`, `Start_Date`, `FK_ID_SUBSCRIPTION`, `End_Date`, `Bukti_Bayar`, `Status`) VALUES
(1, 3, 1, 5, 150000, '2022-09-29', '2022-09-29', 1, '2022-11-17', NULL, 1),
(2, 3, 1, 1, 150000, '2022-09-29', '2022-09-29', 1, '2022-10-04', NULL, 1),
(3, 4, NULL, 1, 40000, '2022-12-06', '2022-12-05', NULL, '2022-12-09', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_User`, `fullname`, `NIK`, `Telepon`, `Username`, `Email`, `Password`, `Status`, `gender`, `KTP_User`) VALUES
(3, 'ini user testing', '7471053112010003', '081342025314', 'test123', 'test@gmail.com', '$2y$10$gvzxZ7VHfpHCvfo9UQ.Zh.goL1QSH7YFFAeKSlaYxRVVrx006.aga', 0, 'L', NULL),
(4, 'ini user testing 2', NULL, '081342025314', 'test1', 'test@gmail.com', '$2y$10$DsD8fNhNSKRu4eeAEVuzxO506umFNjSmKYMMeKjAk.Lw9plwuNrW2', 0, 'L', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`ID_Asuransi`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`),
  ADD KEY `FK_ID_ASURANSI` (`FK_ID_ASURANSI`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_Jabatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_Karyawan`),
  ADD KEY `FK_ID_JABATAN` (`FK_ID_JABATAN`);

--
-- Indeks untuk tabel `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`ID_Subscription`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Trans`),
  ADD KEY `FK_ID_User` (`FK_ID_USER`),
  ADD KEY `FK_ID_KARYAWAN` (`FK_ID_Karyawan`),
  ADD KEY `FK_ID_Barang` (`FK_ID_Barang`),
  ADD KEY `FK_ID_SUBSCRIPTION` (`FK_ID_SUBSCRIPTION`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `ID_Asuransi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_Karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `subscription`
--
ALTER TABLE `subscription`
  MODIFY `ID_Subscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_ID_ASURANSI` FOREIGN KEY (`FK_ID_ASURANSI`) REFERENCES `asuransi` (`ID_Asuransi`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_ID_JABATAN` FOREIGN KEY (`FK_ID_JABATAN`) REFERENCES `jabatan` (`ID_Jabatan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
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
