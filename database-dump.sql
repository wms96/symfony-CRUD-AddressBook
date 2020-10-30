-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: sync_challenge
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address_book`
--

DROP TABLE IF EXISTS `address_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address_book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_book`
--

LOCK TABLES `address_book` WRITE;
/*!40000 ALTER TABLE `address_book` DISABLE KEYS */;
INSERT INTO `address_book` VALUES (41,'Ward','White','80238 Bechtelar Locks','Delphia Gutkowski','East Leonelberg','AF','254-712-6372 x13279','2020-10-23','ebernier@oreilly.com','./pictures/svga.png16036347751218180189'),(42,'Olin','Kshlerin','75275 Stoltenberg Loaf','Omari Yundt','Dachchester','LEB','+1.351.871.0406','2020-10-23','murl.tremblay@hotmail.com',NULL),(43,'Bill','Kuphal','8219 Lila Camp','Rogers Ruecker','Parisiantown','LEB','365-516-9487 x007','2020-10-23','murl.cummings@simonis.com',NULL),(44,'Ilene','Konopelski','83935 Corwin Loaf','Rafael Muller DDS','Corrinechester','LEB','1-837-599-2110 x1840','2020-10-23','cbernhard@block.com',NULL),(45,'Abel','Stehr','44565 Tony Roads','Landen Will','East Jessiechester','LEB','1-891-947-1991','2020-10-23','rklein@crist.org',NULL),(46,'Rico','Haley','858 Helen Ferry','Providenci Mosciski','North Torey','LEB','347-385-2008 x69122','2020-10-23','sylvia.ruecker@von.org',NULL),(47,'Buddy','Rau','60218 Crist Turnpike','Baby Hermann','New Eleazarview','LEB','981-260-9549','2020-10-23','lheathcote@runolfsson.biz',NULL),(48,'Felipa','Howe','683 Johnston Glen','Miss Fanny Bradtke','East Wainomouth','LEB','+1.967.205.2577','2020-10-23','davon.kuhic@hotmail.com',NULL),(49,'Marianna','Kutch','55647 Gunner View','Russell Dietrich MD','West Cortney','LEB','1-681-645-7310 x0213','2020-10-23','gleichner.josephine@waters.com',NULL),(50,'Lurline','Williamson','54081 Myriam Overpass','Herta Botsford PhD','Heathbury','LEB','(497) 381-9760 x0310','2020-10-23','mhettinger@bogisich.com',NULL),(51,'Jakayla','Schulist','947 Amely Oval Suite 509','Missouri Hahn','South Maida','LEB','1-409-452-1247 x295','2020-10-23','zieme.raul@hotmail.com',NULL),(52,'Erin','Connelly','46765 Rosendo Valleys Suite 898','Rahul Rogahn','Jasminberg','LEB','273-749-8684','2020-10-23','dibbert.kayley@gmail.com',NULL),(53,'Joana','Shanahan','1949 Koepp Roads','Stefanie Towne','Schmidtland','LEB','935-844-5028 x6466','2020-10-23','rcrist@hintz.com',NULL),(54,'Adele','Collier','66601 Gracie Tunnel','Evert Bartell','South Isobelmouth','LEB','439.296.3830 x4697','2020-10-23','nicolas.raphael@hermiston.com',NULL),(55,'Lorenza','Schuster','73128 Mraz Drive','Golden Casper','Uptonfurt','LEB','+1 (537) 531-7309','2020-10-23','xfriesen@gmail.com',NULL),(56,'Miles','Mertz','622 Tracey Ridge Suite 872','Micheal Bahringer DDS','New Caleb','LEB','794.415.8882 x94507','2020-10-23','garrison27@bins.com',NULL),(57,'Christian','Ondricka','31257 Hamill View Apt. 900','Dana Denesik DDS','Port Nikolas','LEB','497.414.7698','2020-10-23','cruickshank.maia@gmail.com',NULL),(58,'Jeffrey','Miller','203 Graham Viaduct','Oda Stracke','New Garry','LEB','+1.765.489.8120','2020-10-23','zleannon@jacobson.com',NULL),(59,'Beth','Hamill','44917 Camila Orchard','Melyna Bode','Moniqueport','LEB','+1.508.681.6631','2020-10-23','reichel.verna@fay.com',NULL),(60,'Fidel','Buckridge','40870 Bergstrom Flat Suite 364','Ella Skiles Jr.','Kathrynetown','LEB','+14289716538','2020-10-23','williamson.lorna@yahoo.com',NULL),(61,'Lia','Jakubowski','61448 Dario Bridge Suite 049','Dr. Marlon Collier','Stromanbury','LEB','+1.921.256.7896','2020-10-23','igutmann@gmail.com',NULL),(62,'Colleen','McClure','700 Harvey Shoal','Prof. Zion Hickle IV','Lubowitzside','LEB','385.717.6025','2020-10-23','gkohler@gmail.com',NULL),(63,'Lemuel','Hodkiewicz','973 Vivienne Ports Apt. 946','Holden Kilback','West Chasityhaven','LEB','761.743.3704 x56499','2020-10-23','ezra95@gmail.com',NULL),(64,'Laurie','Jerde','315 Lynch Cliff','Myron Kihn','Lake Zackery','LEB','+1 (743) 996-5002','2020-10-23','schaden.tracy@hotmail.com',NULL),(65,'Santina','Effertz','8781 Jackson Gardens Suite 850','Prof. Tom Gutkowski','Claudiastad','LEB','+17593338845','2020-10-23','earlene16@yahoo.com',NULL),(66,'Henri','Skiles','232 Feil Ramp Apt. 309','Gregg Smith','West Chelsie','LEB','996-386-9433 x3951','2020-10-23','shayna.torphy@gmail.com',NULL),(67,'Walker','Kilback','197 Jazmyne Ford','Ludie Considine','Kuhicbury','LEB','(734) 897-9253 x417','2020-10-23','keagan29@dach.com',NULL),(68,'Ebba','Beahan','456 Gorczany Summit Apt. 694','Prof. Taurean Orn','West Efrenbury','LEB','(561) 265-0779','2020-10-23','williamson.billie@wolff.info',NULL),(69,'Vena','Treutel','617 Langworth Manor','Carolina Jenkins','South Alyceton','LEB','330.215.4977 x550','2020-10-23','kristin.casper@yahoo.com',NULL),(70,'Vella','Konopelski','74224 Velda Creek','Emmanuel Schulist','Port Name','LEB','(248) 555-2430 x952','2020-10-23','zstrosin@runolfsson.com',NULL),(71,'Myrl','Trantow','1524 Abigail Dam','Jeramy Howell','West Albertohaven','LEB','+1.916.657.8976','2020-10-23','tskiles@yahoo.com',NULL),(72,'Reece','Quigley','76921 Stroman Villages Suite 373','Prof. Nathen Kuhic','Port Bethany','LEB','+1-638-764-9005','2020-10-23','blangosh@hotmail.com',NULL),(73,'Merle','Rohan','40034 Schuppe Stravenue Suite 903','Arvel Cremin','South Lloyd','LEB','937-339-3569 x721','2020-10-23','krajcik.rebekah@gmail.com',NULL),(74,'Carmela','Runolfsson','592 Runolfsdottir Tunnel Apt. 684','Prof. Wilber Grady IV','Rebamouth','LEB','582.624.3440','2020-10-23','elouise56@kozey.biz',NULL),(75,'Haskell','Upton','26312 Torey Street Suite 190','Ward Hackett','Abshireview','LEB','+1-702-430-6864','2020-10-23','reichel.charlotte@deckow.com',NULL),(76,'Lew','Armstrong','22682 Keely Lock Suite 491','Carli Goodwin MD','Lake Wilburn','LEB','(491) 639-7672 x78901','2020-10-23','cwilliamson@harber.com',NULL),(77,'Cara','Runolfsson','2381 Ward Freeway','Melvina Bayer MD','New Jonathon','LEB','1-236-906-0464 x38933','2020-10-23','goldner.jazlyn@rempel.org',NULL),(78,'Renee','Robel','569 Myrtie Square Suite 536','Mrs. Savanah Shields','Port Davon','LEB','1-473-454-3741 x43630','2020-10-23','qmcclure@gmail.com',NULL),(79,'Katelyn','Zulauf','324 Arnoldo Lodge','Carmel Crist','Tysonside','LEB','(676) 967-2869','2020-10-23','jenkins.kaleigh@rath.biz',NULL),(80,'asdasd','dsad','dsad','dsa','das','AF','asd','2020-10-23','aasdsadd@saasd.com',NULL),(81,'First name','last name','test','123','test','AF','71035881','2020-10-23','asdasdsadas@gmail.com',NULL),(82,'asd','xdas','dsad','asd','asdas','WS','asda','2020-10-23','asdsad@gmail.com',NULL),(83,'asdasd','asdsa','asadasdsad','asdass','asd','AF','asdasdasd','2020-10-23','asdasdasdas@gmail.com',NULL),(84,'sadsad','sad','sadasd','sadasdas','asdasdsad','AF','asaadsd','2020-10-23','asdasdsadas@gmail.com',NULL),(85,'dsfjhdsjkfhdskjhfq','adsfjhakjsdfhjk','djkfhdskjfhkj','dfjskfhkjdshfjk','dskjhfdskhfkj','AF','dskhfkdjshfjk','1996-04-26','ksdhfkjsdhfkjdsv@gmail.com',NULL),(86,'new test','new test','new address','new zipCOde','new CIty','LB','71035881','1996-12-12','ramymehrbe@gmail.com','./pictures/.png'),(87,'new test 2','new test','new address','new zipCOde','new CIty','LB','71035881','1996-12-12','ramymehrbe@gmail.com','./pictures/.png'),(89,'ramy','merheb','mar elias','none','Beirut, baabda','LB','71035881','1996-04-26','ramymerheb@gmail.com','./pictures/svga.png'),(90,'asdas','sadasd','asdasd','dsadasd','dasdasd','AL','sad','1996-12-25','sadasd@sadasd.com','./pictures/svga.png.png'),(92,'dsdljfhdskjhfjk','hkjdshkjfhdskjfh','jskdhfdskjhfkjdshfkj','jkdshfjkdshfkjhdskj','kjfdshfkjshdkjfhkj','AF','4+54654654','2020-10-25','ksdfjdslkfjl@hotmail.com','./pictures/svga.png'),(93,'sdfdsjh','qkjhkjh','jkhjkh','kjh','kjh','KZ','jkhkjh','2020-12-12','asjkdjask@gmail.com','./pictures/svga.png'),(94,'asd','jl','jkhjk','h','jkh','KZ','jkhjjh','2012-02-02','kjkjhkjsadsad@gmail.com',NULL),(95,'alert(&#34;asdsa&#34;)','asjkdhasjk','jhasjkdhasjkh',NULL,'asjkdhaksjdhkj','LB','54564654654','5555-06-05','asdasdsad@gmail.com',NULL);
/*!40000 ALTER TABLE `address_book` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-25 16:19:42
