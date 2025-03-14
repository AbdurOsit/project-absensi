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
	('U003', '2025-03-07', 'siswa1', 3, 11, 'Teknik Elektro', 0, '07:10:00', '15:30:00', '2025-03-07 05:34:21', '2025-03-12 04:40:12'),
	('U004', '2025-03-07', 'siswa2', 3, 11, 'Teknik Mesin', 1, '07:20:00', '15:20:00', '2025-03-07 05:34:21', '2025-03-08 18:20:13'),
	('U005', '2025-03-07', 'siswa3', 3, 12, 'Teknik Sipil', 1, '07:30:00', '15:10:00', '2025-03-07 05:34:21', '2025-03-12 04:40:09');

-- Dumping structure for table project-absensi.absensi_tidak_hadirs
CREATE TABLE IF NOT EXISTS `absensi_tidak_hadirs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `alasan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.absensi_tidak_hadirs: ~6 rows (approximately)
INSERT INTO `absensi_tidak_hadirs` (`id`, `username`, `kelas`, `jurusan`, `hari`, `tanggal`, `alasan`, `surat`, `created_at`, `updated_at`) VALUES
	(1, 'siswa1', '12', 'Teknik Elektro', 'Senin', '2025-03-11', 'sakit', 'png', '2025-03-11 04:04:49', '2025-03-11 04:04:50'),
	(2, 'siswa1', '12', 'Teknik Elektro', 'Selasa', '2025-03-12', 'izin', 'png', '2025-03-11 04:06:14', '2025-03-11 04:06:15'),
	(3, 'siswa3', '12', 'Teknik Sipil', 'Rabu', '2025-03-07', 'alpha', 'png', '2025-03-07 05:34:21', '2025-03-07 05:34:21'),
	(4, 'siswa4', '10', 'Teknik Listrik', 'Kamis', '2025-03-07', 'sakit', 'png', '2025-03-07 05:34:21', '2025-03-07 05:34:21'),
	(5, 'siswa1', '12', 'Teknik Elektro', 'Jum\'at', '2025-03-13', 'izin', 'png', '2025-03-11 04:07:01', '2025-03-11 04:07:02'),
	(6, 'siswa1', '12', 'Teknik Elektro', 'Sabtu', '2025-03-11', 'alpha', 'png', '2025-03-11 04:08:11', '2025-03-11 04:08:12'),
	(7, 'siswa20', '12', 'sija', 'senin', '2025-03-13', 'izin', '1741872545.png', '2025-03-13 06:29:06', '2025-03-13 06:29:06'),
	(8, 'siswa30', '12', 'sija', 'selasa', '2025-03-29', 'sakit', '1741873983.png', '2025-03-13 06:53:03', '2025-03-13 06:53:03');

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
	(1, 'sakit', '2025-03-07 05:34:21', '2025-03-07 05:34:21'),
	(2, 'izin', '2025-03-07 05:34:21', '2025-03-07 05:34:21'),
	(3, 'alpha', '2025-03-07 05:34:21', '2025-03-07 05:34:21');

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

