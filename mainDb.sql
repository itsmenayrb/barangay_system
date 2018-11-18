/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.35-MariaDB : Database - barangaysalitranii
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `date_requested` date NOT NULL,
  `decision` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date_accomplished` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `appointment` */

insert  into `appointment`(`id`,`username`,`fullname`,`contactnumber`,`email`,`appointment_date`,`appointment_time`,`purpose`,`date_requested`,`decision`,`status`,`date_accomplished`) values 
(1,'bryan','Bryan Balaga','09878787785','asdad@gmail.com','2018-11-30','08:00:00','ole','2018-11-18',NULL,'Pending',NULL);

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `dateofyear` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `absent` varchar(255) DEFAULT NULL,
  `on_leave` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `attendance` */

insert  into `attendance`(`id`,`employee_id`,`fullname`,`position`,`dateofyear`,`time_in`,`time_out`,`absent`,`on_leave`,`activity`,`comments`,`status`) values 
(1,201901,'Bryan Villanueva Balaga','Barangay Chairman','2018-11-06','06:50:04','06:53:42',NULL,NULL,NULL,NULL,'active'),
(2,201903,'Victor  Magtanggol','Barangay Councilor','2018-11-06',NULL,NULL,'Absent',NULL,NULL,NULL,'active'),
(3,201903,'Victor  Magtanggol','Barangay Councilor','2018-11-06',NULL,NULL,'Absent',NULL,NULL,NULL,'active'),
(4,201902,'Apple Rose Catalino Gabales','Barangay Secretary','2018-11-06',NULL,NULL,NULL,'On Leave','Sick Leave',NULL,'active'),
(5,201901,'Bryan Villanueva Balaga','Barangay Chairman','2018-11-07','08:55:58','11:49:15',NULL,NULL,NULL,NULL,'active'),
(6,201902,'Apple Rose Catalino Gabales','Barangay Secretary','2018-11-07','08:57:01',NULL,NULL,NULL,NULL,NULL,'active'),
(7,201904,'Mia  Khalifa','Barangay Assistant Secretary','2018-11-07',NULL,NULL,'Absent',NULL,NULL,NULL,'active'),
(8,201901,'Bryan Villanueva Balaga','Barangay Chairman','2018-11-08','05:59:06','05:59:20',NULL,NULL,NULL,NULL,'active'),
(9,201902,'Apple Rose Catalino Gabales','Barangay Secretary','2018-11-08','06:02:23',NULL,NULL,NULL,NULL,NULL,'active');

/*Table structure for table `commendations` */

DROP TABLE IF EXISTS `commendations`;

CREATE TABLE `commendations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `employee` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `commendationMessage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `commendations` */

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `complaint` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `complaints` */

/*Table structure for table `complaints_files` */

DROP TABLE IF EXISTS `complaints_files`;

CREATE TABLE `complaints_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `original_file_name` varchar(255) DEFAULT NULL,
  `fileextension` varchar(255) DEFAULT NULL,
  `filedirectory` varchar(255) DEFAULT NULL,
  `complaint_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `complaints_files` */

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `Prefix` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Suffix` varchar(255) DEFAULT NULL,
  `Position` varchar(255) NOT NULL,
  `homeaddress` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(255) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `ReasonForDeactivation` varchar(255) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=201905 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`employee_id`,`Prefix`,`FirstName`,`MiddleName`,`LastName`,`Suffix`,`Position`,`homeaddress`,`contactnumber`,`Username`,`Email`,`Password`,`Status`,`ReasonForDeactivation`,`Token`) values 
