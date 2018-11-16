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

insert  into `appointment`(`id`,`username`,`fullname`,`contactnumber`,`appointment_date`,`appointment_time`,`purpose`,`date_requested`,`decision`,`status`,`date_accomplished`) values 
(1,'bryan','Bryan Balaga','12312312321','2018-11-17','09:00:00','Mabangis','2018-11-09',NULL,'Pending',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `homeaddress` */

insert  into `homeaddress`(`id`,`lot`,`street`,`subdivision`,`barangay`,`city`,`province`,`country`,`zipcode`) values 
(1,'alskdjasd','alskdjasd','laksjdlaksjd','Salitran II','Dasmariñas','Cavite','Philippines',4114),
(2,'asdlakj','alskdj','asldkj','Salitran II','Dasmariñas','Cavite','Philippines',4114),
(3,'Block 8 Lot 6','N/A','GreenSquare Villas','Salitran II','Dasmariñas','Cavite','Philippines',4114),
(4,'asdlkj','asldkj','asldkj','Salitran II','Dasmariñas','Cavite','Philippines',4114),
(5,'123jh12312321313','12313','123123','Salitran II','Dasmariñas','Cavite','Philippines',4114);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `residents` */

insert  into `residents`(`user_ID`,`Prefix`,`FirstName`,`MiddleName`,`LastName`,`Suffix`,`Sex`,`Bday`,`Age`,`Bplace`,`Homeaddress`,`TelephoneNumber`,`CellphoneNumber`) values 
(1,'Mr','Bryan','Villanueva','Balaga','Jr',NULL,'2006-10-18',12,NULL,'Block 8 Lot 6 N/A GreenSquare Villas Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',1231232131,12312321312),
(2,'Dr','Apple','Rose','Balaga','',NULL,'2006-10-01',12,NULL,'asdlkj asldkj asldkj Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',1231231231,12312312312),
(3,'Dr','doctor','doctoran','tantan','',NULL,'2006-10-04',12,NULL,'123jh12312321313 12313 123123 Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',1231232131,0);

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
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `subusers` */

insert  into `subusers`(`id`,`username`,`relationship`,`prefix`,`fname`,`mname`,`lname`,`suffix`,`gender`,`birthday`,`age`,`birthplace`,`homeaddress`,`telephonenumber`,`cellphonenumber`,`dateAdded`,`dateDeleted`) values 
(1,'bryan123','Mother  ','Mr','Eddie','G','Madrona','',NULL,'2006-11-05','12',NULL,'123lkj 12l3kj 12l3kj Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',1231312313,0,'2018-11-05',NULL),
(2,'bryan123','Daughter  ','Dr','Eddoy','Gardo','Madrona','Sr',NULL,'2006-11-05','12',NULL,'dfdg sdfsdf 12l3kj34s Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',0,12312312311,'2018-11-05',NULL),
(3,'bryan','Brother  ','Dr','Elesita','Precorpio','Ala Eh','III',NULL,'2006-11-06','12',NULL,'Taga Jan Lang Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',2312312332,0,'2018-11-06',NULL),
(4,'bryan','Mother  ','Mr','Victor','','Magtanggol','Jr',NULL,'2006-11-01','12',NULL,'cvsu cvsu cvsu Barangay Salitran II, DasmariÃ±as City, Cavite, Philippines, 4114. ',0,9123456789,'2018-11-07',NULL);

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
  `DateDeleted` date DEFAULT NULL,
  `DateDeceased` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`Username`,`Pwd`,`Email`,`SecurityQuestion1`,`AnswerOne`,`SecurityQuestion2`,`AnswerTwo`,`Token`,`DateCreated`,`DateDeleted`,`DateDeceased`) values 
(1,'bryan','$2y$10$HT8tLVDlk.hLm4OzZBmOg.eST37m1/rvEkq3KHf.WOFy4kcEHjr/G','bryan@gmail.com','What is the name of your first pet?','$2y$10$.BYGRagVloKh2cliI3OwouwYYPkwOgWODHEucpR9koocnv8i/VC6S','Who is your favorite singer?','$2y$10$PhoFc4/eCLvAfrm1S/zb9eqi.PWaZaocme44nNjG9YN/7AWPvzYU.',NULL,'2018-10-30',NULL,NULL),
(2,'bryan1','$2y$10$fARhOnuiHmlCULKwhwT59OKEf7g3hZglh7SlwDJBy5EUWC7ckIu/e','bryan1@gmail.com','What is the name of your first pet?','$2y$10$.eLPyNy3Cs2rFjsUBAlDSuYLeiHWtKrIJ6hRFtqcO2g0eyms7xtMK','Who is your favorite singer?','$2y$10$Hl26TGSdn9n1oXZ2stMTYO05krqU.sz4QsDnIb/YKq9RIfp4Egvoi',NULL,'2018-10-30',NULL,NULL),
(3,'bryan123','$2y$10$3YN8ikMPmJumfwdvLoNNxeXLmuQorAhAIxU9iYz0BolS/LG9UDqzW','bryan123@gmail.com','What is the name of your first pet?','$2y$10$hYVmt/mZ/Pn0G4y2cG3N1OjLYnLCNesrHFXiD728pz2GwmWz/QwR.','Who is your favorite singer?','$2y$10$vrCMAUTTFzFzxisyL2AzJ.n.REE5eSNkdsjiDkYv4woAv27zv8/32',NULL,'2018-10-31',NULL,NULL);

DROP TABLE IF EXISTS `commendations`;

CREATE TABLE `commendations` (
  `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
  `firstname` VARCHAR(255),
  `lastname` VARCHAR(255),
  `email` VARCHAR(255),
  `employee` VARCHAR(255),
  `subject` VARCHAR(255),
  `commendationMessage` VARCHAR(255)
);

DROP TABLE IF EXISTS `suggestions`;

CREATE TABLE `recommendations`(
  `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
  `firstname` VARCHAR(255),
  `lastname` VARCHAR(255),
  `email` VARCHAR(255),
  `subject` VARCHAR(255),
  `recommendation` VARCHAR(255)
);

DROP TABLE IF EXISTS `inquiries`;

CREATE TABLE `inquiries` (
  `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
  `firstname` VARCHAR(255),
  `lastname` VARCHAR(255),
  `contactnumber` VARCHAR(255),
  `email` VARCHAR(255),
  `subject` VARCHAR(255),
  `inquiry` VARCHAR(255)
);

DROP TABLE IF EXISTS `complaints`;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