-- Dumping structure for table project-absensi.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_absen` timestamp NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
	(9, '2025_03_02_092533_create_waktus_table', 1),
	(10, '2025_03_07_121535_create_jadwal_table', 1),
	(11, '2025_03_14_033349_create_log_table', 2);

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
	(1, 'admin', '2025-03-07 05:34:18', '2025-03-07 05:34:18'),
	(2, 'guru', '2025-03-07 05:34:18', '2025-03-07 05:34:18'),
	(3, 'siswa', '2025-03-07 05:34:18', '2025-03-07 05:34:18');

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
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tugas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `praktek` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deadline_hari` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deadline_tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.tugas: ~7 rows (approximately)
INSERT INTO `tugas` (`id`, `hari`, `tanggal`, `tugas`, `praktek`, `kegiatan`, `deadline_hari`, `deadline_tanggal`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2025-03-11', 'Tugas untuk Senin', 'Praktikum Senin', 'Kegiatan Senin', 'Kamis', '2025-03-06', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(2, 'Selasa', '2025-03-12', 'Tugas untuk Selasa', 'Praktikum Selasa', 'Kegiatan Selasa', 'Jumat', '2025-03-07', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(3, 'Rabu', '2025-03-13', 'Tugas untuk Rabu', 'Praktikum Rabu', 'Kegiatan Rabu', 'Sabtu', '2025-03-08', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(4, 'Kamis', '2025-03-14', 'Tugas untuk Kamis', 'Praktikum Kamis', 'Kegiatan Kamis', 'Minggu', '2025-03-09', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(5, 'Jumat', '2025-03-15', 'Tugas untuk Jumat', 'Praktikum Jumat', 'Kegiatan Jumat', 'Senin', '2025-03-10', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(6, 'Sabtu', '2025-03-16', 'Tugas untuk Sabtu', 'Praktikum Sabtu', 'Kegiatan Sabtu', 'kamis', '2025-03-11', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(7, 'Minggu', '2025-03-17', 'Tugas untuk Minggu', 'Praktikum Minggu', 'Kegiatan Minggu', 'Rabu', '2025-03-12', '2025-03-07 05:35:01', '2025-03-07 05:35:01'),
	(10, 'senin 2', '2025-03-18', 'tugas senin 2', 'praktek senin 2', 'kegiatan senin 2', 'kamis', '2025-03-27', NULL, NULL),
	(11, 'Jum\'at', '2025-03-13', NULL, 'Praktek Cisco', NULL, 'Rabu', '2025-03-18', NULL, NULL);

-- Dumping structure for table project-absensi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `image` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uid_unique` (`uid`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table project-absensi.users: ~6 rows (approximately)
INSERT INTO `users` (`id`, `uid`, `username`, `jurusan`, `kelas`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
	(1, 'U001', 'admin', 'Teknik Informatika', 12, 1, 'admin@gmail.com', NULL, '$2y$12$10iPxfrucE58Qh95ZBgCyOsjPYk6LWCR7wTRLjfCXtxU8hIv/LSbS', 'px1kPTCmArI6rpp3C8pUU4aZYQqaTGtx00T2n43Dm6o2C4MPNMUcKpFJAGCX', '2025-03-07 05:34:19', '2025-03-12 05:35:12', NULL),
	(2, 'U002', 'guru1', 'Matematika', 0, 2, 'guru@gmail.com', NULL, '$2y$12$TKSPmp7dlrh7YjZQ3n5ZJer/yDJKSDlji7SyxTUF3oE0LikgHOaXe', NULL, '2025-03-07 05:34:19', '2025-03-07 05:34:19', NULL),
	(3, 'U003', 'siswa1', 'Teknik Komputer', 12, 3, 'siswa@gmail.com', NULL, '$2y$12$NV9V51JoMXo.dLT86XSJ4uQSZIlgJLv1dlGkJy8W2QZIjJs0SMHFW', 'oyIf4bHcS0gT5wxWZ2Sk1S4et5CNcxJ3TRCj63Y4AuVxRVtDXf3NVqn9qBzY', '2025-03-07 05:34:20', '2025-03-12 05:37:05', '1741486937.png'),
	(4, 'U004', 'siswa2', 'Teknik Mesin', 11, 3, 'siswa2@gmail.com', NULL, '$2y$12$x4ayvfIa83HO9IdqNFJZI.pSgxv8I3gf7WamSNxe7UuFydfVA/9Gy', NULL, '2025-03-07 05:34:20', '2025-03-07 05:34:20', NULL),
	(5, 'U005', 'siswa3', 'Teknik Sipil', 12, 3, 'siswa3@gmail.com', NULL, '$2y$12$wwJQFRHVD4A3Z2L.GggJ3uLBmefJOj00LMkWe9t.xSp9KRE/pm22W', NULL, '2025-03-07 05:34:20', '2025-03-07 05:34:20', NULL);

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
