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
  `waktu_pulang` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `absensi_hadirs_uid_unique` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_hadirs: ~3 rows (approximately)
INSERT INTO `absensi_hadirs` (`uid`, `hari_tanggal`, `username`, `role_id`, `kelas`, `jurusan`, `status`, `waktu_datang`, `waktu_pulang`, `created_at`, `updated_at`) VALUES
	('U003', '2025-03-25', 'siswa1', 3, 11, 'Teknik Elektro', 0, '07:00:00', '15:00:00', '2025-03-25 07:24:55', '2025-03-25 07:24:55'),
	('U004', '2025-03-25', 'siswa2', 3, 11, 'Teknik Mesin', 0, '07:00:00', '15:00:00', '2025-03-25 07:24:55', '2025-03-25 07:24:55'),
	('U005', '2025-03-25', 'siswa3', 3, 12, 'Teknik Sipil', 0, '07:00:00', '15:00:00', '2025-03-25 07:24:55', '2025-03-25 07:24:55');

-- Dumping structure for table project-absensi.absensi_tidak_hadirs
CREATE TABLE IF NOT EXISTS `absensi_tidak_hadirs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_tidak_hadirs: ~3 rows (approximately)
INSERT INTO `absensi_tidak_hadirs` (`id`, `username`, `role_id`, `kelas`, `jurusan`, `hari`, `tanggal`, `alasan`, `created_at`, `updated_at`) VALUES
	(1, 'siswa4', 3, '10', 'Teknik Listrik', 'Selasa', '2025-03-25', 'izin', '2025-03-25 07:24:55', '2025-03-25 07:24:55'),
	(2, 'siswa3', 3, '12', 'Teknik Sipil', 'Selasa', '2025-03-25', 'sakit', '2025-03-25 07:24:55', '2025-03-25 07:24:55'),
	(3, 'dimas', 3, '12', 'Sija', 'Selasa', '2025-03-25', 'izin', '2025-03-25 07:26:14', '2025-03-25 07:26:14');

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

-- Dumping structure for table project-absensi.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.kegiatan: ~7 rows (approximately)
INSERT INTO `kegiatan` (`id`, `hari`, `tanggal`, `kegiatan`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-24', 'Kegiatan untuk Senin', '2025-03-25 07:49:49', '2025-03-25 07:49:49'),
	(2, 'Selasa', '2025-03-25', 'Kegiatan untuk Selasa', '2025-03-25 07:49:49', '2025-03-25 07:49:49'),
	(3, 'Rabu', '2025-03-26', 'Kegiatan untuk Rabu', '2025-03-25 07:49:49', '2025-03-25 07:49:49'),
	(4, 'Kamis', '2025-03-27', 'Kegiatan untuk Kamis', '2025-03-25 07:49:49', '2025-03-25 07:49:49'),
	(5, 'Jumat', '2025-03-28', 'Kegiatan untuk Jumat', '2025-03-25 07:49:49', '2025-03-25 07:49:49'),
	(6, 'Sabtu', '2025-03-29', 'Kegiatan untuk Sabtu', '2025-03-25 07:49:49', '2025-03-25 07:49:49'),
	(7, 'Minggu', '2025-03-30', 'Kegiatan untuk Minggu', '2025-03-25 07:49:49', '2025-03-25 07:49:49');

-- Dumping structure for table project-absensi.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_absen` time DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.migrations: ~0 rows (approximately)
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
	(13, '2025_03_22_125605_create_kegiatan_table', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.praktek: ~7 rows (approximately)
INSERT INTO `praktek` (`id`, `hari`, `tanggal`, `praktek`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-24', 'Praktek untuk Senin depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11'),
	(2, 'Selasa', '2025-03-25', 'Praktek untuk Selasa depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11'),
	(3, 'Rabu', '2025-03-26', 'Praktek untuk Rabu depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11'),
	(4, 'Kamis', '2025-03-27', 'Praktek untuk Kamis depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11'),
	(5, 'Jumat', '2025-03-28', 'Praktek untuk Jumat depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11'),
	(6, 'Sabtu', '2025-03-29', 'Praktek untuk Sabtu depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11'),
	(7, 'Minggu', '2025-03-30', 'Praktek untuk Minggu depan', '2025-03-25 07:49:11', '2025-03-25 07:49:11');

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
	(1, 'admin', '2025-03-25 07:24:53', '2025-03-25 07:24:53'),
	(2, 'guru', '2025-03-25 07:24:53', '2025-03-25 07:24:53'),
	(3, 'siswa', '2025-03-25 07:24:53', '2025-03-25 07:24:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.tugas: ~7 rows (approximately)
INSERT INTO `tugas` (`id`, `hari`, `tanggal`, `tugas`, `deadline_hari`, `deadline_tanggal`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-24', 'Tugas untuk Senin', 'Kamis', '2025-03-27', '2025-03-25 07:49:33', '2025-03-25 07:49:33'),
	(2, 'Selasa', '2025-03-25', 'Tugas untuk Selasa', 'Jumat', '2025-03-28', '2025-03-25 07:49:33', '2025-03-25 07:49:33'),
	(3, 'Rabu', '2025-03-26', 'Tugas untuk Rabu', 'Sabtu', '2025-03-29', '2025-03-25 07:49:33', '2025-03-25 07:49:33'),
	(4, 'Kamis', '2025-03-27', 'Tugas untuk Kamis', 'Minggu', '2025-03-30', '2025-03-25 07:49:33', '2025-03-25 07:49:33'),
	(5, 'Jumat', '2025-03-28', 'Tugas untuk Jumat', 'Senin', '2025-03-31', '2025-03-25 07:49:33', '2025-03-25 07:49:33'),
	(6, 'Sabtu', '2025-03-29', 'Tugas untuk Sabtu', 'Selasa', '2025-04-01', '2025-03-25 07:49:33', '2025-03-25 07:49:33'),
	(7, 'Minggu', '2025-03-30', 'Tugas untuk Minggu', 'Rabu', '2025-04-02', '2025-03-25 07:49:33', '2025-03-25 07:49:33');

-- Dumping structure for table project-absensi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uid_unique` (`uid`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.users: ~7 rows (approximately)
INSERT INTO `users` (`id`, `uid`, `username`, `image`, `jurusan`, `kelas`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'U001', 'admin', NULL, 'Teknik Informatika', 12, 1, 'admin@gmail.com', NULL, '$2y$12$Bo6H890bIcf/V9y5maLS9uE1BR1k3HqemF69XmbdLBvzv3l17.9lC', NULL, '2025-03-25 07:24:53', '2025-03-25 07:24:53'),
	(2, 'U002', 'guru1', NULL, 'Matematika', 0, 2, 'guru@gmail.com', NULL, '$2y$12$qOFdb5b2aJdPDmiW/9qu.uNk3ntHJvlSBxe1L1GV8GmJM/.FA5IOy', NULL, '2025-03-25 07:24:53', '2025-03-25 07:24:53'),
	(3, 'U003', 'siswa1', NULL, 'Teknik Elektro', 11, 3, 'siswa@gmail.com', NULL, '$2y$12$nlHVtIc7snzO7ilGs4cTfupMbfVYqEulN0egFMn37KqJGMlIfwQLS', 'jVKS0NWutTFxOzKYLTkx5xVbwKIX23fFUAos8ni94wZdgnq7ARiIwEsTILsH', '2025-03-25 07:24:54', '2025-03-25 07:24:54'),
	(4, 'U004', 'siswa2', NULL, 'Teknik Mesin', 11, 3, 'siswa2@gmail.com', NULL, '$2y$12$Ony6XSeD0aN2HE4FhkjLeO/IhX/ZYU4PQa1xuNKnkdar.McwNM3I2', NULL, '2025-03-25 07:24:54', '2025-03-25 07:24:54'),
	(5, 'U005', 'siswa3', NULL, 'Teknik Sipil', 12, 3, 'siswa3@gmail.com', NULL, '$2y$12$0SigkGwEJEDxAWf8m.eZJ.EiNP2M7O0bJ2Kyn5lq9wPGI1VrucxF6', NULL, '2025-03-25 07:24:55', '2025-03-25 07:24:55'),
	(6, 'U006', 'siswa4', NULL, 'Teknik Listrik', 10, 3, 'siswa4@gmail.com', NULL, '$2y$12$qLSbJ1EkUj7A7ygThYH29u602N6yV41DdEssYWysoMvNx5i1OxqKu', NULL, '2025-03-25 07:24:55', '2025-03-25 07:24:55'),
	(7, '9990qm', 'dimas', '1742912760.png', 'SIJA', 12, 3, NULL, NULL, '$2y$12$NuMjx/Pw2SKJTmhINMR4jO3mtFicGbDVmhibodMXv6.jedZCs/JxG', NULL, '2025-03-25 07:26:01', '2025-03-25 07:26:01');

-- Dumping structure for table project-absensi.waktus
CREATE TABLE IF NOT EXISTS `waktus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.waktus: ~7 rows (approximately)
INSERT INTO `waktus` (`id`, `hari`, `jam_masuk`, `jam_pulang`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42'),
	(2, 'Selasa', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42'),
	(3, 'Rabu', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42'),
	(4, 'Kamis', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42'),
	(5, 'Jumat', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42'),
	(6, 'Sabtu', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42'),
	(7, 'Minggu', '07:00:00', '15:00:00', '2025-03-25 07:49:42', '2025-03-25 07:49:42');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
