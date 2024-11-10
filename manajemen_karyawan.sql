-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2024 pada 10.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_departemen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departemens`
--

INSERT INTO `departemens` (`id`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(7, 'Manajemen Proyek', '2024-11-09 20:22:09', '2024-11-09 20:22:09'),
(8, 'Pengembangan Produk', '2024-11-09 20:22:19', '2024-11-09 20:22:19'),
(9, 'Desan dan Pengalaman', '2024-11-09 20:22:34', '2024-11-09 20:22:34'),
(10, 'Infrastruktur TI', '2024-11-09 20:22:52', '2024-11-09 20:22:52'),
(11, 'Pengembangan Sistem', '2024-11-09 20:23:03', '2024-11-09 20:23:03'),
(12, 'IT Support', '2024-11-09 20:23:12', '2024-11-09 20:23:12'),
(13, 'Keamanan TI', '2024-11-09 20:23:26', '2024-11-09 20:23:26'),
(14, 'Teknologi Informasi', '2024-11-09 20:42:28', '2024-11-09 20:42:28'),
(15, 'Keuangan', '2024-11-10 00:49:22', '2024-11-10 00:49:22'),
(16, 'Penjualan dan Pemasaran', '2024-11-10 00:49:43', '2024-11-10 00:49:43'),
(17, 'Layanan Pelanggan', '2024-11-10 00:50:03', '2024-11-10 00:50:03'),
(18, 'Human Resource', '2024-11-10 00:50:30', '2024-11-10 00:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `bonus` int(11) NOT NULL DEFAULT 0,
  `potongan` int(11) NOT NULL DEFAULT 0,
  `total_gaji` int(11) NOT NULL,
  `bulan_tahun` date NOT NULL,
  `status` enum('Diterima','Belum Diterima') NOT NULL DEFAULT 'Belum Diterima',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gajis`
--

