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

-- Dumping structure for table hoconline.shopping_cart
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hoconline.shopping_cart: ~8 rows (approximately)
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
INSERT INTO `shopping_cart` (`id`, `user_id`, `course_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
	(1, '1', 10, 'Xây dựng website hoàn chỉnh với Laravel PHP Framework', '200000', '2021-02-28 10:30:22', '2021-02-28 10:30:22'),
	(2, '1', 11, 'Toàn tập ngôn ngữ lập trình C#', '150000', '2021-02-28 10:30:55', '2021-02-28 10:30:55'),
	(3, '1', 12, 'Học HTML5/CSS3, BOOTSTRAP 4 và học cắt Web từ file thiết kế', '100000', '2021-02-28 10:32:12', '2021-02-28 10:32:12'),
	(4, '1', 13, 'Lập trình WinForm với C#: 10 ứng dụng', '75000', '2021-02-28 10:34:02', '2021-02-28 10:34:02'),
	(5, '1', 14, 'Khóa học React js và Redux từ đầu, tạo ứng dụng fullstack với Node JS + React JS', '199000', '2021-02-28 10:34:06', '2021-02-28 10:34:06'),
	(6, '1', 15, 'Lập Trình Python Từ Zero - Hero', '100000', '2021-02-28 10:55:10', '2021-02-28 10:55:10'),
	(7, '1', 16, 'Bắt đầu với ứng dụng website trên nền tảng ASP.NET MVC', '90000', '2021-02-28 10:59:48', '2021-02-28 10:59:48'),
	(8, '1', 17, 'Học lập trình C/C++ TỪ A - Z', '290000', '2021-02-28 11:06:17', '2021-02-28 11:06:17');
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
