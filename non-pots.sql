-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2025 pada 03.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indibiz`
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
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `nama_category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category_id`, `nama_category`, `created_at`, `updated_at`) VALUES
(1, 'ASTINET', '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(2, 'IP_TRANSIT', '2025-07-20 18:14:57', '2025-07-20 18:14:57');

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
(4, '2025_07_16_033541_create_categories_table', 1),
(5, '2025_07_16_033933_create_products_table', 1),
(6, '2025_07_16_034635_create_otc_table', 1),
(7, '2025_07_17_044329_product_otc', 1),
(8, '2025_07_17_044414_create_product_otc_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `otc`
--

CREATE TABLE `otc` (
  `id_OTC` bigint(20) UNSIGNED NOT NULL,
  `category_OTC` varchar(255) NOT NULL,
  `price_OTC` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `otc`
--

INSERT INTO `otc` (`id_OTC`, `category_OTC`, `price_OTC`, `created_at`, `updated_at`) VALUES
(1, 'FREE/MO', 0.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(2, 'AO DISCOUNT', 150000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(3, 'AO NORMAL', 500000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57');

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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `nama_product`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '1S - INET ONLY (50 Mbps)', 439000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(2, 1, '1S - INET ONLY (75 Mbps)', 519000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(3, 1, '1S - INET ONLY (100 Mbps)', 669000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(4, 1, '1S - INET ONLY (150 Mbps)', 819000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(5, 1, '1S - INET ONLY (200 Mbps)', 1049000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(6, 1, '1S - INET ONLY (300 Mbps)', 1499000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(7, 1, '2S - INET + VOICE (50 Mbps)', 479000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(8, 1, '2S - INET + VOICE (75 Mbps)', 559000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(9, 1, '2S - INET + VOICE (100 Mbps)', 709000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(10, 1, '2S - INET + VOICE (150 Mbps)', 859000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(11, 1, '2S - INET + VOICE (200 Mbps)', 1089000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(12, 1, '2S - INET + VOICE (300 Mbps)', 1539000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(13, 1, '2S - INET + IPTV (50 Mbps)', 639000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(14, 1, '2S - INET + IPTV (75 Mbps)', 719000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(15, 1, '2S - INET + IPTV (100 Mbps)', 869000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(16, 1, '2S - INET + IPTV (150 Mbps)', 1019000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(17, 1, '2S - INET + IPTV (200 Mbps)', 1249000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(18, 1, '2S - INET + IPTV (300 Mbps)', 1699000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(19, 1, '2S - INET + NETMONK (50 Mbps)', 465000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(20, 1, '2S - INET + NETMONK (75 Mbps)', 545000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(21, 1, '2S - INET + NETMONK (100 Mbps)', 695000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(22, 1, '2S - INET + NETMONK (150 Mbps)', 845000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(23, 1, '2S - INET + NETMONK (200 Mbps)', 1075000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(24, 1, '2S - INET + NETMONK (300 Mbps)', 1559000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(25, 1, '2S - INET + OCA (50 Mbps)', 543000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(26, 1, '2S - INET + OCA (75 Mbps)', 623000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(27, 1, '2S - INET + OCA (100 Mbps)', 773000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(28, 1, '2S - INET + OCA (150 Mbps)', 923000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(29, 1, '2S - INET + OCA (200 Mbps)', 1153000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(30, 1, '2S - INET + OCA (300 Mbps)', 1603000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(31, 1, '2S - INET + PIJAR (50 Mbps)', 1022000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(32, 1, '2S - INET + PIJAR (75 Mbps)', 1102000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(33, 1, '2S - INET + PIJAR (100 Mbps)', 1252000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(34, 1, '2S - INET + PIJAR (150 Mbps)', 1402000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(35, 1, '2S - INET + PIJAR (200 Mbps)', 1632000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(36, 1, '2S - INET + PIJAR (300 Mbps)', 2082000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(37, 1, '3S - INET + TELP & IPTV (50 Mbps)', 664000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(38, 1, '3S - INET + TELP & IPTV (75 Mbps)', 744000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(39, 1, '3S - INET + TELP & IPTV (100 Mbps)', 894000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(40, 1, '3S - INET + TELP & IPTV (150 Mbps)', 1044000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(41, 1, '3S - INET + TELP & IPTV (200 Mbps)', 1274000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(42, 1, '3S - INET + TELP & IPTV (300 Mbps)', 1724000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(43, 1, '3S - INET + VOICE & NETMONK (50 Mbps)', 506000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(44, 1, '3S - INET + VOICE & NETMONK (75 Mbps)', 586000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(45, 1, '3S - INET + VOICE & NETMONK (100 Mbps)', 736000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(46, 1, '3S - INET + VOICE & NETMONK (150 Mbps)', 886000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(47, 1, '3S - INET + VOICE & NETMONK (200 Mbps)', 1116000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(48, 1, '3S - INET + VOICE & NETMONK (300 Mbps)', 1566000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(49, 1, '3S - INET + VOICE & OCA (50 Mbps)', 582950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(50, 1, '3S - INET + VOICE & OCA (75 Mbps)', 662950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(51, 1, '3S - INET + VOICE & OCA (100 Mbps)', 812950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(52, 1, '3S - INET + VOICE & OCA (150 Mbps)', 962950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(53, 1, '3S - INET + VOICE & OCA (200 Mbps)', 1192950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(54, 1, '3S - INET + VOICE & OCA (300 Mbps)', 1642950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(55, 1, '3S - INET + VOICE & PIJAR (50 Mbps)', 1034000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(56, 1, '3S - INET + VOICE & PIJAR (75 Mbps)', 1114000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(57, 1, '3S - INET + VOICE & PIJAR (100 Mbps)', 1264000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(58, 1, '3S - INET + VOICE & PIJAR (150 Mbps)', 1414000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(59, 1, '3S - INET + VOICE & PIJAR (200 Mbps)', 1644000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(60, 1, '3S - INET + VOICE & PIJAR (300 Mbps)', 2094000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(61, 2, 'NETMONK', 60000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(62, 2, 'OCA', 103950.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(63, 2, 'MESH WIFI', 29000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(64, 2, 'TOMPS', 50000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(65, 2, 'PIJAR', 555000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57'),
(66, 2, 'VOICE', 40000.00, '2025-07-20 18:14:57', '2025-07-20 18:14:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_otc`
--

