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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_hadirs: ~3 rows (approximately)
INSERT INTO `absensi_hadirs` (`uid`, `hari_tanggal`, `username`, `role_id`, `kelas`, `jurusan`, `status`, `waktu_datang`, `waktu_pulang`, `created_at`, `updated_at`) VALUES
	('U003', '2025-03-01', 'siswa1', 3, 11, 'Teknik Elektro', 1, '07:00:00', '15:00:00', '2025-03-01 06:34:50', '2025-03-01 07:46:54'),
	('U004', '2025-03-01', 'siswa2', 3, 11, 'Teknik Mesin', 1, '07:00:00', '15:00:00', '2025-03-01 06:34:50', '2025-03-01 07:46:53'),
	('U005', '2025-03-01', 'siswa3', 3, 12, 'Teknik Sipil', 0, '07:00:00', '15:00:00', '2025-03-01 06:34:50', '2025-03-01 07:46:58');

-- Dumping structure for table project-absensi.absensi_tidak_hadirs
CREATE TABLE IF NOT EXISTS `absensi_tidak_hadirs` (
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_tanggal` date NOT NULL,
  `alasan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `absensi_tidak_hadirs_uid_unique` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_tidak_hadirs: ~2 rows (approximately)
INSERT INTO `absensi_tidak_hadirs` (`uid`, `username`, `kelas`, `role_id`, `jurusan`, `hari_tanggal`, `alasan_id`, `created_at`, `updated_at`) VALUES
	('U005', 'siswa3', '12', 3, 'Teknik Sipil', '2025-03-01', 2, '2025-03-01 06:34:50', '2025-03-01 06:34:50'),
	('U006', 'siswa4', '10', 3, 'Teknik Listrik', '2025-03-01', 1, '2025-03-01 06:34:50', '2025-03-01 06:34:50');

-- Dumping structure for table project-absensi.alasan
CREATE TABLE IF NOT EXISTS `alasan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.alasan: ~3 rows (approximately)
INSERT INTO `alasan` (`id`, `alasan`, `created_at`, `updated_at`) VALUES
	(1, 'sakit', '2025-03-01 06:34:50', '2025-03-01 06:34:50'),
	(2, 'izin', '2025-03-01 06:34:50', '2025-03-01 06:34:50'),
	(3, 'alpha', '2025-03-01 06:34:50', '2025-03-01 06:34:50');

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

-- Dumping structure for table project-absensi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_02_08_143034_create_absensi_hadirs_table', 1),
	(5, '2025_02_08_143045_create_absensi_tidak_hadirs_table', 1),
	(6, '2025_02_10_235544_create_roles_table', 1),
	(7, '2025_02_28_131704_create_personal_access_tokens_table', 1),
	(8, '2025_03_01_131536_create_alasans_table', 1),
	(9, '2025_03_02_092533_create_waktus_table', 2);

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
	(1, 'admin', '2025-03-01 06:34:48', '2025-03-01 06:34:48'),
	(2, 'guru', '2025-03-01 06:34:48', '2025-03-01 06:34:48'),
	(3, 'siswa', '2025-03-01 06:34:48', '2025-03-01 06:34:48');

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

-- Dumping structure for table project-absensi.users
CREATE TABLE IF NOT EXISTS `users` (
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `users_uid_unique` (`uid`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.users: ~7 rows (approximately)
INSERT INTO `users` (`uid`, `username`, `jurusan`, `kelas`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
	('12678', 'diki', 'SIJA Last Gen', 12, 3, 'siswa10@gmail.com', NULL, '$2y$12$PyW8Ijn3y6XhyDlY2GumluxnMQka4a21Fpq8JZPrrrREQR7oSUE8a', 'bNMOXL0VwyP86yTCK3Eu2kyynwmXgdukns1xQ0nSrkPugPZpt2J3pAxCDJh3', '2025-03-03 05:19:11', '2025-03-05 04:45:52', '1741175152.png'),
	('U001', 'admin', 'Teknik Informatika', 12, 1, 'admin@gmail.com', NULL, '$2y$12$XHHL13lN8JKapaqyfYR/rusAyr0lBjBUJRWfbuzKR7Ht2B1pLMNi2', NULL, '2025-03-01 06:34:48', '2025-03-01 06:34:48', NULL),
	('U002', 'guru1', 'Matematika', 0, 2, 'guru@gmail.com', NULL, '$2y$12$qqomAZf8sOfn7I1lRYLUu.RhiJuvQDoGpANdpQSDvsJJrZZ3xdT7i', NULL, '2025-03-01 06:34:48', '2025-03-01 06:34:48', NULL),
	('U003', 'siswa1', 'Teknik Elektro', 11, 3, 'siswa@gmail.com', NULL, '$2y$12$XcDpQlyPl0ckNTKay70f4..PIUmhWHds602wxMsX8ssmB/fuaiE.O', NULL, '2025-03-01 06:34:49', '2025-03-01 06:34:49', NULL),
	('U004', 'siswa2', 'Teknik Mesin', 11, 3, 'siswa2@gmail.com', NULL, '$2y$12$OSkyOPTjLSAxQhLrEgORieMNSFSChifo7baKTgX03Bt4G/IhwCI5C', NULL, '2025-03-01 06:34:49', '2025-03-01 06:34:49', NULL),
	('U005', 'siswa3', 'Teknik Sipil', 12, 3, 'siswa3@gmail.com', NULL, '$2y$12$1rzmib.6wrvWGr1Mfse0ge72MHd2tZ0/53Pm9Y91ymo0ksFjVTA4.', NULL, '2025-03-01 06:34:49', '2025-03-01 06:34:49', NULL),
	('U006', 'siswa4', 'Teknik Listrik', 10, 3, 'siswa4@gmail.com', NULL, '$2y$12$Qf/aV29pVlK7tfkgCwPCw.QeDNL8nwn1nTsAkDqBtA2WdXEMrsJ3O', NULL, '2025-03-01 06:34:50', '2025-03-01 06:34:50', NULL),
	('UU987', 'rosyid', 'SIJA', 12, 3, 'abdurrosyid@gmail.com', NULL, '$2y$12$opuH3826hebIde9h9jiVJ.gsQaa7rw4DlLY9lvv/QnDWzsk8ipiNS', 'dttPak49Xa17LS7ZNptWsTsrxpd21SVYRqrCIXwhd4rqSamHabdmowoJOWYr', '2025-03-01 19:15:23', '2025-03-01 19:15:23', NULL);

-- Dumping structure for table project-absensi.waktus
CREATE TABLE IF NOT EXISTS `waktus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.waktus: ~2 rows (approximately)
INSERT INTO `waktus` (`id`, `hari`, `jam_masuk`, `jam_pulang`, `created_at`, `updated_at`) VALUES
	(2, 'Senin', '07:00:00', '15:15:00', '2025-03-05 17:15:19', '2025-03-05 17:15:19'),
	(3, 'Selasa', '07:00:00', '15:00:00', '2025-03-05 17:16:11', '2025-03-05 17:16:11');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