(201901,'Mr','Bryan','Villanueva','Balaga','','Barangay Chairman',NULL,NULL,'bryan','bryan@gmail.com','$2y$10$yCbom5bkGlE6t59L16l2huz6Adz4xfP5V0fz8Io./0dlUDZrB6h5e','active',NULL,NULL),
(201902,'Ms','Apple Rose','Catalino','Gabales','','Barangay Secretary',NULL,NULL,'apple','apple@gmail.com','$2y$10$qmaYWR6ZTMsmPpdzmBNcMORVaLFy58K/DCsgO6c/MavMFibEZg1he','active',NULL,NULL),
(201903,'Mr','Victor','','Magtanggol','','Barangay Councilor',NULL,NULL,'victor','victor@gmail.com','$2y$10$FH18Oi3y6IRa04MNbeBI7e9.OpRlWuj8uRTP4.8ZOujgQ2drcWkE.','active',NULL,NULL),
(201904,'Dr','Mia','','Khalifa','','Barangay Assistant Secretary',NULL,NULL,'test1','test@gmail.com','$2y$10$DMuZK5HzY5AwaF6ufTPYvu6EreWc65CWcnv0.F89ZZSmkHZj6ZkzW','active',NULL,NULL);

/*Table structure for table `filecomplaint` */

DROP TABLE IF EXISTS `filecomplaint`;

CREATE TABLE `filecomplaint` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_subject` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `filecomplaint` */

/*Table structure for table `homeaddress` */

DROP TABLE IF EXISTS `homeaddress`;

CREATE TABLE `homeaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lot` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `barangay` varchar(255) DEFAULT 'Salitran II',
  `city` varchar(255) DEFAULT 'Dasmariñas',
  `province` varchar(255) DEFAULT 'Cavite',
  `country` varchar(255) DEFAULT 'Philippines',
  `zipcode` int(11) DEFAULT '4114',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `homeaddress` */

insert  into `homeaddress`(`id`,`lot`,`street`,`subdivision`,`barangay`,`city`,`province`,`country`,`zipcode`) values 
(1,'Block 8','Lot 6','GreenSquare','Salitran II','Dasmariñas','Cavite','Philippines',4114);

/*Table structure for table `inquiries` */

DROP TABLE IF EXISTS `inquiries`;

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `inquiry` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inquiries` */

/*Table structure for table `recommendations` */

DROP TABLE IF EXISTS `recommendations`;

CREATE TABLE `recommendations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `recommendation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `recommendations` */

/*Table structure for table `residents` */

DROP TABLE IF EXISTS `residents`;

CREATE TABLE `residents` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Prefix` varchar(255) NOT NULL,
  `FirstName` varchar(256) NOT NULL,
  `MiddleName` varchar(256) NOT NULL,
  `LastName` varchar(256) NOT NULL,
  `Suffix` varchar(256) NOT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `Bday` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Bplace` varchar(256) DEFAULT NULL,
  `Homeaddress` varchar(256) NOT NULL,
  `TelephoneNumber` bigint(11) DEFAULT NULL,
  `CellphoneNumber` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `residents` */

insert  into `residents`(`user_ID`,`Prefix`,`FirstName`,`MiddleName`,`LastName`,`Suffix`,`Sex`,`Bday`,`Age`,`Bplace`,`Homeaddress`,`TelephoneNumber`,`CellphoneNumber`) values 
(1,'Mr','Bryan','Villanueva','Balaga','Jr',NULL,'2006-11-01',12,NULL,'Block 8 Lot 6 GreenSquare Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',0,9123456789),
(2,'Dr','Juana','Dela','Torre','',NULL,'2017-11-02',1,NULL,'Block 8 Lot 6 Greensquare Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114.',0,9123456789),
(3,'Mr','Jose','Protacio','Rizal','',NULL,'2002-11-20',16,NULL,'Taga Jan Jan Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114.',461231232,0),
(4,'Mr','James','Reid','Balaga','',NULL,'2001-11-02',17,NULL,'Butaw butaw butaw Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114.',2193810298,10293810938);

/*Table structure for table `subusers` */

DROP TABLE IF EXISTS `subusers`;

