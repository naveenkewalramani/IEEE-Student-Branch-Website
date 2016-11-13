-- MySQL dump 10.13  Distrib 5.5.38, for Linux (i686)
--
-- Host: localhost    Database: ieee
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms`
--

LOCK TABLES `cms` WRITE;
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
INSERT INTO `cms` VALUES ('admin','ieee');
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `subject` longtext NOT NULL,
  `message` longtext NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES ('abc','abc@iiita.ac.in','1234567890','test','i m just trying to test',1),('SREE DEVI MADALA','sreemdevi96@gmail.com','9490510801','enrolled as Student Member','I had enrolled as student member on 8th October 2014 and my IEEE Membership # 93207238. Please update in our college IEEE Students branch records.\r\n\r\nThanking you\r\nyours sincerely\r\nSree Devi Madala',2),('Prashant Kumar Singh','prashantsmo@gmail.com','8860273532','Admission Query','Dear Sir,\r\nI have a admission query please contact me .',3),('yeuxldxgjy','mruqrx@mrayha.com','9149164703','qNuowYHRrfqBQruoQg','yt97R2  &lt;a href=&quot;http://jsvcmrtukyww.com/&quot;&gt;jsvcmrtukyww&lt;/a&gt;, [url=http://jodlnyzykwea.com/]jodlnyzykwea[/url], [link=http://ajngyixavzeu.com/]ajngyixavzeu[/link], http://xrbzarjhtrry.com/',4),('emzucnsvj','bgxkxt@ftpshm.com','3075771671','coKXnVrwVK','IAPMcj  &lt;a href=&quot;http://pxlqmdfbtagt.com/&quot;&gt;pxlqmdfbtagt&lt;/a&gt;, [url=http://oulyouuojtbx.com/]oulyouuojtbx[/url], [link=http://ymgujuniwkiq.com/]ymgujuniwkiq[/link], http://rmwzivyhwyhu.com/',5);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `name` varchar(50) NOT NULL,
  `detail` longtext NOT NULL,
  `venue` varchar(25) NOT NULL,
  `guidelines` longtext NOT NULL,
  `fee` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES ('Model Presentation and Competition','On the auspicious day of the Student Branch inauguration, a model presentation is being held on the theme \"Technology For Humanity\".<br>                     You are welcome to present a demonstration of your idea. Your efforts will be recognized by IEEE student branch of IIIT-Allahabad.<br>','IIIT-Allahabad','(1) You may participate in teams provided team size does not exceed 3 members.<br>                     (2) Demonstration needs to be limited to 10 minutes. There must be presentation slides for On Screen demostration.<br>                     (3) The model needs to be about technology alleviating the quality of life, in any form , i.e. it could be about healthcare,convenience,comforts and matching with the theme.<br>                     <br>','IEEE Member:NIL<br>                     IIIT-A Students:INR 200 per team<br>                     Others: INR 300 per team<br>','To Be Announced Shortly'),('Poster Presentation','A poster presentation contest shall also be held on the same theme i.e., \"Technology For Humanity\" .                      Participants are invited to present a poster and they shall be judged by a team of faculty members from IIIT Allahabad.                      This opportunity will certainly increase their Research contribution with greater participation in this event.','IIIT-Allahabad','(1) You may participate in teams provided team size does not exceed 3 members.<br>                     (2) The Poster needs to be about technology alleviating the quality of life, in any form , i.e. it could be about healthcare,convenience,comforts and matching with the theme.                     <br><br>','Same as above.','To Be Announced Shortly');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_image`
--

