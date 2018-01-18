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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Lorem ipsum dolor sit amet my rumba','handy','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies sodales lorem sit amet blandit. Suspendisse maximus aliquet pretium. Nam fermentum purus a massa aliquam tempor. Etiam pulvinar, tellus quis elementum efficitur, diam ipsum iaculis dui, tincidunt porta neque metus at justo. In augue odio, tristique at lacus sed, suscipit tincidunt arcu. Phasellus tempor lacinia orci, at viverra nunc cursus ac. Pellentesque fringilla eleifend nulla, quis molestie ex euismod vel.\r\n\r\nAliquam rhoncus tempus nisi eu blandit. Donec magna elit, vulputate vel congue non, facilisis vitae ligula. Quisque mattis turpis nec erat sollicitudin aliquet. Aliquam a sapien viverra, dictum arcu vitae, tempus ligula. Maecenas mattis, arcu nec sodales lobortis, felis magna luctus purus, quis venenatis diam augue sit amet mauris. Fusce vel odio nec enim vulputate egestas at sed turpis. Vivamus lobortis est in dignissim ultrices. Donec ultrices sapien et condimentum congue. Pellentesque consectetur vulputate commodo. Integer mattis porta sem, nec malesuada leo auctor ac. Morbi hendrerit justo non euismod vehicula. Pellentesque fringilla elit in fermentum bibendum.\r\n\r\nDonec et pulvinar mi. Nulla pulvinar velit neque, eget tempus magna volutpat quis. Phasellus risus massa, porta et tempor vitae, hendrerit sed elit. Sed efficitur lorem non risus convallis, a gravida elit fermentum. Sed purus quam, condimentum in commodo at, pretium et risus. Integer aliquam luctus turpis nec faucibus. Fusce at risus quis magna commodo maximus nec ut diam. Nunc pulvinar velit ac velit luctus egestas.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies sodales lorem sit amet blandit. Suspendisse maximus aliquet pretium. Nam fermentum purus a massa aliquam tempor. Etiam pulvinar, tellus quis elementum efficitur, diam ipsum iaculis d',0),(2,'Lorem ipsum dolor','handy','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum felis sit amet odio ultricies, eu finibus turpis suscipit. Aliquam a faucibus est. Maecenas posuere dui ut enim viverra, eget sollicitudin odio imperdiet. Nullam quis risus dapibus, vulputate dolor sit amet, semper velit. Nulla ullamcorper risus eros, varius gravida dui ultrices nec. Nam eget semper ante. Ut posuere iaculis venenatis. Morbi sit amet arcu egestas, consectetur sem ut, vehicula ante. Proin posuere molestie mauris, vel condimentum tellus dictum ut. Nam consequat enim sit amet nisi tincidunt cursus. Donec at vestibulum metus. Morbi placerat elit ligula, vitae facilisis tortor dictum a. Ut fermentum eget nunc sit amet pulvinar.\r\n\r\nNulla nisi elit, auctor at lectus vitae, eleifend sodales dolor. Quisque ante lorem, faucibus sit amet est a, rutrum placerat est. Suspendisse ac semper tortor, in sagittis neque. Curabitur mattis consectetur quam, sit amet lacinia nunc. Cras turpis risus, elementum at feugiat sit amet, eleifend non massa. Donec varius diam vel orci fringilla molestie. Donec finibus molestie lectus, non varius mi ultrices eu. Maecenas ullamcorper ligula id faucibus consequat. Cras mollis purus sem, vel consectetur velit tempor vel. Nullam condimentum sit amet augue in finibus. Vivamus porta lectus sapien. Pellentesque sit amet lacus tortor. Sed dui nibh, elementum et orci a, pulvinar eleifend nibh. Aliquam sed tellus et ipsum faucibus varius quis ac purus. Integer eleifend lacus orci, ac rhoncus orci semper at. Sed porta elit nec quam sodales, eu pulvinar nibh vulputate.\r\n\r\nNam egestas consectetur risus sed bibendum. Integer ac venenatis orci, vel gravida nisl. Maecenas at erat quam. Aliquam pulvinar purus eget mi pellentesque aliquet. Suspendisse semper consectetur ligula a vestibulum. Donec vel nibh tincidunt, pellentesque mauris a, tincidunt ante. Sed faucibus, quam vitae tincidunt hendrerit, odio nulla congue sapien, nec interdum augue metus ac arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce aliquam erat ligula, sit amet mollis mi vulputate in. Nunc dictum at diam non ultricies. Vivamus id aliquam ante, a maximus lacus. Aliquam sodales sem orci, sit amet vehicula mi mattis eu. Donec et nibh ac nisi viverra malesuada. Vivamus a mollis enim. Maecenas quis cursus erat. Ut faucibus, lacus vel suscipit congue, ex libero ornare tortor, eget dapibus urna lorem sit amet urna.\r\n\r\nUt in felis dignissim, fermentum magna nec, tincidunt eros. Nunc tristique diam tincidunt, efficitur augue vitae, dictum odio. Suspendisse non turpis eget dolor mattis finibus sed vel erat. Cras pulvinar eu est sed tincidunt. In sollicitudin ut justo ut fringilla. Nulla pellentesque ut arcu nec elementum. In at porta libero. Duis bibendum fringilla risus, a gravida arcu euismod nec.\r\n\r\nCras ultricies egestas libero dictum tristique. Etiam lacinia tincidunt odio, non hendrerit libero sagittis sit amet. Quisque tristique malesuada condimentum. Cras sollicitudin ac orci non ultricies. Maecenas id orci ligula. Quisque tristique elit mauris. Aenean mollis eleifend nulla, non dapibus dolor iaculis non. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam vitae dignissim nisl.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum felis sit amet odio ultricies, eu finibus turpis suscipit. Aliquam a faucibus est. Maecenas posuere dui ut enim viverra, eget sollicitudin odio imperdiet.',0),(3,'Is Lorem Ipsum Just a Wacky Random Thingy?','admin','Well, in the first sight, it looks like it. To be honest, it also looks like it when you stare at it for hours. But you see, Lorem Ipsum is not just a Wacky Random Thingy. It has a meaning and even an actual human being author. His father is not phpâ€™s rand() function, but a famous and wise (now already old) man Cicero. Lorem Ipsum text originates from Ciceroâ€™s text titled â€œde Finibus Bonorum et Malorumâ€. No, itâ€™s not about U2 front man Bono fighting against malaria; itâ€™s actually a text about the extremes of the good and the evil. Text was written in 45 BC.\r\n\r\n45 BC is like waaaay back! But donâ€™t you worry â€“ our Lorem Ipsum Generator is made with 21st century technology, so it will give you perfect Lorem Ipsumish results each and every time you use it. Donâ€™t believe it? Just try it!\r\n\r\nâ€œLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum,â€ said our Lorem Ipsum Generator and asked if you would like it in italics, bold and with some paragraphs.','Well, in the first sight, it looks like it. To be honest, it also looks like it when you stare at it for hours. But you see, Lorem Ipsum is not just a Wacky Random Thingy. It has a meaning and even an actual human being author. His father is not phpâ€™s r',0),(4,'What is Lorem Ipsum Generator?','admin','Welcome to the home of Lorem Ipsum text. You can build whole bunch of it using our super simple to use Lorem Ipsum Generator. There are plenty of variations possible; you can use Lorem Ipsum Generator to build your desired number of Lorem Ipsum paragraphs, words or sentences. Paragraphs, words, sentences. Our generator does them all. So, what can we get you from the Lorem Ipsum Generator menu today, sir?\r\n\r\nThere are also other useful options that will come handy when using Lorem Ipsum text. Lorem Ipsum Generator can automatically insert HTML markup and make your Lorem Ipsum text italic, bold or make an actual HTML paragraph. Did we just heard a big loud Â»Hooraaay!Â« from all of you graphich designers, webmasters and all other Lorem Ipsum Generator fans? Thank you all, we try to do our best!','Welcome to the home of Lorem Ipsum text. You can build whole bunch of it using our super simple to use Lorem Ipsum Generator. There are plenty of variations possible; you can use Lorem Ipsum Generator to build your desired number of Lorem Ipsum paragraphs',0),(5,'Ð¡Ð¼Ñ‹ÑÐ» ÑÐ°Ð¹Ñ‚Ð°','admin','Ð¡Ð°Ð¹Ñ‚ Ñ€Ñ‹Ð±Ð°Ñ‚ÐµÐºÑÑ‚ Ð¿Ð¾Ð¼Ð¾Ð¶ÐµÑ‚ Ð´Ð¸Ð·Ð°Ð¹Ð½ÐµÑ€Ñƒ, Ð²ÐµÑ€ÑÑ‚Ð°Ð»ÑŒÑ‰Ð¸ÐºÑƒ, Ð²ÐµÐ±Ð¼Ð°ÑÑ‚ÐµÑ€Ñƒ ÑÐ³ÐµÐ½ÐµÑ€Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð½ÐµÑÐºÐ¾Ð»ÑŒÐºÐ¾ Ð°Ð±Ð·Ð°Ñ†ÐµÐ² Ð±Ð¾Ð»ÐµÐµ Ð¼ÐµÐ½ÐµÐµ Ð¾ÑÐ¼Ñ‹ÑÐ»ÐµÐ½Ð½Ð¾Ð³Ð¾ Ñ‚ÐµÐºÑÑ‚Ð° Ñ€Ñ‹Ð±Ñ‹ Ð½Ð° Ñ€ÑƒÑÑÐºÐ¾Ð¼ ÑÐ·Ñ‹ÐºÐµ, Ð° Ð½Ð°Ñ‡Ð¸Ð½Ð°ÑŽÑ‰ÐµÐ¼Ñƒ Ð¾Ñ€Ð°Ñ‚Ð¾Ñ€Ñƒ Ð¾Ñ‚Ñ‚Ð¾Ñ‡Ð¸Ñ‚ÑŒ Ð½Ð°Ð²Ñ‹Ðº Ð¿ÑƒÐ±Ð»Ð¸Ñ‡Ð½Ñ‹Ñ… Ð²Ñ‹ÑÑ‚ÑƒÐ¿Ð»ÐµÐ½Ð¸Ð¹ Ð² Ð´Ð¾Ð¼Ð°ÑˆÐ½Ð¸Ñ… ÑƒÑÐ»Ð¾Ð²Ð¸ÑÑ…. ÐŸÑ€Ð¸ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ð¸ Ð³ÐµÐ½ÐµÑ€Ð°Ñ‚Ð¾Ñ€Ð° Ð¼Ñ‹ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð»Ð¸ Ð½ÐµÐ±ÐµÐ·Ð¸Ð·Ð²ÐµÑÑ‚Ð½Ñ‹Ð¹ ÑƒÐ½Ð¸Ð²ÐµÑ€ÑÐ°Ð»ÑŒÐ½Ñ‹Ð¹ ÐºÐ¾Ð´ Ñ€ÐµÑ‡ÐµÐ¹. Ð¢ÐµÐºÑÑ‚ Ð³ÐµÐ½ÐµÑ€Ð¸Ñ€ÑƒÐµÑ‚ÑÑ Ð°Ð±Ð·Ð°Ñ†Ð°Ð¼Ð¸ ÑÐ»ÑƒÑ‡Ð°Ð¹Ð½Ñ‹Ð¼ Ð¾Ð±Ñ€Ð°Ð·Ð¾Ð¼ Ð¾Ñ‚ Ð´Ð²ÑƒÑ… Ð´Ð¾ Ð´ÐµÑÑÑ‚Ð¸ Ð¿Ñ€ÐµÐ´Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹ Ð² Ð°Ð±Ð·Ð°Ñ†Ðµ, Ñ‡Ñ‚Ð¾ Ð¿Ð¾Ð·Ð²Ð¾Ð»ÑÐµÑ‚ ÑÐ´ÐµÐ»Ð°Ñ‚ÑŒ Ñ‚ÐµÐºÑÑ‚ Ð±Ð¾Ð»ÐµÐµ Ð¿Ñ€Ð¸Ð²Ð»ÐµÐºÐ°Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ð¼ Ð¸ Ð¶Ð¸Ð²Ñ‹Ð¼ Ð´Ð»Ñ Ð²Ð¸Ð·ÑƒÐ°Ð»ÑŒÐ½Ð¾-ÑÐ»ÑƒÑ…Ð¾Ð²Ð¾Ð³Ð¾ Ð²Ð¾ÑÐ¿Ñ€Ð¸ÑÑ‚Ð¸Ñ.\r\n\r\nÐŸÐ¾ ÑÐ²Ð¾ÐµÐ¹ ÑÑƒÑ‚Ð¸ Ñ€Ñ‹Ð±Ð°Ñ‚ÐµÐºÑÑ‚ ÑÐ²Ð»ÑÐµÑ‚ÑÑ Ð°Ð»ÑŒÑ‚ÐµÑ€Ð½Ð°Ñ‚Ð¸Ð²Ð¾Ð¹ Ñ‚Ñ€Ð°Ð´Ð¸Ñ†Ð¸Ð¾Ð½Ð½Ð¾Ð¼Ñƒ lorem ipsum, ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ð¹ Ð²Ñ‹Ð·Ñ‹Ð²Ð°ÐµÑ‚ Ñƒ Ð½ÐµÐºÑ‚Ð¾Ñ€Ñ‹Ñ… Ð»ÑŽÐ´ÐµÐ¹ Ð½ÐµÐ´Ð¾ÑƒÐ¼ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¸ Ð¿Ð¾Ð¿Ñ‹Ñ‚ÐºÐ°Ñ… Ð¿Ñ€Ð¾Ñ‡Ð¸Ñ‚Ð°Ñ‚ÑŒ Ñ€Ñ‹Ð±Ñƒ Ñ‚ÐµÐºÑÑ‚. Ð’ Ð¾Ñ‚Ð»Ð¸Ñ‡Ð¸Ð¸ Ð¾Ñ‚ lorem ipsum, Ñ‚ÐµÐºÑÑ‚ Ñ€Ñ‹Ð±Ð° Ð½Ð° Ñ€ÑƒÑÑÐºÐ¾Ð¼ ÑÐ·Ñ‹ÐºÐµ Ð½Ð°Ð¿Ð¾Ð»Ð½Ð¸Ñ‚ Ð»ÑŽÐ±Ð¾Ð¹ Ð¼Ð°ÐºÐµÑ‚ Ð½ÐµÐ¿Ð¾Ð½ÑÑ‚Ð½Ñ‹Ð¼ ÑÐ¼Ñ‹ÑÐ»Ð¾Ð¼ Ð¸ Ð¿Ñ€Ð¸Ð´Ð°ÑÑ‚ Ð½ÐµÐ¿Ð¾Ð²Ñ‚Ð¾Ñ€Ð¸Ð¼Ñ‹Ð¹ ÐºÐ¾Ð»Ð¾Ñ€Ð¸Ñ‚ ÑÐ¾Ð²ÐµÑ‚ÑÐºÐ¸Ñ… Ð²Ñ€ÐµÐ¼ÐµÐ½.','Ð¡Ð°Ð¹Ñ‚ Ñ€Ñ‹Ð±Ð°Ñ‚ÐµÐºÑÑ‚ Ð¿Ð¾Ð¼Ð¾Ð¶ÐµÑ‚ Ð´Ð¸Ð·Ð°Ð¹Ð½ÐµÑ€Ñƒ, Ð²ÐµÑ€ÑÑ‚Ð°Ð»ÑŒÑ‰Ð¸ÐºÑƒ, Ð²ÐµÐ±Ð¼Ð°ÑÑ‚ÐµÑ€Ñƒ ÑÐ³ÐµÐ½ÐµÑ€Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð½ÐµÑÐºÐ¾Ð»ÑŒÐºÐ¾ Ð°Ð±Ð·Ð°Ñ†ÐµÐ² Ð±Ð¾Ð»ÐµÐµ Ð¼ÐµÐ½ÐµÐµ Ð¾ÑÐ¼Ñ‹ÑÐ»ÐµÐ½Ð½Ð¾Ð³Ð¾ Ñ‚ÐµÐºÑÑ‚Ð° Ñ€Ñ‹Ð±Ñ‹ Ð½Ð° Ñ€ÑƒÑÑÐº',0),(6,'ÐžÑ‚ÐºÑ€Ñ‹Ñ‚Ð¾Ðµ Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ð½Ð¾Ðµ Ð¾Ð±ÐµÑÐ¿ÐµÑ‡ÐµÐ½Ð¸Ðµ','admin','ÐžÑ‚ÐºÑ€Ñ‹Ñ‚Ð¾Ðµ Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ð½Ð¾Ðµ Ð¾Ð±ÐµÑÐ¿ÐµÑ‡ÐµÐ½Ð¸Ðµ (Ð°Ð½Ð³Ð». open-source software) â€” Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ð½Ð¾Ðµ Ð¾Ð±ÐµÑÐ¿ÐµÑ‡ÐµÐ½Ð¸Ðµ Ñ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚Ñ‹Ð¼ Ð¸ÑÑ…Ð¾Ð´Ð½Ñ‹Ð¼ ÐºÐ¾Ð´Ð¾Ð¼. Ð˜ÑÑ…Ð¾Ð´Ð½Ñ‹Ð¹ ÐºÐ¾Ð´ Ñ‚Ð°ÐºÐ¸Ñ… Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼ Ð´Ð¾ÑÑ‚ÑƒÐ¿ÐµÐ½ Ð´Ð»Ñ Ð¿Ñ€Ð¾ÑÐ¼Ð¾Ñ‚Ñ€Ð°, Ð¸Ð·ÑƒÑ‡ÐµÐ½Ð¸Ñ Ð¸ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ñ, Ñ‡Ñ‚Ð¾ Ð¿Ð¾Ð·Ð²Ð¾Ð»ÑÐµÑ‚ ÑƒÐ±ÐµÐ´Ð¸Ñ‚ÑŒÑÑ Ð² Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²Ð¸Ð¸ ÑƒÑÐ·Ð²Ð¸Ð¼Ð¾ÑÑ‚ÐµÐ¹ Ð¸ Ð½ÐµÐ¿Ñ€Ð¸ÐµÐ¼Ð»ÐµÐ¼Ð¾Ð³Ð¾ Ð´Ð»Ñ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¾Ð½Ð°Ð»Ð° (Ðº Ð¿Ñ€Ð¸Ð¼ÐµÑ€Ñƒ, ÑÐºÑ€Ñ‹Ñ‚Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¶ÐµÐ½Ð¸Ñ Ð·Ð° Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÐµÐ¼ Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ñ‹), Ð¿Ñ€Ð¸Ð½ÑÑ‚ÑŒ ÑƒÑ‡Ð°ÑÑ‚Ð¸Ðµ Ð² Ð´Ð¾Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐµ ÑÐ°Ð¼Ð¾Ð¹ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚Ð¾Ð¹ Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ñ‹, Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÑŒ ÐºÐ¾Ð´ Ð´Ð»Ñ ÑÐ¾Ð·Ð´Ð°Ð½Ð¸Ñ Ð½Ð¾Ð²Ñ‹Ñ… Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼ Ð¸ Ð¸ÑÐ¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ñ Ð² Ð½Ð¸Ñ… Ð¾ÑˆÐ¸Ð±Ð¾Ðº â€” Ñ‡ÐµÑ€ÐµÐ· Ð·Ð°Ð¸Ð¼ÑÑ‚Ð²Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð¸ÑÑ…Ð¾Ð´Ð½Ð¾Ð³Ð¾ ÐºÐ¾Ð´Ð°, ÐµÑÐ»Ð¸ ÑÑ‚Ð¾ Ð¿Ð¾Ð·Ð²Ð¾Ð»ÑÐµÑ‚ ÑÐ¾Ð²Ð¼ÐµÑÑ‚Ð¸Ð¼Ð¾ÑÑ‚ÑŒ Ð»Ð¸Ñ†ÐµÐ½Ð·Ð¸Ð¹, Ð¸Ð»Ð¸ Ñ‡ÐµÑ€ÐµÐ· Ð¸Ð·ÑƒÑ‡ÐµÐ½Ð¸Ðµ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ð½Ð½Ñ‹Ñ… Ð°Ð»Ð³Ð¾Ñ€Ð¸Ñ‚Ð¼Ð¾Ð², ÑÑ‚Ñ€ÑƒÐºÑ‚ÑƒÑ€ Ð´Ð°Ð½Ð½Ñ‹Ñ…, Ñ‚ÐµÑ…Ð½Ð¾Ð»Ð¾Ð³Ð¸Ð¹, Ð¼ÐµÑ‚Ð¾Ð´Ð¸Ðº Ð¸ Ð¸Ð½Ñ‚ÐµÑ€Ñ„ÐµÐ¹ÑÐ¾Ð² (Ð¿Ð¾ÑÐºÐ¾Ð»ÑŒÐºÑƒ Ð¸ÑÑ…Ð¾Ð´Ð½Ñ‹Ð¹ ÐºÐ¾Ð´ Ð¼Ð¾Ð¶ÐµÑ‚ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÐµÐ½Ð½Ð¾ Ð´Ð¾Ð¿Ð¾Ð»Ð½ÑÑ‚ÑŒ Ð´Ð¾ÐºÑƒÐ¼ÐµÐ½Ñ‚Ð°Ñ†Ð¸ÑŽ, Ð° Ð¿Ñ€Ð¸ Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²Ð¸Ð¸ Ñ‚Ð°ÐºÐ¾Ð²Ð¾Ð¹ ÑÐ°Ð¼ ÑÐ»ÑƒÐ¶Ð¸Ñ‚ Ð´Ð¾ÐºÑƒÐ¼ÐµÐ½Ñ‚Ð°Ñ†Ð¸ÐµÐ¹).','ÐžÑ‚ÐºÑ€Ñ‹Ñ‚Ð¾Ðµ Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ð½Ð¾Ðµ Ð¾Ð±ÐµÑÐ¿ÐµÑ‡ÐµÐ½Ð¸Ðµ (Ð°Ð½Ð³Ð». open-source software) â€” Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼Ð½Ð¾Ðµ Ð¾Ð±ÐµÑÐ¿ÐµÑ‡ÐµÐ½Ð¸Ðµ Ñ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚Ñ‹Ð¼ Ð¸ÑÑ…Ð¾Ð´Ð½Ñ‹Ð¼ ÐºÐ¾Ð´Ð¾Ð¼. Ð˜ÑÑ…Ð¾Ð´Ð½Ñ‹Ð¹ ÐºÐ¾Ð´ Ñ‚Ð°ÐºÐ¸Ñ… Ð¿Ñ€Ð¾Ð³Ñ€Ð°Ð¼Ð¼ Ð´Ð¾ÑÑ‚',0),(7,'ÐšÐ°Ðº Ñ Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°Ð» ÑƒÐºÑ€Ð°Ð´ÐµÐ½Ð½Ñ‹Ð¹ Ð´Ð¾Ð¼ÐµÐ½ Ð¿Ð¾Ð¿ÑƒÐ»ÑÑ€Ð½Ð¾Ð³Ð¾ ÑÐ°Ð¹Ñ‚Ð°','admin','Ð’ 2008 Ð³Ð¾Ð´Ñƒ ÑÐ¾Ð·Ð´Ð°Ð» ÑÐ°Ð¹Ñ‚, ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ð¹, ÑÐ¿ÑƒÑÑ‚Ñ Ð²Ñ€ÐµÐ¼Ñ, Ð¿Ñ€ÐµÐ²Ñ€Ð°Ñ‚Ð¸Ð»ÑÑ Ð² Ð²Ð¾Ð´Ð½Ð¾-Ð¼Ð¾Ñ‚Ð¾Ñ€Ð½Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÑÑ‚Ð²Ð¾, Ð¾Ð±ÑŠÐµÐ´Ð¸Ð½ÑÑŽÑ‰ÐµÐµ Ñ‚Ñ‹ÑÑÑ‡Ð¸ Ð»ÑŽÐ±Ð¸Ñ‚ÐµÐ»ÐµÐ¹ Ð¼Ð¾Ñ‚Ð¾Ñ€Ð½Ñ‹Ñ… Ð»Ð¾Ð´Ð¾Ðº Ð¸ ÐºÐ°Ñ‚ÐµÑ€Ð¾Ð². Ð’ ÑÐµÐ·Ð¾Ð½, Ð¿Ð¾ÑÐµÑ‰Ð°ÐµÐ¼Ð¾ÑÑ‚ÑŒ Ñ€ÐµÑÑƒÑ€ÑÐ° Ð¿Ñ€ÐµÐ²Ñ‹ÑˆÐ°Ð»Ð° 10 000 Ñ‡ÐµÐ»Ð¾Ð²ÐµÐº Ð² ÑÑƒÑ‚ÐºÐ¸ Ð¸ ÐºÑ‚Ð¾-Ñ‚Ð¾ Ñ€ÐµÑˆÐ¸Ð», Ñ‡Ñ‚Ð¾ ÑÐ°Ð¹Ñ‚ ÐµÐ¼Ñƒ Ð½ÑƒÐ¶Ð½ÐµÐµ. \r\n\r\nÐŸÐ¾Ð»ÑƒÑ‡Ð¸Ð² Ð´Ð¾ÑÑ‚ÑƒÐ¿ Ð² Ð°Ð´Ð¼Ð¸Ð½-Ð¿Ð°Ð½ÐµÐ»ÑŒ Ð¼Ð¾ÐµÐ³Ð¾ Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð° (r01.ru), Ð²Ð¾Ñ€ Ð¿ÐµÑ€ÐµÐ½ÐµÑ Ð´Ð¾Ð¼ÐµÐ½ Ðº Ð´Ñ€ÑƒÐ³Ð¾Ð¼Ñƒ (internet.bs) Ð½Ð° ÑÐ²Ð¾Ð¹ Ð°ÐºÐºÐ°ÑƒÐ½Ñ‚. Ð‘Ð°Ð·Ð° Ð´Ð°Ð½Ð½Ñ‹Ñ… Ð¸ Ñ„Ð°Ð¹Ð»Ñ‹ Ð¾Ð±Ð¼Ð°Ð½Ð½Ñ‹Ð¼ Ð¿ÑƒÑ‚ÐµÐ¼ Ð±Ñ‹Ð»Ð¸ Ð¿Ð¾Ð»ÑƒÑ‡ÐµÐ½Ñ‹ Ñƒ Ñ…Ð¾ÑÑ‚ÐµÑ€Ð°.\r\n\r\nÐ¯ Ð¿Ð¾Ñ‚ÐµÑ€ÑÐ» Ð¿Ñ€Ð¾ÐµÐºÑ‚, Ð½Ð°Ð´ ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ð¼ Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ð» Ð¾ÐºÐ¾Ð»Ð¾ 9 Ð»ÐµÑ‚. Ð’ÐµÑ€Ð½ÑƒÑ‚ÑŒ Ð´Ð¾Ð¼ÐµÐ½ Ð¿Ð¾Ð»ÑƒÑ‡Ð¸Ð»Ð¾ÑÑŒ Ð»Ð¸ÑˆÑŒ Ñ‡ÐµÑ€ÐµÐ· 8 Ð¼ÐµÑÑÑ†ÐµÐ². ÐŸÐ¾Ð´Ñ€Ð¾Ð±Ð½Ð¾ÑÑ‚Ð¸ Ð½Ð¸Ð¶Ðµ.','Ð’ 2008 Ð³Ð¾Ð´Ñƒ ÑÐ¾Ð·Ð´Ð°Ð» ÑÐ°Ð¹Ñ‚, ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ð¹, ÑÐ¿ÑƒÑÑ‚Ñ Ð²Ñ€ÐµÐ¼Ñ, Ð¿Ñ€ÐµÐ²Ñ€Ð°Ñ‚Ð¸Ð»ÑÑ Ð² Ð²Ð¾Ð´Ð½Ð¾-Ð¼Ð¾Ñ‚Ð¾Ñ€Ð½Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÑÑ‚Ð²Ð¾, Ð¾Ð±ÑŠÐµÐ´Ð¸Ð½ÑÑŽÑ‰ÐµÐµ Ñ‚Ñ‹ÑÑÑ‡Ð¸ Ð»ÑŽÐ±Ð¸Ñ‚ÐµÐ»ÐµÐ¹ Ð¼Ð¾Ñ‚Ð¾Ñ€Ð½Ñ‹Ñ… Ð»Ð¾Ð´Ð¾Ðº Ð¸ ÐºÐ°Ñ‚ÐµÑ€',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Super! Thank you.','alex',1),(2,'Thank you so much.','andrew',1),(3,'Cool article','handy',1),(4,'Very interesting. Thank you!','sasha',2),(5,'Great!','yulia',2),(6,'Great!','yulia',2),(7,'Cool article!','sanya',1),(8,'Cool article!','sanya',1),(9,'Super!','sukhdug',2),(10,'Super!','sukhdug',2),(11,'Very cool!','andrew',2),(12,'Nice)','elena',2),(13,'ÐœÐ½Ðµ Ð¿Ð¾Ð½Ñ€Ð°Ð²Ð¸Ð»Ð¾ÑÑŒ)','yulia',2);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','sukhdug@gmail.com','Handy','Handy','$2y$10$aerbhcfj4Ohmzd1D8jwuKu7oKzj41PhlKDuNhwAi46okdS57h45lq',1),(2,'sukhdug','sukhdug@gmail.com','Ð¥Ð°Ð½Ð´Ñ‹-Ð¡ÑƒÑ€ÑƒÐ½','Ð”ÑƒÐ³ÑƒÑ€Ð¶Ð°Ð¿','$2y$10$/SfObKQMMxPHLzJqNitklu4V0cGf22gYM8GRJbdQbyxUM73xeZ.rO',1),(3,'demo','demo@gmail.com','demo','demo','$2y$10$WtLP5U6D/.3iGltpKZbgY.0WOYkZ6WWiAwuMwZEtlnt/ypAnXR77.',0);
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

-- Dump completed on 2018-01-19  0:22:35
