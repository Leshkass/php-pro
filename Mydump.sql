-- MySQL dump 10.13  Distrib 8.4.0, for Linux (x86_64)
--
-- Host: localhost    Database: garage_db
-- ------------------------------------------------------
-- Server version	8.4.0

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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `brand` char(150) NOT NULL,
  `model` char(50) NOT NULL,
  `year` int NOT NULL,
  `color` char(50) DEFAULT NULL,
  `body_type` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (3,'Dodge','Challenger',2015,'green','coupe'),(4,'Dodge','Charger',2016,'yellow','coupe'),(5,'Ford','Mustang',1969,'grey','hatchback'),(6,'Ford','ShelbyGT',1969,'black','sedan'),(7,'Audi','A8',2015,'red','sedan'),(9,'BMW','E38',2005,'green','sedan'),(11,'Audi','A8',2012,'green','sedan'),(12,'Audi','TT',2013,'green','coupe'),(14,'BMW','X5',2013,'green','universal'),(15,'BMW','X7',2020,'black','universal'),(16,'Ford','focus',2019,'red','universal'),(20,'Ford','Mustang',2024,'yellow','universal'),(21,'Lincoln','MKX',2022,'balck','limousine'),(22,'Lincoln','Zephyr',2022,'blue','limousine'),(24,'BMW','MX3',2056,'red','coupe'),(25,'Audi','A12',2020,'green','hatchback'),(26,'Audi','A15',2024,'red','universal'),(27,'Ford','Focus',2025,'black','sedan'),(28,'Ford','Mustang',1969,'blue','sedan'),(29,'Ford','MW9',2015,'red','hatchback'),(30,'Ford','MX3',2020,'blue','coupe');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars_client`
--

DROP TABLE IF EXISTS `cars_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars_client` (
  `client_id` int unsigned NOT NULL,
  `car_id` int unsigned NOT NULL,
  PRIMARY KEY (`client_id`,`car_id`),
  KEY `car_client_ibfk_2` (`car_id`),
  CONSTRAINT `car_client_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  CONSTRAINT `cars_client_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars_client`
--

