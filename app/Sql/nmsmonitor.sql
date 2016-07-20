DROP TABLE IF EXISTS `nmsmonitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nmsmonitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `device` varchar(100) NOT NULL,
  `deviceip` varchar(100) NOT NULL,
  `devicedescr` varchar(100) NOT NULL,
  `deviceregister` varchar(100) NOT NULL,
  `devicestatus` varchar(100) NOT NULL,
  `deviceregby` varchar(100) NOT NULL,
  `created` DATETIME NOT NULL,
    
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
