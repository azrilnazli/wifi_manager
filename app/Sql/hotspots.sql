DROP TABLE IF EXISTS `hotspots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE hotspots (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    package_id INT,
    disconnect INT DEFAULT 0,
    username VARCHAR(50),
    password VARCHAR(255),
    expired DATETIME DEFAULT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
