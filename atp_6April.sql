-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2021 pada 05.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesanans`
--

CREATE TABLE `detailpesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detailpesanans`
--

INSERT INTO `detailpesanans` (`id`, `produk_id`, `pesanan_id`, `jumlah`, `harga_produk`, `created_at`, `updated_at`) VALUES
(15, '3', 15, 2, 30000, '2021-04-02 23:32:49', '2021-04-02 23:32:49'),
(16, '1', 15, 1, 100000, '2021-04-02 23:33:13', '2021-04-02 23:33:13'),
(17, '2', 16, 2, 20000, '2021-04-02 23:36:00', '2021-04-02 23:36:00'),
(18, '1', 17, 1, 100000, '2021-04-02 23:52:25', '2021-04-02 23:52:25'),
(21, '2', 18, 1, 10000, '2021-04-03 00:11:07', '2021-04-03 00:11:07'),
(22, '3', 19, 8, 120000, '2021-04-04 21:03:48', '2021-04-04 21:37:03'),
(23, '2', 19, 3, 30000, '2021-04-04 21:40:08', '2021-04-04 21:40:08'),
(24, '1', 19, 1, 100000, '2021-04-04 21:41:07', '2021-04-04 21:41:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_27_061602_create_produks_table', 1),
(6, '2021_03_27_062813_create_detailpesanans_table', 1),
(7, '2021_03_27_062533_create_pesanans_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `tanggal`, `status`, `total_harga`, `created_at`, `updated_at`) VALUES
(15, 1, '2021-04-03', '1', 130000, '2021-04-02 23:32:49', '2021-04-02 23:33:25'),
(16, 1, '2021-04-03', '1', 20000, '2021-04-02 23:36:00', '2021-04-02 23:50:44'),
(17, 1, '2021-04-03', '1', 100000, '2021-04-02 23:52:25', '2021-04-02 23:53:28'),
(18, 1, '2021-04-03', '0', 10000, '2021-04-02 23:58:11', '2021-04-03 00:11:07'),
(19, 2, '2021-04-05', '1', 250000, '2021-04-04 21:03:48', '2021-04-04 21:41:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `harga`, `stok`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'cabai', 100000, 37, 'cabai.jpg', 'cabai mahal', NULL, '2021-04-04 21:41:21'),
(2, 'wortel', 10000, 25, 'wortel.jpg', 'wortel sehat bagi mata', NULL, '2021-04-04 21:41:21'),
(3, 'brokoli', 15000, 10, 'brokoli.jpg', 'brokoli sayuran yang menyehatkan', NULL, '2021-04-04 21:41:21'),
(5, 'Paprika', 90000, 30, '744710335.jpg', 'Paprika eropa maknyus', '2021-04-05 07:50:11', '2021-04-05 07:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'riskiida', 'risdaagustiyan@gmail.com', NULL, '$2y$10$SJbFyOlH2yPj2nqqdjO4HOYoESFWWNxY/y7oxISGDAL7EYPiWio5S', NULL, NULL, 'user', 'gUVWOwh9T483tKM0kayANhbGjr1J4WhtDpHdtBFNNnIabiUOUN42nq0SOCFq', '2021-03-27 03:00:33', '2021-03-27 03:00:33'),
(2, 'M. Aliyya Ilmi', 'muhammadaliyya19@gmail.com', NULL, '$2y$10$Ghw1AOSsAhVTkyd5KW7kq.8FGiU5/K7ER.0p4n5hvC5Xad8PD0h2a', NULL, NULL, 'user', NULL, '2021-04-04 20:45:10', '2021-04-04 20:45:10'),
(3, 'Admin ATP', 'admin@atp.com', NULL, '$2y$10$kTbiNSeGXBEPwKEUv7/9wuwWzz1ZK1A5XCDXsfFPqw28KLDQfWFxO', NULL, NULL, 'admin', NULL, '2021-04-04 23:28:13', '2021-04-04 23:28:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpesanans`
--
ALTER TABLE `detailpesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpesanans`
--
ALTER TABLE `detailpesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