CREATE TABLE `product_otc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `otc_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('ECJV0cvHEnD9m3WHQwD44XyJITwQ8X51RcPstqBo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2JNQjFOR1Vxa1ZLNzJFVXJSOTBBVzQ5bWx2MU9xYURUT3FyblJlaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYWxjdWxhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753084813),
('pH9oohPRQAZfXzZk1cSmHunKIgwhwdmQ2nW3mwlX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkNoRlRDQmRPN0dDemxUMk9ZUFc3aEg3NkJBdXFoT0JhOUN4c2lUZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYWxjdWxhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753246434),
('r4ZKxN49e6LHIGsDceCO0qc0SKkc2vymxlyoowke', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3JJTHJaeGdPdWJ2eW1JbHMxbFAxS3hMcnp2d1hneTl4VWJlUmNobiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYWxjdWxhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753259678),
('viZI7v7g6rjiIKKiQPBHmcW9ddZeoXeOcov0XDWO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXIyZGNSYjhMd1F0N2FMd2I3Y0FTVlRVTmJxM2pnam9tY05abE1XZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYWxjdWxhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753237077),
('zYUGoW80FnzrGsiY4IDOfU4t08R8RlM2okCz6b0D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTRHQTV1dVdGQlBxcnpWR2hIcFpyQm55NHJlamozOVpYUjBuSUViRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYWxjdWxhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753065729);

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
(1, 'Test User', 'test@example.com', '2025-07-20 18:14:56', '$2y$12$94aJVOL5.I9VXXZExiovW.EnJ1jU7c3SdyJoM/Wdjbsj/4YnCQwQq', '0Rz8ZbNVyl', '2025-07-20 18:14:57', '2025-07-20 18:14:57');

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
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `otc`
--
ALTER TABLE `otc`
  ADD PRIMARY KEY (`id_OTC`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `product_otc`
--
ALTER TABLE `product_otc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_otc_product_id_foreign` (`product_id`),
  ADD KEY `product_otc_otc_id_foreign` (`otc_id`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `otc`
--
ALTER TABLE `otc`
  MODIFY `id_OTC` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `product_otc`
--
ALTER TABLE `product_otc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_otc`
--
ALTER TABLE `product_otc`
  ADD CONSTRAINT `product_otc_otc_id_foreign` FOREIGN KEY (`otc_id`) REFERENCES `otc` (`id_OTC`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_otc_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