INSERT INTO `gajis` (`id`, `karyawan_id`, `jabatan_id`, `departemen_id`, `bonus`, `potongan`, `total_gaji`, `bulan_tahun`, `status`, `created_at`, `updated_at`) VALUES
(5, 6, 4, 11, 100000, 500000, 11600000, '2020-02-01', 'Diterima', '2024-11-09 20:56:05', '2024-11-09 21:13:44'),
(6, 7, 9, 11, 100000, 1400000, 13700000, '2020-02-01', 'Diterima', '2024-11-09 20:56:43', '2024-11-09 21:22:34'),
(7, 8, 5, 10, 450000, 160000, 10290000, '2020-02-01', 'Diterima', '2024-11-09 20:57:07', '2024-11-09 21:22:37'),
(8, 9, 9, 11, 130000, 560000, 14570000, '2020-02-01', 'Diterima', '2024-11-09 20:57:31', '2024-11-09 21:22:39'),
(9, 10, 8, 11, 200000, 150000, 8550000, '2020-02-01', 'Diterima', '2024-11-09 20:57:56', '2024-11-09 21:22:41'),
(10, 6, 4, 11, 200000, 1500000, 10700000, '2021-03-01', 'Belum Diterima', '2024-11-09 20:58:35', '2024-11-09 20:58:35'),
(11, 7, 9, 11, 130000, 800000, 14330000, '2021-03-01', 'Belum Diterima', '2024-11-09 20:59:01', '2024-11-09 20:59:01'),
(12, 8, 5, 10, 750000, 640000, 10110000, '2024-04-01', 'Belum Diterima', '2024-11-09 20:59:28', '2024-11-09 20:59:28'),
(13, 6, 4, 11, 500000, 100000, 12400000, '2024-11-09', 'Belum Diterima', '2024-11-09 21:31:12', '2024-11-09 21:31:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `gaji_pokok`, `created_at`, `updated_at`) VALUES
(4, 'Software Engineer', 12000000, '2024-11-09 20:21:31', '2024-11-09 20:21:31'),
(5, 'System Analyst', 10000000, '2024-11-09 20:21:52', '2024-11-09 20:21:52'),
(6, 'Project Manager', 18000000, '2024-11-09 20:23:53', '2024-11-09 20:23:53'),
(7, 'QA Engineer', 9000000, '2024-11-09 20:24:09', '2024-11-09 20:24:09'),
(8, 'UI/UX Designer', 8500000, '2024-11-09 20:24:26', '2024-11-09 20:24:26'),
(9, 'Database Administrator', 15000000, '2024-11-09 20:24:46', '2024-11-09 20:24:46'),
(11, 'Data Scientist', 14000000, '2024-11-10 00:59:24', '2024-11-10 00:59:24'),
(12, 'Business Analyst', 13000000, '2024-11-10 00:59:41', '2024-11-10 00:59:41'),
(13, 'Frontend Developer', 9500000, '2024-11-10 00:59:57', '2024-11-10 00:59:57'),
(14, 'Backend Developer', 10500000, '2024-11-10 01:00:09', '2024-11-10 01:00:16'),
(15, 'Cloud Engineer', 15500000, '2024-11-10 01:00:34', '2024-11-10 01:00:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` char(18) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama`, `nik`, `tempat_lahir`, `tgl_lahir`, `email`, `nohp`, `tgl_masuk`, `departemen_id`, `jabatan_id`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 'Mardhatillah', '1300920080', 'Bukittinggi', '2004-03-21', 'tilamardha@gmail.com', '085360952818', '2020-01-01', 11, 4, 'Padang', '2024-11-09 20:43:28', '2024-11-09 20:43:28'),
(7, 'Rahma Vika Safitri', '45226', 'Sungai Pua', '2003-11-26', 'vika@gmail.com', '0456687', '2020-01-01', 11, 9, 'Padang', '2024-11-09 20:44:35', '2024-11-09 20:44:35'),
(8, 'Fildzi Dafina Fathin', '152333', 'Bukittinggi', '2003-08-28', 'fildzi@gmail.com', '0856623', '2020-01-01', 10, 5, 'Bandung', '2024-11-09 20:45:44', '2024-11-09 20:45:44'),
(9, 'Mutiara Mawaddah', '225564', 'Balingka', '2004-05-30', 'tia@gmail.com', '085664', '2020-01-01', 11, 9, 'Padang', '2024-11-09 20:47:10', '2024-11-09 20:47:10'),
(10, 'Silvia', '25633', 'Balingka', '2004-03-28', 'silvi@gmail.com', '085664', '2020-01-01', 11, 8, 'Bukittinggi', '2024-11-09 20:49:54', '2024-11-09 20:49:54'),
(11, 'Tilla', '13005623', 'Bukittinggi', '2003-07-17', 'hh@gmail.com', '1828920', '2020-01-01', 8, 7, 'Bukittinggi', '2024-11-09 21:46:51', '2024-11-09 21:46:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_08_095848_create_departemens_table', 2),
(5, '2024_11_09_041225_create_jabatans_table', 3),
(6, '2024_11_09_051540_create_karyawans_table', 4),
(8, '2024_11_09_123933_create_gajis_table', 5),
(9, '2024_11_10_034054_add_foreign_keys_to_karyawans_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Aofhgcp9JnAYju9ad2II8RdEIIsm3BdoX5oJqQUy', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibE5JM3hlM05PYWZwOU9WNGFOSnNKbUtmY3pBdWl4dm5WRmVWQldWUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjt9', 1731231701);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Sabryna Hayes PhD', 'angelita29@example.com', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', '0p6OALlD4t5KrjogHa1b0DLPx94z1F4PuVWprHcwjsUxKxSBtDoOXbs6kjbV', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(2, 'Linnie Romaguera', 'sharvey@example.net', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'CfULv93aGl', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(3, 'Cooper Bins', 'uabshire@example.net', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'eiaYD6M0Bp', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(4, 'Dr. Damon Cremin', 'ziemann.kristy@example.net', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'uCdwg7uNgg', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(5, 'Mr. Brendon Howe', 'gmiller@example.net', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'APUiUEuHKy', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(6, 'Miss Tatyana Zemlak MD', 'josefina93@example.org', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'X1XKlxUMXP', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(7, 'Elenora Gaylord', 'bartoletti.christine@example.com', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'VvFAWKka1J', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(8, 'Isadore Bayer', 'kbartell@example.com', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'FxUuNXDmHc', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(9, 'Esmeralda Wehner', 'flindgren@example.com', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'XBYkh6ntT8', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(10, 'Dr. Barrett Fay DDS', 'eden.wilderman@example.net', '2024-11-08 02:56:42', '$2y$12$S2OBCoWLQPaczNufyynrAOQ95ypkf9J7JO2lAmCkO4R/jfYTvuu2u', 'NuGxo3mjxJ', '2024-11-08 02:56:42', '2024-11-08 02:56:42'),
(12, 'Mardhatillah', 'tilamardha@gmail.com', NULL, '$2y$12$baepqqOURJPRzFN7xdtGPOTeOje64GbFsg2.o48NoDWknT1vWVNA.', NULL, '2024-11-10 01:52:40', '2024-11-10 01:52:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajis_karyawan_id_foreign` (`karyawan_id`),
  ADD KEY `gajis_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `gajis_departemen_id_foreign` (`departemen_id`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawans_email_unique` (`email`),
  ADD KEY `karyawans_departemen_id_foreign` (`departemen_id`),
  ADD KEY `karyawans_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD CONSTRAINT `gajis_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gajis_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gajis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `karyawans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
