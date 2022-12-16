-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2022 at 09:42 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0RC5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k1motorent_motorent`
--
CREATE DATABASE IF NOT EXISTS `k1motorent_motorent` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `k1motorent_motorent`;

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

DROP TABLE IF EXISTS `asuransi`;
CREATE TABLE `asuransi` (
  `ID_Asuransi` int NOT NULL,
  `Nama_Asuransi` varchar(255) NOT NULL,
  `Premi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `ID_Barang` int NOT NULL,
  `No_Rangka` varchar(50) NOT NULL,
  `No_Mesin` varchar(50) NOT NULL,
  `Plat` varchar(10) NOT NULL,
  `No_BPKB` varchar(20) NOT NULL,
  `No_STNK` varchar(20) NOT NULL,
  `Harga_sewa` int NOT NULL,
  `Isi_Silinder` int NOT NULL,
  `Nama_Motor` varchar(255) NOT NULL,
  `Warna_Motor` varchar(50) NOT NULL,
  `Tahun_Pembuatan` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `jumlah_gambar` int DEFAULT NULL,
  `Status` int NOT NULL,
  `FK_ID_ASURANSI` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_Barang`, `No_Rangka`, `No_Mesin`, `Plat`, `No_BPKB`, `No_STNK`, `Harga_sewa`, `Isi_Silinder`, `Nama_Motor`, `Warna_Motor`, `Tahun_Pembuatan`, `gambar`, `jumlah_gambar`, `Status`, `FK_ID_ASURANSI`) VALUES
(15, 'JFV73JJDSUI3AW3', 'GFD798W3UDY3', 'L 2213 HD', 'FDYY3278J8132R', '5647827346', 25000, 125, 'Scoopy', 'merah', '2020-06-16', 'McRRevvb-0.jpg', 2, 1, NULL),
(16, '476UYHGFER34SD', 'FGHHTY54345RTE', 'L 3428 SD', 'GDR4FDGTDGFTF', '45367652334569', 20000, 125, 'Jupiter Z1', 'Hitam', '2021-06-08', 'SLZeZbtE-0.jpg', 1, 1, NULL),
(17, 'FDGNHIDFHGSEFSED', 'HF564FDEHGFBY54R', 'L 5439 BF', 'DR565RGD6YHG5SD', '56747865463435', 15000, 115, 'Suzuki Shooter', 'Hijau', '2017-06-13', '8gNBOe5n-0.jpg', 1, 1, NULL),
(19, 'DGHRTYRGH54YGD4', 'HTDF7YREXI7675YRS', 'D 0345 IS', 'JYTFRUI7T865676UYT', '56478543789', 3000, 125, 'Vario', 'Abu-Abu', '2018-06-12', 'eGJqwVQE-0.jpg', 1, 1, NULL),
(20, 'FDGHDRHGIDRUGE5S', 'FDTHY5GRSD65GDRF', 'L 8430 DF', 'SDRTY54GDFRYT5DTF', '4657654367454', 20000, 125, 'Beat', 'Biru', '2018-01-29', 'HUhz2yYB-1.jpg', 2, 1, NULL),
(21, 'DTFJYGFTRD56U6', 'GFHCT6YUCF7YU', 'L 6754 CV', 'VGHKGVGYUI87GF', '798654367835', 18000, 125, 'Beat', 'Merah', '2020-06-09', 'oQCOQzNf', 1, 1, NULL),
(22, 'FGHJYFRCTH657IJUYH', 'FGDHXTRYH65R43JHK', 'L 8439 HG', 'HJKNHBI7YJGVT6VCXR', '76585474564654', 5000, 250, 'Ninja ZX25R', 'Biru Metalik', '2022-12-06', 'N8M6eV7h', 1, 1, NULL),
(23, 'FTUYGJFHDGZSFIT6R', 'NCGVFDRGHJYTTR67', 'H 5865 GV', 'HFGGJHKMUKHJMV5', '87965645765', 2000, 125, 'Scoopy', 'Thailook', '2014-01-19', 'hOgIX2a4-0.jpg', 1, 1, NULL),
(24, 'hdtfxgft', 'gjyvghgh', 'L 6543 D', 'ghdrthg', '566576754', 3000, 1, 'a', 'hitam', '2022-12-08', 'bkUef5Kn', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `ID_Jabatan` int NOT NULL,
  `Nama_Jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `ID_Karyawan` int NOT NULL,
  `Nama_Karyawan` varchar(255) NOT NULL,
  `NomorTelepon_Karyawan` int NOT NULL,
  `Username_Karyawan` varchar(255) NOT NULL,
  `Password_Karyawan` varchar(255) NOT NULL,
  `FK_ID_JABATAN` int NOT NULL,
  `KTP_Karyawan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_Karyawan`, `Nama_Karyawan`, `NomorTelepon_Karyawan`, `Username_Karyawan`, `Password_Karyawan`, `FK_ID_JABATAN`, `KTP_Karyawan`) VALUES
