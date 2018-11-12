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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `attendance` */

insert  into `attendance`(`id`,`employee_id`,`fullname`,`position`,`dateofyear`,`time_in`,`time_out`,`absent`,`on_leave`,`activity`,`comments`,`status`) values 
(1,201901,'Bryan Villanueva Balaga','Barangay Chairman','2018-11-06','06:50:04','06:53:42',NULL,NULL,NULL,NULL,'active'),
(2,201903,'Victor  Magtanggol','Barangay Councilor','2018-11-06',NULL,NULL,'Absent',NULL,NULL,NULL,'active'),
(3,201903,'Victor  Magtanggol','Barangay Councilor','2018-11-06',NULL,NULL,'Absent',NULL,NULL,NULL,'active'),
(4,201902,'Apple Rose Catalino Gabales','Barangay Secretary','2018-11-06',NULL,NULL,NULL,'On Leave','Sick Leave',NULL,'active'),
(5,201901,'Bryan Villanueva Balaga','Barangay Chairman','2018-11-07','08:55:58','11:49:15',NULL,NULL,NULL,NULL,'active'),
(6,201902,'Apple Rose Catalino Gabales','Barangay Secretary','2018-11-07','08:57:01',NULL,NULL,NULL,NULL,NULL,'active'),
(7,201904,'Mia  Khalifa','Barangay Assistant Secretary','2018-11-07',NULL,NULL,'Absent',NULL,NULL,NULL,'active');

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
  `used_id` int(11) NOT NULL, /* Foreign Key to Users Table */
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

/*Table structure for table `residents` */

DROP TABLE IF EXISTS `residents`;

CREATE TABLE `residents` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL, /* Foreign Key to Users table */
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


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
