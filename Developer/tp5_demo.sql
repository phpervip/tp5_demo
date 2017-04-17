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
-- Table structure for table `think_access`
--

DROP TABLE IF EXISTS `think_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_access` (
  `user_id` int(6) unsigned NOT NULL,
  `role_id` int(5) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_access`
--

LOCK TABLES `think_access` WRITE;
/*!40000 ALTER TABLE `think_access` DISABLE KEYS */;
INSERT INTO `think_access` VALUES (1,1),(1,2),(1,3),(2,1);
/*!40000 ALTER TABLE `think_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_blog`
--

DROP TABLE IF EXISTS `think_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COMMENT '内容',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '数据状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='博客表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_blog`
--

LOCK TABLES `think_blog` WRITE;
/*!40000 ALTER TABLE `think_blog` DISABLE KEYS */;
INSERT INTO `think_blog` VALUES (1,'jenny','sunny day','Today is a sunny day',1488680264,1488680939,1),(2,'thinkphp','Thinkphp5.0----为API开发而设计的高性能框架','ThinkphpＶ5.0是一个为API开发而设计的高性能框架，是一个颠覆和重构版本，采用全新的架构思想，引和了很多的PHP新特性，优化了核心，减少了依赖，实现了真正的惰性加载，支持commposer,并针对API开发做了大量的优化。',1488680560,1488680560,1),(3,'thinkphp','Thinkphp5.0----为API开发而设计的高性能框架','ThinkphpＶ5.0是一个为API开发而设计的高性能框架，是一个颠覆和重构版本，采用全新的架构思想，引和了很多的PHP新特性，优化了核心，减少了依赖，实现了真正的惰性加载，支持commposer,并针对API开发做了大量的优化。',1488680568,1488680568,1);
/*!40000 ALTER TABLE `think_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_book`
--

DROP TABLE IF EXISTS `think_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_book` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `publish_time` int(11) unsigned DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_book`
--

LOCK TABLES `think_book` WRITE;
/*!40000 ALTER TABLE `think_book` DISABLE KEYS */;
INSERT INTO `think_book` VALUES (1,'ThinkPHP5开发手册',2016,1487998055,1487998055,1,1),(2,'ThinkPHP5开发手册',2016,1487998201,1487998201,1,1),(3,'ThinkPHP5快速入门',2016,1487998201,1488004587,1,2),(4,'ThinkPHP5开发手册',1462464000,1487998267,1487998267,1,2);
/*!40000 ALTER TABLE `think_book` ENABLE KEYS */;
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
INSERT INTO `think_profile` VALUES (1,3,'吉米','18277700000','1234@qq.com'),(2,4,'汤米','13966600000','2345@qq.com'),(3,10,'刘晨','13966600001','2345@qq.com');
/*!40000 ALTER TABLE `think_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_profile_a`
--

DROP TABLE IF EXISTS `think_profile_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_profile_a` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(25) NOT NULL,
  `birthday` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_profile_a`
--

LOCK TABLES `think_profile_a` WRITE;
/*!40000 ALTER TABLE `think_profile_a` DISABLE KEYS */;
INSERT INTO `think_profile_a` VALUES (1,'刘晨',226339200,'中国上海','liu21st@gmail.com',1),(2,'刘晨',226339200,'中国上海','thinkphp@qq.com',2),(4,'刘晨',226339200,NULL,'liu21st@gmail.com',10);
/*!40000 ALTER TABLE `think_profile_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_role`
--

DROP TABLE IF EXISTS `think_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_role` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_role`
--

LOCK TABLES `think_role` WRITE;
/*!40000 ALTER TABLE `think_role` DISABLE KEYS */;
INSERT INTO `think_role` VALUES (1,'editor','编辑'),(2,'leader','领导'),(3,'admin','管理员');
/*!40000 ALTER TABLE `think_role` ENABLE KEYS */;
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
  `status` tinyint(2) NOT NULL COMMENT '状态',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_user`
--

LOCK TABLES `think_user` WRITE;
/*!40000 ALTER TABLE `think_user` DISABLE KEYS */;
INSERT INTO `think_user` VALUES (1,'刘晨','liu21st@gmail.com',569174400,1,0,0),(2,'张三','thinkphp@qq.com',653673600,1,0,0),(3,'李四','lisi@qq.com',653673600,0,0,0),(4,'张三','zhanghsan@qq.com',653673600,0,0,0),(5,'李四','lisi@qq.com',653673600,0,0,0),(6,'张三','zhanghsan@qq.com',569174400,0,0,0),(7,'李四','lisi@qq.com',569174400,0,0,0),(8,'张三','zhanghsan@qq.com',569174400,0,0,0),(9,'李四','lisi@qq.com',569174400,0,0,0),(10,'张三','zhanghsan@qq.com',569174400,0,0,0),(11,'李四','lisi@qq.com',569174400,0,0,0),(12,'张三','zhanghsan@qq.com',569174400,0,0,0),(13,'李四','lisi@qq.com',569174400,0,0,0),(14,'张三','zhanghsan@qq.com',569174400,0,0,0),(15,'李四','lisi@qq.com',569174400,0,0,0),(16,'流年','thinkphp@qq.com',569174400,0,0,0),(17,'张三','zhanghsan@qq.com',569174400,0,0,0),(18,'李四','lisi@qq.com',569174400,0,0,0),(19,'张三','zhanghsan@qq.com',569174400,0,0,0),(20,'李四','lisi@qq.com',569174400,0,0,0),(21,'张三','zhanghsan@qq.com',569174400,0,0,0),(22,'李四','lisi@qq.com',0,0,0,0),(23,'流年','thinkphp@qq.com',569174400,0,0,0),(24,'张三','zhanghsan@qq.com',569174400,0,0,0),(25,'李四','lisi@qq.com',569174400,0,0,0),(26,'张三','zhanghsan@qq.com',569174400,0,2017,2017),(27,'李四','lisi@qq.com',569174400,0,2017,2017),(28,'张三','zhanghsan@qq.com',569174400,1,1487777739,1487777739),(29,'李四','lisi@qq.com',569174400,1,1487777739,1487777739),(30,'流年','thinkphp@qq.com',569174400,1,1487856708,1487856708),(31,'流年','thinkphp@qq.com',569174400,1,1487856726,1487856726),(32,'依依','thinkphp@qq.com',315590400,2,1487856926,1487856926);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
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
-- Table structure for table `think_user_a`
--

DROP TABLE IF EXISTS `think_user_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_user_a` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_user_a`
--

LOCK TABLES `think_user_a` WRITE;
/*!40000 ALTER TABLE `think_user_a` DISABLE KEYS */;
INSERT INTO `think_user_a` VALUES (1,'张三','framework','123456',1487990821,1487993410,1),(2,'流年','thinkphp','123456',1487990986,1487990986,1);
/*!40000 ALTER TABLE `think_user_a` ENABLE KEYS */;
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

-- Dump completed on 2017-04-16 19:19:19