(1, 'matthew', 7653543, 'matt', '$2y$10$D5RmcKqcYQH1uNR6woJxde7isma2QwwHAGqb/jHC7Q6HJyBlPHgGS', 0, 'bVGK7BSn.png'),
(2, 'managernya', 6543245, 'manager', '$2y$10$juP/kvI4SkzLw8zpDwtZu.XiXxgBm8IBXXMdoWOa71bb2EbjNBGjO', 2, NULL),
(3, 'annoedo', 675434, 'annos', '$2y$10$jFNJiGrd2ti5MoByh2YHKePO3gZQKNkauVPxjSQDLa/8Vnp9Mwg.q', 1, NULL),
(4, 'marino', 234567890, 'marino', '$2y$10$AyVSDfSzL7t9oNHccqEy/emepYYpi1b6BlWxDFJSAoqQmVh0yM4GW', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE `subscription` (
  `ID_Subscription` int NOT NULL,
  `Nama_Subscription` varchar(255) NOT NULL,
  `Jumlah_Hari` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`ID_Subscription`, `Nama_Subscription`, `Jumlah_Hari`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `ID_Trans` int NOT NULL,
  `FK_ID_USER` int NOT NULL,
  `FK_ID_Karyawan` int DEFAULT NULL,
  `FK_ID_Barang` int NOT NULL,
  `Total` int NOT NULL,
  `Tanggal_Trans` date NOT NULL,
  `Start_Date` date NOT NULL,
  `FK_ID_SUBSCRIPTION` int DEFAULT NULL,
  `End_Date` date NOT NULL,
  `Bukti_Bayar` varchar(255) DEFAULT NULL,
  `Status` int NOT NULL COMMENT '-1 = ditolak\r\n0 = pending\r\n1 = diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Trans`, `FK_ID_USER`, `FK_ID_Karyawan`, `FK_ID_Barang`, `Total`, `Tanggal_Trans`, `Start_Date`, `FK_ID_SUBSCRIPTION`, `End_Date`, `Bukti_Bayar`, `Status`) VALUES
(5, 5, 1, 15, 11, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, 1),
(6, 5, 1, 19, 123, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, 1),
(7, 5, 1, 19, 123, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, -1),
(8, 5, 1, 16, 100, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, -1),
(9, 5, NULL, 15, 11, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, 0),
(10, 5, NULL, 15, 11, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, 0),
(11, 5, NULL, 16, 100, '2022-12-07', '2022-12-07', 1, '2022-12-08', NULL, 0),
(20, 5, 1, 24, 3000, '2022-12-08', '2022-12-08', NULL, '2022-12-09', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_User` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` int NOT NULL,
  `gender` varchar(1) NOT NULL,
  `KTP_User` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `fullname`, `NIK`, `Telepon`, `Username`, `Email`, `Password`, `Status`, `gender`, `KTP_User`) VALUES
(3, 'ini user testing', '7471053112010003', '081342025314', 'test123', 'test@gmail.com', '$2y$10$gvzxZ7VHfpHCvfo9UQ.Zh.goL1QSH7YFFAeKSlaYxRVVrx006.aga', 0, 'L', NULL),
(4, 'ini user testing 2', NULL, '081342025314', 'test1', 'test@gmail.com', '$2y$10$DsD8fNhNSKRu4eeAEVuzxO506umFNjSmKYMMeKjAk.Lw9plwuNrW2', 0, 'L', NULL),
(5, 'a', '12312312312', '132312', 'a', 'codysimpsons46@gmail.com', '$2y$10$5eQdGey1G8o368gB9HGSoeH5ekWVmSqV1c405nqELgx.WHjp5teXy', 0, 'L', NULL),
(6, 'maria yerossi', '638481962354', '086547823741', 'maria', 'maria.yerossi@gmail.com', '$2y$10$5iVuAjRANIfcpecdu1Jop.SBWqunLCQtg1dN0NogEeYtv4EasV4.O', 0, 'P', NULL),
(7, 'matthre', NULL, '67765432', 'matt', 'matt@gmail.com', '$2y$10$iNvNHDHx6qxpRLlQlXth.ua6ef.yuCnkqJKtR4XvnKfODVqd3HDJu', 0, 'P', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `ID_Asuransi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_Karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `ID_Subscription` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Trans` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
