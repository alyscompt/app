/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - smartkam_loket
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smartkam_loket` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `smartkam_loket`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `agenda` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin2;

/*Data for the table `agenda` */

insert  into `agenda`(`id_agenda`,`agenda`,`file`) values 
(1,'Layanan SmartKampung','text_1510111073.jpg'),
(2,'Layanan SmartKampung','text_1510111073.jpg'),
(3,'Layanan SmartKampung','text_1510111073.jpg');

/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id_instansi` int(2) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `wilker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `instansi` */

insert  into `instansi`(`id_instansi`,`instansi`,`telp`,`alamat`,`logo`,`wilker`) values 
(1,'BPN - BANYUWANGI','021-321312','JALAN BP. SUDIRMAN BANYUWANGI','logo_1383876609.png',351015);

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `username` varchar(40) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `id_loket` int(3) DEFAULT NULL,
  `wilker` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`username`,`nama`,`telp`,`alamat`,`password`,`level`,`id_loket`,`wilker`) values 
('aaa','Aaaa','08967987568','Jl. Hkasdas','3b3690fba8bd08059eae130425396eb05ded1b7d','Penjaga',6,NULL),
('admin','admin','08384494040','-','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad','Admin',NULL,NULL),
('loket1','Loket 1','08984494040','aaa','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad','Penjaga',6,351015),
('loket2','Loket 2','083823120','Jl. jalan','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad','Penjaga',7,351015),
('loket3','Loket 3','08343294','Cinere','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad','Penjaga',8,351015),
('loket4','Loket 4','083458345','Gandul','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad','Penjaga',9,351015);

/*Table structure for table `loket` */

DROP TABLE IF EXISTS `loket`;

CREATE TABLE `loket` (
  `id_loket` int(3) NOT NULL AUTO_INCREMENT,
  `str_loket` varchar(2) DEFAULT NULL,
  `loket` varchar(40) DEFAULT NULL,
  `suara` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `wilker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_loket`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `loket` */

insert  into `loket`(`id_loket`,`str_loket`,`loket`,`suara`,`status`,`wilker`) values 
(6,'a','1',NULL,0,351015),
(7,'b','2',NULL,1,351015),
(8,'c','3',NULL,0,351015),
(9,'d','4',NULL,1,351015);

/*Table structure for table `text_jalan` */

DROP TABLE IF EXISTS `text_jalan`;

CREATE TABLE `text_jalan` (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_text`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `text_jalan` */

