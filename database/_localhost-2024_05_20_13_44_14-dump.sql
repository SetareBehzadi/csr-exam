-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: anbe
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (13,1,'1-551-204-5245',2,'2024-05-20 05:48:20','2024-05-20 05:48:20','1979-06-14','\"[\\\"ac\\\"]\"');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (2,'2014_10_12_100000_create_password_reset_tokens_table',1);
INSERT INTO `migrations` VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` VALUES (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
INSERT INTO `migrations` VALUES (5,'2024_05_14_112745_create_guests_table',1);
INSERT INTO `migrations` VALUES (6,'2024_05_14_112752_create_rooms_table',1);
INSERT INTO `migrations` VALUES (7,'2024_05_14_113103_create_reservations_table',1);
INSERT INTO `migrations` VALUES (8,'2024_05_14_113249_create_reviews_table',1);
INSERT INTO `migrations` VALUES (9,'2024_05_14_123747_create_promotions_table',1);
INSERT INTO `migrations` VALUES (10,'2024_05_18_080041_create_add_extra_column_guests_table',1);
INSERT INTO `migrations` VALUES (11,'2024_05_20_071932_add_promotions_info_into_reservations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` VALUES (1,'امام رضا',NULL,'amount',20000,'2024-05-20','2024-05-31',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (7,1,5,'2024-05-24 20:30:30','2024-07-27 14:06:11',10000,90000000,89990000,'2024-05-20 05:48:20','2024-05-20 06:35:50',NULL,20000,1);
INSERT INTO `reservations` VALUES (8,1,5,'2025-03-14 04:24:26','2025-05-12 08:39:17',10000,90000000,90010000,'2024-05-20 05:48:20','2024-05-20 05:48:20',NULL,NULL,NULL);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'others',5,4184,'\"[\\\"tv\\\"]\"','2024-05-20 05:19:51','2024-05-20 05:19:51');
INSERT INTO `rooms` VALUES (2,'triple',3,5807,'\"[\\\"wifi\\\",\\\"tv\\\"]\"','2024-05-20 05:22:22','2024-05-20 05:22:22');
INSERT INTO `rooms` VALUES (3,'triple',3,1838,'\"[\\\"wifi\\\",\\\"tv\\\",\\\"ac\\\"]\"','2024-05-20 05:22:22','2024-05-20 05:22:22');
INSERT INTO `rooms` VALUES (4,'quadruple',4,7619,'\"[\\\"wifi\\\"]\"','2024-05-20 05:48:20','2024-05-20 05:48:20');
INSERT INTO `rooms` VALUES (5,'double',2,2081,'\"[\\\"ac\\\"]\"','2024-05-20 05:48:20','2024-05-20 05:48:20');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mrs. Vena Hudson','Shields','elisabeth.glover@example.org','2024-05-20 04:45:37','$2y$12$wHvO54sgl4FBfGvd1S0L7eVjCRgjqRqTQOPfgsw7v.OZdEekSsXl2','rpY4mAqZWP','2024-05-20 04:45:38','2024-05-20 04:45:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20 13:44:14