DROP TABLE IF EXISTS `events_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_image` (
  `name` varchar(50) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_image`
--

LOCK TABLES `events_image` WRITE;
/*!40000 ALTER TABLE `events_image` DISABLE KEYS */;
INSERT INTO `events_image` VALUES ('Model Presentation and Competition',6),('Poster Presentation',7);
/*!40000 ALTER TABLE `events_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(500) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'stu_images/member1.jpg'),(2,'stu_images/member2.jpg'),(3,'stu_images/member3.jpg'),(4,'stu_images/member4.jpg'),(5,'stu_images/member5.jpg'),(6,'stu_images/member6.jpg'),(7,'stu_images/member7.jpg'),(8,'stu_images/member8.jpg'),(9,'stu_images/member9.jpg'),(10,'stu_images/member10.jpg'),(11,'stu_images/member11.jpg'),(12,'stu_images/member12.jpg'),(13,'stu_images/member13.jpg'),(14,'stu_images/member14.jpg'),(15,'stu_images/member15.jpg'),(16,'stu_images/member16.jpg'),(17,'stu_images/member17.jpg'),(18,'stu_images/member18.jpg'),(19,'stu_images/member19.jpg'),(20,'stu_images/member20.jpg'),(21,'stu_images/member21.jpg'),(22,'stu_images/member22.jpg'),(23,'stu_images/member23.jpg'),(24,'stu_images/member24.jpg'),(25,'stu_images/member25.jpg'),(26,'stu_images/member26.jpg'),(27,'stu_images/member27.jpg'),(28,'stu_images/member28.jpg'),(29,'stu_images/member29.jpg'),(30,'stu_images/member30.jpg'),(31,'stu_images/member31.jpg'),(32,'stu_images/member32.jpg'),(33,'stu_images/member33.jpg'),(34,'stu_images/member34.jpg'),(35,'stu_images/member35.jpg'),(36,'stu_images/member36.jpg'),(37,'stu_images/member37.jpg'),(38,'stu_images/member38.jpg'),(39,'stu_images/member39.jpg'),(40,'stu_images/member40.jpg'),(41,'stu_images/member41.jpg'),(42,'stu_images/member42.jpg'),(43,'stu_images/member43.jpg'),(44,'stu_images/member44.jpg'),(45,'stu_images/member45.jpg'),(46,'stu_images/member46.jpg'),(47,'stu_images/member47.jpg'),(48,'stu_images/member48.jpg'),(49,'stu_images/member49.jpg'),(50,'stu_images/member50.jpg'),(51,'stu_images/member51.jpg'),(52,'stu_images/member52.jpg'),(53,'stu_images/member53.jpg'),(54,'stu_images/member54.jpg'),(56,'stu_images/member56.jpg'),(57,'stu_images/member57.jpg'),(58,'stu_images/member58.jpg'),(59,'stu_images/member59.jpg'),(60,'stu_images/member60.jpg'),(61,'stu_images/member61.jpg'),(62,'stu_images/member62.jpg'),(63,'stu_images/member63.jpg'),(64,'stu_images/member64.jpg'),(65,'stu_images/member65.jpg'),(66,'stu_images/member66.jpg'),(67,'stu_images/member67.jpg'),(68,'stu_images/member68.jpg'),(69,'stu_images/member69.jpg'),(70,'stu_images/member70.jpg'),(71,'stu_images/member71.jpg'),(72,'stu_images/member72.jpg'),(73,'stu_images/member73.jpg'),(74,'stu_images/member74.jpg'),(75,'stu_images/member75.jpg'),(76,'stu_images/member76.jpg'),(77,'stu_images/member77.jpg'),(78,'stu_images/member78.jpg'),(79,'stu_images/member79.jpg'),(80,'stu_images/member80.jpg'),(81,'stu_images/member81.jpg'),(82,'stu_images/member82.jpg'),(83,'stu_images/member83.jpg'),(84,'stu_images/member84.jpg'),(85,'stu_images/member85.jpg'),(86,'stu_images/member86.jpg'),(87,'stu_images/member87.jpg'),(88,'stu_images/member88.jpg'),(89,'stu_images/member89.jpg');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_events`
--

DROP TABLE IF EXISTS `image_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_events` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(500) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_events`
--

