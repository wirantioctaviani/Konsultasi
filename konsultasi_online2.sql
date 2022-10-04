-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 09, 2021 at 04:35 PM
-- Server version: 8.0.22
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konsultasi_online2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

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
-- Table structure for table `migrations`
--

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
(4, '2021_04_30_070620_create_konsul_online', 1),
(5, '2021_05_01_044606_create_konsul_detail', 1),
(6, '2021_05_01_135053_create_mstr_layanan', 1),
(7, '2021_05_01_135110_create_mstr_bidang', 1),
(8, '2021_05_01_135128_create_mstr_role', 1),
(9, '2021_05_01_135148_create_mstr_pic', 1),
(10, '2021_05_01_144044_create_mstr_status', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mstr_bidang`
--

CREATE TABLE `mstr_bidang` (
  `id_bidang` int UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subbid_id` int NOT NULL,
  `bidang_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstr_bidang`
--

INSERT INTO `mstr_bidang` (`id_bidang`, `nama_bidang`, `subbid_id`, `bidang_id`) VALUES
(1, 'Pengembangan Pembinaan', 11, 1),
(2, 'Fasilitasi Penerapan JFA', 12, 1),
(3, 'Sertifikasi', 21, 2),
(4, 'Pengelolaan Data', 22, 2),
(5, 'Program & Evaluasi', 32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mstr_layanan`
--

CREATE TABLE `mstr_layanan` (
  `id_layanan` int UNSIGNED NOT NULL,
  `jenis_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subbid_id` int NOT NULL,
  `bidang_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstr_layanan`
--

INSERT INTO `mstr_layanan` (`id_layanan`, `jenis_layanan`, `subbid_id`, `bidang_id`) VALUES
(1, 'Formasi atau perhitungan kebutuhan JFA', 11, 1),
(2, 'Pengangkatan ke dalam JFA', 12, 1),
(3, 'Diklat dan sertifikasi', 21, 2),
(4, 'Penetapan dan Penilaian Angka Kredit', 32, 3),
(5, 'SIBIJAK', 22, 2),
(6, 'Pendaftaran Ujian', 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mstr_pic`
--

CREATE TABLE `mstr_pic` (
  `id_mstr_pic` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_layanan` int UNSIGNED NOT NULL,
  `id_bidang` int UNSIGNED NOT NULL,
  `id_role` int UNSIGNED NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstr_pic`
--

INSERT INTO `mstr_pic` (`id_mstr_pic`, `id_user`, `id_layanan`, `id_bidang`, `id_role`, `is_active`) VALUES
(2, 997, 4, 3, 1, 1),
(5, 1000, 4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mstr_role`
--

CREATE TABLE `mstr_role` (
  `id_role` int UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstr_role`
--

INSERT INTO `mstr_role` (`id_role`, `nama_role`, `desc_role`) VALUES
(1, 'admin', 'admin'),
(2, 'subkoordinator', 'subkoordinator bidang'),
(3, 'pic', 'pic bidang'),
(4, 'koordinator', 'koordinator bidang');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_status`
--

CREATE TABLE `mstr_status` (
  `id_status` bigint UNSIGNED NOT NULL,
  `nama_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstr_status`
--

INSERT INTO `mstr_status` (`id_status`, `nama_status`) VALUES
(1, 'Case Open'),
(2, 'Waiting For Subkoor\'s Approval'),
(3, 'Approved by Subkoor'),
(4, 'Case Closed');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsul_detail`
--

CREATE TABLE `tb_konsul_detail` (
  `id_detail` bigint UNSIGNED NOT NULL,
  `no_tiket` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_konsul` bigint UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_answered` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_konsul_detail`
--

INSERT INTO `tb_konsul_detail` (`id_detail`, `no_tiket`, `id_konsul`, `detail`, `dokumen`, `jawaban`, `created_by`, `is_answered`, `created_at`, `updated_at`) VALUES
(1, 'KO001', 1, 'cfvghjk', '', '', 'wiranti', 0, '2021-05-01 15:02:58', '0000-00-00 00:00:00'),
(2, 'KO002', 2, 'sertifikasi', '', '', 'wiranti', 0, '2021-05-03 07:03:31', '0000-00-00 00:00:00'),
(3, 'KO003', 3, 'Formasi', '', '', 'wiranti', 0, '2021-05-04 07:12:05', '0000-00-00 00:00:00'),
(4, 'KO004', 4, 'hfgbdvfd', '', '', 'wiranti', 0, '2021-05-04 07:33:51', '0000-00-00 00:00:00'),
(5, 'KO005', 5, 'vdsca', '', '', 'wiranti', 0, '2021-05-04 07:34:15', '0000-00-00 00:00:00'),
(6, 'KO006', 6, 'hgfd', '', '', 'wiranti', 0, '2021-05-04 14:57:18', '0000-00-00 00:00:00'),
(7, 'KO007', 7, 'vdcsx', '', '', 'wiranti', 0, '2021-05-05 04:09:12', '0000-00-00 00:00:00'),
(8, 'KO008', 8, 'ecdx', '', '', 'wiranti', 0, '2021-05-05 04:11:34', '0000-00-00 00:00:00'),
(9, 'KO009', 9, 'fedsa', '', '', 'wiranti', 0, '2021-05-05 04:13:00', '0000-00-00 00:00:00'),
(10, 'KO010', 10, 'ervdc', '', '', 'wiranti', 0, '2021-05-05 04:19:39', '0000-00-00 00:00:00'),
(11, 'KO011', 11, 'vgbhnj', '', '', 'wiranti', 0, '2021-05-05 06:29:53', '0000-00-00 00:00:00'),
(12, 'KO012', 12, 'nhbgfdv', '', '', 'wiranti', 0, '2021-05-05 06:34:08', '0000-00-00 00:00:00'),
(13, 'KO013', 13, 'uhygt', '', '', 'wiranti', 0, '2021-05-05 06:35:08', '0000-00-00 00:00:00'),
(14, 'KO014', 14, 'hbtgvf', '', '', 'wiranti', 0, '2021-05-05 06:35:56', '0000-00-00 00:00:00'),
(15, 'KO015', 2, 'oke', '', NULL, 'josephine', 1, '2021-05-06 07:15:55', '2021-05-06 07:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsul_online`
--

CREATE TABLE `tb_konsul_online` (
  `id_konsul` bigint UNSIGNED NOT NULL,
  `no_tiket` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subbid_id` int NOT NULL,
  `id_pic` int NOT NULL,
  `id_koor` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_status` int NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_konsul_online`
--

INSERT INTO `tb_konsul_online` (`id_konsul`, `no_tiket`, `nama`, `jabatan`, `unit_kerja`, `no_hp`, `email`, `id_layanan`, `judul`, `subbid_id`, `id_pic`, `id_koor`, `created_at`, `updated_at`, `id_status`, `created_by`) VALUES
(1, 'KO001', 'wiranti.octaviani@gmail.com', 'Prakom', 'Pusbin JFA', '081932097921', 'wiranti.octaviani@yahoo.com', 1, 'sibijak', 11, 2, 1000, '2021-05-01 15:02:56', '2021-05-01 15:02:56', 4, 'wiranti'),
(2, 'KO002', 'Reagan Tanaka', 'Auditor', 'BPKP', '081932097921', 'reagan.tanaka@gmail.com', 1, 'Sertifikasi', 11, 3, 1000, '2021-05-03 07:03:31', '2021-05-03 07:03:31', 1, 'wiranti'),
(3, 'KO003', 'Siena Tjahrir', 'Auditor', 'Kemenkeu', '082237439747', 'siena.tjahrir@tjahrircorps.com', 1, 'Formasi JFA', 11, 2, 1000, '2021-05-04 07:12:05', '2021-05-04 07:12:05', 1, 'wiranti'),
(4, 'KO004', 'Wiranti', 'prakom', 'BPK', '081932097921', 'wiranti.octaviani@gmail.com', 1, 'pengangkatan', 11, 4, 1000, '2021-05-04 07:33:51', '2021-05-04 07:33:51', 1, 'wiranti'),
(5, 'KO005', 'Anggita', 'Teknisi', 'Kemenkeu', '082237439747', 'anggita@gmail.com', 1, 'pengangkatan', 11, 3, 1000, '2021-05-04 07:34:15', '2021-05-04 07:34:15', 1, 'wiranti'),
(6, 'KO006', 'Wiranti', 'Auditor', 'Pusbin JFA', '081932097921', 'wiranti.octaviani@gmail.com', 1, 'Formasi JFA', 11, 4, 1000, '2021-05-04 14:57:18', '2021-05-04 14:57:18', 1, 'wiranti'),
(7, 'KO007', 'Leny', 'Sekretaris', 'MKOT', '081932097921', 'leny@gmail.com', 1, 'Formasi JFA', 11, 997, 1001, '2021-05-05 04:09:12', '2021-05-05 04:09:12', 1, 'wiranti'),
(8, 'KO008', 'Wiranti', 'Auditor', 'Pusbin JFA', '081932097921', 'wiranti.octaviani@gmail.com', 1, 'Angka Kredit', 11, 997, 1001, '2021-05-05 04:11:34', '2021-05-05 04:11:34', 1, 'wiranti'),
(9, 'KO009', 'Haru tanaka', 'Auditor', 'Deputi 1', '081932097921', 'haru.tanaka@gmail.com', 1, 'Formasi JFA', 11, 2, 1001, '2021-05-05 04:13:00', '2021-05-05 04:13:00', 1, 'wiranti'),
(10, 'KO010', 'Wiranti', 'Auditor', 'Pusbin JFA', '081932097921', 'wiranti.octaviani@gmail.com', 1, 'Formasi JFA', 11, 3, 1001, '2021-05-05 04:19:39', '2021-05-05 04:19:39', 1, 'wiranti'),
(11, 'KO011', 'Wiranti', 'Prakom', 'Pusbin JFA', '081932097921', 'wiranti.octaviani@gmail.com', 2, 'Angka Kredit', 12, 1000, 991, '2021-05-05 06:29:51', '2021-05-05 06:29:51', 1, 'wiranti'),
(12, 'KO012', 'Septiani Annisa', 'Teknisi', 'BPK', '081932097921', 'shiviiasamantha@yahoo.com', 2, 'Formasi JFA', 12, 1002, 991, '2021-05-05 06:34:08', '2021-05-05 06:34:08', 1, 'wiranti'),
(13, 'KO013', 'Wiranti', 'Prakom', 'Pusbin JFA', '082237439747', 'wiranti.octaviani@yahoo.com', 2, 'Angka Kredit', 12, 1003, 991, '2021-05-05 06:35:08', '2021-05-05 06:35:08', 1, 'wiranti'),
(14, 'KO014', 'Wiranti', 'Sekretaris', 'Kemenkeu', '081932097921', 'wiranti.octaviani@yahoo.com', 2, 'pengangkatan', 12, 1000, 991, '2021-05-05 06:35:56', '2021-05-05 06:35:56', 1, 'wiranti'),
(15, NULL, 'Wiranti', 'Prakom', 'Pusbin JFA', '081932097921', 'wiranti.octaviani@gmail.com', 1, 'Formasi JFA', 11, 2, 1001, '2021-05-09 06:51:10', '2021-05-09 06:51:10', 1, 'wiranti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subbid_id` int NOT NULL,
  `bidang_id` int NOT NULL,
  `is_active` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `subbid_id`, `bidang_id`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wiranti Octaviani', 'wiranti.octaviani', 'wiranti.octaviani@gmail.com', NULL, '$2y$10$W8Zu1n0.E4MVwKy0Wkebme0l/ss7mXc/oQF3npRUK9SUlbFkKVQZy', 'admin', 22, 2, 1, NULL, '2021-05-01 15:04:35', '2021-05-01 15:04:35'),
(2, 'Anggita Khaerunisa', 'anggita.k', 'anggita@gmail.com', NULL, '$2y$12$v9HCbJ/Q0C/nFtQtS5sx4..bkeIOjjY.A193Tri4HSM2K67acl2zG', 'pic', 11, 1, 1, NULL, '2021-05-01 15:11:10', '2021-05-01 15:11:10'),
(3, 'josephine', 'josephine', 'josephine@gmail.com', NULL, '$2y$12$v9HCbJ/Q0C/nFtQtS5sx4..bkeIOjjY.A193Tri4HSM2K67acl2zG', 'pic', 11, 1, 1, NULL, '2021-05-01 15:13:08', '2021-05-01 15:13:08'),
(4, 'chaca', 'chaca.s', 'chaca@gmail.com', NULL, '$2y$12$v9HCbJ/Q0C/nFtQtS5sx4..bkeIOjjY.A193Tri4HSM2K67acl2zG', 'pic', 11, 1, 1, NULL, '2021-05-01 15:15:10', '2021-05-01 15:15:10'),
(991, 'Sudirman', 'sudirman', 'sudirman@gmail.com', NULL, '$2y$12$v9HCbJ/Q0C/nFtQtS5sx4..bkeIOjjY.A193Tri4HSM2K67acl2zG', 'koordinator', 21, 2, 1, NULL, '2021-05-01 15:13:08', '2021-05-01 15:13:08'),
(997, 'Alexander Alden', 'alex.alden', 'alex.alden@alden.com', NULL, '$2y$10$iaMkB9TP0MF7Jno//OLsBetw0b3fZoCnC0Zdd27p0RFL27ZkeTUi.', 'pic', 11, 1, 1, 'a8j3Yu9aUy41OUUfUs0S7ckVZVL6TkwBNA9at0FA9seV1Rqui27kBwnGiXxD', '2021-05-02 07:12:17', '2021-05-02 07:12:17'),
(1000, 'wayan', 'wayan.p', 'wayan@gmail.com', NULL, '$2y$10$l.EZNF.Mftryd9FyVqKCuOO1SwJw/MP8eHvLb4SXBTUYlmdbAu5jK', 'pic', 12, 1, 1, 'peBvmABUVeznu77W0Y9PyGRoci5Az3rME1tgMQ1AX3A6n2v7QLiV47xa8AXN', '2021-05-02 07:27:38', '2021-05-02 07:27:38'),
(1001, 'Danielle Maziar', 'danielle.m', 'danielle.m@gmail.com', NULL, '$2y$10$gllThPfxR2RydlKxIOUxnuwZm2zOySfawdeSgUEpb2JMl2S13YVs.', 'subkoordinator', 11, 1, 1, 'BqdCUh5M5d5iO96jULYRH4yrXibKALvRAKVgEvB0sEwCqk4JO7S6y5YjsDgu', '2021-05-04 04:15:34', '2021-05-04 04:15:34'),
(1002, 'Samuel Achaari', 'samuel.a', 'samuel@achaari.com', NULL, '$2y$10$8Xj3qw7ESkn2VPq1xGrzkuGEAOSA8jtKej0XeHUG9rPYcpmJOPLeO', 'pic', 12, 1, 1, 'FWzii15iD6xKVhxcNc9Q565hpRkHcz9OyME6yZSxVrqfwsP6g40c5zRacPoY', '2021-05-05 06:31:34', '2021-05-05 06:31:34'),
(1003, 'Nina Maziyar', 'nina.maziyar', 'nina.maziyar@gmail.com', NULL, '$2y$10$rU7C6zXibszg5pup/7T2seTbDYt1J5Fv6vaRVE1GUvELteQZMRBjS', 'pic', 12, 1, 1, 'ppLEzDmkfHM3nDeMzc62MU61ycEelvXoJKrRPkzwKPNRmOPUDD4WPyCEsRuQ', '2021-05-05 06:32:54', '2021-05-05 06:32:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mstr_bidang`
--
ALTER TABLE `mstr_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `mstr_layanan`
--
ALTER TABLE `mstr_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `mstr_pic`
--
ALTER TABLE `mstr_pic`
  ADD PRIMARY KEY (`id_mstr_pic`),
  ADD KEY `mstr_pic_id_user_foreign` (`id_user`),
  ADD KEY `mstr_pic_id_layanan_foreign` (`id_layanan`),
  ADD KEY `mstr_pic_id_bidang_foreign` (`id_bidang`),
  ADD KEY `mstr_pic_id_role_foreign` (`id_role`);

--
-- Indexes for table `mstr_role`
--
ALTER TABLE `mstr_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `mstr_status`
--
ALTER TABLE `mstr_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_konsul_detail`
--
ALTER TABLE `tb_konsul_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `tb_konsul_detail_id_konsul_foreign` (`id_konsul`);

--
-- Indexes for table `tb_konsul_online`
--
ALTER TABLE `tb_konsul_online`
  ADD PRIMARY KEY (`id_konsul`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mstr_bidang`
--
ALTER TABLE `mstr_bidang`
  MODIFY `id_bidang` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mstr_layanan`
--
ALTER TABLE `mstr_layanan`
  MODIFY `id_layanan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mstr_pic`
--
ALTER TABLE `mstr_pic`
  MODIFY `id_mstr_pic` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mstr_role`
--
ALTER TABLE `mstr_role`
  MODIFY `id_role` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mstr_status`
--
ALTER TABLE `mstr_status`
  MODIFY `id_status` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_konsul_detail`
--
ALTER TABLE `tb_konsul_detail`
  MODIFY `id_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_konsul_online`
--
ALTER TABLE `tb_konsul_online`
  MODIFY `id_konsul` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mstr_pic`
--
ALTER TABLE `mstr_pic`
  ADD CONSTRAINT `mstr_pic_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `mstr_bidang` (`id_bidang`),
  ADD CONSTRAINT `mstr_pic_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `mstr_layanan` (`id_layanan`),
  ADD CONSTRAINT `mstr_pic_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `mstr_role` (`id_role`),
  ADD CONSTRAINT `mstr_pic_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `tb_konsul_detail`
--
ALTER TABLE `tb_konsul_detail`
  ADD CONSTRAINT `tb_konsul_detail_id_konsul_foreign` FOREIGN KEY (`id_konsul`) REFERENCES `tb_konsul_online` (`id_konsul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