CREATE TABLE `subusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `relationship` varchar(25) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `homeaddress` varchar(255) NOT NULL,
  `telephonenumber` bigint(11) NOT NULL,
  `cellphonenumber` bigint(20) NOT NULL,
  `dateAdded` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `subusers` */

insert  into `subusers`(`id`,`username`,`relationship`,`prefix`,`fname`,`mname`,`lname`,`suffix`,`gender`,`birthday`,`age`,`birthplace`,`homeaddress`,`telephonenumber`,`cellphonenumber`,`dateAdded`,`status`,`dateDeleted`) values 
(1,'bryan','Mother  ','Dr','Juana','Dela','Torre','',NULL,'2017-11-02','1',NULL,'Block 8 Lot 6 Greensquare Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',0,9123456789,'2018-11-18','Primary','2018-11-18'),
(2,'bryan','Father  ','Mr','Jose','Protacio','Rizal','',NULL,'2002-11-20','16',NULL,'Taga Jan Jan Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',461231232,0,'2018-11-18','Primary','2018-11-18'),
(3,'bryan','Brother  ','Mr','James','Reid','Balaga','',NULL,'2001-11-02','17',NULL,'Butaw butaw butaw Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',2193810298,10293810938,'2018-11-18','Primary','2018-11-18');

/*Table structure for table `user_req` */

DROP TABLE IF EXISTS `user_req`;

CREATE TABLE `user_req` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_req` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Pwd` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SecurityQuestion1` varchar(255) NOT NULL,
  `AnswerOne` varchar(255) NOT NULL,
  `SecurityQuestion2` varchar(255) NOT NULL,
  `AnswerTwo` varchar(255) NOT NULL,
  `Token` varchar(255) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `Status` varchar(255) NOT NULL,
  `DateDeleted` date DEFAULT NULL,
  `DateDeceased` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`Username`,`Pwd`,`Email`,`SecurityQuestion1`,`AnswerOne`,`SecurityQuestion2`,`AnswerTwo`,`Token`,`DateCreated`,`Status`,`DateDeleted`,`DateDeceased`) values 
(1,'bryan','$2y$10$v5fouJSVcWv8FhMFTV/n.uFx8bMCd/.IS1c8boiYg9Tl9KIPmOq3O','bryan@gmail.com','What is the name of your first pet?','$2y$10$fAHpE/hlHGNb.zEDAGLTtubpUkOSN7A.2s8l5Fub8D9liMWPocKeO','Who is your favorite singer?','$2y$10$oNSbcZ3GmJNQtQzEk.iEGejer6KHqbojI65GDJzavmq8mAz2eXmwC',NULL,'2018-11-18','',NULL,NULL),
(2,'bryan1','$2y$10$fB60Bv7749ljWkDhKkLFC.v5DQa3w6WqYDbH8h1adWGwiLPdzj1qS','asdad@gmail.com','What is the name of your first pet?','$2y$10$w8a8UVXXSDJz/HdH7vgh4egd4smKzHqouTvFWuo8GZOUSJeSW3.Dy','Who is your favorite singer?','$2y$10$0mVQrKIXLtS4x75wWXFk7uFh.50BUzK0fv.JlYLPxQyN4hdz9ZaiC',NULL,'2018-11-18','Active',NULL,NULL),
(3,'bryan2','$2y$10$jgWx.9or5lam0F2Z34Pdd.eR82c/v8wf5398tSXntxj862s92UoRq','bryan2@gmail.com','What is the name of your first pet?','$2y$10$UPJIX6JqVjOSeaiwmx9a0uiOHfBNilOHK1z/yt6lrcv5qPFn/ooFO','Who is your favorite singer?','$2y$10$W8Tq8OwE9J3ttTELh6dX6eujAAUv.5l5DMwbKVf..b3mz5i8OOpmK',NULL,'2018-11-18','Active',NULL,NULL),
(4,'bryan123','$2y$10$k5A46Zae5sJR4q3t2rq5NOBgwEz50y3rL5tI7YsH0kEWlV6qnxG5m','bryan123@gmail.com','What is the name of your first pet?','$2y$10$FvRJAF6zeQfAyMNIuUWUWuC7BqvKeYkki7M102DOnPH8P6TANWiuq','Who is your favorite singer?','$2y$10$LDsBGtac8VufT3mtjNufleTxS87fWSeCSc4Vc2mdO1YFAZbXmey06',NULL,'2018-11-18','Active',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
