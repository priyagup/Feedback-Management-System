-- MySQL dump 10.13  Distrib 5.6.23, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: fms
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `api_access`
--

DROP TABLE IF EXISTS `api_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_access`
--

LOCK TABLES `api_access` WRITE;
/*!40000 ALTER TABLE `api_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_keys`
--

LOCK TABLES `api_keys` WRITE;
/*!40000 ALTER TABLE `api_keys` DISABLE KEYS */;
INSERT INTO `api_keys` VALUES (1,'e569f2386902fbe5c8e796b383bda0806da06b14',10,1,0,NULL,1430076006),(2,'6ead6dfe90a65f0d50449092e99bc995a5f0308a',1,1,0,NULL,1430306114),(3,'6d2397f220d3329fe0f348183a5652b16d1c1032',1,1,0,NULL,1430306196),(4,'bdd125f2f779b58435593185bc275d35e80c63e4',1,1,0,NULL,1430662990);
/*!40000 ALTER TABLE `api_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_logs`
--

DROP TABLE IF EXISTS `api_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` tinyint(1) NOT NULL,
  `response_code` smallint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_logs`
--

LOCK TABLES `api_logs` WRITE;
/*!40000 ALTER TABLE `api_logs` DISABLE KEYS */;
INSERT INTO `api_logs` VALUES (1,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429992171,0.0840001,1,200),(2,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429992196,0.0809999,1,200),(3,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:8:\"Jinendra\";s:9:\"last_name\";s:6:\"Ghodke\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429992228,0.0829999,1,200),(4,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:8:\"Jinendra\";s:9:\"last_name\";s:6:\"Ghodke\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429992243,0.0730002,1,200),(5,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:8:\"Jinendra\";s:9:\"last_name\";s:6:\"Ghodke\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429992986,0.0829999,1,0),(6,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:8:\"Jinendra\";s:9:\"last_name\";s:6:\"Ghodke\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429993061,0.0879998,1,200),(7,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429993076,0.082,1,200),(8,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1429995678,0.0829999,1,200),(9,'api/example/users','get',NULL,'','127.0.0.1',1430043531,0.0540001,1,200),(10,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430074316,0.099,1,200),(11,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430074330,0.075,1,200),(12,'api/checkin/data/format/serialize','post','a:12:{s:6:\"format\";s:9:\"serialize\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430074347,0.079,1,200),(13,'api/checkin/data/format/html','post','a:12:{s:6:\"format\";s:4:\"html\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430074359,0.072,1,200),(14,'api/key/index','put',NULL,'','10.19.38.122',1430075519,NULL,1,0),(15,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','','10.19.38.122',1430075710,NULL,1,0),(16,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','','10.19.38.122',1430075898,NULL,1,0),(17,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','','10.19.38.122',1430076006,0.036,1,201),(18,'api/example/users/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.38.122',1430076285,0.0289998,0,403),(19,'api/example/users/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.38.122',1430076476,0.052,0,403),(20,'api/example/users/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.38.122',1430076502,0.03,0,403),(21,'api/example/keye569f2386902fbe5c8e796b383bda0806da06b14/users/format/json','get','a:2:{s:5:\"users\";s:6:\"format\";s:4:\"json\";N;}','','10.19.38.122',1430076870,0.03,0,403),(22,'api/example/keye569f2386902fbe5c8e796b383bda0806da06b14/users/format/json','get','a:2:{s:5:\"users\";s:6:\"format\";s:4:\"json\";N;}','','10.19.38.122',1430076877,0.0389998,0,403),(23,'api/example/key/e569f2386902fbe5c8e796b383bda0806da06b14/users/format/json','get','a:2:{s:40:\"e569f2386902fbe5c8e796b383bda0806da06b14\";s:5:\"users\";s:6:\"format\";s:4:\"json\";}','','10.19.38.122',1430076892,0.0280001,0,403),(24,'api/example/key/users/e569f2386902fbe5c8e796b383bda0806da06b14/format/json','get','a:2:{s:5:\"users\";s:40:\"e569f2386902fbe5c8e796b383bda0806da06b14\";s:6:\"format\";s:4:\"json\";}','','10.19.38.122',1430076924,0.0279999,0,403),(25,'api/example/users/key/e569f2386902fbe5c8e796b383bda0806da06b14/format/json','get','a:2:{s:3:\"key\";s:40:\"e569f2386902fbe5c8e796b383bda0806da06b14\";s:6:\"format\";s:4:\"json\";}','','10.19.38.122',1430076938,0.033,0,403),(26,'api/example/users/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430077255,0.043,1,200),(27,'api/example/users/format/xml','get','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430077289,0.0450001,1,200),(28,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430077378,0.0960002,1,200),(29,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430077880,0.0540001,0,401),(30,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430078042,0.0790002,1,200),(31,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','','10.19.38.122',1430078246,0.046,0,403),(32,'api/key/index/format/xml','put','a:2:{s:6:\"format\";s:3:\"xml\";s:9:\"X-API-KEY\";s:5:\"rahul\";}','','10.19.38.122',1430078307,0.0339999,0,403),(33,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430078323,0.0320001,0,401),(34,'api/checkin/data/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.37.71',1430117616,0.055006,0,403),(35,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430136421,0.0940001,1,200),(36,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430136440,0.082,1,200),(37,'api/checkin/data/format/html','post','a:12:{s:6:\"format\";s:4:\"html\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430136456,0.0930002,1,200),(38,'api/checkin/data/format/html','post','a:12:{s:6:\"format\";s:4:\"html\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430136474,0.0580001,0,403),(39,'api/checkin/data/format/html','post','a:12:{s:6:\"format\";s:4:\"html\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:0:\"\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430136597,0.0710001,1,200),(40,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:0:\"\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430136638,0.065078,1,200),(41,'api/checkin/data/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.38.138',1430199841,0.0660059,0,403),(42,'api/checkin/data/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.38.138',1430199855,0.068006,0,403),(43,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430209627,0.0739999,0,403),(44,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:0:\"\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430209678,0.0709999,1,200),(45,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430210082,0.095,1,200),(46,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430210100,0.0869999,0,403),(47,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430305855,0.076,0,401),(48,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430305887,0.0369999,0,401),(49,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','','10.19.38.122',1430305913,0.0320001,0,403),(50,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430306114,0.0439999,1,201),(51,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430306160,0.036,0,403),(52,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430306176,0.0380001,0,403),(53,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430306196,0.0450001,1,201),(54,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430382338,0.0970099,1,200),(55,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430382350,0.0830081,1,200),(56,'api/checkin/data/format/html','post','a:12:{s:6:\"format\";s:4:\"html\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430382359,0.0950089,1,200),(57,'api/checkin/data/format/serialize','post','a:12:{s:6:\"format\";s:9:\"serialize\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430382369,0.0940089,1,200),(58,'api/checkin/data/format/serialize','post','a:12:{s:6:\"format\";s:9:\"serialize\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430382383,0.0520051,0,403),(59,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430662537,0.11,1,200),(60,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:0:\"\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430662655,0.0829999,1,200),(61,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:7:\"0000000\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430662671,0.0710001,1,200),(62,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430662723,0.0800002,1,200),(63,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430662920,0.0670002,0,403),(64,'api/key/index/format/xml','put','a:1:{s:6:\"format\";s:3:\"xml\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430662990,0.0479999,1,201),(65,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430768221,0.136013,1,200),(66,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430768242,0.090009,1,200),(67,'api/checkin/data/format/xml','post','a:12:{s:6:\"format\";s:3:\"xml\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','','10.19.38.122',1430768278,0.0500052,0,403),(68,'api/checkin/data/format/json','post','a:12:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:3:\"age\";s:2:\"22\";s:5:\"email\";s:21:\"rahul.bussa@gmail.com\";s:7:\"address\";s:17:\"Magarpatta cosmos\";s:3:\"dob\";s:8:\"22-59-21\";s:7:\"checkin\";s:9:\"25-4-2015\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";s:9:\"room_type\";s:5:\"delux\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1430857147,0.106011,1,200),(69,'api/checkin/data/format/json','get','a:1:{s:6:\"format\";s:4:\"json\";}','','10.19.37.71',1430892972,0.0680001,0,403),(70,'api/checkin','get',NULL,'','127.0.0.1',1430993705,0.0829999,0,403),(71,'api/example','get',NULL,'','127.0.0.1',1431034357,0.0480001,0,403),(72,'api/checkout/checkoutuser/format/json','post','a:7:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:18:\"checkout_timestamp\";s:18:\"25-4-2015 10:15:21\";s:10:\"hotel_name\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1431040109,0.0699999,1,200),(73,'api/checkout/checkoutuser/format/json','post','a:7:{s:6:\"format\";s:4:\"json\";s:10:\"first_name\";s:5:\"Rahul\";s:9:\"last_name\";s:5:\"Bussa\";s:14:\"contact_number\";s:10:\"9767506576\";s:18:\"checkout_timestamp\";s:18:\"25-4-2015 10:15:21\";s:5:\"hotel\";s:6:\"cocoon\";s:14:\"hotel_location\";s:10:\"magarpatta\";}','e569f2386902fbe5c8e796b383bda0806da06b14','10.19.38.122',1431040127,NULL,1,0);
/*!40000 ALTER TABLE `api_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fms_customer`
--

DROP TABLE IF EXISTS `fms_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fms_customer` (
  `customer_id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `contact_number` varchar(12) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `last_modified` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fms_customer`
--

LOCK TABLES `fms_customer` WRITE;
/*!40000 ALTER TABLE `fms_customer` DISABLE KEYS */;
INSERT INTO `fms_customer` VALUES (1,'Rahul','Bussa','9767506576','rahul.bussa@gmail.com','Magarpatta cosmos',22,'22-59-21','2015-04-26 01:31:43'),(2,'Jinendra','Ghodke','9767506576','rahul.bussa@gmail.com','Magarpatta cosmos',22,'22-59-21','2015-04-26 01:33:48');
/*!40000 ALTER TABLE `fms_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fms_customer_feedback`
--

DROP TABLE IF EXISTS `fms_customer_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fms_customer_feedback` (
  `feedback_id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `customer_id` mediumint(10) DEFAULT NULL,
  `feedback_message` varchar(45) DEFAULT NULL,
  `feedback_status` varchar(45) DEFAULT NULL,
  `created_date` varchar(45) DEFAULT NULL,
  `modified_date` varchar(45) DEFAULT NULL,
  `reservation_id` mediumint(10) DEFAULT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `customer_id_idx` (`customer_id`),
  KEY `reservation_id_idx` (`reservation_id`),
  CONSTRAINT `fms_customer_feedback_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `fms_customer` (`customer_id`),
  CONSTRAINT `fms_customer_feedback_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `fms_reservation` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fms_customer_feedback`
--

LOCK TABLES `fms_customer_feedback` WRITE;
/*!40000 ALTER TABLE `fms_customer_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `fms_customer_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fms_loyalty`
--

DROP TABLE IF EXISTS `fms_loyalty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fms_loyalty` (
  `loyalty_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` mediumint(10) DEFAULT NULL,
  `reservation_id` mediumint(10) DEFAULT NULL,
  `loyalty_points` int(11) DEFAULT NULL,
  `loyalty_phase` varchar(45) DEFAULT NULL,
  `loyalty_type` varchar(45) DEFAULT NULL,
  `loyalty_value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`loyalty_id`),
  KEY `customer_id` (`customer_id`),
  KEY `reservation_id` (`reservation_id`),
  CONSTRAINT `fms_loyalty_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `fms_customer` (`customer_id`),
  CONSTRAINT `fms_loyalty_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `fms_reservation` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fms_loyalty`
--

LOCK TABLES `fms_loyalty` WRITE;
/*!40000 ALTER TABLE `fms_loyalty` DISABLE KEYS */;
/*!40000 ALTER TABLE `fms_loyalty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fms_process_feedback`
--

DROP TABLE IF EXISTS `fms_process_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fms_process_feedback` (
  `processed_fdbck_id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `customer_id` mediumint(10) DEFAULT NULL,
  `reservation_id` mediumint(10) DEFAULT NULL,
  `feedback_id` mediumint(10) DEFAULT NULL,
  `feedback_category` varchar(45) DEFAULT NULL,
  `category_rating` varchar(10) DEFAULT NULL,
  `category_message` varchar(45) DEFAULT NULL,
  `created_date` varchar(45) DEFAULT NULL,
  `modified_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`processed_fdbck_id`),
  KEY `customer_id` (`customer_id`),
  KEY `reservation_id` (`reservation_id`),
  KEY `feedback_id` (`feedback_id`),
  CONSTRAINT `fms_process_feedback_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `fms_customer` (`customer_id`),
  CONSTRAINT `fms_process_feedback_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `fms_reservation` (`reservation_id`),
  CONSTRAINT `fms_process_feedback_ibfk_3` FOREIGN KEY (`feedback_id`) REFERENCES `fms_customer_feedback` (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fms_process_feedback`
--

LOCK TABLES `fms_process_feedback` WRITE;
/*!40000 ALTER TABLE `fms_process_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `fms_process_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fms_reservation`
--

DROP TABLE IF EXISTS `fms_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fms_reservation` (
  `reservation_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `checkin_timestamp` varchar(45) DEFAULT NULL,
  `checkout_timestamp` varchar(45) DEFAULT NULL,
  `hotel_name` varchar(45) DEFAULT NULL,
  `hotel_location` varchar(45) DEFAULT NULL,
  `room_type` varchar(45) DEFAULT NULL,
  `customer_id` mediumint(10) DEFAULT NULL,
  `last_modified` varchar(50) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `customer_id_idx` (`customer_id`),
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `fms_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fms_reservation`
--

LOCK TABLES `fms_reservation` WRITE;
/*!40000 ALTER TABLE `fms_reservation` DISABLE KEYS */;
INSERT INTO `fms_reservation` VALUES (1,'25-4-2015',NULL,'cocoon','magarpatta','delux',2,'2015-04-26 01:47:41'),(2,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-26 01:47:57'),(3,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-26 02:31:18'),(4,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 00:21:56'),(5,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 00:22:10'),(6,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 00:22:27'),(7,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 00:22:39'),(8,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 01:12:58'),(9,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 01:24:02'),(10,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 17:37:01'),(11,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 17:37:20'),(12,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-27 17:37:36'),(13,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-28 14:04:42'),(14,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-30 13:55:38'),(15,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-30 13:55:50'),(16,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-30 13:55:59'),(17,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-04-30 13:56:09'),(18,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-05-03 19:45:37'),(19,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-05-03 19:48:43'),(20,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-05-05 01:07:01'),(21,'25-4-2015',NULL,'cocoon','magarpatta','delux',1,'2015-05-05 01:07:22'),(22,'25-4-2015','25-4-2015 10:15:21','cocoon','magarpatta','delux',1,'2015-05-07 23:08:47');
/*!40000 ALTER TABLE `fms_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qr_data`
--

DROP TABLE IF EXISTS `qr_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qr_data` (
  `qr_id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `last_modified` varchar(50) NOT NULL,
  PRIMARY KEY (`qr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qr_data`
--

LOCK TABLES `qr_data` WRITE;
/*!40000 ALTER TABLE `qr_data` DISABLE KEYS */;
INSERT INTO `qr_data` VALUES (1,'https://docs.google.com/forms/d/1j1TlSYUa__PATxNjwWSekxTazskny18tZrpPkIORxqM/viewform','Cocoon Link','http://rahulbus03/FMS//public/app/vr2uzp0t.png','2015-04-27 17:48:24'),(2,'https://www.facebook.com/public/Rahul-Bussa','Rahul Facebook Link','http://rahulbus03/FMS//public/app/znvk5vdc.png','2015-04-30 13:45:58'),(3,'http://rahulbus03/FMS//public/app/vr2uzp0t.png','My facebook link','http://rahulbus03/FMS//public/app/l9joi7zs.png','2015-05-03 19:36:00'),(4,'https://www.facebook.com/rahul.rocking.104','Rahul FB public profile','http://rahulbus03/FMS//public/app/80h47jpd.png','2015-05-07 00:52:34'),(5,'Rashmita Panda','Rahul FB public profile','http://rahulbus03/FMS//public/app/159xsr8y.png','2015-05-07 00:53:56');
/*!40000 ALTER TABLE `qr_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'fms'
--

--
-- Dumping routines for database 'fms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-08 19:25:21