LOCK TABLES `cars_client` WRITE;
/*!40000 ALTER TABLE `cars_client` DISABLE KEYS */;
INSERT INTO `cars_client` VALUES (1,3),(10,4),(7,5),(15,6),(12,7),(17,9),(15,15),(12,16);
/*!40000 ALTER TABLE `cars_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Alessia'),(2,'engine'),(3,'Body_parts');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` char(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Marjolaine','Rippin','abe.haley@yahoo.com'),(2,'Justyn','Runolfsdottir','antwon.braun@gmail.com'),(3,'Gavin','Turcotte','omueller@streich.org'),(4,'Mertie','VonRueden','berneice97@weber.com'),(5,'Percival','Fahey','feil.orrin@hotmail.com'),(6,'Dima','Ivanov','yheidenreich@hodkiewicz.com'),(7,'Petro','Smirnov','eleanora.russel@fahey.com'),(8,'Lucienne','O\'Connell','kenton.wiegand@hill.com'),(9,'Arvid','Stanton','ferry.jonathan@hammes.com'),(10,'Petro','Ivanov','andreane23@russel.com'),(11,'Julia','Petrova','ohirthe@mosciski.com'),(12,'Tara','Franecki','nikolaus.nash@hotmail.com'),(13,'Eileen','Lind','rlindgren@monahan.net'),(14,'Werner','Gislason','paucek.violet@willms.com'),(15,'Kristofer','Eichmann','olga.frami@mitchell.com'),(16,'Aida','Padberg','kevin32@yahoo.com'),(17,'Adell','Lueilwitz','susie63@hotmail.com'),(18,'Ewell','Runolfsdottir','jasper.hills@howell.info'),(22,'Muriel','Cruickshank','welch.katelyn@yahoo.com'),(23,'Yesenia','Kertzmann','della16@gmail.com'),(24,'Kyle','Rice','xthiel@smith.com');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumable`
--

DROP TABLE IF EXISTS `consumable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consumable` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `color` char(50) DEFAULT NULL,
  `temperature` int DEFAULT NULL,
  `viscosity` char(100) DEFAULT NULL,
  `quantity` int NOT NULL,
  `manufacturer_id` int unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `consumable_manufacturer_id_fk` (`manufacturer_id`),
  CONSTRAINT `consumable_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumable`
--

LOCK TABLES `consumable` WRITE;
/*!40000 ALTER TABLE `consumable` DISABLE KEYS */;
INSERT INTO `consumable` VALUES (1,'green',619605,NULL,508520,2,'antifreeze','L','Christiana Barrows',250),(2,'blue',25,NULL,26,11,'antifreeze','L','Felix',250),(3,'red',40,NULL,20,9,'antifreeze','L','Felix',758);
/*!40000 ALTER TABLE `consumable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manufacturer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` char(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (1,'Cayman Islands'),(2,'Katelin Hintz'),(3,'Benin'),(4,'Thailand'),(5,'Mongolia'),(6,'French Polynesia'),(7,'Australia'),(8,'Macedonia'),(9,'Brazil'),(10,'Solomon Islands'),(11,'Kenya');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_work`
--

DROP TABLE IF EXISTS `order_work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_work` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cost_of_work` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_work_orders_id_fk` (`order_id`),
  CONSTRAINT `order_work_orders_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_work`
--

LOCK TABLES `order_work` WRITE;
/*!40000 ALTER TABLE `order_work` DISABLE KEYS */;
INSERT INTO `order_work` VALUES (1,7,'completed','change_oil',100),(2,8,'not_done','tire_replacement',250),(3,9,'performance','tinting',150);
/*!40000 ALTER TABLE `order_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_work_consumable`
--

DROP TABLE IF EXISTS `order_work_consumable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_work_consumable` (
  `order_work_id` int unsigned NOT NULL,
  `consumable_id` int unsigned NOT NULL,
  PRIMARY KEY (`order_work_id`,`consumable_id`),
  KEY `order_work_consumable_consumable_id_fk` (`consumable_id`),
  CONSTRAINT `order_work_consumable_consumable_id_fk` FOREIGN KEY (`consumable_id`) REFERENCES `consumable` (`id`),
  CONSTRAINT `order_work_consumable_order_work_id_fk` FOREIGN KEY (`order_work_id`) REFERENCES `order_work` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_work_consumable`
--

LOCK TABLES `order_work_consumable` WRITE;
/*!40000 ALTER TABLE `order_work_consumable` DISABLE KEYS */;
INSERT INTO `order_work_consumable` VALUES (2,1),(1,2),(3,3);
/*!40000 ALTER TABLE `order_work_consumable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_work_spares`
--

DROP TABLE IF EXISTS `order_work_spares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_work_spares` (
  `order_work_id` int unsigned NOT NULL,
  `spares_id` int unsigned NOT NULL,
  PRIMARY KEY (`order_work_id`,`spares_id`),
  KEY `order_action_spares_spares_id_fk` (`spares_id`),
  CONSTRAINT `order_action_spares_order_work_id_fk` FOREIGN KEY (`order_work_id`) REFERENCES `order_work` (`id`),
  CONSTRAINT `order_action_spares_spares_id_fk` FOREIGN KEY (`spares_id`) REFERENCES `spares` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_work_spares`
--

LOCK TABLES `order_work_spares` WRITE;
/*!40000 ALTER TABLE `order_work_spares` DISABLE KEYS */;
INSERT INTO `order_work_spares` VALUES (2,1),(1,2),(3,3);
/*!40000 ALTER TABLE `order_work_spares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int unsigned NOT NULL,
  `vin_code` varchar(150) NOT NULL,
  `client_id` int unsigned NOT NULL,
  `order_price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_car_id_fk` (`car_id`),
  KEY `orders_client_id_fk` (`client_id`),
  CONSTRAINT `orders_car_id_fk` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  CONSTRAINT `orders_client_id_fk` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,14,'2500',16,2356),(2,15,'25wee455w4',17,250),(3,16,'2565sasd4545',18,650),(7,20,'254df445ee5',22,250),(8,21,'235eer589',23,350),(9,22,'ert243rwr2423',24,6698);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spares`
--

DROP TABLE IF EXISTS `spares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spares` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `manufacturer_id` int unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `ean_number` int NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `spares_category_id_fk` (`category_id`),
  KEY `spares_manufacturer_id_fk` (`manufacturer_id`),
  CONSTRAINT `spares_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `spares_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spares`
--

LOCK TABLES `spares` WRITE;
/*!40000 ALTER TABLE `spares` DISABLE KEYS */;
INSERT INTO `spares` VALUES (1,1,1,'tires',458569,450),(2,2,3,'piston',52658,7556),(3,3,4,'bumper',589,8516614);
/*!40000 ALTER TABLE `spares` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-01 19:47:31
