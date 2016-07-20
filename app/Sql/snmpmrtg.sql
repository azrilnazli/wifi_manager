DROP TABLE IF EXISTS `snmpmrtg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snmpmrtg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `snmp_ip` varchar(50) DEFAULT NULL,
  `snmp_commstring` varchar(50) DEFAULT NULL,
  `snmp_status` varchar(10) DEFAULT NULL,
  `snmp_register` varchar(100) NOT NULL,
  `snmp_loginby` varchar(100) NOT NULL,
  `snmp_discover` varchar(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