insert  into `text_jalan`(`id_text`,`text`,`img`) values 
(1,'Layanan Antrian Online','logo_bwi_2.png'),
(2,'Layanan Kependudukan','logo_bwi_2.png'),
(3,'Layanan Perijinan','logo_bwi_2.png'),
(4,'Layanan Surat Keterangan','logo_bwi_2.png'),
(5,'Layanan Umum','logo_bwi_2.png');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `str_antrian` varchar(2) DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `id_loket` int(3) NOT NULL DEFAULT '0',
  `username` varchar(40) DEFAULT NULL,
  `tgl` int(8) unsigned zerofill DEFAULT '00000000',
  `wilker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`str_antrian`,`no_antrian`,`id_loket`,`username`,`tgl`,`wilker`) values 
(19,NULL,1,8,'loket3',12112017,NULL),
(20,NULL,2,6,'loket1',12112017,NULL),
(21,NULL,3,6,'loket1',12112017,NULL),
(22,NULL,4,0,NULL,12112017,NULL),
(23,NULL,5,0,NULL,12112017,NULL),
(24,NULL,6,0,NULL,12112017,NULL),
(25,NULL,1,0,NULL,14112017,NULL),
(26,NULL,2,0,NULL,14112017,NULL),
(27,NULL,1,6,'loket1',16112017,NULL),
(28,NULL,2,6,'loket1',16112017,NULL),
(29,'b',3,7,'loket2',16112017,NULL),
(30,NULL,1,6,'loket1',17112017,NULL),
(31,'b',2,7,'loket2',17112017,NULL),
(32,NULL,3,8,'loket3',17112017,NULL),
(33,NULL,4,9,'loket4',17112017,NULL),
(34,NULL,5,0,NULL,17112017,NULL),
(35,NULL,6,0,NULL,17112017,NULL),
(36,NULL,7,0,NULL,17112017,NULL),
(37,NULL,8,0,NULL,17112017,NULL),
(38,NULL,9,0,NULL,17112017,NULL),
(39,NULL,10,0,NULL,17112017,NULL),
(40,NULL,11,0,NULL,17112017,NULL),
(41,NULL,12,0,NULL,17112017,NULL),
(42,NULL,13,0,NULL,17112017,NULL),
(43,NULL,14,0,NULL,17112017,NULL),
(44,NULL,15,0,NULL,17112017,NULL),
(45,NULL,16,0,NULL,17112017,NULL),
(46,NULL,17,0,NULL,17112017,NULL),
(47,NULL,18,0,NULL,17112017,NULL),
(48,NULL,19,0,NULL,17112017,NULL),
(49,NULL,20,0,NULL,17112017,NULL),
(50,NULL,21,0,NULL,17112017,NULL),
(51,NULL,22,0,NULL,17112017,NULL),
(52,NULL,23,0,NULL,17112017,NULL),
(53,NULL,24,0,NULL,17112017,NULL),
(54,NULL,25,0,NULL,17112017,NULL),
(55,NULL,26,0,NULL,17112017,NULL),
(56,NULL,27,0,NULL,17112017,NULL),
(57,NULL,28,0,NULL,17112017,NULL),
(58,NULL,29,0,NULL,17112017,NULL),
(59,NULL,1,6,'loket1',10012020,NULL),
(60,NULL,2,0,NULL,10012020,NULL),
(61,NULL,1,8,'loket3',30032021,NULL),
(62,NULL,2,8,'loket3',30032021,NULL),
(63,NULL,3,8,'loket3',30032021,NULL),
(64,NULL,4,8,'loket3',30032021,NULL),
(65,NULL,5,8,'loket3',30032021,NULL),
(66,NULL,6,8,'loket3',30032021,NULL),
(67,NULL,7,8,'loket3',30032021,NULL),
(68,NULL,8,8,'loket3',30032021,NULL),
(69,NULL,9,8,'loket3',30032021,NULL),
(70,NULL,10,8,'loket3',30032021,NULL),
(71,NULL,11,8,'loket3',30032021,NULL),
(72,NULL,12,8,'loket3',30032021,NULL),
(73,NULL,13,8,'loket3',30032021,NULL),
(74,NULL,14,8,'loket3',30032021,NULL),
(75,NULL,15,8,'loket3',30032021,NULL),
(76,'c',16,8,'loket3',30032021,NULL),
(79,'b',1,7,'loket2',30032021,NULL),
(80,'b',2,7,'loket2',30032021,NULL),
(81,'b',3,7,'loket2',30032021,NULL),
(82,'b',4,7,'loket2',30032021,NULL),
(83,'a',1,6,'loket1',30032021,NULL),
(84,'c',17,8,'loket3',30032021,NULL),
(85,'c',18,8,'loket3',30032021,NULL),
(86,'c',19,8,'loket3',30032021,NULL),
(87,'c',20,8,'loket3',30032021,NULL),
(88,'c',21,8,'loket3',30032021,NULL),
(89,'c',22,8,'loket3',30032021,NULL),
(90,'d',1,9,'loket4',30032021,NULL),
(91,'b',1,7,'loket2',31032021,NULL),
(92,'b',2,7,'loket2',31032021,NULL),
(93,'c',1,8,'loket3',31032021,NULL),
(94,'b',1,7,'loket2',06042021,NULL),
(95,'b',2,7,'loket2',06042021,NULL),
(96,'b',3,7,'loket2',06042021,NULL),
(97,'a',1,6,NULL,14012022,NULL),
(98,'a',2,6,NULL,14012022,NULL),
(99,'a',1,6,NULL,22012022,NULL),
(100,'a',2,6,NULL,22012022,NULL),
(101,'a',3,6,NULL,22012022,NULL),
(102,'a',4,6,NULL,22012022,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
