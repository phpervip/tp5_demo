-- MySQL dump 10.13  Distrib 5.6.22, for osx10.8 (x86_64)
--
-- Host: 114.55.28.104    Database: tp5_demo
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
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend`
--

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend` DISABLE KEYS */;
INSERT INTO `friend` VALUES (1,'fangfang',3),(2,'lili',4),(3,'dodo',5);
/*!40000 ALTER TABLE `friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_data`
--

DROP TABLE IF EXISTS `think_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_data` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0失效，1有效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_data`
--

LOCK TABLES `think_data` WRITE;
/*!40000 ALTER TABLE `think_data` DISABLE KEYS */;
INSERT INTO `think_data` VALUES (1,'thinkphp',1),(3,'framework',1),(4,'yii',1),(5,'symfony',1),(7,'codeIgniter',1),(8,'laravel',1),(9,'shopnc',1),(10,'tpshop',1),(11,'thinkphp',1);
/*!40000 ALTER TABLE `think_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_profile`
--

DROP TABLE IF EXISTS `think_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_profile`
--

LOCK TABLES `think_profile` WRITE;
/*!40000 ALTER TABLE `think_profile` DISABLE KEYS */;
INSERT INTO `think_profile` VALUES (1,3,'吉米','18277700000','1234@qq.com'),(2,4,'汤米','13966600000','2345@qq.com');
/*!40000 ALTER TABLE `think_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_score`
--

DROP TABLE IF EXISTS `think_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_score`
--

LOCK TABLES `think_score` WRITE;
/*!40000 ALTER TABLE `think_score` DISABLE KEYS */;
INSERT INTO `think_score` VALUES (1,88,3),(2,70,4),(3,89,5),(4,90,7),(5,88,8),(6,95,9),(7,90,10),(8,81,11);
/*!40000 ALTER TABLE `think_score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_user`
--

DROP TABLE IF EXISTS `think_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_user` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL COMMENT '昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `birthday` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '生日',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_user`
--

LOCK TABLES `think_user` WRITE;
/*!40000 ALTER TABLE `think_user` DISABLE KEYS */;
INSERT INTO `think_user` VALUES (1,'刘晨','liu21st@gmail.com',0,0,0,0),(2,'张三','zhanghsan@qq.com',0,0,0,0),(3,'李四','lisi@qq.com',0,0,0,0),(4,'张三','zhanghsan@qq.com',0,0,0,0),(5,'李四','lisi@qq.com',0,0,0,0),(6,'张三','zhanghsan@qq.com',0,0,0,0),(7,'李四','lisi@qq.com',0,0,0,0),(8,'张三','zhanghsan@qq.com',0,0,0,0),(9,'李四','lisi@qq.com',0,0,0,0),(10,'张三','zhanghsan@qq.com',0,0,0,0),(11,'李四','lisi@qq.com',0,0,0,0),(12,'张三','zhanghsan@qq.com',0,0,0,0),(13,'李四','lisi@qq.com',0,0,0,0),(14,'张三','zhanghsan@qq.com',0,0,0,0),(15,'李四','lisi@qq.com',0,0,0,0),(16,'流年','thinkphp@qq.com',0,0,0,0);
/*!40000 ALTER TABLE `think_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_user0`
--

DROP TABLE IF EXISTS `think_user0`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_user0` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_user0`
--

LOCK TABLES `think_user0` WRITE;
/*!40000 ALTER TABLE `think_user0` DISABLE KEYS */;
INSERT INTO `think_user0` VALUES (3,'jim',21,'female','2017-02-07 14:41:16',NULL,1),(4,'jim',9,'male','2017-02-08 14:41:16',NULL,1),(5,'jim',9,'male','2017-02-09 14:41:16',NULL,1),(6,'jim',21,'female','2017-02-10 14:41:16',NULL,1),(7,'jim',21,'female','2017-02-11 14:41:16',NULL,1),(8,'jim',12,NULL,'2017-02-12 14:41:16',NULL,1),(9,'jim',12,NULL,'2017-02-13 14:41:16',NULL,1),(10,'wangwu',55,NULL,'2017-02-14 14:41:16','2017-02-15 14:41:16',1),(11,'wangwu',55,NULL,'2017-02-15 14:42:25','2017-02-15 14:42:25',1);
/*!40000 ALTER TABLE `think_user0` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tp5_demo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-22 22:55:56
