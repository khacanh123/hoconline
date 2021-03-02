-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hoconline.result_spin
CREATE TABLE IF NOT EXISTS `result_spin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hoconline.result_spin: ~4 rows (approximately)
/*!40000 ALTER TABLE `result_spin` DISABLE KEYS */;
INSERT INTO `result_spin` (`id`, `user_id`, `result`, `time`, `created_at`, `updated_at`) VALUES
	(1, '0543', 'Voucher giảm giá 15%', '28/02/2021 16:58:23', '2021-02-28 16:58:24', '2021-02-28 16:58:24'),
	(2, '0543', 'Voucher giảm giá 15%', '28/02/2021 16:59:40', '2021-02-28 16:59:40', '2021-02-28 16:59:40'),
	(3, '0543', 'Voucher giảm giá 15%', '28/02/2021 17:00:51', '2021-02-28 17:00:51', '2021-02-28 17:00:51'),
	(4, '0543', 'Voucher giảm giá 15%', '28/02/2021 17:01:14', '2021-02-28 17:01:14', '2021-02-28 17:01:14');
/*!40000 ALTER TABLE `result_spin` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
