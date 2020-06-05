-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: appjudigot
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `appjudigot`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `appjudigot` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `appjudigot`;

--
-- Table structure for table `app_clan`
--

DROP TABLE IF EXISTS `app_clan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_clan` (
  `clan_id` int(11) NOT NULL AUTO_INCREMENT,
  `clan_name` varchar(255) NOT NULL,
  PRIMARY KEY (`clan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_clan`
--

LOCK TABLES `app_clan` WRITE;
/*!40000 ALTER TABLE `app_clan` DISABLE KEYS */;
INSERT INTO `app_clan` VALUES (1,'Agram'),(2,'Ocampo'),(3,'Igot'),(4,'Laurel'),(5,'Divinigracia'),(6,'Balase'),(7,'Magallanes'),(8,'Tunacao');
/*!40000 ALTER TABLE `app_clan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_person`
--

DROP TABLE IF EXISTS `app_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` int(11) DEFAULT NULL,
  `last_name` int(11) DEFAULT NULL,
  `mother` int(11) DEFAULT NULL,
  `father` int(11) DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `last_name` (`last_name`),
  KEY `middle_name` (`middle_name`),
  KEY `mother` (`mother`),
  KEY `father` (`father`),
  CONSTRAINT `app_person_ibfk_2` FOREIGN KEY (`last_name`) REFERENCES `app_clan` (`clan_id`),
  CONSTRAINT `app_person_ibfk_3` FOREIGN KEY (`middle_name`) REFERENCES `app_clan` (`clan_id`),
  CONSTRAINT `app_person_ibfk_4` FOREIGN KEY (`mother`) REFERENCES `app_person` (`person_id`),
  CONSTRAINT `app_person_ibfk_5` FOREIGN KEY (`father`) REFERENCES `app_person` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_person`
--

LOCK TABLES `app_person` WRITE;
/*!40000 ALTER TABLE `app_person` DISABLE KEYS */;
INSERT INTO `app_person` VALUES (6,'Welfredo',1,3,37,36),(7,'Antonio',1,3,37,36),(8,'Ronnie',1,3,37,36),(9,'Luzviminda',1,3,37,36),(10,'Wilson',1,3,37,36),(11,'Petronilo',1,3,37,36),(12,'Jude Francis',4,3,32,6),(13,'Jofrey',4,3,32,6),(14,'Joswel',4,3,32,6),(15,'Julian',4,3,32,6),(16,'Jeanne',5,3,33,10),(17,'Julius',5,3,33,10),(18,'Reynard',6,3,34,8),(19,'Rochelle',6,3,34,8),(20,'Roniel',6,3,34,8),(21,'Avegail',1,3,35,7),(22,'Ariel',1,3,35,7),(23,'Anna Mae',1,3,35,7),(24,'Agnesse',1,3,35,7),(31,'Alas',8,3,38,22),(32,'Jocelyn',1,3,NULL,NULL),(33,'Marianne',1,3,NULL,NULL),(34,'Ritzel',6,3,NULL,NULL),(35,'Purificacion',7,3,NULL,NULL),(36,'Antonio Sr.',1,3,NULL,NULL),(37,'Trinidad',1,3,NULL,NULL),(38,'Sarah',NULL,8,NULL,NULL);
/*!40000 ALTER TABLE `app_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(2000) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `postId` (`postId`),
  KEY `userId` (`userId`),
  KEY `parentId` (`parentId`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`),
  CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`parentId`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `jumbo_price` float NOT NULL,
  `xl_price` float NOT NULL,
  `l_price` float NOT NULL,
  `m_price` float NOT NULL,
  `s_price` float NOT NULL,
  `p_price` float NOT NULL,
  `pwe_price` float NOT NULL,
  `d2_price` float NOT NULL,
  `marble_price` float NOT NULL,
  `d1b_price` float NOT NULL,
  `d1s_price` float NOT NULL,
  `b1_price` float NOT NULL,
  `b2_price` float NOT NULL,
  `b3_price` float NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downvote`
--

DROP TABLE IF EXISTS `downvote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downvote` (
  `downvoteId` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) DEFAULT NULL,
  `commentId` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`downvoteId`),
  KEY `postId` (`postId`),
  KEY `userId` (`userId`),
  KEY `commentId` (`commentId`),
  CONSTRAINT `downvote_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  CONSTRAINT `downvote_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`),
  CONSTRAINT `downvote_ibfk_3` FOREIGN KEY (`commentId`) REFERENCES `comment` (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downvote`
--

LOCK TABLES `downvote` WRITE;
/*!40000 ALTER TABLE `downvote` DISABLE KEYS */;
/*!40000 ALTER TABLE `downvote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `imageId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` enum('profile','cover','post') NOT NULL,
  PRIMARY KEY (`imageId`),
  KEY `userId` (`userId`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `likeId` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) DEFAULT NULL,
  `commentId` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`likeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_ibfk_1` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `postId` int(10) NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(100) NOT NULL,
  `post` longblob NOT NULL,
  `postUpvote` int(11) NOT NULL,
  `postDownvote` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  PRIMARY KEY (`postId`),
  KEY `poster` (`userId`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'jumbo'),(2,'xl'),(3,'l'),(4,'m'),(5,'s'),(6,'p'),(7,'pwe'),(8,'d2'),(9,'marble'),(10,'d1b'),(11,'d1s'),(12,'b1'),(13,'b2'),(14,'b3');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `replyId` int(11) NOT NULL AUTO_INCREMENT,
  `reply` varchar(2000) NOT NULL,
  `commentId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`replyId`),
  KEY `userId` (`userId`),
  KEY `commentId` (`commentId`),
  KEY `reply_ibfk_2` (`postId`),
  CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`commentId`) REFERENCES `comment` (`commentId`),
  CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `reportId` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `postOwnerId` int(11) NOT NULL,
  `reporterId` int(11) NOT NULL,
  PRIMARY KEY (`reportId`),
  KEY `postId` (`postId`),
  KEY `postOwnerId` (`postOwnerId`),
  KEY `reporterId` (`reporterId`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  CONSTRAINT `report_ibfk_2` FOREIGN KEY (`postOwnerId`) REFERENCES `user` (`user_id`),
  CONSTRAINT `report_ibfk_3` FOREIGN KEY (`reporterId`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upvote`
--

DROP TABLE IF EXISTS `upvote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upvote` (
  `upvoteId` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `commentId` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`upvoteId`),
  KEY `postId` (`postId`),
  KEY `userId` (`userId`),
  KEY `commentId` (`commentId`),
  CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`),
  CONSTRAINT `upvote_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`user_id`),
  CONSTRAINT `upvote_ibfk_3` FOREIGN KEY (`commentId`) REFERENCES `comment` (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upvote`
--

LOCK TABLES `upvote` WRITE;
/*!40000 ALTER TABLE `upvote` DISABLE KEYS */;
/*!40000 ALTER TABLE `upvote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'Default.png',
  `password` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_type` enum('administrator','standard') NOT NULL DEFAULT 'standard',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jude Francis','Igot','judigot@gmail.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','1996-12-14','male','Babag 1, Lapu-Lapu City','administrator'),(2,'Judy','Black','judigot@yahoo.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','1996-12-14','male','Babag 1, Lapu-Lapu City','standard'),(3,'Jofrey','Igot','jofrey@gmail.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','2000-10-06','male','Babag 1, Lapu-Lapu City','standard'),(4,'Joswel','Igot','joswel@gmail.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','2000-10-06','male','Babag 1, Lapu-Lapu City','standard'),(5,'Julian','Igot','julian@gmail.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','2002-04-01','male','Babag 1, Lapu-Lapu City','standard'),(6,'Jocelyn','Igot','joy@gmail.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','1962-06-10','female','Babag 1, Lapu-Lapu City','standard'),(7,'Welfredo','Igot','boy@gmail.com','Default.png','$2y$10$i9zJBTxI0KADKxwZMLu8l./k/mthk5t7iRMdLG.MtFZwjxhZc2WO6','1962-12-14','male','Babag 1, Lapu-Lapu City','standard'),(8,'Asda','Sdasd','judigsdsdsdot@gmail.com','Default.png','$2y$10$o49L65yZsgUsWMgDHY1ZxO/iqoR7PZhOfT5Lanef18.m32o/KnCCy',NULL,NULL,NULL,'standard');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-22 22:03:06
