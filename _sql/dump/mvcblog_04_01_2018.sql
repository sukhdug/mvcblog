-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: mvcblog
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `short_content` varchar(255) NOT NULL,
  `like_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Lorem ipsum dolor sit','handy','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies sodales lorem sit amet blandit. Suspendisse maximus aliquet pretium. Nam fermentum purus a massa aliquam tempor. Etiam pulvinar, tellus quis elementum efficitur, diam ipsum iaculis dui, tincidunt porta neque metus at justo. In augue odio, tristique at lacus sed, suscipit tincidunt arcu. Phasellus tempor lacinia orci, at viverra nunc cursus ac. Pellentesque fringilla eleifend nulla, quis molestie ex euismod vel.\r\n\r\nAliquam rhoncus tempus nisi eu blandit. Donec magna elit, vulputate vel congue non, facilisis vitae ligula. Quisque mattis turpis nec erat sollicitudin aliquet. Aliquam a sapien viverra, dictum arcu vitae, tempus ligula. Maecenas mattis, arcu nec sodales lobortis, felis magna luctus purus, quis venenatis diam augue sit amet mauris. Fusce vel odio nec enim vulputate egestas at sed turpis. Vivamus lobortis est in dignissim ultrices. Donec ultrices sapien et condimentum congue. Pellentesque consectetur vulputate commodo. Integer mattis porta sem, nec malesuada leo auctor ac. Morbi hendrerit justo non euismod vehicula. Pellentesque fringilla elit in fermentum bibendum.\r\n\r\nDonec et pulvinar mi. Nulla pulvinar velit neque, eget tempus magna volutpat quis. Phasellus risus massa, porta et tempor vitae, hendrerit sed elit. Sed efficitur lorem non risus convallis, a gravida elit fermentum. Sed purus quam, condimentum in commodo at, pretium et risus. Integer aliquam luctus turpis nec faucibus. Fusce at risus quis magna commodo maximus nec ut diam. Nunc pulvinar velit ac velit luctus egestas.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies sodales lorem sit amet blandit. Suspendisse maximus aliquet pretium. Nam fermentum purus a massa aliquam tempor.',0),(2,'Lorem ipsum dolor','handy','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum felis sit amet odio ultricies, eu finibus turpis suscipit. Aliquam a faucibus est. Maecenas posuere dui ut enim viverra, eget sollicitudin odio imperdiet. Nullam quis risus dapibus, vulputate dolor sit amet, semper velit. Nulla ullamcorper risus eros, varius gravida dui ultrices nec. Nam eget semper ante. Ut posuere iaculis venenatis. Morbi sit amet arcu egestas, consectetur sem ut, vehicula ante. Proin posuere molestie mauris, vel condimentum tellus dictum ut. Nam consequat enim sit amet nisi tincidunt cursus. Donec at vestibulum metus. Morbi placerat elit ligula, vitae facilisis tortor dictum a. Ut fermentum eget nunc sit amet pulvinar.\r\n\r\nNulla nisi elit, auctor at lectus vitae, eleifend sodales dolor. Quisque ante lorem, faucibus sit amet est a, rutrum placerat est. Suspendisse ac semper tortor, in sagittis neque. Curabitur mattis consectetur quam, sit amet lacinia nunc. Cras turpis risus, elementum at feugiat sit amet, eleifend non massa. Donec varius diam vel orci fringilla molestie. Donec finibus molestie lectus, non varius mi ultrices eu. Maecenas ullamcorper ligula id faucibus consequat. Cras mollis purus sem, vel consectetur velit tempor vel. Nullam condimentum sit amet augue in finibus. Vivamus porta lectus sapien. Pellentesque sit amet lacus tortor. Sed dui nibh, elementum et orci a, pulvinar eleifend nibh. Aliquam sed tellus et ipsum faucibus varius quis ac purus. Integer eleifend lacus orci, ac rhoncus orci semper at. Sed porta elit nec quam sodales, eu pulvinar nibh vulputate.\r\n\r\nNam egestas consectetur risus sed bibendum. Integer ac venenatis orci, vel gravida nisl. Maecenas at erat quam. Aliquam pulvinar purus eget mi pellentesque aliquet. Suspendisse semper consectetur ligula a vestibulum. Donec vel nibh tincidunt, pellentesque mauris a, tincidunt ante. Sed faucibus, quam vitae tincidunt hendrerit, odio nulla congue sapien, nec interdum augue metus ac arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce aliquam erat ligula, sit amet mollis mi vulputate in. Nunc dictum at diam non ultricies. Vivamus id aliquam ante, a maximus lacus. Aliquam sodales sem orci, sit amet vehicula mi mattis eu. Donec et nibh ac nisi viverra malesuada. Vivamus a mollis enim. Maecenas quis cursus erat. Ut faucibus, lacus vel suscipit congue, ex libero ornare tortor, eget dapibus urna lorem sit amet urna.\r\n\r\nUt in felis dignissim, fermentum magna nec, tincidunt eros. Nunc tristique diam tincidunt, efficitur augue vitae, dictum odio. Suspendisse non turpis eget dolor mattis finibus sed vel erat. Cras pulvinar eu est sed tincidunt. In sollicitudin ut justo ut fringilla. Nulla pellentesque ut arcu nec elementum. In at porta libero. Duis bibendum fringilla risus, a gravida arcu euismod nec.\r\n\r\nCras ultricies egestas libero dictum tristique. Etiam lacinia tincidunt odio, non hendrerit libero sagittis sit amet. Quisque tristique malesuada condimentum. Cras sollicitudin ac orci non ultricies. Maecenas id orci ligula. Quisque tristique elit mauris. Aenean mollis eleifend nulla, non dapibus dolor iaculis non. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam vitae dignissim nisl.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum felis sit amet odio ultricies, eu finibus turpis suscipit. Aliquam a faucibus est. Maecenas posuere dui ut enim viverra, eget sollicitudin odio imperdiet.',0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Super! Thank you.','alex',1),(2,'Thank you so much.','andrew',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-04 13:23:17
