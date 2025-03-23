-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.40 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project-absensi
CREATE DATABASE IF NOT EXISTS `project-absensi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project-absensi`;

-- Dumping structure for table project-absensi.absensi_hadirs
CREATE TABLE IF NOT EXISTS `absensi_hadirs` (
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_tanggal` date NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `kelas` bigint NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `waktu_datang` time NOT NULL,
  `waktu_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `absensi_hadirs_uid_unique` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_hadirs: ~3 rows (approximately)
INSERT INTO `absensi_hadirs` (`uid`, `hari_tanggal`, `username`, `role_id`, `kelas`, `jurusan`, `status`, `waktu_datang`, `waktu_pulang`, `created_at`, `updated_at`) VALUES
	('U003', '2025-03-22', 'siswa1', 3, 11, 'Teknik Elektro', 0, '07:00:00', '15:00:00', '2025-03-22 06:36:48', '2025-03-22 06:36:48'),
	('U004', '2025-03-22', 'siswa2', 3, 11, 'Teknik Mesin', 0, '07:00:00', '15:00:00', '2025-03-22 06:36:48', '2025-03-22 06:36:48'),
	('U005', '2025-03-22', 'siswa3', 3, 12, 'Teknik Sipil', 0, '07:00:00', '15:00:00', '2025-03-22 06:36:48', '2025-03-22 06:36:48');

-- Dumping structure for table project-absensi.absensi_tidak_hadirs
CREATE TABLE IF NOT EXISTS `absensi_tidak_hadirs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_tanggal` date NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_tidak_hadirs: ~2 rows (approximately)
INSERT INTO `absensi_tidak_hadirs` (`id`, `uid`, `username`, `role_id`, `kelas`, `jurusan`, `hari_tanggal`, `alasan`, `created_at`, `updated_at`) VALUES
	(1, 'U006', 'siswa4', 3, '10', 'Teknik Listrik', '2025-03-22', 'izin', '2025-03-22 06:36:48', '2025-03-22 06:36:48'),
	(2, 'U005', 'siswa3', 3, '12', 'Teknik Sipil', '2025-03-22', 'sakit', '2025-03-22 06:36:48', '2025-03-22 06:36:48');

-- Dumping structure for table project-absensi.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.cache: ~0 rows (approximately)

-- Dumping structure for table project-absensi.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.cache_locks: ~0 rows (approximately)

-- Dumping structure for table project-absensi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table project-absensi.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `praktek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline_hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.jadwal: ~0 rows (approximately)

-- Dumping structure for table project-absensi.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.jobs: ~0 rows (approximately)

-- Dumping structure for table project-absensi.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.job_batches: ~0 rows (approximately)

-- Dumping structure for table project-absensi.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.kegiatan: ~7 rows (approximately)
INSERT INTO `kegiatan` (`id`, `hari`, `tanggal`, `kegiatan`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-17', 'Kegiatan untuk Senin', '2025-03-22 06:58:14', '2025-03-22 06:58:14'),
	(2, 'Selasa', '2025-03-18', 'Kegiatan untuk Selasa', '2025-03-22 06:58:14', '2025-03-22 06:58:14'),
	(3, 'Rabu', '2025-03-19', 'Kegiatan untuk Rabu', '2025-03-22 06:58:14', '2025-03-22 06:58:14'),
	(4, 'Kamis', '2025-03-20', 'Kegiatan untuk Kamis', '2025-03-22 06:58:14', '2025-03-22 06:58:14'),
	(5, 'Jumat', '2025-03-21', 'Kegiatan untuk Jumat', '2025-03-22 06:58:14', '2025-03-22 06:58:14'),
	(6, 'Sabtu', '2025-03-22', 'Kegiatan untuk Sabtu', '2025-03-22 06:58:14', '2025-03-22 06:58:14'),
	(7, 'Minggu', '2025-03-23', 'Kegiatan untuk Minggu', '2025-03-22 06:58:14', '2025-03-22 06:58:14');

-- Dumping structure for table project-absensi.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_absen` timestamp NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.log: ~0 rows (approximately)

-- Dumping structure for table project-absensi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.migrations: ~14 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_02_08_143034_create_absensi_hadirs_table', 1),
	(5, '2025_02_08_143045_create_absensi_tidak_hadirs_table', 1),
	(6, '2025_02_10_235544_create_roles_table', 1),
	(7, '2025_02_28_131704_create_personal_access_tokens_table', 1),
	(8, '2025_03_02_092533_create_waktus_table', 1),
	(9, '2025_03_07_121535_create_jadwal_table', 1),
	(10, '2025_03_14_033349_create_log_table', 1),
	(11, '2025_03_22_122945_create_tugas_table', 1),
	(12, '2025_03_22_124826_create_praktek_table', 1),
	(13, '2025_03_22_125605_create_kegiatan_table', 1),
	(14, '2025_03_22_134005_create_alasan_table', 2);

-- Dumping structure for table project-absensi.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table project-absensi.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table project-absensi.praktek
CREATE TABLE IF NOT EXISTS `praktek` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `praktek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.praktek: ~7 rows (approximately)
INSERT INTO `praktek` (`id`, `hari`, `tanggal`, `praktek`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-17', 'Praktek untuk Senin depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06'),
	(2, 'Selasa', '2025-03-18', 'Praktek untuk Selasa depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06'),
	(3, 'Rabu', '2025-03-19', 'Praktek untuk Rabu depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06'),
	(4, 'Kamis', '2025-03-20', 'Praktek untuk Kamis depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06'),
	(5, 'Jumat', '2025-03-21', 'Praktek untuk Jumat depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06'),
	(6, 'Sabtu', '2025-03-22', 'Praktek untuk Sabtu depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06'),
	(7, 'Minggu', '2025-03-23', 'Praktek untuk Minggu depan', '2025-03-22 06:58:06', '2025-03-22 06:58:06');

-- Dumping structure for table project-absensi.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2025-03-22 06:36:47', '2025-03-22 06:36:47'),
	(2, 'guru', '2025-03-22 06:36:47', '2025-03-22 06:36:47'),
	(3, 'siswa', '2025-03-22 06:36:47', '2025-03-22 06:36:47');

-- Dumping structure for table project-absensi.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.sessions: ~0 rows (approximately)

-- Dumping structure for table project-absensi.tugas
CREATE TABLE IF NOT EXISTS `tugas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.tugas: ~8 rows (approximately)
INSERT INTO `tugas` (`id`, `hari`, `tanggal`, `tugas`, `deadline_hari`, `deadline_tanggal`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-17', 'Tugas untuk Senin', 'Kamis', '2025-03-20', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(2, 'Selasa', '2025-03-18', 'Tugas untuk Selasa', 'Jumat', '2025-03-21', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(3, 'Rabu', '2025-03-19', 'Tugas untuk Rabu', 'Sabtu', '2025-03-22', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(4, 'Kamis', '2025-03-20', 'Tugas untuk Kamis', 'Minggu', '2025-03-23', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(5, 'Jumat', '2025-03-21', 'Tugas untuk Jumat', 'Senin', '2025-03-24', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(6, 'Sabtu', '2025-03-22', 'Tugas untuk Sabtu', 'Selasa', '2025-03-25', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(7, 'Minggu', '2025-03-23', 'Tugas untuk Minggu', 'Rabu', '2025-03-26', '2025-03-22 06:58:20', '2025-03-22 06:58:20'),
	(9, 'Jumat', '2025-03-23', 'tugas jumat', 'Jumat', '2025-03-14', NULL, NULL);

-- Dumping structure for table project-absensi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uid_unique` (`uid`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.users: ~8 rows (approximately)
INSERT INTO `users` (`id`, `uid`, `username`, `jurusan`, `kelas`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
	(1, 'U001', 'admin', 'Teknik Informatika', 12, 1, 'admin@gmail.com', NULL, '$2y$12$.JN/5XsxMVWJZNq4H3P/COwhAYFC2/3WiZkEEdh21cAPfvU10qMRy', 'YYWnGdAkqs9NxwdfwLJ3tGXatJPUO63TbPoS69hcQAHk84QYBntczMxJTgrs', '2025-03-22 06:36:47', '2025-03-22 06:36:47', NULL),
	(2, 'U002', 'guru1', 'Matematika', 0, 2, 'guru@gmail.com', NULL, '$2y$12$JkCAyy63WpPH5FjJOMHFz.kzRTbgtxFr1uFBQ3dFrqLNu9mNEDeTO', NULL, '2025-03-22 06:36:47', '2025-03-22 06:36:47', NULL),
	(3, 'U003', 'siswa1', 'Teknik Elektro', 11, 3, 'siswa@gmail.com', NULL, '$2y$12$xCEK7xP9L06ULXz9oqreYu0n0u.NbLAS90sDM12T92/3nZ7KAsCHy', NULL, '2025-03-22 06:36:48', '2025-03-22 06:36:48', NULL),
	(4, 'U004', 'siswa2', 'Teknik Mesin', 11, 3, 'siswa2@gmail.com', NULL, '$2y$12$8zHaOSHcFvHHVCHvklFTw.GvkZA6nMXyJeJVtlDUixmCmqke6Cdmu', NULL, '2025-03-22 06:36:48', '2025-03-22 06:36:48', NULL),
	(5, 'U005', 'siswa3', 'Teknik Sipil', 12, 3, 'siswa3@gmail.com', NULL, '$2y$12$cIWCXi4MofN5iff6V.YwjuE//XeCOXbg6aKxmhVwJoq7/q.w1OSk2', NULL, '2025-03-22 06:36:48', '2025-03-22 06:36:48', NULL),
	(6, 'U006', 'siswa4', 'Teknik Listrik', 10, 3, 'siswa4@gmail.com', NULL, '$2y$12$Sg2lpR7qAXzJayV/SBdNOONwU8Xz1NMxAnQs0KuAHfQABBuVJ3QpO', NULL, '2025-03-22 06:36:48', '2025-03-22 06:36:48', NULL),
	(7, 'UU9999', 'siswa12', 'SIJA', 12, 1, NULL, NULL, '$2y$12$tkJKw3LKx83kcwIzYmCX4uevmTZoXE0Q8g8Nn/HYwUhScFqDnTh2G', NULL, '2025-03-23 07:46:01', '2025-03-23 07:46:01', NULL),
	(8, 'UU999', 'siswa41', 'SIJA', 12, 3, NULL, NULL, '$2y$12$.0U7s/LvhKn1Qv1G0xZ2H.dx51yR/rUv2m/v1Q9tx5e48OI3HhmSy', '1ZkrN4oGtBkHAxZcGLXSOfrzQzr6YpDvLmU6iwM4jnJzAYyT4sLBcCKRk3nP', '2025-03-23 07:47:08', '2025-03-23 07:49:55', '1742741395.jpg');

-- Dumping structure for table project-absensi.waktus
CREATE TABLE IF NOT EXISTS `waktus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.waktus: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
