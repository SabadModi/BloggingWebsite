-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `body` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (11,34,25,'the first comment on post no. 25','2020-12-12 01:54:20',NULL),(12,34,20,'this is a test comment\n','2020-12-13 02:03:10',NULL),(26,34,20,'comment on post 20','2020-12-13 03:14:45',NULL),(34,34,29,'Test comment','2021-01-19 15:56:32',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `like` (
  `likeid` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`likeid`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

LOCK TABLES `like` WRITE;
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
INSERT INTO `like` VALUES (115,2,1),(124,24,2),(137,23,2),(141,21,2),(142,20,2);
/*!40000 ALTER TABLE `like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (20,49,1,'Post 1 ','1601638168_messi ballon d\'or.JPG','&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut morbi tincidunt augue interdum. Mattis aliquam faucibus purus in massa. Aliquam ultrices sagittis orci a scelerisque purus semper. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas. Sollicitudin aliquam ultrices sagittis orci a. Cras ornare arcu dui vivamus. Velit ut tortor pretium viverra. Sit amet cursus sit amet dictum sit amet. Platea dictumst quisque sagittis purus sit amet. Mattis aliquam faucibus purus in massa tempor nec. Netus et malesuada fames ac turpis egestas maecenas pharetra. Quam pellentesque nec nam aliquam sem et tortor consequat id.&lt;/p&gt;&lt;p&gt;Magna fringilla urna porttitor rhoncus dolor purus non. Lectus proin nibh nisl condimentum id venenatis a. Enim sed faucibus turpis in eu. Dictum fusce ut placerat orci nulla pellentesque. Blandit massa enim nec dui nunc mattis enim ut. Non sodales neque sodales ut etiam sit. Est sit amet facilisis magna etiam tempor orci. Gravida quis blandit turpis cursus in hac habitasse platea dictumst. Nulla facilisi cras fermentum odio. Nam libero justo laoreet sit. Arcu risus quis varius quam quisque id diam vel. Faucibus interdum posuere lorem ipsum dolor sit amet consectetur. Congue mauris rhoncus aenean vel. Libero volutpat sed cras ornare arcu dui vivamus arcu. Ut eu sem integer vitae justo eget magna. Tincidunt tortor aliquam nulla facilisi.&lt;/p&gt;',1,'2020-10-02 15:29:28'),(21,49,1,'Post 2','1601638226_messi 46.jpg','&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est ante in nibh mauris. Consequat interdum varius sit amet mattis vulputate enim nulla aliquet. Tellus orci ac auctor augue mauris augue. Tincidunt tortor aliquam nulla facilisi. Mattis rhoncus urna neque viverra justo nec ultrices. Sagittis id consectetur purus ut faucibus pulvinar elementum integer. Pellentesque habitant morbi tristique senectus. Amet facilisis magna etiam tempor orci eu lobortis elementum. Elementum nisi quis eleifend quam adipiscing vitae. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Quam vulputate dignissim suspendisse in est. Tristique nulla aliquet enim tortor at auctor urna. Sed arcu non odio euismod lacinia at. Adipiscing elit ut aliquam purus sit. Donec massa sapien faucibus et molestie ac feugiat sed lectus. Est ante in nibh mauris. Sem viverra aliquet eget sit amet tellus cras adipiscing. Faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Tincidunt dui ut ornare lectus sit amet est.&lt;/p&gt;&lt;p&gt;In mollis nunc sed id semper risus in hendrerit gravida. Et malesuada fames ac turpis. Diam ut venenatis tellus in metus. Risus pretium quam vulputate dignissim suspendisse in. Rutrum quisque non tellus orci ac auctor augue mauris augue. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Aenean pharetra magna ac placerat vestibulum lectus. Eu ultrices vitae auctor eu. Feugiat scelerisque varius morbi enim nunc faucibus. Id nibh tortor id aliquet lectus proin. Integer quis auctor elit sed vulputate mi sit. Nunc faucibus a pellentesque sit. Varius duis at consectetur lorem donec massa sapien.&lt;/p&gt;&lt;p&gt;Lorem donec massa sapien faucibus et molestie. Nisi porta lorem mollis aliquam ut porttitor leo. At lectus urna duis convallis convallis tellus id interdum. Dui id ornare arcu odio ut sem. Mattis rhoncus urna neque viverra justo nec ultrices. Fringilla urna porttitor rhoncus dolor purus non. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Suspendisse ultrices gravida dictum fusce. Ut tristique et egestas quis. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. In hac habitasse platea dictumst vestibulum rhoncus est. Libero justo laoreet sit amet cursus sit amet dictum sit. Morbi blandit cursus risus at ultrices mi tempus imperdiet nulla. Enim neque volutpat ac tincidunt vitae semper quis lectus. Egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Pellentesque eu tincidunt tortor aliquam nulla facilisi. Risus commodo viverra maecenas accumsan lacus vel facilisis volutpat est.&lt;/p&gt;',1,'2020-10-02 15:30:26'),(22,49,1,'Post 3','1601638302_messi 43.jpg','&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum curabitur vitae nunc sed velit dignissim sodales. Suscipit adipiscing bibendum est ultricies integer quis. Diam vel quam elementum pulvinar. Sed felis eget velit aliquet sagittis. Gravida arcu ac tortor dignissim convallis aenean. Viverra tellus in hac habitasse platea dictumst vestibulum. Dolor morbi non arcu risus quis varius quam quisque id. A diam maecenas sed enim. Nisl condimentum id venenatis a condimentum vitae sapien. Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Elementum curabitur vitae nunc sed. Tellus molestie nunc non blandit massa.&lt;/p&gt;&lt;p&gt;Tempor orci dapibus ultrices in iaculis nunc sed augue lacus. Scelerisque purus semper eget duis at tellus at urna condimentum. Curabitur gravida arcu ac tortor dignissim convallis. Nullam non nisi est sit amet facilisis magna etiam tempor. Odio morbi quis commodo odio aenean. Aenean sed adipiscing diam donec. Ultrices sagittis orci a scelerisque purus semper eget. Posuere morbi leo urna molestie at elementum. Massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet nisl suscipit adipiscing bibendum est ultricies integer. Condimentum vitae sapien pellentesque habitant morbi. Ac odio tempor orci dapibus ultrices. Turpis egestas sed tempus urna. At auctor urna nunc id. Ante in nibh mauris cursus mattis molestie a iaculis. Sed euismod nisi porta lorem mollis. At auctor urna nunc id cursus.&lt;/p&gt;&lt;p&gt;Semper auctor neque vitae tempus quam pellentesque nec nam aliquam. Ornare arcu odio ut sem nulla pharetra diam sit. Arcu dui vivamus arcu felis. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Tellus id interdum velit laoreet id donec ultrices. Sollicitudin tempor id eu nisl nunc mi ipsum. Sed libero enim sed faucibus turpis in eu. Condimentum id venenatis a condimentum. Tempor orci dapibus ultrices in iaculis nunc. Praesent tristique magna sit amet purus gravida. Sit amet commodo nulla facilisi nullam vehicula ipsum a. Duis convallis convallis tellus id. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Eu volutpat odio facilisis mauris sit amet massa vitae. Potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed. Dolor sit amet consectetur adipiscing elit.&lt;/p&gt;&lt;p&gt;Consequat id porta nibh venenatis cras sed. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. A lacus vestibulum sed arcu non odio euismod. Arcu cursus vitae congue mauris rhoncus aenean. Convallis aenean et tortor at risus. Ac turpis egestas maecenas pharetra convallis. Amet aliquam id diam maecenas ultricies mi eget. Mi bibendum neque egestas congue. Mattis molestie a iaculis at. Molestie nunc non blandit massa. Volutpat ac tincidunt vitae semper quis lectus nulla. Vitae et leo duis ut diam quam nulla porttitor massa. Dignissim suspendisse in est ante. Ac odio tempor orci dapibus ultrices in iaculis nunc. Donec ac odio tempor orci dapibus ultrices. Amet cursus sit amet dictum sit amet justo donec. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Viverra vitae congue eu consequat ac felis donec et odio. Tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse. Amet est placerat in egestas.&lt;/p&gt;',1,'2020-10-02 15:31:42'),(23,49,1,'Post 4','1601638401_messi 42.jpg','&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum curabitur vitae nunc sed velit dignissim sodales. Suscipit adipiscing bibendum est ultricies integer quis. Diam vel quam elementum pulvinar. Sed felis eget velit aliquet sagittis. Gravida arcu ac tortor dignissim convallis aenean. Viverra tellus in hac habitasse platea dictumst vestibulum. Dolor morbi non arcu risus quis varius quam quisque id. A diam maecenas sed enim. Nisl condimentum id venenatis a condimentum vitae sapien. Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Elementum curabitur vitae nunc sed. Tellus molestie nunc non blandit massa.&lt;/p&gt;&lt;p&gt;Tempor orci dapibus ultrices in iaculis nunc sed augue lacus. Scelerisque purus semper eget duis at tellus at urna condimentum. Curabitur gravida arcu ac tortor dignissim convallis. Nullam non nisi est sit amet facilisis magna etiam tempor. Odio morbi quis commodo odio aenean. Aenean sed adipiscing diam donec. Ultrices sagittis orci a scelerisque purus semper eget. Posuere morbi leo urna molestie at elementum. Massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet nisl suscipit adipiscing bibendum est ultricies integer. Condimentum vitae sapien pellentesque habitant morbi. Ac odio tempor orci dapibus ultrices. Turpis egestas sed tempus urna. At auctor urna nunc id. Ante in nibh mauris cursus mattis molestie a iaculis. Sed euismod nisi porta lorem mollis. At auctor urna nunc id cursus.&lt;/p&gt;&lt;p&gt;Semper auctor neque vitae tempus quam pellentesque nec nam aliquam. Ornare arcu odio ut sem nulla pharetra diam sit. Arcu dui vivamus arcu felis. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Tellus id interdum velit laoreet id donec ultrices. Sollicitudin tempor id eu nisl nunc mi ipsum. Sed libero enim sed faucibus turpis in eu. Condimentum id venenatis a condimentum. Tempor orci dapibus ultrices in iaculis nunc. Praesent tristique magna sit amet purus gravida. Sit amet commodo nulla facilisi nullam vehicula ipsum a. Duis convallis convallis tellus id. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Eu volutpat odio facilisis mauris sit amet massa vitae. Potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed. Dolor sit amet consectetur adipiscing elit.&lt;/p&gt;&lt;p&gt;Consequat id porta nibh venenatis cras sed. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. A lacus vestibulum sed arcu non odio euismod. Arcu cursus vitae congue mauris rhoncus aenean. Convallis aenean et tortor at risus. Ac turpis egestas maecenas pharetra convallis. Amet aliquam id diam maecenas ultricies mi eget. Mi bibendum neque egestas congue. Mattis molestie a iaculis at. Molestie nunc non blandit massa. Volutpat ac tincidunt vitae semper quis lectus nulla. Vitae et leo duis ut diam quam nulla porttitor massa. Dignissim suspendisse in est ante. Ac odio tempor orci dapibus ultrices in iaculis nunc. Donec ac odio tempor orci dapibus ultrices. Amet cursus sit amet dictum sit amet justo donec. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Viverra vitae congue eu consequat ac felis donec et odio. Tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse. Amet est placerat in egestas.&lt;/p&gt;',1,'2020-10-02 15:33:21'),(24,49,1,'Post 5','1601638469_MSD.jpg','&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum curabitur vitae nunc sed velit dignissim sodales. Suscipit adipiscing bibendum est ultricies integer quis. Diam vel quam elementum pulvinar. Sed felis eget velit aliquet sagittis. Gravida arcu ac tortor dignissim convallis aenean. Viverra tellus in hac habitasse platea dictumst vestibulum. Dolor morbi non arcu risus quis varius quam quisque id. A diam maecenas sed enim. Nisl condimentum id venenatis a condimentum vitae sapien. Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Elementum curabitur vitae nunc sed. Tellus molestie nunc non blandit massa.&lt;/p&gt;&lt;p&gt;Tempor orci dapibus ultrices in iaculis nunc sed augue lacus. Scelerisque purus semper eget duis at tellus at urna condimentum. Curabitur gravida arcu ac tortor dignissim convallis. Nullam non nisi est sit amet facilisis magna etiam tempor. Odio morbi quis commodo odio aenean. Aenean sed adipiscing diam donec. Ultrices sagittis orci a scelerisque purus semper eget. Posuere morbi leo urna molestie at elementum. Massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet nisl suscipit adipiscing bibendum est ultricies integer. Condimentum vitae sapien pellentesque habitant morbi. Ac odio tempor orci dapibus ultrices. Turpis egestas sed tempus urna. At auctor urna nunc id. Ante in nibh mauris cursus mattis molestie a iaculis. Sed euismod nisi porta lorem mollis. At auctor urna nunc id cursus.&lt;/p&gt;&lt;p&gt;Semper auctor neque vitae tempus quam pellentesque nec nam aliquam. Ornare arcu odio ut sem nulla pharetra diam sit. Arcu dui vivamus arcu felis. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Tellus id interdum velit laoreet id donec ultrices. Sollicitudin tempor id eu nisl nunc mi ipsum. Sed libero enim sed faucibus turpis in eu. Condimentum id venenatis a condimentum. Tempor orci dapibus ultrices in iaculis nunc. Praesent tristique magna sit amet purus gravida. Sit amet commodo nulla facilisi nullam vehicula ipsum a. Duis convallis convallis tellus id. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Eu volutpat odio facilisis mauris sit amet massa vitae. Potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed. Dolor sit amet consectetur adipiscing elit.&lt;/p&gt;&lt;p&gt;Consequat id porta nibh venenatis cras sed. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. A lacus vestibulum sed arcu non odio euismod. Arcu cursus vitae congue mauris rhoncus aenean. Convallis aenean et tortor at risus. Ac turpis egestas maecenas pharetra convallis. Amet aliquam id diam maecenas ultricies mi eget. Mi bibendum neque egestas congue. Mattis molestie a iaculis at. Molestie nunc non blandit massa. Volutpat ac tincidunt vitae semper quis lectus nulla. Vitae et leo duis ut diam quam nulla porttitor massa. Dignissim suspendisse in est ante. Ac odio tempor orci dapibus ultrices in iaculis nunc. Donec ac odio tempor orci dapibus ultrices. Amet cursus sit amet dictum sit amet justo donec. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Viverra vitae congue eu consequat ac felis donec et odio. Tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse. Amet est placerat in egestas.&lt;/p&gt;',1,'2020-10-02 15:34:29'),(25,49,1,'Post 6','1601638533_barca legends.jpg','&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum curabitur vitae nunc sed velit dignissim sodales. Suscipit adipiscing bibendum est ultricies integer quis. Diam vel quam elementum pulvinar. Sed felis eget velit aliquet sagittis. Gravida arcu ac tortor dignissim convallis aenean. Viverra tellus in hac habitasse platea dictumst vestibulum. Dolor morbi non arcu risus quis varius quam quisque id. A diam maecenas sed enim. Nisl condimentum id venenatis a condimentum vitae sapien. Purus sit amet luctus venenatis lectus magna fringilla urna porttitor. Interdum consectetur libero id faucibus nisl tincidunt eget nullam non. Elementum curabitur vitae nunc sed. Tellus molestie nunc non blandit massa.&lt;/p&gt;&lt;p&gt;Tempor orci dapibus ultrices in iaculis nunc sed augue lacus. Scelerisque purus semper eget duis at tellus at urna condimentum. Curabitur gravida arcu ac tortor dignissim convallis. Nullam non nisi est sit amet facilisis magna etiam tempor. Odio morbi quis commodo odio aenean. Aenean sed adipiscing diam donec. Ultrices sagittis orci a scelerisque purus semper eget. Posuere morbi leo urna molestie at elementum. Massa placerat duis ultricies lacus sed turpis tincidunt. Sit amet nisl suscipit adipiscing bibendum est ultricies integer. Condimentum vitae sapien pellentesque habitant morbi. Ac odio tempor orci dapibus ultrices. Turpis egestas sed tempus urna. At auctor urna nunc id. Ante in nibh mauris cursus mattis molestie a iaculis. Sed euismod nisi porta lorem mollis. At auctor urna nunc id cursus.&lt;/p&gt;&lt;p&gt;Semper auctor neque vitae tempus quam pellentesque nec nam aliquam. Ornare arcu odio ut sem nulla pharetra diam sit. Arcu dui vivamus arcu felis. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Tellus id interdum velit laoreet id donec ultrices. Sollicitudin tempor id eu nisl nunc mi ipsum. Sed libero enim sed faucibus turpis in eu. Condimentum id venenatis a condimentum. Tempor orci dapibus ultrices in iaculis nunc. Praesent tristique magna sit amet purus gravida. Sit amet commodo nulla facilisi nullam vehicula ipsum a. Duis convallis convallis tellus id. Gravida in fermentum et sollicitudin ac orci phasellus egestas tellus. Eu volutpat odio facilisis mauris sit amet massa vitae. Potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed. Dolor sit amet consectetur adipiscing elit.&lt;/p&gt;&lt;p&gt;Consequat id porta nibh venenatis cras sed. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. A lacus vestibulum sed arcu non odio euismod. Arcu cursus vitae congue mauris rhoncus aenean. Convallis aenean et tortor at risus. Ac turpis egestas maecenas pharetra convallis. Amet aliquam id diam maecenas ultricies mi eget. Mi bibendum neque egestas congue. Mattis molestie a iaculis at. Molestie nunc non blandit massa. Volutpat ac tincidunt vitae semper quis lectus nulla. Vitae et leo duis ut diam quam nulla porttitor massa. Dignissim suspendisse in est ante. Ac odio tempor orci dapibus ultrices in iaculis nunc. Donec ac odio tempor orci dapibus ultrices. Amet cursus sit amet dictum sit amet justo donec. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Viverra vitae congue eu consequat ac felis donec et odio. Tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse. Amet est placerat in egestas.&lt;/p&gt;',1,'2020-10-02 15:35:33'),(30,53,1,'Test Posta','1611058769_download.png','&lt;p&gt;jdblvhbsdhjbdv&lt;/p&gt;',1,'2021-01-19 16:19:29'),(28,38,6,'post by test','1607896611_RoboClub_Logo.png','&lt;p&gt;One advanced diverted domestic sex repeated bringing you old. Possible procured her trifling laughter thoughts property she met way. Companions shy had solicitude favourable own. Which could saw guest man now heard but. Lasted my coming uneasy marked so should. Gravity letters it amongst herself dearest an windows by. Wooded ladies she basket season age her uneasy saw. Discourse unwilling am no described dejection incommode no listening of. Before nature his parish boy.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Folly words widow one downs few age every seven. If miss part by fact he park just shew. Discovered had get considered projection who favourable. Necessary up knowledge it tolerably. Unwilling departure education is be dashwoods or an. Use off agreeable law unwilling sir deficient curiosity instantly. Easy mind life fact with see has bore ten. Parish any chatty can elinor direct for former. Up as meant widow equal an share least.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Another journey chamber way yet females man. Way extensive and dejection get delivered deficient sincerity gentleman age. Too end instrument possession contrasted motionless. Calling offence six joy feeling. Coming merits and was talent enough far. Sir joy northward sportsmen education. Discovery incommode earnestly no he commanded if. Put still any about manor heard.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;In it except to so temper mutual tastes mother. Interested cultivated its continuing now yet are. Out interested acceptance our partiality affronting unpleasant why add. Esteem garden men yet shy course. Consulted up my tolerably sometimes perpetual oh. Expression acceptance imprudence particular had eat unsatiable.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Had denoting properly jointure you occasion directly raillery. In said to of poor full be post face snug. Introduced imprudence see say unpleasing devonshire acceptance son. Exeter longer wisdom gay nor design age. Am weather to entered norland no in showing service. Nor repeated speaking shy appetite. Excited it hastily an pasture it observe. Snug hand how dare here too.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Improve ashamed married expense bed her comfort pursuit mrs. Four time took ye your as fail lady. Up greatest am exertion or marianne. Shy occasional terminated insensible and inhabiting gay. So know do fond to half on. Now who promise was justice new winding. In finished on he speaking suitable advanced if. Boy happiness sportsmen say prevailed offending concealed nor was provision. Provided so as doubtful on striking required. Waiting we to compass assured.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;You disposal strongly quitting his endeavor two settling him. Manners ham him hearted hundred expense. Get open game him what hour more part. Adapted as smiling of females oh me journey exposed concern. Met come add cold calm rose mile what. Tiled manor court at built by place fanny. Discretion at be an so decisively especially. Exeter itself object matter if on mr in.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Effect if in up no depend seemed. Ecstatic elegance gay but disposed. We me rent been part what. An concluded sportsman offending so provision mr education. Bed uncommonly his discovered for estimating far. Equally he minutes my hastily. Up hung mr we give rest half. Painful so he an comfort is manners.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Article nor prepare chicken you him now. Shy merits say advice ten before lovers innate add. She cordially behaviour can attempted estimable. Trees delay fancy noise manor do as an small. Felicity now law securing breeding likewise extended and. Roused either who favour why ham.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;',1,'2020-12-14 01:56:51'),(29,34,1,'Test post','1608232393_36737ad6-6686-4128-bda9-c5c4eebad44b.jpg','&lt;p&gt;qui aute deserunt occaecat ut deserunt minim ipsum exercitation proident aliqua quis aute elit sit occaecat eiusmod commodo ex culpa reprehenderit id incididunt adipisicing pariatur dolor magna eiusmod adipisicing voluptate pariatur elit dolore aliquip ipsum fugiat incididunt do nostrud id magna veniam qui ex mollit ut cillum ad laboris magna qui ea in magna excepteur do ad duis dolore voluptate consequat ut ullamco voluptate anim minim eiusmod deserunt reprehenderit minim laboris eu exercitation labore pariatur non velit velit culpa adipisicing adipisicing quis nisi esse sit do consectetur laborum mollit fugiat qui incididunt officia magna voluptate minim ea veniam dolor qui do dolor tempor dolor nulla cupidatat excepteur duis do ipsum consequat veniam deserunt cillum ullamco est magna mollit tempor labore elit esse labore cillum sit cupidatat occaecat tempor ex proident Lorem amet duis nostrud sunt aliquip amet anim eiusmod aute dolore cillum commodo labore consectetur veniam voluptate ex deserunt eiusmod in tempor nostrud pariatur culpa mollit ea laborum dolor irure dolore cillum consectetur mollit culpa dolor commodo ad eu eiusmod aliquip minim mollit et qui ad occaecat proident eiusmod duis irure est irure adipisicing ullamco sit dolor consectetur voluptate officia occaecat veniam aliquip quis sit labore et reprehenderit labore occaecat culpa veniam ad quis sunt incididunt enim et nisi officia qui commodo do esse labore aliquip quis voluptate ea eiusmod ut laborum ut labore voluptate non minim minim adipisicing deserunt aliqua laboris cupidatat dolor do Lorem aute velit dolore velit sint occaecat elit et officia sunt commodo enim nulla occaecat magna ea aute nostrud duis laboris in ex consectetur est occaecat ad mollit pariatur proident irure aliqua quis incididunt duis excepteur cupidatat non pariatur consectetur ad sunt mollit adipisicing duis sit ullamco eu cupidatat eiusmod irure elit elit laborum minim occaecat esse nisi in sit occaecat do qui irure irure&lt;/p&gt;',1,'2020-12-17 23:13:13');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating_info`
--

DROP TABLE IF EXISTS `rating_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL,
  UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating_info`
--

LOCK TABLES `rating_info` WRITE;
/*!40000 ALTER TABLE `rating_info` DISABLE KEYS */;
INSERT INTO `rating_info` VALUES (34,20,'like'),(34,26,'like'),(34,29,'like'),(38,26,'like'),(54,29,'dislike');
/*!40000 ALTER TABLE `rating_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `body` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (8,34,26,'test reply','2020-12-13 03:32:42',NULL),(9,53,34,'test reply\n','2021-01-19 16:17:18',NULL);
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `website` varchar(255) DEFAULT 'Not Specified',
  `twitter` varchar(255) DEFAULT 'Not Specified',
  `instagram` varchar(255) DEFAULT 'Not Specified',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socials`
--

LOCK TABLES `socials` WRITE;
/*!40000 ALTER TABLE `socials` DISABLE KEYS */;
INSERT INTO `socials` VALUES (1,34,'Not Specified','Not Specified','Not Specified'),(2,53,'Not Specified','Not Specified','Not Specified'),(3,54,'Not Specified','Not Specified','Not Specified');
/*!40000 ALTER TABLE `socials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Test','<p>This is a test</p>'),(3,'Test 2','<p>This is a test</p>'),(6,'Topic 3','<p>Test</p>');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(4) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `gender` int(10) DEFAULT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `interests` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (34,1,'Sabad','12345@gmail.com','$2y$10$3ga4kq4uIdzXi2VgsdvFNeZAZTJ6QB8AZhq8ujEZvl2NiEx7QTLcC','Hi',1,'2010-01-05','test interests','1608027207_36737ad6-6686-4128-bda9-c5c4eebad44b.jpg','2020-09-29 13:30:39'),(38,0,'test','test@test.com','$2y$10$197.mxw65.vHzfELh2ghquUyEd5UYlFTzx7/Dmqbh8.deoE1iUu.u','<p>ergweg</p>',2,'2010-01-19','wrtjkntr;j','1601387379_2020-09-29.jpg','2020-09-29 13:49:39'),(43,0,'try','try@try.com','$2y$10$9/wZnoe0elVEwvIPGg9sB.DBjGYtqOgmI0Om9f0gJiE.gGn5vB5hC','&lt;p&gt;bhpiuadfbupy&lt;/p&gt;',1,'2010-01-13','iufvhpibv','1601485215_Photo on 9-30-20 at 9.55 AM.jpg','2020-09-30 17:00:15'),(48,1,'hi','hi@hi.com','$2y$10$UhWd.msX3oLksnbP72r5ne7E/J5AeidfNHs6vmyOHLBTQiIYzZaPG','&lt;p&gt;uypgcbvuypguyfgpruyfqgbuh&lt;/p&gt;',2,'2010-01-18','wrpghbvrupvhkvrhwiuhvbfhbjvlsf','1601635144_messi ballon d\'or.JPG','2020-10-02 10:39:04'),(49,1,'1','1@1.com','$2y$10$sH/UmKXMUj0y4yczOSs4T.WUAvjMqunfs8e07Y8voWZGDUglCti2u','&lt;p&gt;jsnhbfihprunvhnp&lt;/p&gt;',2,'2010-01-13','rjknrvn p nrpbdn bh','1601637539_messi ballon d\'or.JPG','2020-10-02 11:18:59'),(50,0,'test','testa@test.com','$2y$10$6DKlS/C80uwl56Ev8nTMee0f8XhZXbX7A/mgngXE..Wi.9bDWAnJ6','&lt;p&gt;vjhbnrushvybsuyvhuhsjvbgyg&lt;/p&gt;',1,'2007-04-06','ihvujrbviuphgiphb v','1601905029_messi .jpg','2020-10-05 13:37:09'),(51,0,'Sabad','sabadmodi@gmail.com','$2y$10$1xHePFtr2inGlCc6qUa2jekavSIpruD1LS0say.hGzjbvZKgDUE/K','&lt;p&gt;hjsbljhdsfbv&lt;/p&gt;',2,'2009-12-29','fdsjhbdslvhbil','1604866242_Timetable.jpeg','2020-11-08 20:10:42'),(52,0,'test','test@test.coma','$2y$10$fVbKSn/1Kby7TL5CdNYOFeSLCpUj3MczrU74K7nXLKve6kZPAaKPy','&lt;p&gt;ahbajvfhjvdjvssdjlvbds&lt;/p&gt;',1,'2010-01-21','kadjfbakdflhjdf','1607630350_20201127_144904.jpg','2020-12-10 19:59:10'),(53,1,'kool','kool@kool.com','$2y$10$zjyRxgBsob5KQaw1z0Gpje9oEpdDXUMy4t4QkqXAnywXopwPxN2DO','&lt;p&gt;Bio&lt;/p&gt;',1,'2007-04-06','Interests','1611057909_download.png','2021-01-19 12:05:09'),(54,0,'imkewl','imkewl@gmail.com','$2y$10$b0xsIBL6blElAwChwoxw4eqoPcCErw5Rp0.a43wev2wg4WXSzdu3y','&lt;p&gt;This is my bio&lt;/p&gt;',1,'2010-01-13','Technology','1612027155_1611058786_download.png','2021-01-30 17:19:15');
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

-- Dump completed on 2021-07-16 17:03:11