LOCK TABLES `image_events` WRITE;
/*!40000 ALTER TABLE `image_events` DISABLE KEYS */;
INSERT INTO `image_events` VALUES (6,'event_images/02.jpg'),(7,'event_images/03.jpg');
/*!40000 ALTER TABLE `image_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `name` varchar(200) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES ('Ashutosh Rajpal',2147483647,'ibi2014001@iiita.ac.in','s','Room No - 141, Boys Hostel - 1, IIIT Allahabad - 211012'),('john',2004081576,'john@hotmail.com','xl','RURLWH http://www.QS3PE5ZGdxC9IoVKTAPT2DBYpPkMKqfz.com'),('john',2147483647,'john@hotmail.com','l','TglkH3 http://www.QS3PE5ZGdxC9IoVKTAPT2DBYpPkMKqfz.com'),('ghggj',1234567890,'ffghfghfh@rediffmail.com','s','gjhgjhgjhgjgjjh'),('gbyusjbddbu',2147483647,'gxpoyq@squshx.com','xl','E2pLgl  &lt;a href=&quot;http://xjikcslgztzo.com/&quot;&gt;xjikcslgztzo&lt;/a&gt;, [url=http://xaaboavbepoi.com/]xaaboavbepoi[/url], [link=http://zxancvvohdhv.com/]zxancvvohdhv[/link], http://ipukhipi'),('D K Anand',2147483647,'anand4u4ever1@gmail.com','s','Room no-818,BH-3,IIIT-Allahabad'),('dlmnnvuws',2147483647,'qqyjag@zrzupi.com','l','W6UnPa  &lt;a href=&quot;http://ddxzzzcfumak.com/&quot;&gt;ddxzzzcfumak&lt;/a&gt;, [url=http://ikfujkqzssls.com/]ikfujkqzssls[/url], [link=http://kxnplychwogw.com/]kxnplychwogw[/link], http://cpuzvpao'),('psakvb',2147483647,'btmxue@bbttfs.com','xl','jXbpbb  &lt;a href=&quot;http://fpzzzaeeeizc.com/&quot;&gt;fpzzzaeeeizc&lt;/a&gt;, [url=http://axwkdnscwclq.com/]axwkdnscwclq[/url], [link=http://xxbliafdcmua.com/]xxbliafdcmua[/link], http://etnqwiar'),('marcus',2147483647,'zork2j3he@gmail.com','l','pjdWpN http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com'),('klark',2147483647,'luidji2d@gmail.com','l','sm0sOL http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com'),('luidji',2147483647,'darel233455@gmail.com','m','RCp42U http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_image`
--

DROP TABLE IF EXISTS `student_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_image` (
  `member_id` varchar(25) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_image`
--

LOCK TABLES `student_image` WRITE;
/*!40000 ALTER TABLE `student_image` DISABLE KEYS */;
INSERT INTO `student_image` VALUES ('80633716',23),('90839928',12),('92017058',36),('92080805',30),('92369440',41),('92455054',15),('92518569',7),('92633153',20),('92633164',18),('92633716',75),('92633865',17),('92633966',21),('92634022',19),('92653070',76),('92653107',2),('92653114',6),('92653123',1),('92673540',50),('92742523',51),('92809398',3),('92889945',24),('92901910',8),('92904446',9),('92905735',11),('92920835',4),('92926738',5),('92928732',10),('92935176',29),('92935186',31),('92937354',16),('92937398',22),('92937805',14),('92940017',13),('92940243',52),('92940539',53),('92943127',32),('92944208',54),('92947273',77),('92947663',56),('92949459',57),('92950207',26),('92950265',33),('92950280',58),('92950409',59),('92950447',60),('92959249',78),('93016167',38),('93150548',25),('93158445',40),('93158594',79),('93171845',61),('93184802',28),('93187517',42),('93187716',43),('93207078',62),('93207238',80),('93217471',44),('93219264',63),('93222214',39),('93233426',46),('93233650',64),('93235848',35),('93237013',81),('93237103',65),('93237124',82),('93237172',66),('93237183',83),('93237189',67),('93237250',27),('93238113',84),('93238196',85),('93238243',86),('93238757',37),('93239234',87),('93239237',88),('93239249',68),('93239275',69),('93239291',70),('93239363',47),('93239378',34),('93239415',89),('93239755',71),('93240412',49),('93240448',72),('93240454',45),('93240457',48),('93240609',73),('93246085',74);
/*!40000 ALTER TABLE `student_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_team`
--

DROP TABLE IF EXISTS `student_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_team` (
  `member_id` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `course` varchar(25) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_team`
--

LOCK TABLES `student_team` WRITE;
/*!40000 ALTER TABLE `student_team` DISABLE KEYS */;
INSERT INTO `student_team` VALUES ('80633716','Ratnesh Samaiya','ratnesh.samaiya@yahoo.com','M.Tech'),('90839928','Chandra Shekar Gautam','cs.gautam@gmail.com','Sr. Project Fellow'),('92017058','Purnendu Shekhar Pandey','rs141@iiita.ac.in','Ph.D'),('92080805','Shrikant Malviya','shrikant.iet6153@gmail.com','Ph.D'),('92369440','Jaya Singh','jayasinghoct20@gmail.com','Ph.D'),('92455054','Shamanth Rai','rai.shamanth@gmail.com','Ph.D'),('92518569','Monika Rani','monikarani1988@gmail.com','Ph.D'),('92633153','Radhe Shyam Gupta','radheg89@gmail.com','M.Tech'),('92633164','Shobhit Singh','shobhit96@gmail.com','M.Tech'),('92633716','Rantesh Kumar Samaiya','ratnesh.samaiya@yahoo.com','-'),('92633865','Prateek Katare','prateek.katare@gmail.com','M.Tech'),('92633966','Vivek Kumar Gupta','vivek.kumar002@gmail.com','M.Tech'),('92634022','Neha Sakhuja','nehasakhuja2812@gmail.com','M.Tech'),('92653070','Seema Mishra','seema.mishra.phd@gmail.com','-'),('92653107','Avinash Kumar Singh','rs110@iiita.ac.in','Ph.D'),('92653114','Neha Baranwal','baranwal.neha24@gmail.com','Ph.D'),('92653123','Anup Nandy','nandy.anup@gmail.com','Ph.D'),('92673540','Aditya kishore Saxena','arohan.for.aditya@gmail.com','-'),('92742523','Bharat Singh','bharat.iiita87@gmail.com','-'),('92809398','Vijay Bhaskar Semwal','vsemwal@gmail.com','Ph.D'),('92889945','Abhay Kumar','abhay.2t@gmail.com','M.Tech'),('92901910','Shiv Ram Dubey','shivram1987@gmail.com','Ph.D'),('92904446','Pinki Kumari','pinkishrm204@gmail.com','Ph.D'),('92905735','Vinod Kumar Jatav','vinodj217@gmail.com','Ph.D'),('92920835','Anush Bekal','anush.bekal.in@ieee.org','Ph.D'),('92926738','Manish Raj','rajmanish.03@gmail.com','Ph.D'),('92928732','Krishna Kant Agrawal','k.k.agrawal@gmail.com','Ph.D'),('92935176','Ravi Kant','ims2013034@iiita.ac.in','MS'),('92935186','Akansha Pandey','ims2013001@iiita.ac.in','MS'),('92937354','Akansha Bansal','akanshabansal24@gmail.com','Ph.D'),('92937398','Divya Tomar','divyatomar26@gmail.com','Ph.D'),('92937805','Bhawana Rudra','bhawanarudra7@gmail.com','Ph.D'),('92940017','Purav Parikh','rs120@iiita.ac.in','Ph.D'),('92940243','Soumava Kumar Roy','soumava.roy91@gmail.com','-'),('92940539','Utkarsh Agrawal','utkarsh3914@gmail.com','-'),('92943127','Venkateshwaran K','ims2013003@iiita.ac.in','MS'),('92944208','Purnendu Shekhar Pandey','purnendu.iiita@gmail.com','-'),('92947273','Anu Malviya','anumalviya20008@gmail.com','-'),('92947663','Ayush Gupta','masterayush21@gmail.com','-'),('92949459','Neeraj Jain','neeraj.jain.iiita@gmail.com','-'),('92950207','Harisha','airbail@yahoo.com','M.Tech'),('92950265','Madhuri Agarwal','madhuri.agarwal21@gmail.com','MS'),('92950280','Ankita Lavania','ankita.lavania003@gmail.com','-'),('92950409','Mrigendra Pratap Singh Shishodia','mpss009@gmail.com','-'),('92950447','Nikhil Aggarwal','nikhilaggarwal1209@gmail.com','-'),('92959249','Apoorva Agarwal','agrawalapoorva373@gmail.com','-'),('93016167','Kumar Saurav','iro2013011@iiita.ac.in','M.Tech'),('93150548','Soumendu Chakraborty','rs169@iiita.ac.in','Ph.D'),('93158445','Swapnil Tichkule','swapniltichkule@gmail.com','M.Tech'),('93158594','Shantal Raj','shantalraj96@gmail.com','-'),('93171845','Eashwer Ram B','eashwer.ram07@gmail.com','-'),('93184802','Anurag Shandilya','rag_shandilya@yahoo.co.in','M.Tech'),('93187517','M.Lakshmi Likhitha','imm2014004@iiita.ac.in','Int. B.Tech'),('93187716','Yash Gupta','iec2013076@iiita.ac.in','B.Tech'),('93207078','Renu Kachhoria','renu.iiita@gmail.com','-'),('93207238','Sree Devi Madala','sreemdevi96@gmail.com','-'),('93217471','Sourabh Prakash','sprakash13@gmail.com','Ph.D'),('93219264','Bakshi Rohit Prasad','rohit.cs12@gmail.com','-'),('93222214','Praveen Kumar','ibm2012011@iiita.ac.in','M.Tech'),('93233426','Munde Pravin','mundhe.pravin@gmail.com','Ph.D'),('93233650','Sharad Gupta','sharad311285@gmail.com','-'),('93235848','Soumyarka Mondal','iit2012092@iiita.ac.in','B.Tech'),('93237013','Sourav Kumar','souravkumarsr7677@gmail.com','-'),('93237103','Nikita Agarwal','nikiita013@gmail.com','-'),('93237124','Siddharth Siddharth','sid.sapien@gmail.com','-'),('93237172','Paras Asati','paraspace3@gmail.com','-'),('93237183','Shubham Gupta','shubhamgupta541994@gmail.com','-'),('93237189','Padmakar Pandey','padmakar0001@gmail.com','-'),('93237250','Venkat B','venkat.beri@outlook.com','Ph.D'),('93238113','Apurva Gupta','apurvagupta08@rediffmail.com','-'),('93238196','Ritwick Sundar','ritwick.sundar@gmail.com','-'),('93238243','Parth Parakh','parthparakh95@gmail.com','-'),('93238757','Yogesh Gupta','irm2014004@iiita.ac.in','B.Tech'),('93239234','Amrita Singh','amrita010496@gmail.com','-'),('93239237','Tanushree Anand','tanushreeanand100@gmail.com','-'),('93239249','Aakansha Mathuria','aakanksha.mathuria@gmail.com','-'),('93239275','Ishu Matil','ishumatil000@gmail.com','-'),('93239291','Juhi Kumari','juhi1kri@gmail.com','-'),('93239363','Akash Dubey','iit2013141@iiita.ac.in','B.Tech'),('93239378','Abhishek Vijayan','iit2013166@iiita.ac.in','B.Tech'),('93239415','Sumedha Agarwal','ecm2014004@iiita.ac.in','-'),('93239755','Aniruddha Singh','aniruddha.iiita@gmail.com','-'),('93240412','Kshitij Garg','iec2014092@iiita.ac.in','B.tech'),('93240448','Sanjeev Suresh Nair','iec2013089@iiita.ac.in','-'),('93240454','Harikrishnan B','haribarca21@gmail.com','B.Tech'),('93240457','Niket Gaurav','94niketgaurav@gmail.com','B.Tech'),('93240609','Shubham Nanda','iit2013208@iiita.ac.in','-'),('93246085','Adrish Banerjee','adrish.banerjee24@gmail.com','-');
/*!40000 ALTER TABLE `student_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_records`
--

DROP TABLE IF EXISTS `user_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_records` (
  `username` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `birthmonth` varchar(15) NOT NULL,
  `birthday` varchar(11) NOT NULL,
  `birthyear` varchar(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  PRIMARY KEY (`username`,`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_records`
--

LOCK TABLES `user_records` WRITE;
/*!40000 ALTER TABLE `user_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_records` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-22 10:21:04
