-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: wifi_manager
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `hotspots`
--

DROP TABLE IF EXISTS `hotspots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotspots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `concurrent` int(11) DEFAULT NULL,
  `disconnect` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotspots`
--

LOCK TABLES `hotspots` WRITE;
/*!40000 ALTER TABLE `hotspots` DISABLE KEYS */;
INSERT INTO `hotspots` VALUES (1,8,1,1,0,'80447496','DVRTX','2016-07-14 17:00:00','2016-07-13 16:42:00','2016-07-13 16:42:00'),(2,8,1,1,0,'63632751','EXCYY','2016-07-14 17:00:00','2016-07-13 16:42:00','2016-07-13 16:42:00'),(3,8,1,10,0,'17113582','QUKAM','2016-07-14 17:00:00','2016-07-13 16:47:04','2016-07-13 16:47:04');
/*!40000 ALTER TABLE `hotspots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nas`
--

DROP TABLE IF EXISTS `nas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  PRIMARY KEY (`id`),
  KEY `nasname` (`nasname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nas`
--

LOCK TABLES `nas` WRITE;
/*!40000 ALTER TABLE `nas` DISABLE KEYS */;
/*!40000 ALTER TABLE `nas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `upload` varchar(50) DEFAULT NULL,
  `download` varchar(50) DEFAULT NULL,
  `volume` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,8,'Basic 500M','basic','1m','1m',524288000,'2016-07-12 22:59:07','2016-07-12 22:59:07'),(2,8,'test','test','1m','1m',1048576,'2016-07-12 23:09:16','2016-07-12 23:09:16');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radacct`
--

DROP TABLE IF EXISTS `radacct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radacct` (
  `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) unsigned DEFAULT NULL,
  `acctstopdelay` int(12) unsigned DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`radacctid`),
  UNIQUE KEY `acctuniqueid` (`acctuniqueid`),
  KEY `username` (`username`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `acctsessionid` (`acctsessionid`),
  KEY `acctsessiontime` (`acctsessiontime`),
  KEY `acctstarttime` (`acctstarttime`),
  KEY `acctstoptime` (`acctstoptime`),
  KEY `nasipaddress` (`nasipaddress`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radacct`
--

LOCK TABLES `radacct` WRITE;
/*!40000 ALTER TABLE `radacct` DISABLE KEYS */;
INSERT INTO `radacct` VALUES (23,'80400007','8fa6203bb588dc10','lumia','','','192.168.0.102','2151677959','Wireless-802.11','2016-07-06 02:03:15','2016-07-06 02:16:04',769,'','','',0,0,'server1','F8:16:54:95:C3:74','','','','192.168.88.243',0,0,''),(25,'8010000d','22c213f0c0819342','prepaid1','','','192.168.0.102','2148532237','Wireless-802.11','2016-07-06 02:26:57','2016-07-06 02:37:07',609,'','','',3357,3291,'hotspot1','30:0D:43:E3:02:D8','Admin-Reset','','','192.168.88.241',0,0,''),(26,'8010000f','abbec0d51e05f7bd','lumia','','','192.168.0.102','2148532239','Wireless-802.11','2016-07-06 02:34:55','2016-07-06 02:44:52',596,'','','',381305,8480841,'hotspot1','F8:16:54:95:C3:74','Admin-Reset','','','192.168.88.243',0,0,''),(27,'80100010','ab78c63549be1a42','lumia','','','192.168.0.102','2148532240','Wireless-802.11','2016-07-06 02:47:04','2016-07-06 02:48:14',70,'','','',6408,4323,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.243',0,0,''),(28,'80100012','fc28b5cbf06782be','lumia','','','192.168.0.102','2148532242','Wireless-802.11','2016-07-06 02:49:50','2016-07-06 02:52:02',133,'','','',91618,70484,'hotspot1','F8:16:54:95:C3:74','Admin-Reset','','','192.168.88.243',0,0,''),(29,'80100015','bdfd066d5b2665cf','lumia','','','192.168.0.102','2148532245','Wireless-802.11','2016-07-06 03:48:14','2016-07-06 04:03:09',894,'','','',518436,343781,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.243',0,0,''),(31,'80100016','c57953522080d2d7','lumia','','','192.168.0.102','2148532246','Wireless-802.11','2016-07-06 04:05:31','2016-07-06 04:11:29',477,'','','',182110,253854,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.243',1,0,''),(34,'80100017','e0d51f7104196522','lumia','','','192.168.0.102','2148532247','Wireless-802.11','2016-07-06 04:15:32',NULL,0,'','','',0,0,'hotspot1','F8:16:54:95:C3:74','','','','192.168.88.243',0,0,''),(35,'8010001d','42206a7668d2fe4e','gogogo','','','192.168.0.102','2148532253','Wireless-802.11','2016-07-06 04:51:39','2016-07-06 04:58:03',384,'','','',24212,2243,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.243',1,0,''),(38,'8010001e','ccbf98e5f9bc2817','lumiaa','','','192.168.0.102','2148532254','Wireless-802.11','2016-07-06 05:05:35','2016-07-11 23:35:21',613,'','','',132584,100767,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.243',0,0,''),(39,'80100020','16506a407962d632','lumiaa','','','192.168.0.102','2148532256','Wireless-802.11','2016-07-11 23:35:36','2016-07-11 23:37:45',128,'','','',10738,264,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.243',0,0,''),(40,'80100021','3069efa7be890bd1','lumiaa','','','192.168.0.102','2148532257','Wireless-802.11','2016-07-11 23:37:54','2016-07-11 23:40:00',126,'','','',17377,12677,'hotspot1','F8:16:54:95:C3:74','Session-Timeout','','','192.168.88.243',0,0,''),(41,'80100024','e149286e467d22a9','prepaid001','','','192.168.0.103','2148532260','Wireless-802.11','2016-07-12 09:34:23','2016-07-12 10:18:06',2623,'','','',235754,324094,'hotspot1','F8:16:54:95:C3:74','Admin-Reset','','','192.168.88.243',0,0,''),(43,'80100026','de3f105026ad052d','prepaid001','','','192.168.0.103','2148532262','Wireless-802.11','2016-07-12 10:32:59','2016-07-12 10:38:12',314,'','','',53840,30633,'hotspot1','F8:16:54:95:C3:74','Admin-Reset','','','192.168.88.243',0,0,''),(44,'80100028','899ede5fb7b01ebf','prepaid001','','','192.168.0.103','2148532264','Wireless-802.11','2016-07-12 10:41:25','2016-07-12 10:43:02',96,'','','',656,0,'hotspot1','F8:16:54:95:C3:74','Admin-Reset','','','192.168.88.243',0,0,''),(45,'80100029','b2aa2f81ed56db2c','dahlan','','','192.168.0.103','2148532265','Wireless-802.11','2016-07-12 11:00:13','2016-07-12 11:03:33',200,'','','',229992,819885,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.243',0,0,''),(47,'8010002a','12fe8f38e513a4a7','dahlan','','','192.168.0.103','2148532266','Wireless-802.11','2016-07-12 11:05:24','2016-07-12 11:20:01',878,'','','',761748,286852,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.243',0,0,''),(49,'8010002b','3ca375915be34aaf','dahlan1','','','192.168.0.103','2148532267','Wireless-802.11','2016-07-12 11:18:04','2016-07-12 11:21:47',222,'','','',68002,109861,'hotspot1','D0:22:BE:D4:48:9A','User-Request','','','192.168.88.240',0,0,''),(50,'80300001','1be805df9b1abb0a','dahlan','','','192.168.10.1','2150629377','Wireless-802.11','2016-07-12 12:02:22','2016-07-12 12:07:16',295,'','','',245828,803839,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(51,'80300002','13dd6bcad6ba8684','dahlan','','','192.168.10.1','2150629378','Wireless-802.11','2016-07-12 12:08:02',NULL,600,'','','',17019,14428,'hotspot1','F8:16:54:95:C3:74','','','','192.168.88.242',0,0,''),(52,'8030000c','4fd460388d23e6c0','azrilnazli','','','192.168.10.1','2150629388','Wireless-802.11','2016-07-12 13:37:02','2016-07-12 13:39:05',123,'','','',365921,682885,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(53,'8030000d','a4b0b8e0ce4e68cd','azrilnazli','','','192.168.10.1','2150629389','Wireless-802.11','2016-07-12 13:39:05','2016-07-12 13:42:41',216,'','','',147764,901840,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(54,'8030000e','5535b1e7501decaa','azrilnazli','','','192.168.10.1','2150629390','Wireless-802.11','2016-07-12 13:43:06',NULL,600,'','','',267778,610486,'hotspot1','F8:16:54:95:C3:74','','','','192.168.88.242',0,0,''),(56,'80300013','643b21c2193736b3','basic','','','192.168.10.1','2150629395','Wireless-802.11','2016-07-12 15:02:10','2016-07-13 06:00:00',708,'','','',3804912,63470813,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(57,'80300014','6bb9daf038c4c49e','basic','','','192.168.10.1','2150629396','Wireless-802.11','2016-07-13 14:00:02','2016-07-13 14:00:03',1,'','','',480,486,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(58,'80300015','f2c747c4263e2d37','basic','','','192.168.10.1','2150629397','Wireless-802.11','2016-07-13 14:00:21','2016-07-13 14:00:24',3,'','','',862,0,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(59,'80300016','c6cd1b88d4ce2d95','testing','','','192.168.10.1','2150629398','Wireless-802.11','2016-07-13 14:00:58','2016-07-13 14:01:43',45,'','','',60658,989354,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(60,'80300017','0eef1282263dcadc','testing','','','192.168.10.1','2150629399','Wireless-802.11','2016-07-13 14:01:58','2016-07-13 14:02:57',59,'','','',173516,875522,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(61,'80300018','cfba8b671ced353b','basic','','','192.168.10.1','2150629400','Wireless-802.11','2016-07-13 14:02:57','2016-07-13 14:04:10',73,'','','',40066,65987,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(62,'80300019','cbfb5cab9dd6027c','basic','','','192.168.10.1','2150629401','Wireless-802.11','2016-07-13 14:04:14','2016-07-13 14:04:17',3,'','','',1141,124,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(63,'8030001a','c283487e948c8ceb','testing','','','192.168.10.1','2150629402','Wireless-802.11','2016-07-13 14:04:22','2016-07-13 14:13:12',531,'','','',208176,187062,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(64,'8030001b','ffa7bc0c7703354a','testing','','','192.168.10.1','2150629403','Wireless-802.11','2016-07-13 14:13:15','2016-07-13 14:16:48',212,'','','',156336,781181,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(65,'8030001c','a2ecfc1a82466a9d','testing','','','192.168.10.1','2150629404','Wireless-802.11','2016-07-13 14:16:52','2016-07-13 14:16:54',2,'','','',739,0,'hotspot1','F8:16:54:95:C3:74','User-Request','','','192.168.88.242',0,0,''),(66,'8030001d','0692c3cf14283299','testing','','','192.168.10.1','2150629405','Wireless-802.11','2016-07-13 14:21:25','2016-07-13 14:30:47',562,'','','',187739,860914,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(67,'8030001e','1a97e6160146b7ef','testing','','','192.168.10.1','2150629406','Wireless-802.11','2016-07-13 14:31:37','2016-07-13 14:34:26',169,'','','',77801,971105,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(68,'8030001f','3609f8c1bc2058c2','testing','','','192.168.10.1','2150629407','Wireless-802.11','2016-07-13 14:35:07','2016-07-13 14:43:50',523,'','','',155970,892636,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(69,'80300020','880a451de21aaae4','testing','','','192.168.10.1','2150629408','Wireless-802.11','2016-07-13 14:43:56','2016-07-13 15:45:03',3667,'','','',960022,88567,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(70,'80300021','e8b1233a01e1ac64','testing','','','192.168.10.1','2150629409','Wireless-802.11','2016-07-13 15:45:28','2016-07-13 16:32:41',2833,'','','',766286,282339,'hotspot1','F8:16:54:95:C3:74','NAS-Request','','','192.168.88.242',0,0,''),(71,'80300022','6a2c260407a78dd9','testing','','','192.168.10.1','2150629410','Wireless-802.11','2016-07-13 16:32:53',NULL,1800,'','','',474227,47785,'hotspot1','F8:16:54:95:C3:74','','','','192.168.88.242',0,0,'');
/*!40000 ALTER TABLE `radacct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radcheck`
--

DROP TABLE IF EXISTS `radcheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=MyISAM AUTO_INCREMENT=402 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radcheck`
--

LOCK TABLES `radcheck` WRITE;
/*!40000 ALTER TABLE `radcheck` DISABLE KEYS */;
INSERT INTO `radcheck` VALUES (379,'testing','Simultaneous-Use',':=','1'),(255,'prepaid3','Idle-Timeout',':=','900'),(254,'prepaid3','Expiration',':=','06 July 2016 07:00:00'),(333,'lumiaa','Idle-Timeout',':=','900'),(332,'lumiaa','Expiration',':=','11 July 2016 23:40:00'),(331,'lumiaa','Simultaneous-Use',':=','1'),(330,'lumiaa','Cleartext-Password',':=','password'),(253,'prepaid3','Simultaneous-Use',':=','1'),(252,'prepaid3','Cleartext-Password',':=','password'),(378,'testing','Cleartext-Password',':=','testing'),(377,'basic','Idle-Timeout',':=','900'),(301,'jongos','Idle-Timeout',':=','900'),(300,'jongos','Expiration',':=','09 July 2016 05:00:00'),(299,'jongos','Simultaneous-Use',':=','1'),(298,'jongos','Cleartext-Password',':=','password'),(364,'dahlan','Expiration',':=','13 July 2016 19:00:00'),(363,'dahlan','Simultaneous-Use',':=','1'),(362,'dahlan','Cleartext-Password',':=','password'),(358,'dahlan1','Cleartext-Password',':=','12345'),(359,'dahlan1','Simultaneous-Use',':=','1'),(360,'dahlan1','Expiration',':=','13 July 2016 19:00:00'),(361,'dahlan1','Idle-Timeout',':=','900'),(365,'dahlan','Idle-Timeout',':=','900'),(376,'basic','Expiration',':=','13 July 2016 23:00:00'),(375,'basic','Simultaneous-Use',':=','1'),(374,'basic','Cleartext-Password',':=','basic'),(380,'testing','Expiration',':=','14 July 2016 14:00:00'),(381,'testing','Idle-Timeout',':=','900'),(382,'37112476','Cleartext-Password',':=','KARDZ'),(383,'37112476','Simultaneous-Use',':=','1'),(384,'37112476','Expiration',':=','14 July 2016 17:00:00'),(385,'37112476','Idle-Timeout',':=','900'),(386,'80938298','Cleartext-Password',':=','VBXQL'),(387,'80938298','Simultaneous-Use',':=','1'),(388,'80938298','Expiration',':=','14 July 2016 17:00:00'),(389,'80938298','Idle-Timeout',':=','900'),(390,'80447496','Cleartext-Password',':=','DVRTX'),(391,'80447496','Simultaneous-Use',':=','1'),(392,'80447496','Expiration',':=','14 July 2016 17:00:00'),(393,'80447496','Idle-Timeout',':=','900'),(394,'63632751','Cleartext-Password',':=','EXCYY'),(395,'63632751','Simultaneous-Use',':=','1'),(396,'63632751','Expiration',':=','14 July 2016 17:00:00'),(397,'63632751','Idle-Timeout',':=','900'),(398,'17113582','Cleartext-Password',':=','QUKAM'),(399,'17113582','Simultaneous-Use',':=','10'),(400,'17113582','Expiration',':=','14 July 2016 17:00:00'),(401,'17113582','Idle-Timeout',':=','900');
/*!40000 ALTER TABLE `radcheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radgroupcheck`
--

DROP TABLE IF EXISTS `radgroupcheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radgroupcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radgroupcheck`
--

LOCK TABLES `radgroupcheck` WRITE;
/*!40000 ALTER TABLE `radgroupcheck` DISABLE KEYS */;
/*!40000 ALTER TABLE `radgroupcheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radgroupreply`
--

DROP TABLE IF EXISTS `radgroupreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radgroupreply`
--

LOCK TABLES `radgroupreply` WRITE;
/*!40000 ALTER TABLE `radgroupreply` DISABLE KEYS */;
INSERT INTO `radgroupreply` VALUES (97,'2','Idle-Timeout',':=','900'),(96,'2','Mikrotik-Rate-Limit','=','1m/1m'),(95,'2','Mikrotik-Total-Limit',':=','1048576'),(94,'1','Idle-Timeout',':=','900'),(93,'1','Mikrotik-Rate-Limit','=','1m/1m'),(92,'1','Mikrotik-Total-Limit',':=','524288000'),(91,'15','Idle-Timeout',':=','900'),(89,'15','Mikrotik-Total-Limit',':=','524288000'),(90,'15','Mikrotik-Rate-Limit','=','1m/1m');
/*!40000 ALTER TABLE `radgroupreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radpostauth`
--

DROP TABLE IF EXISTS `radpostauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radpostauth`
--

LOCK TABLES `radpostauth` WRITE;
/*!40000 ALTER TABLE `radpostauth` DISABLE KEYS */;
/*!40000 ALTER TABLE `radpostauth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radreply`
--

DROP TABLE IF EXISTS `radreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radreply`
--

LOCK TABLES `radreply` WRITE;
/*!40000 ALTER TABLE `radreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `radreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radusergroup`
--

DROP TABLE IF EXISTS `radusergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`(32))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radusergroup`
--

LOCK TABLES `radusergroup` WRITE;
/*!40000 ALTER TABLE `radusergroup` DISABLE KEYS */;
INSERT INTO `radusergroup` VALUES ('jongos','13',1),('lumiaa','13',1),('prepaid3','11',1),('testing','2',1),('dahlan','13',1),('dahlan1','13',1),('basic','1',1),('37112476','1',1),('80938298','1',1),('80447496','1',1),('63632751','1',1),('17113582','1',1);
/*!40000 ALTER TABLE `radusergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroups`
--

DROP TABLE IF EXISTS `usergroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroups`
--

LOCK TABLES `usergroups` WRITE;
/*!40000 ALTER TABLE `usergroups` DISABLE KEYS */;
INSERT INTO `usergroups` VALUES (2,'RTM Online','RTM Online group','2014-02-14 20:58:24','2014-02-15 11:00:41'),(3,'Administrator','This is really exciting! Not.','2014-02-14 20:58:24','2014-02-15 11:00:05'),(4,'Drama','drama uploader power','2014-02-14 21:21:13','2014-02-14 21:23:23'),(5,'MTA','mta vod group','2014-02-26 08:48:20','2014-02-26 08:48:35'),(6,'Parlimen ','parlimen group','2014-02-26 09:47:25','2014-02-26 09:47:32');
/*!40000 ALTER TABLE `usergroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'admin','742c9e9838eb4c8c65207027b4e06082535c96dc','admin','2016-06-15 23:00:15','2016-06-15 23:00:15');
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

-- Dump completed on 2016-07-13 20:21:56
