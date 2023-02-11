-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: product
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `status` int DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Clothing',1,'2023-02-11 08:57:57','2023-02-11 08:57:57'),(2,'Footwear',1,'2023-02-11 08:57:57','2023-02-11 08:57:57'),(3,'Eyewear',1,'2023-02-11 08:57:57','2023-02-11 08:57:57'),(4,'Jwellery',1,'2023-02-11 08:57:57','2023-02-11 08:57:57');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_details` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) NOT NULL,
  `product_desc` text NOT NULL,
  `status` int NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_cat` int NOT NULL,
  `product_sub_cat` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
INSERT INTO `product_details` VALUES (1,'Test','Test',2,'2023-02-11 11:52:14','2023-02-11 14:00:43',1,1),(2,'Test','Test',2,'2023-02-11 11:52:32','2023-02-11 14:01:32',1,1),(3,'Test','Test',2,'2023-02-11 11:53:51','2023-02-11 14:03:19',1,1),(4,'Test','Test',2,'2023-02-11 11:54:20','2023-02-11 14:04:26',1,1),(5,'Test','Test',2,'2023-02-11 11:54:50','2023-02-11 14:06:36',1,1),(6,'Test','Test',2,'2023-02-11 11:55:13','2023-02-11 14:07:21',1,1),(7,'Test','Test',2,'2023-02-11 11:56:36','2023-02-11 14:07:45',1,1),(8,'Test','Test',2,'2023-02-11 11:56:57','2023-02-11 14:08:00',1,1),(9,'Test','Test',2,'2023-02-11 11:58:01','2023-02-11 14:37:06',1,1),(10,'Test','Test',1,'2023-02-11 11:58:17','2023-02-11 11:58:17',1,1),(11,'Test','Test',1,'2023-02-11 11:59:20','2023-02-11 11:59:20',1,1),(12,'Test','Test',1,'2023-02-11 11:59:34','2023-02-11 11:59:34',1,1),(13,'Test','Test',1,'2023-02-11 12:01:58','2023-02-11 12:01:58',1,1),(14,'Test','Test',1,'2023-02-11 12:02:02','2023-02-11 12:02:02',1,1),(15,'Test','Test',1,'2023-02-11 12:02:03','2023-02-11 12:02:03',1,1),(16,'Test','Test',1,'2023-02-11 12:02:23','2023-02-11 12:02:23',1,1),(17,'Test','Test',1,'2023-02-11 12:02:47','2023-02-11 12:02:47',1,1),(18,'Test','Test',1,'2023-02-11 12:03:05','2023-02-11 12:03:05',1,1),(19,'Test','Test',1,'2023-02-11 12:03:22','2023-02-11 12:03:22',1,1),(20,'Test','Test',1,'2023-02-11 12:03:45','2023-02-11 12:03:45',1,1),(21,'Test','Test',1,'2023-02-11 12:04:16','2023-02-11 12:04:16',1,1),(22,'Test','Test',1,'2023-02-11 12:04:54','2023-02-11 12:04:54',1,1),(23,'Test','Test',1,'2023-02-11 12:07:53','2023-02-11 12:07:53',1,1),(24,'Test','Test',1,'2023-02-11 12:08:41','2023-02-11 12:08:41',1,1),(25,'Test','Test',1,'2023-02-11 12:09:09','2023-02-11 12:09:09',1,1),(26,'Test','Test',1,'2023-02-11 12:09:33','2023-02-11 12:09:33',1,1),(27,'Test','Test',1,'2023-02-11 12:10:04','2023-02-11 12:10:04',1,1),(28,'Test','Test',1,'2023-02-11 12:11:35','2023-02-11 12:11:35',1,1),(29,'Test','Test',1,'2023-02-11 12:12:25','2023-02-11 12:12:25',1,1),(30,'Test','Test',1,'2023-02-11 12:13:08','2023-02-11 12:13:08',1,1),(31,'Test','Test',1,'2023-02-11 12:13:24','2023-02-11 12:13:24',1,1),(32,'Test','Test',1,'2023-02-11 12:13:29','2023-02-11 12:13:29',1,1),(33,'Test','Test',1,'2023-02-11 12:13:37','2023-02-11 12:13:37',1,1),(34,'Test','Test',1,'2023-02-11 12:13:57','2023-02-11 12:13:57',1,1),(35,'Test','Test',1,'2023-02-11 12:14:21','2023-02-11 12:14:21',1,1),(36,'Test','Test',1,'2023-02-11 12:14:38','2023-02-11 12:14:38',1,1),(37,'Test','Test',1,'2023-02-11 12:14:47','2023-02-11 12:14:47',1,1),(38,'Test','Test',1,'2023-02-11 12:14:55','2023-02-11 12:14:55',1,1),(39,'Test','Test',1,'2023-02-11 12:17:48','2023-02-11 12:17:48',1,1),(40,'Test','Test',1,'2023-02-11 12:18:14','2023-02-11 12:18:14',1,1),(41,'Test','Test',1,'2023-02-11 12:19:47','2023-02-11 12:19:47',1,1),(42,'Test','Test',1,'2023-02-11 12:19:55','2023-02-11 12:19:55',1,1),(43,'Tril Name','Test Product Desc',1,'2023-02-11 12:20:02','2023-02-11 17:43:11',4,10),(44,'Air Jorden','Nike Air Jorden C302',1,'2023-02-11 12:20:14','2023-02-11 17:41:02',2,4),(45,'Test','Test',1,'2023-02-11 12:20:28','2023-02-11 12:20:28',1,1),(46,'Test','Test',1,'2023-02-11 12:21:45','2023-02-11 12:21:45',1,1),(47,'Test','Test',1,'2023-02-11 12:21:58','2023-02-11 12:21:58',1,1),(48,'Test','Test',1,'2023-02-11 13:19:15','2023-02-11 13:19:15',2,5),(49,'Test','Test',1,'2023-02-11 13:20:52','2023-02-11 13:20:52',3,9),(50,'Test','Test',1,'2023-02-11 13:22:36','2023-02-11 13:22:36',3,8);
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `product_ID` int NOT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `product_id_idx` (`product_ID`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_ID`) REFERENCES `product_details` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,21,''),(2,27,'images (1)_02_11_2023_13_10_04.jpg'),(3,37,'images (1)_02_11_2023_13_14_47.jpg'),(6,45,'istockphoto-491520707-612x612_02_11_2023_13_20_28.jpg'),(7,45,'istockphoto-684062636-612x612_02_11_2023_13_20_28.jpg'),(8,45,'istockphoto-1021908014-612x612_02_11_2023_13_20_28.jpg'),(9,46,'images_02_11_2023_13_21_45.jpg'),(10,46,'istockphoto-491520707-612x612_02_11_2023_13_21_45.jpg'),(11,47,'istockphoto-684062636-612x612_02_11_2023_13_21_58.jpg'),(12,47,'istockphoto-1021908014-612x612_02_11_2023_13_21_58.jpg'),(13,48,'images (1)_02_11_2023_14_19_15.jpg'),(14,48,'images_02_11_2023_14_19_15.jpg'),(15,49,'images_02_11_2023_14_20_52.jpg'),(16,49,'istockphoto-491520707-612x612_02_11_2023_14_20_52.jpg'),(17,49,'istockphoto-684062636-612x612_02_11_2023_14_20_52.jpg'),(18,50,'istockphoto-491520707-612x612_02_11_2023_14_22_36.jpg'),(23,43,'images (1)_02_11_2023_18_45_04.jpg'),(24,43,'images_02_11_2023_18_45_04.jpg'),(26,44,'istockphoto-684062636-612x612_02_11_2023_18_46_44.jpg');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sub_category`
--

DROP TABLE IF EXISTS `product_sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_sub_category` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `category_ID` int NOT NULL,
  `sub_category_name` varchar(45) NOT NULL,
  `status` int DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `category_ID_idx` (`category_ID`),
  KEY `ID` (`ID`),
  CONSTRAINT `category_ID` FOREIGN KEY (`category_ID`) REFERENCES `product_category` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sub_category`
--

LOCK TABLES `product_sub_category` WRITE;
/*!40000 ALTER TABLE `product_sub_category` DISABLE KEYS */;
INSERT INTO `product_sub_category` VALUES (1,1,'Top Wear',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(2,1,'Bottom Wear',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(3,1,'Inner Wear',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(4,2,'Casual Shoes',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(5,2,'Formal Shoes',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(6,2,'Flip Flops',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(7,3,'Sunglasses',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(8,3,'Computer Glasses',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(9,3,'Power Sunglasses',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(10,4,'Ring',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(11,4,'Earrings',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(12,4,'Bangles',1,'2023-02-11 09:00:48','2023-02-11 09:00:48'),(13,4,'Chain',1,'2023-02-11 09:00:48','2023-02-11 09:00:48');
/*!40000 ALTER TABLE `product_sub_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-11 23:19:01
