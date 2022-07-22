-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: fict
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Current Database: `fict`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fict` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fict`;

--
-- Table structure for table `accounting`
--

DROP TABLE IF EXISTS `accounting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounting` (
  `ac_id` int(11) NOT NULL,
  `ac_ct` varchar(12) DEFAULT NULL,
  `ac_am` decimal(11,2) DEFAULT NULL,
  `ac_dt` datetime DEFAULT NULL,
  `ac_or` int(11) DEFAULT NULL,
  `ac_ds` int(11) DEFAULT NULL,
  `ac_md` char(4) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  KEY `IX_DT` (`ac_dt`),
  KEY `IX_AM` (`ac_am`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting`
--

LOCK TABLES `accounting` WRITE;
/*!40000 ALTER TABLE `accounting` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `ad_id` int(11) NOT NULL,
  `ad_us` int(11) DEFAULT NULL,
  `ad_nb` smallint(6) DEFAULT NULL,
  `ad_st` varchar(25) DEFAULT NULL,
  `ad_ps` smallint(5) unsigned DEFAULT NULL,
  `ad_zn` varchar(25) DEFAULT NULL,
  `ad_cy` varchar(16) DEFAULT NULL,
  `ad_ct` char(2) DEFAULT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `IX_PS` (`ad_ps`,`ad_cy`),
  KEY `IX_CY` (`ad_cy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,4,1401,'zen',17843,'variable','Cd. de Guatemala','GU'),(2,2,655,'hydrolysis',13928,'ideal','Belmopan','BE'),(3,8,1433,'intensity',65535,'chimpanzee','La Habana','CU'),(4,4,619,'noise',52311,'childhood','Cd. de Guatemala','GU'),(5,2,629,'newsprint',65535,'college','Houston','US'),(6,1,1047,'lecture',1961,'loquat','Aguascalientes','MX'),(7,8,490,'compassionate',65535,'alley','Belmopan','BE'),(8,1,1091,'guava',36923,'devastation','Belmopan','BE'),(9,2,508,'waveform',65535,'ellipse','Cd. de Guatemala','GU'),(10,5,683,'boil',35789,'caviar','Houston','US'),(11,6,728,'deserve',65535,'illiteracy','Belmopan','BE'),(12,1,1079,'blackbird',18662,'exposition','Aguascalientes','MX'),(13,6,1224,'parrot',65535,'savings','Aguascalientes','MX'),(14,7,683,'molar',27538,'parable','Aguascalientes','MX'),(15,2,1256,'tutor',9404,'mint','La Habana','CU'),(16,5,1385,'conduct',65535,'nicety','Ottawa','CA');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bank` (
  `bk_id` int(11) NOT NULL,
  `bk_us` int(11) DEFAULT NULL,
  `bk_br` varchar(20) DEFAULT NULL,
  `bk_nm` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`bk_id`),
  UNIQUE KEY `UQ_NM` (`bk_nm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES (1,6,'HSBC','4637030111189583'),(2,4,'BNOR','2281226277744429'),(3,10,'BNOR','8650323061389440'),(4,8,'SANT','2059622629755030'),(5,4,'BMEX','6781875258390328'),(6,3,'BBVA','9387677789671422'),(7,4,'BNOR','5301559522778141'),(8,4,'BNOR','5659886035434872'),(9,2,'SCOT','4137447841165434'),(10,4,'BNOR','5101989761287380'),(11,2,'BBVA','8109065009897268'),(12,6,'SCOT','8880807437505973'),(13,7,'BNOR','8473281166070681'),(14,6,'BNOR','9704869878974047');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email` (
  `em_id` int(11) NOT NULL,
  `em_us` int(11) DEFAULT NULL,
  `em_em` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`em_id`),
  UNIQUE KEY `UQ_EM` (`em_em`),
  KEY `IX_EM` (`em_em`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,1,'highland@hotmail.com'),(2,2,'blend@hotmail.com'),(3,3,'copper@gmail.com'),(4,4,'prevent@yahoo.com'),(5,5,'fly@gmail.com'),(6,6,'compost@yahoo.com'),(7,7,'monasticism@yahoo.com'),(8,8,'couch@gmail.com'),(9,9,'pine@hotmail.com'),(10,10,'accept@yahoo.com'),(11,5,'colonization@hotmail.com'),(12,6,'forebear@gmail.com');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `it_or`
--

DROP TABLE IF EXISTS `it_or`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `it_or` (
  `or_id` int(11) DEFAULT NULL,
  `it_id` int(11) DEFAULT NULL,
  `io_am` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `it_or`
--

LOCK TABLES `it_or` WRITE;
/*!40000 ALTER TABLE `it_or` DISABLE KEYS */;
/*!40000 ALTER TABLE `it_or` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `it_id` int(11) NOT NULL,
  `it_nm` varchar(30) DEFAULT NULL,
  `it_ds` varchar(255) DEFAULT NULL,
  `it_in` float DEFAULT NULL,
  `it_ot` float DEFAULT NULL,
  `it_br` varchar(12) DEFAULT NULL,
  `it_mt` char(4) DEFAULT NULL,
  `it_cl` char(5) DEFAULT NULL,
  `it_tp` char(7) DEFAULT NULL,
  `it_wh` char(4) DEFAULT NULL,
  `it_rd` date DEFAULT NULL,
  `it_of` int(11) DEFAULT NULL,
  `it_ft` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`it_id`),
  KEY `IX_NM` (`it_nm`),
  KEY `IX_BR` (`it_br`),
  KEY `IX_OT` (`it_ot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'embarrassed whelp','0',1291.36,1575.46,'ECCO','DENM','ORANG','Bota','Niña','2019-01-06',5,1),(2,'telling elevation','0',1135.43,1385.22,'Hush Puppies','PIEL','GREEN','Work','Niña','2015-08-18',NULL,1),(3,'young trafficker','0',916.107,1117.65,'Adidas','CANV','BLACK','Slipp','Infa','2013-09-22',NULL,NULL),(4,'joyous moment','0',854.087,1041.99,'Caterpillar','RUBR','YELLW','Bota','Infa','2012-05-19',NULL,NULL),(5,'apathetic wrinkle','0',1369.08,1670.28,'Caterpillar','SYNT','BLUE','Atlet','Mujr','2015-10-19',5,1),(6,'knowledgeable e-reader','0',1544.48,1884.26,'Crocs','TEXT','RED','Clogs','Niño','2012-05-19',NULL,1),(7,'fallacious edible','0',839.318,1023.97,'ECCO','FOAM','ORANG','Clogs','Infa','2018-12-06',NULL,NULL),(8,'wonderful paper','0',1853.45,2261.21,'Caterpillar','CANV','BROWN','Bota','Infa','2010-10-18',NULL,NULL),(9,'scientific cuisine','0',733.602,894.99,'ECCO','CANV','GREEN','Work','Unsx','2019-11-11',NULL,1),(10,'peaceful setting','0',1880.86,2294.65,'Hush Puppies','RUBR','GREEN','Clogs','Niño','2013-07-14',NULL,NULL),(11,'slow sidewalk','0',1613.79,1968.82,'Hush Puppies','FOAM','BLACK','Clogs','Niña','2013-09-04',NULL,NULL),(12,'rough barrier','0',1169.94,1427.32,'Caterpillar','CANV','RED','Atlet','Unsx','2010-02-11',NULL,1),(13,'gaping foresee','0',1526.48,1862.31,'SAS','RUBR','GREEN','Bota','Unsx','2010-01-12',NULL,NULL),(14,'lopsided youngster','0',817.026,996.77,'Hush Puppies','PIEL','YELLW','Atlet','Homb','2015-05-23',NULL,1),(15,'mute remains','0',1388.11,1693.49,'Caterpillar','CANV','GREEN','Work','Mujr','2011-09-20',NULL,1),(16,'jaded light','0',438.607,535.1,'Nike','DENM','BLUE','Atlet','Infa','2011-05-22',NULL,1),(17,'grotesque discipline','0',1650.74,2013.9,'Converse','FOAM','GREEN','Atlet','Niña','2018-09-25',5,1),(18,'spiritual dial','0',1813.14,2212.03,'SAS','DENM','RED','Clogs','Niño','2018-09-24',NULL,NULL),(19,'easy guava','0',789.353,963.01,'Crocs','CANV','ORANG','Loafr','Homb','2014-06-16',5,1),(20,'obtainable formulate','0',1085.19,1323.93,'Crocs','RUBR','GREEN','Clogs','Unsx','2012-03-11',NULL,NULL),(21,'ultra bull','0',1116.45,1362.07,'Hush Puppies','PIEL','BLUE','Sanda','Niña','2017-07-02',NULL,1),(22,'blue-eyed barrel','0',772.738,942.74,'Adidas','PIEL','ORANG','Loafr','Niño','2017-07-06',5,1),(23,'parsimonious friend','0',1294.19,1578.91,'Caterpillar','TEXT','BLUE','Work','Niño','2021-07-16',NULL,NULL),(24,'abandoned maintenance','0',1056.52,1288.96,'Nike','CANV','GREEN','Atlet','Niño','2017-08-14',NULL,NULL),(25,'big sole','0',1780.09,2171.71,'ECCO','FOAM','ORANG','Sanda','Unsx','2012-03-05',NULL,NULL),(26,'harsh rhyme','0',1169.9,1427.28,'SAS','PIEL','BLACK','Slipp','Unsx','2010-11-14',NULL,NULL),(27,'roomy plumber','0',1366.44,1667.05,'ECCO','DENM','GREEN','Slipp','Mujr','2012-08-10',NULL,1),(28,'wonderful bump','0',1478.04,1803.21,'Crocs','TEXT','ORANG','Slipp','Niña','2018-10-21',NULL,NULL),(29,'invincible history','0',1051.82,1283.21,'Nike','CANV','BROWN','Sanda','Mujr','2010-03-21',NULL,NULL),(30,'nappy dissect','0',967.4,1180.23,'SAS','CANV','WHITE','Loafr','Mujr','2010-07-15',NULL,1),(31,'skillful undertaker','0',852.206,1039.69,'Caterpillar','CANV','BROWN','Sanda','Niña','2014-05-30',NULL,NULL),(32,'ahead tadpole','0',1398.73,1706.45,'Caterpillar','TEXT','RED','Bota','Unsx','2017-03-30',6,NULL),(33,'muddy mouser','0',895.991,1093.11,'Nike','SYNT','ORANG','Taco','Unsx','2016-06-29',NULL,NULL),(34,'swift favorite','0',526.409,642.22,'Converse','FOAM','YELLW','Sanda','Unsx','2013-01-07',NULL,1),(35,'blue-eyed worry','0',309.692,377.82,'Nike','DENM','GREEN','Slipp','Homb','2020-09-16',NULL,NULL),(36,'abashed licence','0',663.192,809.09,'Caterpillar','SYNT','RED','Sanda','Niño','2013-08-16',NULL,NULL),(37,'placid ore','0',342.247,417.54,'SAS','TEXT','ORANG','Work','Infa','2010-02-21',NULL,NULL),(38,'raspy finding','0',1511.96,1844.6,'Nike','FOAM','YELLW','Bota','Unsx','2022-03-05',NULL,NULL),(39,'coherent endothelium','0',741.045,904.07,'Adidas','CANV','BLACK','Taco','Niña','2016-10-29',NULL,NULL),(40,'oval raise','0',1061.57,1295.11,'ECCO','TEXT','GREEN','Clogs','Infa','2012-01-13',NULL,1),(41,'sparkling guava','0',1080.22,1317.87,'Converse','FOAM','WHITE','Loafr','Unsx','2017-10-06',NULL,NULL),(42,'wry slide','0',1234.82,1506.48,'Nike','SYNT','YELLW','Sanda','Niña','2019-04-07',NULL,NULL),(43,'absorbing swimsuit','0',899.405,1097.27,'Adidas','PIEL','GREEN','Clogs','Niña','2019-03-18',5,1),(44,'quick ornament','0',1516.67,1850.34,'SAS','TEXT','BLACK','Sanda','Niño','2011-10-25',NULL,NULL),(45,'fancy basement','0',642.484,783.83,'Adidas','CANV','BLACK','Sanda','Niña','2016-08-13',5,1),(46,'accurate poignance','0',1540.94,1879.94,'Converse','DENM','ORANG','Atlet','Niño','2019-08-07',6,NULL),(47,'helpful fax','0',1690.08,2061.89,'Crocs','DENM','ORANG','Clogs','Niño','2012-06-12',NULL,NULL),(48,'adhesive halloween','0',1366.01,1666.53,'SAS','RUBR','BROWN','Sanda','Niña','2013-08-27',NULL,NULL),(49,'innocent debris','0',1697.21,2070.59,'Crocs','FOAM','GREEN','Atlet','Unsx','2012-09-28',NULL,NULL),(50,'tough nobody','0',1626.94,1984.87,'SAS','RUBR','WHITE','Bota','Unsx','2015-03-22',NULL,1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `of_id` int(11) NOT NULL,
  `of_st` date DEFAULT NULL,
  `of_ed` date DEFAULT NULL,
  `of_am` tinyint(4) DEFAULT NULL,
  `of_ds` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`of_id`),
  UNIQUE KEY `UQ_OF` (`of_st`),
  KEY `IX_OFDT` (`of_st`,`of_ed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `or_us` int(11) DEFAULT NULL,
  `or_in` datetime DEFAULT NULL,
  `or_fl` datetime DEFAULT NULL,
  `or_is` tinyint(4) DEFAULT NULL,
  `or_py` smallint(6) DEFAULT NULL,
  `or_pd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`or_id`),
  KEY `IX_ORPY` (`or_py`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'2011-03-08 00:00:00','2019-12-09 00:00:00',0,586,1),(2,2,'2012-04-27 00:00:00','2013-08-06 00:00:00',0,4930,1),(3,3,'2015-12-12 00:00:00','2017-07-25 00:00:00',0,4637,1),(4,4,'2015-07-05 00:00:00','2016-05-06 00:00:00',0,3718,1),(5,5,'2012-07-11 00:00:00','2013-07-11 00:00:00',0,719,1),(6,6,'2011-12-01 00:00:00','2017-09-18 00:00:00',0,2879,1),(7,7,'2019-05-25 00:00:00','2020-02-19 00:00:00',0,2730,1),(8,8,'2010-01-29 00:00:00','2015-07-05 00:00:00',0,2511,1),(9,9,'2014-05-21 00:00:00','2021-07-11 00:00:00',0,2914,1),(10,10,'2013-11-24 00:00:00','2015-01-03 00:00:00',0,4722,1),(11,10,'2017-12-29 00:00:00','2020-03-05 00:00:00',0,981,1),(12,1,'2018-10-09 00:00:00','2021-12-26 00:00:00',0,2599,1),(13,8,'2017-04-11 00:00:00','2019-03-09 00:00:00',0,4584,1),(14,1,'2015-10-01 00:00:00','2016-12-11 00:00:00',0,2030,1),(15,2,'2010-08-18 00:00:00','2015-09-08 00:00:00',0,2676,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phone` (
  `ph_id` int(11) NOT NULL,
  `ph_us` int(11) DEFAULT NULL,
  `ph_nm` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ph_id`),
  UNIQUE KEY `UQ_PH` (`ph_nm`),
  KEY `IX_PH` (`ph_nm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
INSERT INTO `phone` VALUES (1,1,'818196718973942'),(2,2,'594903947452311'),(3,3,'553966536388616'),(4,4,'222415815633524'),(5,5,'741485786960409'),(6,6,'364519504498803'),(7,7,'806453586103371'),(8,8,'280682716804410'),(9,9,'147590969926478'),(10,10,'424608036245632'),(11,4,'957885159933947'),(12,3,'655010168176051'),(13,2,'922343474146232');
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provider` (
  `pr_id` int(11) NOT NULL,
  `pr_nm` varchar(20) DEFAULT NULL,
  `pr_wb` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`pr_id`),
  UNIQUE KEY `UQ_WB` (`pr_wb`),
  KEY `IX_WBNM` (`pr_nm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `score` (
  `sc_id` int(11) NOT NULL,
  `sc_it` int(11) DEFAULT NULL,
  `sc_us` int(11) DEFAULT NULL,
  `sc_se` int(11) DEFAULT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `st_id` int(11) NOT NULL,
  `st_it` int(11) DEFAULT NULL,
  `st_st` tinyint(4) DEFAULT NULL,
  `st_lc` tinyint(4) DEFAULT NULL,
  `st_sz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`st_id`),
  KEY `IX_STSZ` (`st_sz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `us_id` int(11) NOT NULL,
  `us_an` varchar(16) DEFAULT NULL,
  `us_dn` varchar(32) DEFAULT NULL,
  `us_nm` varchar(16) DEFAULT NULL,
  `us_ln` varchar(32) DEFAULT NULL,
  `us_pw` varchar(100) DEFAULT NULL,
  `us_pr` int(11) DEFAULT NULL,
  `us_al` int(11) DEFAULT NULL,
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `UQ_USAN` (`us_an`),
  UNIQUE KEY `UQ_USDN` (`us_dn`),
  KEY `IX_USPR` (`us_pr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jared3540','cagey drug','Jared','Rhodes','ODetQmC1Fgfqnf7rMJTdRTdJzrOZh7TrJD5DfyQAtNt8xjG9JMMtDKvZrqxbu2v7',NULL,3),(2,'Donna5936','tasteful soda','Donna','Clement','WglYpwEFoMBCyK78SQQF9INi1oRaQchSumnxgPxhMC3jQAzGmlqGqYkhjcdCQWXB',NULL,3),(3,'Robin4070','talented soda','Robin','Smith','mKr81JDBHiZKaaSAcwjOXVuGydn6Phbjs7jnnxEBTQ0IvR9lK4PenFObqoocSWlf',NULL,3),(4,'Jamie9889','wary canal','Jamie','Fajardo','Sn5ireKJEymUbZn0yzhPOjZHWzJUitMK3sFJlaErnYezBiT7m7hQaoamA74zrOsa',NULL,3),(5,'William1292','wise movement','William','Mackinder','5q7blSOPCmQAThGm3wyA26EAiXOdkO5CuBnT7boxTed6AdIVn56lRRhfFJAx0K2h',NULL,3),(6,'Steven1613','decorous endure','Steven','Wilson','n8qNG4bwwTX8m0nnqb86uivwnNj6Flbcppq1GZnziOIgJfxS0or5JvvvvbDYKsyx',NULL,3),(7,'Steven7213','hollow bestseller','Steven','Wilson','OhtBDZ8ohvHuW13gJP2kcaoqkCOhTW1rvXWmovhF4QzyKjPia3EEwJC5W4wBlprc',NULL,3),(8,'John5473','cynical thickness','John','Gregorio','soJQBnwzlfHvSy4CXJ3eRResILRamaUH6XenCJztnriemFKpLSc2zA2mr2JHIpOp',NULL,3),(9,'Michael130','wacky cornerstone','Michael','Johnson','ejqpTlRpoHatrdGLrRIhi8U4FfmUyN1bJ7MSlz7eWngcL8H9VOTbKfbzAZd810mv',NULL,3),(10,'Alfred777','maniacal owl','Alfred','Mills','ZGFOf6xb7tuLouRK44YDKnfVwXff5XMyPQ6bSpK4pjTPW37WpZdd7V1F40u0BdbK',NULL,3);
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

-- Dump completed on 2022-07-22  2:06:42
