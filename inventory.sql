-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 07:52 PM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `stok`, `satuan`, `created_at`, `updated_at`) VALUES
(14, 'Kabel', 'Kabel Router', 2, '20 Meter', '2022-08-16 17:35:33', '2022-08-16 17:51:29'),
(15, 'Parabola', 'Parabola TV', 3, NULL, '2022-08-16 17:38:00', '2022-08-16 17:47:20'),
(16, 'Router', 'Barang Kantor', 10, NULL, '2022-08-16 17:38:17', '2022-08-16 17:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_brg_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_barang_keluar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brg_keluar`
--

INSERT INTO `brg_keluar` (`id`, `no_brg_keluar`, `id_barang`, `id_user`, `tgl_keluar`, `jml_barang_keluar`, `created_at`, `updated_at`) VALUES
(18, 'NBK-0001', 12, 17, '2022-08-17', 1, '2022-08-16 17:24:01', '2022-08-16 17:24:01'),
(19, 'NBK-0002', 14, 17, '2022-08-17', 1, '2022-08-16 17:47:10', '2022-08-16 17:47:10'),
(20, 'NBK-0003', 15, 17, '2022-08-17', 5, '2022-08-16 17:47:20', '2022-08-16 17:47:20'),
(21, 'NBK-0004', 14, 18, '2022-08-18', 1, '2022-08-16 17:51:29', '2022-08-16 17:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_brg_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_barang_masuk` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`id`, `no_brg_masuk`, `id_barang`, `tgl_masuk`, `jml_barang_masuk`, `created_at`, `updated_at`) VALUES
(11, 'NBM-0001', 10, '2022-06-01', 5, '2022-06-06 19:26:46', '2022-06-06 19:26:46'),
(12, 'NBM-0002', 9, '2022-06-02', 10, '2022-06-06 19:26:59', '2022-06-06 19:26:59'),
(13, 'NBM-0003', 8, '2022-06-07', 8, '2022-06-06 19:27:11', '2022-06-06 19:27:11'),
(14, 'NBM-0004', 7, '2022-06-07', 3, '2022-06-06 19:55:41', '2022-06-06 19:55:41'),
(15, 'NBM-0005', 8, '2022-06-22', 10, '2022-06-22 15:36:23', '2022-06-22 15:36:23'),
(16, 'NBM-0006', 14, '2022-08-17', 2, '2022-08-16 17:45:01', '2022-08-16 17:45:01'),
(17, 'NBM-0007', 15, '2022-08-17', 5, '2022-08-16 17:45:18', '2022-08-16 17:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_25_094109_barang', 1),
(4, '2022_05_25_094233_brg_masuk', 1),
(5, '2022_05_25_094328_brg_keluar', 1),
(6, '2022_05_25_094444_kategori', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) DEFAULT 3,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Dimas', 'alipan@gmail.com', '$2y$10$5iz7Qgv8j2ljNoifHMrXBuh17pGJ4LYPQHWef8fo7DUVBrJDAMvNu', 1, '2022-06-02 08:39:08', '2022-06-02 08:39:08'),
(9, 'Inventaris', 'inventaris@gmail.com', '$2y$10$T9rGHI.shafybnxN6eYOYeb0CVMBPENcC4WCBr1CLGiaiMrUT3xta', 2, NULL, '2022-06-22 15:27:40'),
(17, 'Alipan', 'teknisi@gmail.com', '$2y$10$g4I5clGd6RY3hWB3tZz2/uy/90nHoDyRup6oFPQ0qMtq7bH/KYFcK', 3, '2022-06-22 15:28:09', '2022-06-22 15:28:09'),
(18, 'Ahmad Dwi', 'ahmad@gmail.com', '$2y$10$mQJIi7CTpZWdyPGpBwm8suAbfAdK11Lo9rQeuJuKa8mC9fQLbc7qK', 3, '2022-08-16 15:11:06', '2022-08-16 15:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
